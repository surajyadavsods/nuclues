<?php

namespace App\Http\Controllers\masterdata_management;
use App\Models\country_compliance__master;
use App\Models\country;
use App\Models\entitytype;
use App\Models\frequency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\activity;
use App\Models\client_entity_master;
use App\Imports\complienceimport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\complienceexport;
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
        $data['notification'] = activity::latest()->limit(15)->get();
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
        $data['notification'] = activity::latest()->limit(15)->get();
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
             'due_date'=> 'required',
        ],
        [
            'country.required'=> 'country is mandatory',
            'entity_type.required'=> 'Entity Type is mandatory',
            'forms.required'=> 'Forms is mandatory',
            'Frequency.required'=> 'Frequency is mandatory',
            'periodend.required'=> 'period end is mandatory',
            'complaince_name.required'=> 'Complaince name is mandatory',
            'notes.required'=> 'Note is mandatory',
            'due_date.required'=> 'Due Date is mandatory',
        ]
     );

         //$exist = country_compliance__master::where('complaince_name', request()->get('complaince_name'))->first();

        //if ($exist) {
         //return back()->with('status', 'This Complaince Name Already Exist');
        //} else {

          
        //  $user = Auth::user()->id;
        $data = country_compliance__master::create([
            
            'country'=>request()->get('country'),
            'entity_type'=>request()->get('entity_type'),
            'forms'=>request()->get('forms'),
            'Frequency'=>request()->get('Frequency'),
            'periodend'=>request()->get('periodend'),
            'complaince_name'=>request()->get('complaince_name'),
            'notes'=>request()->get('notes'),
            'due_date'=>request()->get('due_date'),
            'created'=> Auth::id(),
  
        ]);
    //}

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
  
        return redirect('country_compliance')->with('status', 'Country Complaince Added Successfully');
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
        $data['notification'] = activity::latest()->limit(15)->get();
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
        
        return redirect('country_compliance')->with('status', 'Country Complaince Updated Successfully');
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
        return redirect('country_compliance')->with('status','Country Complaince Deleted Successfully');
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
        $data['notification'] = activity::latest()->limit(15)->get();
        return view('backend.masterdata.country_complience.csv.add',$data);
    }

    public function importcompliences(Request $request)
    {
        //Excel::Import(new complienceimport, request()->file('file'));

        //return redirect('coutry_complience')->with('status','Country Complaince Imported Successfully');
        $request->validate([
            'file' => 'required',
         
        ]);


        $fileName = time().'.'.request()->file->extension();  
    
        request()->file->move(public_path('Complaince'), $fileName);


        $file = public_path('Complaince/'.$fileName);

        $content = file_get_contents('Complaince/'.$fileName); 
        $lines = array_map("rtrim", explode("\n", $content));


        $arr_file = explode('.', $_FILES['file']['name']);
        $extension = end($arr_file);
      
        if('csv' == $extension) {     
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
          } else if('xls' == $extension) {     
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
          } else     
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($file);
        $d=$spreadsheet->getSheet(0)->toArray();

       
           $datas = array_slice($d, 1);
            //  var_dump($datas);
            //dd($datas);
             foreach($datas as $firstarray){

                $country_compliance = new country_compliance__master();

                $country_compliance->forms = $firstarray[2];
                //dd($firstarray[2]);
                $country_compliance->periodend = $firstarray[3];
                $country_compliance->complaince_name = $firstarray[4];
                $country_compliance->due_date = $firstarray[7];
                $country_compliance->notes = $firstarray[5];
                
                $check = country::where('country',  $firstarray[0])->get();
                $country_compliance->country = $check[0]->id;
                //dd($check);
                $checkentity = entitytype::where('type',  $firstarray[1])->get();
                //dd($firstarray[1]);
                $country_compliance->entity_type = $checkentity[0]->id;
                //dd($checkentity);

                $checkfrequency = frequency::where('frequency',  $firstarray[6])->get();
                $country_compliance->Frequency = $checkfrequency[0]->id;

                $country_compliance->created = Auth::user()->id;
             

                $country_compliance->save();
             }

            return redirect()->back()->with('status', 'Excel File Uploaded Successfully'); 

    }



    public function expertcompliences()
    {
        //return Excel::download(new complienceexport, 'country.xlsx');
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
        ,   'Content-type'        => 'text/xlsx'
        ,   'Content-Disposition' => 'attachment; filename=compliance.xlsx'
        ,   'Expires'             => '0'
        ,   'Pragma'              => 'public'
    ];

    $lists = country_compliance__master::all();
    foreach ($lists as $key=> $list) {
        $check = User::where('id', $list->created)->first();
        $checkupdate = User::where('id', $list->updated)->first();
        $checkentity = entitytype::where('id', $list->entity_type)->first();
        $checkcountry = country::where('id', $list->country)->first();
        $checkfrequency = frequency::where('id', $list->Frequency)->first();
    //dd($check);
    $data[] = array(
       
        
        "entity_type" => empty($checkentity->type) ? "" : $checkentity->type,
        "country" => empty($checkcountry->country) ? "" : $checkcountry->country,
        "forms" => empty($list->forms) ? "" : $list->forms,
        "Frequency" => empty($checkfrequency->frequency)? "" : $checkfrequency->frequency,
        "periodend" => empty($list->periodend) ? "" : $list->periodend, 
         "complaince_name" => empty($list->complaince_name) ? "" : $list->complaince_name, 
          "notes" => empty($list->notes) ? "" : $list->notes, 
           "due_date" => empty($list->due_date) ? "" : $list->due_date,
           
            "created" => empty($check->name)? "" :$check->name,
             "updated" => empty($checkupdate->name)? "" :$checkupdate->name,
       
      );
    
    }
    header("Content-Disposition: attachment; filename=\"compliance.xls\"");
    header("Content-Type: application/vnd.ms-excel;");
    header("Pragma: no-cache");
    header("Expires: 0");

    array_unshift($data, array_keys($data[0]));
    
    $out = fopen("php://output", 'w');
    foreach ($data as $data)
    {
        fputcsv($out, $data,"\t");
    }
    fclose($out);
    }

    public function searchcountry(Request $request)
    {
        $entity_type = $request->entity_type;
        $country12 = $request->country;
        
        $data['country123'] = country::all();
        $data['type'] = entitytype::all();
        $data['notification'] = activity::latest()->limit(15)->get();
        $data['country'] = DB::table('country_compliance__masters')
                  ->where('entity_type', $entity_type)
                  ->Orwhere('country', $entity_type)
                  ->get();
        
        return view('backend.masterdata.country_complience.index',$data);
    }
}
