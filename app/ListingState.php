<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class ListingState extends Model
{
    protected $table = 'listing_states';
    protected $fillable = ['name'];

    public function listing()
    {
        return $this->belongsTo('Legacy\Listing');
    }
}
