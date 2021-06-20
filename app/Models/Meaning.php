<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meaning extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Words that have this meaning
     */
    public function words(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Word::class, 'meaning_id', 'id');
    }
}
