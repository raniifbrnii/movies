<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the movies for the genre.
     */
    public function movies()
    {
        return $this->hasMany(Movie::class);
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
