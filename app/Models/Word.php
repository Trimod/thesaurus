<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'spelling',
        'meaning_id',
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
     * Meaning/group of this word
     */
    public function meaning(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Meaning::class, 'id', 'meaning_id');
    }
}
