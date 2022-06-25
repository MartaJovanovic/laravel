<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'body',
        "service_id",
        "user_id"
    ];


    public function service()
    {
        return $this->belongsTo(Service::class, "service_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

}