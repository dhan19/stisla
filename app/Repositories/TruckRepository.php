<?php

namespace App\Repositories;

use App\Models\Truck;
use App\Repositories\BaseRepository;

/**
 * Class TruckRepository
 * @package App\Repositories
 * @version July 16, 2021, 2:36 pm UTC
*/

class TruckRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Payload',
        'cargobox',
        'type',
        'driver',
        'vehicle_number',
        'images'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Truck::class;
    }
}
