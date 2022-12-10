<?php

namespace App\Http\Controllers;
use App\Models\manage_complience_information;
use Illuminate\Http\Request;
use DB;
use App\Models\client_group_master;
use App\Models\client_entity_master;
use Auth;
use App\Models\activity;
use App\Models\User;
use App\Models\country_compliance__master;
use App\Models\country;
use App\Models\role;
use Hash;
use hasfile;

class homecontroller extends Controller
{
    //
    public function otp()
    {
        return view('otp');
    }

    public function dashboard()
    {
        //$complation_date = manage_complience_information::where('complation_date')

        $data['entity'] = manage_complience_information::where('status',"Applicable")->get();
        $data['completed'] = manage_complience_information::whereNotNull('complation_date')->get();
        $data['undue'] = manage_complience_information::where('due_date','<=',date('Y-m-d'))->get();
         $data['overdue'] = manage_complience_information::where('due_date','>=',date('Y-m-d'))->get();
        $data['group'] = client_group_master::where('status','1')->get();
        $data['complience'] = country_compliance__master::where('status','1')->get();
        $data['cliententity'] = client_entity_master::where('status','1')->get();
        $data['delay'] = manage_complience_information::wherenull('complation_date')->orWhere('due_date','<=')->get();
        $data['notification'] = activity::latest()->limit(15)->get();
        //dd($data['delay']);
        return view('index',$data);
    }

    public function reports()
    {
        $data['notification'] = activity::latest()->limit(15)->get();
        return view('backend.report.reports',$data);
    }

    public function selectyear(Request $request)
    {
        $complation_date = $request->complation_date;
        //$entity_type = $request->entity_type
        
        $data['group'] = client_group_master::where('status','1')->get();
        $data['cliententity'] = client_entity_master::where('status','1')->get();
        $data['complience'] = country_compliance__master::where('status','1')->get();
          $data['completed'] = manage_complience_information::whereNotNull('complation_date')->get();
        $data['undue'] = manage_complience_information::where('due_date','<=',date('Y-m-d'))->get();
         $data['overdue'] = manage_complience_information::where('due_date','>=',date('Y-m-d'))->get();
         $data['delay'] = manage_complience_information::wherenull('complation_date')->orWhere('due_date','<=')->get();
          $data['notification'] = activity::latest()->limit(15)->get();
        $data['entity'] = DB::table('manage_complience_informations')
                  ->whereYear('complation_date',$complation_date)
                  ->get();
        
        return view('index',$data);
    }

    public function selectentity(Request $request)
    {
        $client_entity_name = $request->client_entity_name;
      
        $data['group'] = client_group_master::where('status','1')->get();
        $data['cliententity'] = client_entity_master::where('status','1')->get();
        $data['complience'] = country_compliance__master::where('status','1')->get();
         $data['completed'] = manage_complience_information::whereNotNull('complation_date')->get();
        $data['undue'] = manage_complience_information::where('due_date','<=',date('Y-m-d'))->get();
         $data['overdue'] = manage_complience_information::where('due_date','>=',date('Y-m-d'))->get();
         $data['delay'] = manage_complience_information::wherenull('complation_date')->orWhere('due_date','<=')->get();
          $data['notification'] = activity::latest()->limit(15)->get();
        $data['entity'] = DB::table('manage_complience_informations')
                  ->where('client_entity_name',$client_entity_name)
                  ->get();
        
        return view('index',$data);
    }
    
    public function userprofile()
    {
        $data['country'] = country::all();
        $data['role'] = role::all();
        $data['user'] = User::find(Auth::user()->id);
         $data['notification'] = activity::latest()->limit(15)->get();
         return view('backend.user.adduser.profile',$data);
    }
    
    public function security()
    {
        $data['security'] = User::find(Auth::user()->id);
         $data['notification'] = activity::latest()->limit(15)->get();
         return view('backend.user.adduser.security',$data);
    }

    public function userprofileupdate(Request $request,$id)
    {
        $data = User::find($id);
        $data->role = $request->input('role');
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->country = $request->input('country'); 
        $data->phone = $request->input('phone');
        $data->designation = $request->input('designation');
        $data->updated = $request->input('updated');
        if($request->hasFile('image')) 
        {
            $destination_path = 'public/profile';
            $image = $request->file('image');
            $imagename = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$imagename);
            $data->image = $imagename;
        }
        $data->update();
        
         $activitylog = [
            
            // 'created_by'=> $user,
            'created' => Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "User Profile Updated Successfully",
  
        ];
        
        DB::table('activities')->insert($activitylog); 
        return redirect()->back();
    }

    public function userpassword(Request $request,$id)
    {
        $data = User::find($id);
        $data->password = Hash::make($request['password']);
        $data->real_password =$request->input('password');
        $data->update();
         $activitylog = [
            
            // 'created_by'=> $user,
            'created' => Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "User Password Deleted Successfully",
  
        ];
        DB::table('activities')->insert($activitylog); 
        return redirect()->back();
    }
    
    public function userlogout()
    {
        Auth::logout();
        return redirect('/');
    }
    
    public function forgotpassword()
    {
         return view('forgotpass');
    }
    
   public function notification()
   {
     $data['notification'] = activity::latest()->limit(15)->get();
     return view('import.navbar',$data);
   }

   public function notification12()
   {
     $data['notification'] = activity::latest()->limit(15)->get();
     return view('import.navbar1',$data);
   }
}
