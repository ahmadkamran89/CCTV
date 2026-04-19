<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'resolution',
        'night_vision',
        'weatherproof',
        'storage',
        'features',
        'price',
        'image_url',
        'image_path',
        'badge',
        'is_active',
        'sort_order',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if (!$product->slug) {
                $product->slug = \Illuminate\Support\Str::slug($product->name);
            }
        });
        static::updating(function ($product) {
            if (!$product->slug) {
                $product->slug = \Illuminate\Support\Str::slug($product->name);
            }
        });
    }

    protected $casts = [
        'price'       => 'decimal:2',
        'is_active'   => 'boolean',
        'category_id' => 'integer',
        'sort_order'  => 'integer',
        'features'    => 'array',
    ];

    /* ─── Scopes ─────────────────────────────────────────────── */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /* ─── Accessors ──────────────────────────────────────────── */

    /**
     * Return the best available image URL.
     */
    public function getImageAttribute(): string
    {
        if ($this->image_path && Storage::disk('public')->exists($this->image_path)) {
            return Storage::url($this->image_path);
        }

        if ($this->image_url) {
            return $this->image_url;
        }

        return 'https://lh3.googleusercontent.com/aida-public/AB6AXuCQomkWVkp1h4R0KMNjm0fDaKCeN0pc35XkkkD3uC7iTdxYRw7s9fR9d4LGFWHCvmIKAsC-IxDmYE-uDLT8dthzFrC1XVCV5Ux9Mvwh2Cn0Xi2bGmWbARBTla-Tut7jl483H2OY2n3XmOh3rQJyfhlwvxEB8OnbHj3D2X0DRbt_n9AQQA0k4iAaLHImxw3Ti-AQqoz6vkYDh-iOyguLwW8zJglqXaROKgo5RrWqaJDDRTQiIBmkax44t2SBPn1Izbbmz1yUExgzMIum';
    }

    /**
     * Human-readable category label.
     */
    public function getCategoryLabelAttribute(): string
    {
        return $this->category ? $this->category->name : 'Uncategorized';
    }

    /**
     * Formatted AED price.
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'AED ' . number_format($this->price, 0);
    }

    /* ─── Static helpers ─────────────────────────────────────── */

    public static function badges(): array
    {
        return ['NEW', 'SALE', 'BEST SELLER', 'HOT', 'LIMITED'];
    }
}
