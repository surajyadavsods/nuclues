<?php

namespace App\Http\Controllers\masterdata_management;
use App\Models\client_group_master;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\activity;
use Auth;
use App\Imports\Groupimport;
use App\Exports\Groupexport;
use DB;
use Maatwebsite\Excel\Facades\Excel;
class client_Groupcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = client_group_master::all();
        return view('backend.masterdata.clientgroup.index',compact('data'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.masterdata.clientgroup.add');
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
            'contect_person'=> 'required',
            'contect_phone'=> 'required',
            'designation'=> 'required',
            'email'=> 'required',
        ],
        [
            'client_group.required'=> 'client_group is mandatory',
            'contect_person.required'=> 'Contect Phone Type is mandatory',
            'contect_phone.required'=> 'Contect Phone is mandatory',
            'designation.required'=> 'designation is mandatory',
            'email.required'=> 'period end is mandatory',
        ]
     );
          
        //  $user = Auth::user()->id;
        $data = client_group_master::create([
            
            'client_group'=>request()->get('client_group'),
            'contect_person'=>request()->get('contect_person'),
            'contect_phone'=>request()->get('contect_phone'),
            'designation'=>request()->get('designation'),
            'email'=>request()->get('email'),
            'designation2'=>request()->get('designation2'),
            'email2'=>request()->get('email2'),
            'phone2'=>request()->get('phone2'),
            'person2'=>request()->get('person2'),
            'responsibility'=>request()->get('responsibility'),
            
            // 'created_by'=> $user,
            'created' => Auth::id(),
  
        ]);
        $activity = activity::create([
            
            'client_group'=>request()->get('client_group'),
            'contect_person'=>request()->get('contect_person'),
            'contect_phone'=>request()->get('contect_phone'),
            'designation'=>request()->get('designation'),
            'email'=>request()->get('email'),
            // 'created_by'=> $user,
            'created' => Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "Client Group Added Successfully",
  
        ]);
        
        return redirect('client_group')->with('status', 'Client Group Added Successfully');
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
        $data['group'] = client_group_master::find($id);
        $data['entity'] = client_group_master::where('client_group_masters.id',$id)->join('client_entity_masters', 'client_entity_masters.client_group', '=', 'client_group_masters.id')->Select('client_group_masters.*','client_entity_masters.*')->get();
        //dd($data['entity']);

         //$data['entity']= client_group_master::where('client_group_masters.id',$id)->join('client_entity_masters', 'client_entity_masters.client_group', '=', 'client_group_masters.id')->select('client_group_master.*')->get();
        return view('backend.masterdata.clientgroup.edit',$data);
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
       /** $data = [
                'id' => $id,
        'client_group' => $request->input('client_group'),
        'email' => $request->input('email'),
        'contect_phone' => $request->input('contect_phone'),
        'status' => $request->input('status'),
        'contect_person' => $request->input('contect_person'),
        'designation' => $request->input('designation'),
         'phone2' => $request->input('phone2'),
          'email2' => $request->input('email2'),
           'designation2' => $request->input('designation2'),
            'person2' => $request->input('person2'),
        'updated' => $request->input('updated'),
                
            
            ];
            
            $activity =[
                    'created' => Auth::id(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'activity' => "Client Group Updated Successfully",
            
                ];**/
        $data = client_group_master::find($id);
        $data->client_group = $request->input('client_group');
        $data->email = $request->input('email');
        $data->contect_phone = $request->input('contect_phone');
        $data->status = $request->input('status');
        $data->contect_person = $request->input('contect_person');
        $data->designation = $request->input('designation');
         $data->phone2 = $request->input('phone2');
          $data->email2 = $request->input('email2');
           $data->designation2 = $request->input('designation2');
            $data->person2 = $request->input('person2');
              $data->responsibility = $request->input('responsibility');
        $data->updated = $request->input('updated');
        
        //client_group_master::where('id',$request->id)->update($data);
         //DB::table('activities')::where('created',Auth::id())->insert($activity);
        $data->update();
        
          $activitylog = [
            'created' => Auth::id(),
           'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'client_group' => $request->input('client_group'),
            'activity' => "Client Group Updated Successfully",
            ];
        DB::table('activities')->insert($activitylog);
        
        return redirect('client_group')->with('status', 'Client Group Updated Successfully');
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
            'activity' => "Client Group Deleted Successfully",
            ];
        DB::table('activities')->insert($activitylog);
         $data = client_group_master::find($id);
         $data->delete();
         return redirect('client_group')->with('status', 'Client Group deleted Successfully');
    }

    public function creategroup()
    {
        return view('backend.masterdata.clientgroup.csv.add');
    }

    public function importgroup()
    {
        Excel::Import(new Groupimport, request()->file('file'));

        return redirect('client_group')->with('status','Client Group Imported Successfully');
    }


    public function expertgroup()
    {
        return Excel::download(new Groupexport, 'group.xlsx');
    }
}
