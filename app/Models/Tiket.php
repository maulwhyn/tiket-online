<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HashMany;
use Cviebrock\EloquentSluggable\Sluggable;

class Tiket extends Model
{
    use HasFactory, sluggable;

    protected $guarded=[];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Transasksi relation.
     */
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'tiket_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
