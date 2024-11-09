<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'user_id',
        'charity_id',
        'amount',
        'recipient_name',
        'recipient_phone',
        'recipient_address',
        'city',
        'user_delivered',
        'site_delivered',
    ];
   public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function charity()
    {
        return $this->belongsTo(Charity::class);
    }
    use HasFactory;
}
