<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class agentsdetailsModel extends Model
{
    //
    protected $fillable=['uid', 'allowcredit','noallocated', 'noused', 'status','access_token' ];


    public function getuserinfo()
    {
        return User::where('id',$this->uid)->first();
    }

    

}
