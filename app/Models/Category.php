<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',  
        'slug',
    ];

    /**
     * Perform any actions required after the model boots.
     */
    /*protected static function booted(): void
    {
        static::saving(function ($category) {
            $slug = $category->name . '-' . time();

            $category->slug = Str::slug($slug, '-');
        });
    }*/

    /**
     * User relation.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * News relation.
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}