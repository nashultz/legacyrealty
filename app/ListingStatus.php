<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class ListingStatus extends Model
{
    protected $table = 'listing_statuses';
    protected $fillable = ['name'];

    public function listing()
    {
        return $this->belongsTo('Legacy\Listing');
    }
}
