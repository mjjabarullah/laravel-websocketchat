<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static find(mixed $room_id)
 * @property String name
 * @property mixed id
 * @property mixed slug
 */
class Room extends Model
{
    use HasFactory;

    protected $fillable =[
      'name',
      'description'
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
