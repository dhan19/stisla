<?php

namespace App\DataTables;

use App\Models\Truck;

/**
 * Class TruckDataTable
 */
class TruckDataTable
{
    /**
     * @return Truck
     */
    public function get()
    {
        /** @var Truck $query */
        $query = Truck::query()->select('trucks.*');

        return $query;
    }
}
