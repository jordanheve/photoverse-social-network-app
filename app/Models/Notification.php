<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'data', 'read_at'
    ];

    public static function storeNotification($userId, $type, $data)
    {
        self::create([
            'user_id' => $userId,
            'type' => $type,
            'data' => $data,
            'read_at' => null, 
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
