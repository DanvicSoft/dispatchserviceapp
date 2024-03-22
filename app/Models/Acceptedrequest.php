<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceptedrequest extends Model
{
  
    protected $fillable = ['user_id', 'dispatchrequest_id', 'pickup_request_details',
     'pickup_address', 'item_pickup', 'dropoff_address'];

    use HasFactory;
}
