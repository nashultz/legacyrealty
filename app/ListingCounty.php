<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class ListingCounty extends Model
{
    protected $table = 'listing_counties';
    protected $fillable = ['name'];

    public function listing()
    {
        return $this->belongsTo('Legacy\Listing');
    }
}
