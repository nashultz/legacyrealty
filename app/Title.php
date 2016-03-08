<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table = 'titles';
    protected $fillable = ['name'];

    public function employee()
    {
        return $this->belongsTo('Legacy\Employee');
    }
}
