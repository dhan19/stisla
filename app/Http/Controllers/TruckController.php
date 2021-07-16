<?php

namespace App\Http\Controllers;

use App\DataTables\TruckDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTruckRequest;
use App\Http\Requests\UpdateTruckRequest;
use App\Repositories\TruckRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

class TruckController extends AppBaseController
{
    /** @var  TruckRepository */
    private $truckRepository;

    public function __construct(TruckRepository $truckRepo)
    {
        $this->truckRepository = $truckRepo;
    }

    /**
     * Display a listing of the Truck.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new TruckDataTable())->get())->make(true);
        }
    
        return view('trucks.index');
    }

    /**
     * Show the form for creating a new Truck.
     *
     * @return Response
     */
    public function create()
    {
        return view('trucks.create');
    }

    /**
     * Store a newly created Truck in storage.
     *
     * @param CreateTruckRequest $request
     *
     * @return Response
     */
    public function store(CreateTruckRequest $request)
    {
        $input = $request->all();

        $truck = $this->truckRepository->create($input);

        Flash::success('Truck saved successfully.');

        return redirect(route('trucks.index'));
    }

    /**
     * Display the specified Truck.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $truck = $this->truckRepository->find($id);

        if (empty($truck)) {
            Flash::error('Truck not found');

            return redirect(route('trucks.index'));
        }

        return view('trucks.show')->with('truck', $truck);
    }

    /**
     * Show the form for editing the specified Truck.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $truck = $this->truckRepository->find($id);

        if (empty($truck)) {
            Flash::error('Truck not found');

            return redirect(route('trucks.index'));
        }

        return view('trucks.edit')->with('truck', $truck);
    }

    /**
     * Update the specified Truck in storage.
     *
     * @param  int              $id
     * @param UpdateTruckRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTruckRequest $request)
    {
        $truck = $this->truckRepository->find($id);

        if (empty($truck)) {
            Flash::error('Truck not found');

            return redirect(route('trucks.index'));
        }

        $truck = $this->truckRepository->update($request->all(), $id);

        Flash::success('Truck updated successfully.');

        return redirect(route('trucks.index'));
    }

    /**
     * Remove the specified Truck from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $truck = $this->truckRepository->find($id);

        $truck->delete();

        return $this->sendSuccess('Truck deleted successfully.');
    }
}
