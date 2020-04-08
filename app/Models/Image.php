<?php

namespace App\Models;


class Image extends MyModel
{
    /**
     * Get the owning imageable model.
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
