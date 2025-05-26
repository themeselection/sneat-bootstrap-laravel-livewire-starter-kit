<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'pcode',
        'description',
        'state',
        'contribution',
    ];

    public function productdetail()
    {
        return $this->hasMany(productdetail::class);
    }

}
