<?php

namespace App\Http\Controllers\masterdata_management;
use App\Models\client_group_master;
use App\Models\country;
use App\Models\frequency;
use App\Models\User;
use App\Models\activity;
use App\Models\entitytype;
use App\Models\role_permission;
use App\Models\client_entity_master;
use App\Http\Controllers\Controller;
use App\Models\country_compliance__master;
use Illuminate\Http\Request;
use App\Models\manage_complience_information;
use App\Models\userdetails;
use App\Imports\entityimport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\entityexport;
use App\Models\BackupRestore;
use App\Models\EntityStatus;
//use Maatwebsite\Excel\Facades\Excel;
use Auth;
use DB;
class client_entitycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = client_entity_master::all();
        $data = client_entity_master::where('hold', 1)->get();
        return view('backend.masterdata.cliententity.index',compact('data'));
    }
    public function ed()
    {
        return view('backend.masterdata.cliententity.edit');
    }


    public function backup($entity_entity_name , $id)
    {

        $backup = client_entity_master::find($id);

        // dd($backup);

        $store = BackupRestore::create([
            'client_group' => $backup->client_group,
            'entity_name' => $backup->client_entity_name,
            // 'job_title' => request()->get('job_title'),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'restored_by' => Auth::user()->id, 
            'status' => 1, 
            
            // 'updated_by' => 0,
        ]);

       
       

        $data = client_entity_master::find($id);
        $data->Delete();

        $find = client_entity_master::where('client_entity_name', $entity_entity_name)->latest('updated_at')->first();

        $find->hold = 1;

        $find->update();

       




        return redirect('client_entity')->with('status', 'Client Entity Backup Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['group'] = client_group_master::where('status',1)->get();
        $data['country'] = country::all();
        $data['frequency'] = frequency::all();
        $data['entitytype'] = entitytype::all();
        $data['mat'] = User::where('role',"5")->get();
        $data['csd'] = User::where('role',"3")->get();
        $data['spv'] = User::where('role',"6")->get();
        //$data['user'] = User::where('role',"0")->get();
        $data['manager'] = User::where('role',"7")->get();
        return view('backend.masterdata.cliententity.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'client_group'=> 'required',
            'client_entity_name'=> 'required',
            'country'=> 'required',
            'entity_type'=> 'required',
            'year_end'=> 'required',
            'status'=> 'required',
            'date'=> 'required',
            'company_rg_no'=> 'required',
            'tax_rg_no'=> 'required',
            'gst_no'=> 'required',
            'withholding_tax_rg_no'=> 'required',
            'social_security_no'=> 'required',
            'anyother_no'=> 'required',
            'csd'=> 'required',
            'mat_manager'=> 'required',
            'mat_spv'=> 'required',
            'affiliate_name'=> 'required',
            'affiliate_email'=> 'required',
            'affiliate_phone'=> 'required',
            'other_user'=> 'required',
            'scope_work'=> 'required',
        ],
        [
            'client_group.required' => 'client_group is mandatory',
            'client_entity_name.required' => 'client_entity_name is mandatory',
            'country.required' => 'country is mandatory',
            'entity_type.required' => 'entity_type is mandatory',
            'year_end.required' => 'year_end is mandatory',
            'status.required' => 'status is mandatory',
            'date.required' => 'date is mandatory',
            'company_rg_no.required' => 'company_rg_no is mandatory',
            'tax_rg_no.required' => 'tax_rg_no is mandatory',
            'gst_no.required' => 'gst_no is mandatory',
            'withholding_tax_rg_no.required' => 'withholding_tax_rg_no is mandatory',
            'social_security_no.required' => 'social_security_no is mandatory',
            'anyother_no.required' => 'anyother_no is mandatory',
            'csd.required' => 'csd is mandatory',
            'mat_manager.required' => 'mat_manager is mandatory',
            'mat_spv.required' => 'mat_spv is mandatory',
            'affiliate_name.required' => 'affiliate_name is mandatory',
            'affiliate_email.required' => 'affiliate_email is mandatory',
            'affiliate_phone.required' => 'affiliate_phone is mandatory',
            'other_user.required' => 'other_user is mandatory',
            'scope_work.required' => 'scope_work is mandatory',
        ]
    );
        $data = client_entity_master::create([
            
            'client_group'=>request()->get('client_group'),
            'client_entity_name'=>request()->get('client_entity_name'),
            'country'=>request()->get('country'),
            'entity_type'=>request()->get('entity_type'),
            'year_end'=>request()->get('year_end'),
            'status'=>request()->get('status'),
            'date'=>request()->get('date'),
            'company_rg_no'=>request()->get('company_rg_no'),
            'tax_rg_no'=>request()->get('tax_rg_no'),
            'gst_no'=>request()->get('gst_no'),
            'withholding_tax_rg_no'=>request()->get('withholding_tax_rg_no'),
            'social_security_no'=>request()->get('social_security_no'),
            'anyother_no'=>request()->get('anyother_no'),
            'csd'=>request()->get('csd'),
            'mat_manager'=>request()->get('mat_manager'),
            'mat_spv'=>request()->get('mat_spv'),
            'affiliate_name'=>request()->get('affiliate_name'),
            'affiliate_email'=>request()->get('affiliate_email'),
            'affiliate_phone'=>request()->get('affiliate_phone'),
            'responsibility'=>request()->get('responsibility'),
            'other_user'=>request()->get('other_user'),
            'affilate_name2'=>request()->get('affilate_name2'),
            'affilate_phone2'=>request()->get('affilate_phone2'),
            'affilate_email2'=>request()->get('affilate_email2'),
            'scope_work'=>request()->get('scope_work'),
             'created' => Auth::id(),
        ]);
        //dd($data);
         $activity = activity::create([
            
            'client_entity_name'=>request()->get('client_entity_name'),
            'client_group'=>request()->get('client_group'),
            'contect_person'=>request()->get('contect_person'),
            'contect_phone'=>request()->get('contect_phone'),
            // 'created_by'=> $user,
            'created' => Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "Client Entity Added Successfully",
  
        ]);
        return redirect('client_entity')->with('status', 'Client Entity Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['master'] = client_entity_master::find($id);
        $data['group'] = client_group_master::all();
        $data['country'] = country::all();
        $data['frequency'] = frequency::all();
        $data['entitytype'] = entitytype::all();
         $data['mat'] = User::where('role',"5")->get();
        $data['csd'] = User::where('role',"3")->get();
        $data['spv'] = User::where('role',"6")->get();
        $data['manager'] = User::where('role',"7")->get();
         return view('backend.masterdata.cliententity.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = client_entity_master::find($id);
        $data->client_group = $request->input('client_group');
            $data->client_entity_name = $request->input('client_entity_name');
            $data->country = $request->input('country');
            $data->entity_type = $request->input('entity_type');
            $data->year_end = $request->input('year_end');
            $data->status = $request->input('status');
            $data->date = $request->input('date');
            $data->company_rg_no = $request->input('company_rg_no');
            $data->tax_rg_no = $request->input('tax_rg_no');
            $data->gst_no = $request->input('gst_no');
            $data->withholding_tax_rg_no = $request->input('withholding_tax_rg_no');
            $data->social_security_no = $request->input('social_security_no');
            $data->anyother_no = $request->input('anyother_no');
            $data->csd = $request->input('csd');
            $data->mat_manager = $request->input('mat_manager');
            $data->mat_spv = $request->input('mat_spv');
            $data->affiliate_name = $request->input('affiliate_name');
            $data->affiliate_email = $request->input('affiliate_email');
            $data->affiliate_phone = $request->input('affiliate_phone');
            $data->affilate_name2 = $request->input('affilate_name2');
            $data->affilate_phone2 = $request->input('affilate_phone2');
            $data->affilate_email2 = $request->input('affilate_email2');
            $data->other_user = $request->input('other_user');
            $data->scope_work = $request->input('scope_work');
            $data->responsibility = $request->input('responsibility');
            $data->updated = $request->input('updated');
            $data->update();
            
         $activitylog = [
            
            'client_entity_name'=>request()->get('client_entity_name'),
            'client_group'=>request()->get('client_group'),
            'contect_person'=>request()->get('contect_person'),
            'contect_phone'=>request()->get('contect_phone'),
            // 'created_by'=> $user,
            'created' => Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "Client Entity Updated Successfully",
  
        ];
        
        DB::table('activities')->insert($activitylog);
        return redirect('client_entity')->with('status', 'Client Entity Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $activitylog = [
            
            'client_group'=>request()->get('client_group'),
            'contect_person'=>request()->get('contect_person'),
            'contect_phone'=>request()->get('contect_phone'),
            // 'created_by'=> $user,
            'created' => Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "Client Entity Deleted Successfully",
  
        ];
        
        DB::table('activities')->insert($activitylog); 
        
        $data = client_entity_master::find($id);
        $data->Delete();
        return redirect('client_entity')->with('status', 'Client Entity Deleted Successfully');
    }

    public function view(Request $request,$id,$id2)
    {

        // dd($id);

        //$candidates = client_entity_master::where('client_entity_masters.entity_type',$request->entity_type)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'client_entity_masters.entity_type')->Select('country_compliance__masters.*')->get();
        //$candidates = client_entity_master::where('entity_type',$request->entity_type)->first();

       //$data['candidate'] = client_entity_master::find($candidates)->with($id);

        $data['entity'] = client_entity_master::where('client_entity_masters.entity_type',$request->entity_type)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'client_entity_masters.entity_type')->get();
 
        $data['check'] = manage_complience_information::where('entity_type', '=', $id)->get();

       $data['group'] = client_entity_master::where('client_entity_masters.entity_type',$request->entity_type)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'client_entity_masters.entity_type')->Select('client_entity_masters.*')->join('manage_complience_informations', 'manage_complience_informations.entity_type', '=', 'country_compliance__masters.entity_type')->Select('manage_complience_informations.status')->first();

       //$data['datastore'] = client_entity_master::where('client_entity_masters.id',$request->)->join('manage_complience_informations', 'manage_complience_informations.entity_type', '=', 'client_entity_masters.entity_type')->Select('manage_complience_informations.status,')->first();
//dd($data['datastore']);

    //    $data['datastore'] = manage_complience_information::where('manage_complience_informations.entity_type',$request->entity_type)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'manage_complience_informations.entity_type')->Select('manage_complience_informations.*','country_compliance__masters.id')->first();

        $datas3= client_entity_master::find($id2);

        


        //$data = client_entity_master::where('client_entity_masters.entity_type',$request->entity_type)->orWhere('client_entity_masters.country',$request->country)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'client_entity_masters.entity_type')->join('country_compliance__masters','country_compliance__masters.country', '=', 'client_entity_masters.country')->Select('client_entity_masters.*','country_compliance__masters.*')->get();
        //$data = client_entity_master::where('client_entity_masters.entity_type',$request->entity_type)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'client_entity_masters.entity_type')->where('country_compliance__masters.country',$request->country)->Select('country_compliance__masters.*','client_entity_masters.*')->get();
        //dd($data);


        return view('backend.masterdata.cliententity.view',['datas3' => $datas3],$data);
    }


    


    public function informationstore(Request $request)
    {
        $input = array(
           'frequency' => $request->frequency,
            'entity_type' => $request->entity_type,
            'entity_id' => $request->entity_id,
            'due_date' => $request->due_date,
            // 'country_compliance_id' => $request->country_compliance_id, 
            
            'country_compliance_id' => 0, 

            'complaince_name' => $request->complaince_name,
             'periodend' => $request->periodend,
              'form' => $request->form,
              'notes' => $request->notes,
            'status' => 1,
            'group_name' =>$request->group_name,
            'country' => $request->country,
             'csd' => $request->csd,
              'mat_spv' => $request->mat_spv,
               'mat_manager' => $request->mat_manager,
               'created_by' =>  Auth::id(),
        );
        
        
       
        manage_complience_information::create($input);
        
        $activity = activity::create([
            
            
            // 'created_by'=> $user,
            'created' => Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "Country Complaince  Added Successfully",
  
        ]);
        
        return redirect()->back()->with('status', 'Manage Compliences Added Successfully');;
}


    public function edit1($id)
    {
        $data = manage_complience_information::find($id);
        return view('backend.masterdata.cliententity.editinfo',compact('data'));

    }

     public function update1(Request $request, $id)
    {
        $data = manage_complience_information::find($id);
        $data->extended_date = $request->input('extended_date');
            $data->complation_date = $request->input('complation_date');
            $data->completion_delay = $request->input('completion_delay');
            $data->due_date = $request->input('due_date');
            $data->status = $request->input('status');
            // $data->updated_by = $request->input('updated_by');

            if ($request->hasFile('attacment')) 
        {
            $destination_path = 'public/entity/Attchment'.$data->attacment;
            $attacment = $request->file('attacment');
            $attacmentname = $attacment->getClientOriginalName();
            $path = $request->file('attacment')->storeAs($destination_path,$attacmentname);

            $data['attacment'] = $attacmentname;
        }
        $activitylog = [
            
            
            // 'created_by'=> $user,
            'created' => Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "Complience Manage  Updated Successfully",
  
        ];
        DB::table('activities')->insert($activitylog); 
        
       $data->updated_by = Auth::id();

            $data->update();
            return redirect('dashboad');
    }

    public function createentity()
    {
        return view('backend.masterdata.cliententity.csv.add');
    }

    public function importentity()
    {
        Excel::Import(new entityimport, request()->file('file'));

        return redirect('client_entity')->with('status','Country Complaince Imported Successfully');
    }

    public function expertentity()
    {
        return Excel::download(new entityexport, 'entity.xlsx');
    }
    
    public function deletemanage($id)
    {
        $activitylog = [
            
            
            // 'created_by'=> $user,
            'created' => Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "Complience Manage  Deleted Successfully",
  
        ];
        DB::table('activities')->insert($activitylog); 
        $data = manage_complience_information::find($id);
        $data->delete();
        return redirect()->back();
    }

    /** public function updatestatus(Request $request,$id,$id2)
    {
        $entity_type = $request->entity_type;
        $id = $request->

        $data = 
        return view('backend.masterdata.cliententity.view',['datas3' => $datas3],$data);
    }**/


    public function cancelentity(Request $request, $country_compliance_id)
    {

        // dd($country_compliance_id);

          $id = $country_compliance_id;

          $check = manage_complience_information::find($id);

        //   dd($check);

        if($check){

            $status = manage_complience_information::find($id);


            if($status->status == 0){

                $status->status = 1;

            } else {

                $status->status = 0;
            }

            $status->update();

    
        } 

    
      

        // $data = manage_complience_information::where('country_compliance_id',$country_compliance_id)->first();
        // $data->status = $request->input('status');
        // //dd($data);
        // $data->save();
        return redirect()->back();
    }

}
