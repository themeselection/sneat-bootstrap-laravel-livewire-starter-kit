<?php

namespace App\Http\Controllers;

use App\Models\agentsdetailsModel;
use App\Models\policy;
use App\Models\policyrisk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\vehicleMake;
use Illuminate\Support\Facades\Http;
use App\Exceptions\InvalidUserActionException;


class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        Auth::check();
        $user = Auth::user();

        //filter based on role
        switch ($user->role) {
            case 'agent':
                # RETRIEVE ALL POLICIES CREATED BY THIS AGENT
                 $policies=policy::where('agent_id',$user->id)->orderBy('updated_at', 'desc')->get();
                break;
            case 'admin':
                # Retreieve all policies
                $policies=policy::all();
                break;
            case 'superadmin':
                # Retreieve all policies
                $policies=policy::all();
                break;
            case 'user':
                # Retrieve policies created by and for this user this user
                $policies=policy::where('insured_id', $user->id)->get();
                break;
            
            default:
                # code...
                break;
        }

       return view('policy.policylist', compact('policies'));

    }

        /**
     * Begin the Process of Purchasing a  resource.
     */
    public function buypolicy(Request $request)
    {
        //

        switch ($request) {
            case ($request->has('btnprivatemotor')):
                # began the purchase of a private motor policy
                $producttype='Private Motor Third Party';
                $contribution=15000;
                $usekey='car';
                 $insurancetype='Commercial';
                $vehicleuse="mcycle";
                break;

            case ($request->has('btncommercialmotor')):
                # began the purchase of a Commercial  motor policy
                $producttype='Commercial Motor Third Party';
                $contribution=20000;
                $usekey='bus';
                $insurancetype='Commercial';
                $vehicleuse="mcycle";
                break;
            case ($request->has('btnmotorcycle')):
                # began the purchase of a Motorcycle policy
                $producttype='Motorcycle Third Party';
                $contribution=5000;
                $usekey='mcycle';
                 $insurancetype='Commercial';
                $vehicleuse="mcycle";
                break;
            default:
                # To Do  create a default 
                return back()->with('Error', 'Product not Configured imported successfully.');
                break;
        }
        $vmakes=vehicleMake::all();

        return view('policy.newpolicy',compact('vmakes','producttype','contribution','usekey','insurancetype','vehicleuse'));
    }

    /**
     * Begin the Process of Purchasing a  resource.
     */
    public function newpolicy()
    {
        //
        $vmakes=vehicleMake::all();

        return view('policy.newpolicy',compact('vmakes'));
    }


        /**
     * USER HAS SUBMITTED A MOTOR POLICY FOR PURCHASE.
     */
    public function submitmpolicy(Request $request)
    {


    //$validatedata=$request->validate()



        /**Check the User Authentication and Roles. 
         * If a new direct User Create a user profile
         * If an User is an Agent Create a User Profile for the Insured
         *  
         * 
        */

        Auth::check();
        $user = Auth::user();

        $fullname= $request->fname. "  ".$request->lname;
        switch ($user->role) {
            case 'admin':
                # code...
                break;
            case 'superadmin':
                # code...
                break;
            case 'agent':
                # The User is regisetered as an agent first create new user account if email is unique

            $insured=User::where('email',$request->email)->first();
            if (empty($insured)) {

                $genpassword='A#r15b1t';
                
                # create new insured user profile
                $insured= new User();
                $insured->firstname=$request->fname;
                $insured->lastname=$request->lname;
                $insured->name=$fullname;
                $insured->email=$request->email;
                $insured->gender=$request->gender;
                $insured->dob=$request->dob;
                $insured->telno=$request->phone;
                $insured->state=$request->state;
                $insured->address=$request->address;
                $insured->password=Hash::make($genpassword);

                $insured->save();


            } else {
                # Map policy to existing user...
            }
            #Create Motor Policy 
            $start_date=date_create();
            $end_date=date_add(date_create(),date_interval_create_from_date_string("1 year"));
            
            #check if policy exists
            if ($request->has('policyid')){
                $policy=policy::where('id',$request->policyid)->first();

            }
            else{
                $policy= new policy();

            }
            

            
            $policy->insured_id=$insured->id;
            $policy->producttype=$request->producttype;
            $policy->insured_name=$fullname;
            $policy->agent_id=$user->id;
            $policy->status='draft';
            $policy->start_date= date_format($start_date,'Y/m/d'); 
            $policy->end_date= date_format($end_date,'Y/m/d');
            $policy->create_uid=$user->id;
            $policy->update_uid=$user->id;
            $policy->usekey=$request->vehicletype;
            ##TO DO Create Method to Calc Agents Commission and Contribution
            $policy->contribution=$request->contribution;
            $policy->commission=0;
            $policy->insurancetype=$request->insurancetype;
            $policy->vehicleuse=$request->vehicleuse;
            
             $policy->save();

            #Create New Policy Risk Object
            $policyrisk=new policyrisk();
            #TO DO product ID
            $policyrisk->product_id=1;
            $policyrisk->regno=$request->regno;
            $policyrisk->policyid=$policy->id;
            $policyrisk->engineno=$request->engineno;
            $policyrisk->chassisno=$request->chassisno;
            $policyrisk->vehiclemake=$request->vehiclemake;
            $policyrisk->vehiclemodel=$request->vehiclemodel;
            $policyrisk->yearofmake=$request->yearofmake;
            $policyrisk->vehiclecolor=$request->vehiclecolor;
            
            

            $policyrisk->contribution=$request->contribution;
            $policyrisk->save();


            break;
            case 'direct':
                # code...
                break;
            
            default:
                # code...
                break;
        }


        return view('policy.confirmpolicy',compact('policy','policyrisk','user'));
    }

        /**
     * the user  confirmed MOtor Policy details.
     */
    public function confirmmpolicy(Request $request)
    {
        //


        return view('policy.confirmpolicy');
    }

    public function paypolicy(Request $request)
    {
        //
        Auth::check();
        $user=Auth::user();
        $policy=policy::where('id',$request->policyid)->first();
        $policyrisk=policyrisk::where('policyid',$request->policyid)->first();
        $insured=User::where('id', $policy->insured_id)->first();


        #Handle Payment Method
        switch ($request) {
            case $request->has('agencycredit'):
                #TO DO Get How Much Credit the Agent has and pay using assinged credit
                // Get Current Agency Credit
                $agent=agentsdetailsModel::where('uid', $user->id)->first();
                $creditleft=$agent->noallocated-$agent->noused;

            // Secondary check for Agency credit 
            if ($creditleft<=0) {
                $message = "You do not have sufficient Credits to make this purchase";
                $error='error';
                $errorcode='402-004';
                $message;
                return view('user_errors', compact('error', 'errorcode', 'message'));
            }


                #Validation of mandatory Field with default values
                $gsm=$insured->telno;
                if (empty($gsm)) {
                    # change Gsm to company number
                    $gsm='+234 806 565 7291';
                }
                #Use the ELite API and push data
                $policydata=[
                   "InsuredName" => $policy->insured_name,
                   "address"=>$insured->address,
                   "dateOFBirth"=>$insured->dob,
                   "state"=>$insured->state,
                   "gender"=>$insured->gender,
                   "GSMNo"=>$gsm,
                   "emailAddress"=>$insured->email,
                   "EngineNo"=>$policyrisk->engineno,
                   "ChasisNo"=>$policyrisk->chassisno,
                   "vehicleColour"=>$policyrisk->vehiclecolor,
                   "YearOfMake"=>strval($policyrisk->yearofmake),
                   "VehicleMake"=>$policyrisk->vehiclemake,
                   "RegistrationNo"=>$policyrisk->regno,
                   "VehicleType"=> $policy->usekey, 
                   "VehicleModel"=>$policyrisk->vehiclemodel,
                   "insuranceType"=>$policy->insurancetype,
                   "UseOFVehicle"=>$policy->vehicleuse
                ];

                $policydatajSon=json_encode($policydata);
              
                #To Get individual AUTH TOKEN
                #1.  Check if the Agent has an Access Token From Elite
                #2.  IF no AUTH TOKEN USE default users TOKEN
                $token=$agent->auth_token;
               
                if (empty($token)) {
                    $accesstoken=config('variables.API_ELITE_TOKEN');
                } else {
                   $accesstoken=$token;
                }
                

               echo  $accesstoken;
                $response = Http::withHeader('Auth-Token',$accesstoken)->withBody($policydatajSon)
                ->post(config('variables.API_ELITE_URL'));

                break;
            
            default:
                # code...
                break;
        }
            #handle response from elite check status for success/fail
            $policy->elite_msg=$response->body();

            // Decode JSON string into an associative array
            $data = json_decode($response->body(), true);

            if ($data['data']['status'] == 'success') {
                # code...

                $policy->elite_msg=$data['data']['status'] .$data['data']['message'] ;
                $policy->policyno=$data['data']['policy_number'];
                $policy->status='approved';
                $policy->save();
                #Get Agent Credit Balance and change to reflect success;
                if ($request->has('agencycredit')){
                    $agent->noused=$agent->noused + 1;
                    $agent->save();
                }

                #TO DO Upload policy to NIIP
   
            } else {
                # code...
   

                $policy->elite_msg=$response->body();
                $policy->elite_msg=$data['data']['status'] .$data['data']['message'] ;
                $policy->policyno=$data['data']['policy_number'];
                $policy->status='failed';
                $policy->save();
                
                $errors=$policy->elite_msg;
                $id=$policy->id;

                return redirect()->route('view_policy', compact('errors', 'id'));



            }
            

            

            $policy->save();
           
                


        return redirect()->route('list_policy');
    }


        public function viewpolicy(Request $request)
    {
        //

        $producttype='TO DO';
        $policy=policy::where('id',$request->id)->first();
        $insured=User::where('id',$policy->insured_id)->first();
        $policyrisk=policyrisk::where('policyid', $policy->id)->first();
        $vmakes=vehicleMake::all();

        //dd($policy);

        return view('policy.viewpolicy', compact('policy','insured','policyrisk','vmakes'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(policy $policy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, policy $policy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(policy $policy)
    {
        //
    }
}
