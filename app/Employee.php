<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['office_id','title_id','specialty_id','name','email','protected','phone','cell','fax','published','bio'];

    public function images()
    {
        return $this->morphMany('Legacy\Image','imageable');
    }

    public function listings()
    {
        return $this->hasMany('Legacy\Listing');
    }

    public function office()
    {
        return $this->hasOne('Legacy\Office');
    }

    public function title()
    {
        return $this->hasOne('Legacy\Title');
    }

    public function specialty()
    {
        return $this->hasOne('Legacy\Specialty');
    }

    public function getOfficeAttribute($value)
    {
        $office = Office::findOrFail($value);

        return $office->name;
    }

    public function getTitleAttribute($value)
    {
        $title = Title::findOrFail($value);

        return $title->name;
    }

    public function getSpecialtyAttribute($value)
    {
        $specialty = Specialty::findOrFail($value);

        return $specialty->name;
    }

    public function scopeFeatured($query)
    {
        $query->where('featured',1);
    }

    public function scopePublished($query)
    {
        $query->where('published',1);
    }

    public function scopeLatest($query)
    {
        $query->orderBy('updated_at','desc');
    }
}
