<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_path',
        'image_url',
        'sort_order',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute()
    {
        if ($this->image_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->image_path)) {
            return \Illuminate\Support\Facades\Storage::url($this->image_path);
        }
        return $this->image_url;
    }
}
