<?php

namespace Legacy;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $table = 'testimonies';
    protected $fillable = ['published','featured','body','name'];

    public function scopeLatest($query)
    {
        $query->orderBy('updated_at', 'desc');
    }

    public function scopePublished($query)
    {
        $query->where('published',1);
    }

    public function scopeFeatured($query)
    {
        $query->where('featured',1);
    }
}
