<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = 'listings';
    protected $fillable = ['published','featured','status_id','slug','title','summary','description','address','city_id','county_id','state_id','zipcode','type_id','subtype_id','price','mlsno','yearbuilt','googlemap','viewcount','agent_id','video'];

    public function images()
    {
        return $this->morphMany('Legacy\Image','imageable');
    }

    public function agent()
    {
        return $this->belongsTo('Legacy\Employee');
    }

    public function getFeaturedImageAttribute()
    {
        $image = $this->images;

        return $image;
    }

    public function getLStatusAttribute()
    {
        $status = ListingStatus::findOrFail($this->status_id);

        return $status->name;
    }

    public function getCityAttribute()
    {
        $city = ListingCity::findOrFail($this->city_id);

        return $city->name;
    }

    public function getCountyAttribute()
    {
        $county = ListingCounty::findOrFail($this->county_id);

        return $county->name;
    }

    public function getStateAttribute()
    {
        $state = ListingState::findOrFail($this->state_id);

        return $state->name;
    }

    public function getTypeAttribute()
    {
        $type = ListingType::findOrFail($this->type_id);

        return $type->name;
    }

    public function getSubtypeAttribute()
    {
        $subtype = ListingSubtype::findOrFail($this->subtype_id);

        return $subtype->name;
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
