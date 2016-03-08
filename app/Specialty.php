<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $table = 'specialties';
    protected $fillable = ['name'];

    public function employee()
    {
        return $this->belongsTo('Legacy\Employee');
    }
}
