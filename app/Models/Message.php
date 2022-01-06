<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $array)
 * @method static offset(int $param)
 * @method static findOrFail($id)
 * @method static find($id)
 * @method static make(array $array)
 * @method static where(string $string, mixed $room_id)
 * @property mixed id
 * @property mixed message
 * @property mixed user_id
 * @property mixed type
 * @property mixed user
 * @property int|mixed room_id
 */
class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'message',
        'image',
        'audio',
        'type'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function getMessageAttribute($value)
    {
        if ($this->type != 'system') {
            $username = Auth::user()->name;
            $uValue = Str::lower($value);
            $uUserName = Str::lower($username);
            $name = Str::ucfirst($username);
            if (Str::contains($uValue, $uUserName)) {
                $value = Str::replace($uUserName, "<span wire:click.prevent=\"onClickUserName('$name')\"  @click='\$refs.input.focus()' class='bg-primary-800 px-2 text-white rounded-md cursor-pointer'>$name</span>", $uValue);
            }
        }
        return $value;
    }

    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)->format('d/m H:i');
    }

}
