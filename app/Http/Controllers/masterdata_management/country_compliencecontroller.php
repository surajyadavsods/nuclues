<?php

namespace App\Http\Controllers\masterdata_management;
use App\Models\country_compliance__master;
use App\Models\country;
use App\Models\entitytype;
use App\Models\frequency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\activity;
use App\Models\client_entity_master;
use App\Imports\complienceimport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\complienceexport;
use App\Models\manage_complience_information;
use DB;
class country_compliencecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['country'] = country_compliance__master::all();
        $data['country123'] = country::all();
        $data['type'] = entitytype::all();
        return view('backend.masterdata.country_complience.index',$data);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['country'] = country::all();
        $data['frequency'] = frequency::all();
        $data['entitytype'] = entitytype::all();
        return view('backend.masterdata.country_complience.add',$data);
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
            'country'=> 'required',
            'entity_type'=> 'required',
            'forms'=> 'required',
            'Frequency'=> 'required',
            'periodend'=> 'required',
            'complaince_name'=> 'required',
            'notes'=> 'required',
        ],
        [
            'country.required'=> 'country is mandatory',
            'entity_type.required'=> 'Entity Type is mandatory',
            'forms.required'=> 'Forms is mandatory',
            'Frequency.required'=> 'Frequency is mandatory',
            'periodend.required'=> 'period end is mandatory',
            'complaince_name.required'=> 'Complaince name is mandatory',
            'notes.required'=> 'Note is mandatory',
        ]
     );
          
        //  $user = Auth::user()->id;
        $data2 = country_compliance__master::create([
            
            'country'=>request()->get('country'),
            'entity_type'=>request()->get('entity_type'),
            'forms'=>request()->get('forms'),
            'Frequency'=>request()->get('Frequency'),
            'periodend'=>request()->get('periodend'),
            'complaince_name'=>request()->get('complaince_name'),
            'notes'=>request()->get('notes'),
            'due_date'=>request()->input('due_Date'),
            'created'=> Auth::id(),
  
        ]);


        $id = request()->get('entity_type');

        $data = client_entity_master::where('entity_type', '=', $id)->first();


        $main = manage_complience_information::create([
            
            'frequency'=>request()->get('Frequency'),
            'entity_type'=>request()->get('entity_type'),
            // 'entity_id'=>request()->get('entity_id'),
            'entity_id'=>  $data->id,

            'country'=>request()->get('country'),

            // 'country_complaince_id'=>request()->get('country_complaince_id'),

            'country_compliance_id'=> $data2->id,


            'complaince_name'=>request()->get('complaince_name'),

            'client_entity_name'=>$data->client_entity_name,

            'periodend'=>request()->get('periodend'),
           
            'form'=>request()->get('forms'),
            'notes'=>request()->get('notes'),

            'group_name'=>$data->client_group,
            'csd'=>$data->csd,
            'mat_spv'=>$data->mat_spv,
            'mat_manager'=>$data->mat_manager,


            'extended_date'=>request()->get('notes'),
            'complation_date'=>request()->get('notes'),


            'status'=>0,

            'due_date'=>request()->input('due_Date'),

            'created_by'=> Auth::id(),
            'updated_by'=> 0,



         
  
        ]);



         $activity = activity::create([
            
            'country'=>request()->get('country'),
            'entity_type'=>request()->get('entity_type'),
            'forms'=>request()->get('forms'),
            'Frequency'=>request()->get('Frequency'),
            'periodend'=>request()->get('periodend'),
            'complaince_name'=>request()->get('complaince_name'),
            'notes'=>request()->get('notes'),
            'created'=> Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "Country Complaince Added Successfully",
  
        ]);
  
        return redirect('country_complience')->with('status', 'Country Complaince Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['master'] = country_compliance__master::find($id);
        $data['country'] = country::all();
        $data['frequency'] = frequency::all();
        $data['entitytype'] = entitytype::all();
        return view('backend.masterdata.country_complience.edit',$data);
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
        $data = country_compliance__master::find($id);
        $data->country = $request->input('country');
        $data->entity_type = $request->input('entity_type');
        $data->forms = $request->input('forms');
        $data->Frequency = $request->input('Frequency');
        $data->periodend = $request->input('periodend');
        $data->complaince_name = $request->input('complaince_name');
        $data->notes = $request->input('notes');
        $data->status = $request->input('status');
         $data->due_date = $request->input('due_date');
        $data->updated = $request->input('updated');
        $data->update();
        
        $activitylog = [
            'created' => Auth::id(),
           'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'complaince_name' => $request->input('complaince_name'),
            'activity' => "Country Complience Updated Successfully",
            ];
        DB::table('activities')->insert($activitylog);
        
        return redirect('country_complience')->with('status', 'Country Complaince Updated Successfully');
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
            'created' => Auth::id(),
           'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "Country Complience Deleted Successfully",
            ];
        DB::table('activities')->insert($activitylog);
        $data = country_compliance__master::find($id);
        $data->delete();
        return redirect('country_complience')->with('status','Country Complaince Deleted Successfully');
    }

    public function activecomplience(Request $id,$request)
    {
        $data = client_entity_master::find($id);
        $data->complince_name= $request->input('complaince_name');
        //dd($data);
        $data->save();
        return redirect()->back();
    }

    public function inactivecomplience($id)
    {
        $data = client_entity_master::find($id);
        $data->complince_name= $request->input('complaince_name');
        $data->save();
        return redirect()->back();
    }

    public function createcompliences()
    {
        return view('backend.masterdata.country_complience.csv.add');
    }

    public function importcompliences()
    {
        Excel::Import(new complienceimport, request()->file('file'));

        return redirect('country_complience')->with('status','Country Complaince Imported Successfully');
    }

    public function expertcompliences()
    {
        return Excel::download(new complienceexport, 'country.xlsx');
    }

    public function searchcountry(Request $request)
    {
        $entity_type = $request->entity_type;
        $country12 = $request->country;
        
        $data['country123'] = country::all();
        $data['type'] = entitytype::all();
        $data['country'] = DB::table('country_compliance__masters')
                  ->where('country', $country12)
                  ->Orwhere('entity_type', $entity_type)
                  ->get();
        
        return view('backend.masterdata.country_complience.index',$data);
    }
}
