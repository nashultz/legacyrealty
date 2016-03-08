<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class ListingCity extends Model
{
    protected $table = 'listing_cities';
    protected $fillable = ['name'];

    public function listing()
    {
        return $this->belongsTo('Legacy\Listing');
    }
}
