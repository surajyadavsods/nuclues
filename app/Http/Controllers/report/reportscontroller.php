<?php

namespace App\Http\Controllers\report;
use App\Models\client_entity_master;
use App\Models\manage_complience_information;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\Expertreportgroup;
class reportscontroller extends Controller
{
    //
    public function clientgroup()
    {
        $data = manage_complience_information::where('status',"Applicable ")->get();
        return view('backend.report.clientgroup',compact('data'));
    }

    public function cliententity()
    {
       $data = manage_complience_information::where('status',"Applicable")->get();
        return view('backend.report.cliententity',compact('data'));
    }

    public function upcominggroup()
    {
       $data = manage_complience_information::where('status',"Applicable")->get();
        return view('backend.report.upcominggroup',compact('data'));
    }

    public function upcomingentity()
    {
       $data = manage_complience_information::where('status',"Applicable")->get();
        return view('backend.report.upcomingentity',compact('data'));
    }

    public function overdue1()
    {
       $data = manage_complience_information::where('status',"Applicable")->get();
        return view('backend.report.overdue1',compact('data'));
    }

    public function overdue2()
    {
       $data = manage_complience_information::where('status',"Applicable")->get();
        return view('backend.report.overdue2',compact('data'));
    }

    public function overdue3()
    {
       $data = manage_complience_information::where('status',"Applicable")->get();
        return view('backend.report.overdue3',compact('data'));
    }

    public function overdue4()
    {
       $data = manage_complience_information::where('status',"Applicable")->get();
        return view('backend.report.overdue4',compact('data'));
    }

    public function searchreportgroup(Request $request)
    {
        $entity_type = $request->entity_type;
        $group = $request->group_name;
        
        //$data['country123'] = country::all();
        //$data['type'] = entitytype::all();
        $data = DB::table('manage_complience_informations')
                  ->where('entity_type', $entity_type)
                  ->Orwhere('group_name', $group)
                  ->get();
        
        return view('backend.report.clientgroup',compact('data'));
    }

    public function expertrepoergroup(Request $request)
    {
      $data = app(manage_complience_information::class)->newQuery();

        if ( request()->has('search') && !empty(request()->get('search')) ) {
            $search = request()->query('search');
            $data->where(function ($query) use($search) {
                $query->where('entity_type', 'LIKE', "%{$search}%")
                    ->orWhere('group_name', 'LIKE', "%{$search}%");
            });
        }
          return Excel::download(new Expertreportgroup($data), 'reportgroup.xlsx');
    }

}
