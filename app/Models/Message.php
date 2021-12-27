<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static offset(int $param)
 * @property mixed id
 * @property mixed message
 */
class Message extends Model
{
    use HasFactory;

    protected $fillable =[
      'message'
    ];

}
