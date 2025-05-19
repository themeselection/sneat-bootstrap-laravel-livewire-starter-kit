<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class policyrisk extends Model
{
    //
    protected $fillable=['policyid' ,'product_id','regno', 'engineno', 'chassisno','vehiclemake', 'vehiclemodel', 'yearofmake',
'vehiclecolor', 'contribution'];
 
}
