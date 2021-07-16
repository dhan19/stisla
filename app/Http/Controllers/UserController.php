<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $UserRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->UserRepository = $userRepo;
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
            return Datatables::of((new UserDataTable())->get())->make(true);
        }
    
        return view('users.index');
    }

    /**
     * Show the form for creating a new Truck.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created Truck in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    // public function store(CreateUserRequest $request)
    // {
    //     $input = $request->all();

    //     $truck = $this->truckRepository->create($input);

    //     Flash::success('Truck saved successfully.');

    //     return redirect(route('trucks.index'));
    // }

    /**
     * Display the specified Truck.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $truck = $this->UserRepository->find($id);

        if (empty($truck)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('truck', $truck);
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
        $truck = $this->UserRepository->find($id);

        if (empty($truck)) {
            Flash::error('Truck not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('truck', $truck);
    }

    /**
     * Update the specified Truck in storage.
     *
     * @param  int              $id
     * @param UpdateTruckRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $truck = $this->UserRepository->find($id);

        if (empty($truck)) {
            Flash::error('Truck not found');

            return redirect(route('users.index'));
        }

        $truck = $this->UserRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
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
        $truck = $this->UserRepository->find($id);

        $truck->delete();

        return $this->sendSuccess('User deleted successfully.');
    }
}
