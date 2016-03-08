<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class ListingSubtype extends Model
{
    protected $table = 'listing_subtypes';
    protected $fillable = ['name'];

    public function listing()
    {
        return $this->belongsTo('Legacy\Listing');
    }
}
