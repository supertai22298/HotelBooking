<?php

namespace App\Repositories\RoomType;

use App\Repositories\EloquentRepository;

class RoomTypeRepository extends EloquentRepository
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return App\RoomType::class;
    }
}
