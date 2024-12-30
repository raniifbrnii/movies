<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'synopsis',
        'poster',
        'year',
        'available',
        'genre_id',
    ];

    /**
     * Get the genre associated with the movie.
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function getPosterAttribute($value)
{
    return $value ? asset('storage/' . $value) : null;
}

protected static function boot()
{
    parent::boot();
    static::creating(function ($model) {
        if (!$model->getKey()) {
            $model->{$model->getKeyName()} = (string) \Illuminate\Support\Str::uuid();
        }
    });
}

}
