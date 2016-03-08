<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table = 'offices';
    protected $fillable = ['name','address','city','state','zip'];

    public function employee()
    {
        return $this->belongsTo('Legacy\Employee');
    }
}
