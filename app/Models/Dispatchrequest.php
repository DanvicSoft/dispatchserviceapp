<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatchrequest extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'pickup_request_details',
    'pickup_address',
    'item_pickup' => 'required',
    'recipient_name',
    'recipient_phone',
    'dropoff_address'];
}
