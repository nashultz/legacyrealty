<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['imageable_id','imageable_type','name'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
