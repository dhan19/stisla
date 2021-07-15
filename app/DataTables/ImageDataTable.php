<?php

namespace App\DataTables;

use App\Models\Image;

/**
 * Class ImageDataTable
 */
class ImageDataTable
{
    /**
     * @return Image
     */
    public function get()
    {
        /** @var Image $query */
        $query = Image::query()->select('images.*');

        return $query;
    }
}
