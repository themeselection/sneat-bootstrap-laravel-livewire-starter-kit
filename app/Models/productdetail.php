<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productdetail extends Model
{
    //
            /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'product_id',
        'fieldname',
        'fieldtype',
        'fieldseq',
    ];


}
