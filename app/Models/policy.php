<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class policy extends Model
{
    //
            /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'policyno',
        'insured_id',
        'insured_name',
        'agent_id',
        'status',
        'naicom_uid',
        'naicom_status',
        'niid_status',
        'niip_status',
        'elite_msg',
        'commission',
        'contribution',
        'start_date',
        'end_date', 
        'create_uid',
        'update_uid',
        'producttype',
        'usekey','vehicleuse','insurancetype'
    ];

    public function getrisk()
    {
        return policyrisk::where('policyid',$this->id)->first();
    }

        public function getagentname()
    {
        $agent = User::where('id', $this->agent_id)->first();
        return $agent ? $agent->name : 'Agent Not Found';

    }


}
