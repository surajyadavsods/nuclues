<!DOCTYPE html>


<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">

  
<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-invoice-list.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2022 06:09:31 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Client Entity </title>
    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="themeselection.com/products/sneat-bootstrap-html-admin-template/index.php">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="fonts.googleapis.com/index.php">
    <link rel="preconnect" href="fonts.gstatic.com/index.php" crossorigin>
    <link href="fonts.googleapis.com/css28ebe.css?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href='{{url("")}}/assets/vendor/fonts/boxicons.css' />
    <link rel="stylesheet" href='{{url("")}}/assets/vendor/fonts/fontawesome.css' />
    <link rel="stylesheet" href='{{url("")}}/assets/vendor/fonts/flag-icons.css' />

    <!-- Core CSS -->
    <link rel="stylesheet" href='{{url("")}}/assets/vendor/css/rtl/core.css' class="template-customizer-core-css"/>
    <link rel="stylesheet" href='{{url("")}}/assets/vendor/css/rtl/theme-default.css' class="template-customizer-theme-css" />
    <link rel="stylesheet" href='{{url("")}}/assets/css/demo.css' />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href='{{url("")}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css' />
    <link rel="stylesheet" href='{{url("")}}/assets/vendor/libs/typeahead-js/typeahead.css' />
    <link rel="stylesheet" href='{{url("")}}/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css'>
<link rel="stylesheet" href='{{url("")}}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css'>
<link rel="stylesheet" href='{{url("")}}/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css'>

    <!-- Page CSS -->
    
    <!-- Helpers -->
    <script src='{{url("")}}/assets/vendor/js/helpers.js'></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!-- <script src="assets/vendor/js/template-customizer.js"></script> -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src='{{url("")}}/assets/js/config.js'></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>
<body>


  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">

    
    




<!-- Menu -->

@include('import.sidebar')

<!-- / Menu -->

    

    <!-- Layout container -->
    <div class="layout-page">
@include('import.navbar1')
      <div class="content-wrapper">

          <div class="container-xxl flex-grow-1 container-p-y">
          @if(session('status'))
   <div class="alert alert-success">
  {{session('status')}}
  </div>
  @endif
<h4 class="fw-bold py-3 mb-4">
Client Entity
</h4>
<nav aria-label="breadcrumb">
     <ol class="breadcrumb breadcrumb-style1">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Master Data Management</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{url('client_entity')}}">Client Entity</a>
        </li>

        <li class="breadcrumb-item">
          <a href="javascript:void(0);"> Client Entity Information</a>
        </li>

      </ol>
     
    </nav>
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <!-- <h5 class="card-header">FormValidation</h5> -->
      <div class="card-body">

        <form id="formValidationExamples" class="row g-3">
         <div class="row  mt-2">

            <div class="col-md-3">
                <label class="form-label" for="formValidationName">Client Group</label>
               <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="Readonly input here..." readonly value="<?php $val=App\Models\client_group_master::where('id',$datas3->client_group)->first(); echo $val->client_group;?>" />
            </div>
            <div class="col-md-3">
                <label class="form-label" for="formValidationSelect2"><span class="mandatory">*</span> Client Entity Name</label>
                <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="Readonly input here..." readonly value="{{$datas3->client_entity_name}}" />
            </div>

            <div class="col-md-2">
                <label class="form-label" for="formValidationSelect2"><span class="mandatory">*</span>Entity Type</label>
                <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="Readonly input here..." readonly value="<?php $val=App\Models\entitytype::where('id',$datas3->entity_type)->first(); echo $val->type;?>" />
            </div>

            <div class="col-md-2">
                <label class="form-label" for="formValidationSelect2"><span class="mandatory">*</span>Country</label>
               <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="Readonly input here..." readonly value="<?php $val=App\Models\country::where('id',$datas3->country)->first(); echo $val->country;?>" />
            </div>
            <div class="col-md-2">
                <label class="form-label" for="formValidationSelect2"><span class="mandatory">*</span>Year End</label>
               <input class="form-control" type="text" id="exampleFormControlReadOnlyInput1" placeholder="Readonly input here..." readonly value="{{$datas3->year_end}}" />
            </div>


          

         </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<div class="card p-3 mt-3">
  
    <div class="card-datatable text-nowrap">
      <table class="dt-column-search table table-bordered">
        <thead>
          <tr>
          
            <th>Compliance Name</th>
            <th>Period End</th>
            <!-- <th>Entity Name</th> -->
            <th>Frequency</th>
            <th>Due Date</th>
            {{--<th>Entity Type</th>--}}
            <th>Form Name</th>
            {{--<th>Group Name</th>
            <th>Period End</th>--}}
            <th>Notes</th>
            <th>Status</th>
            <th>Actions</th>   
          </tr>

         
        </thead>
        <tfoot>

                  <form action="{{route('Information.store')}}" method="POST">
                    @csrf
                <input type="hidden" name="entity_id" value="{{$datas3->id}}"> 
                <input type="hidden" name="country" value="{{$datas3->country}}">
                        <input type="hidden" name="csd" value="{{$datas3->csd}}">
        
                <input type="hidden" name="mat_spv" value="{{$datas3->mat_spv}}">
        
                <input type="hidden" name="mat_manager" value="{{$datas3->mat_manager}}">
         @if($item->id) === null)
                      {
                  @foreach($entity as $item)
                  <tr>
                     
                   
                    <td><input type="hidden" name="complaince_name" value="{{$item->complaince_name}}">{{$item->complaince_name}}</td>
                    <td><input type="hidden" name="periodend" value="{{$item->periodend}}">{{$item->periodend}}</td>
        
                    <!-- <td>EFG Legal</td> -->
                    <td><input type="hidden" name="frequency" value="{{$item->Frequency}}"><?php $val=App\Models\frequency::where('id',$item->Frequency)->first(); echo $val->frequency?></td>
                     <td><input type="hidden" name="due_date" value="{{$item->due_date}}">{{$item->due_date}}</td>
                    <td><input type="hidden" name="form" value="{{$item->forms}}">{{$item->forms}}</td>
                    {{--<td><input type="hidden" name="entity_type" value="{{$item->entity_type}}"><?php $val=App\Models\entitytype::where('id',$item->entity_type)->first(); echo $val->type?></td>--}}
        
                    {{--<td><input type="hidden" name="form" value="{{$item->forms}}">{{$item->forms}}</td>--}}
                    
                     {{--<td><input type="hidden" name="group_name" value="{{$item->client_group}}"><?php $val=App\Models\client_group_master::where('id',$item->client_group)->first(); echo $val->client_group?></td>--}}
        
                    {{--<td><input type="hidden" name="periodend" value="{{$item->periodend}}">{{$item->periodend}}</td>--}}
        
                    <td><input type="hidden" name="notes" value="{{$item->notes}}">{{$item->notes}}</td>
                  }
                  @else
                  {
                    <td>
                    @if($datastore->status == NULL)
                    --
                    @else
                    <span class="badge rounded-pill bg-label-success">{{$datastore->status}} </span>
                    @endif</td>
        
                  </td>
                  {{--    <td><span class="badge rounded-pill bg-label-success">{{$item->status}}</span>--}}
        <td>
                     {{-- <input type="button" name="status" value="Active">Active  --}}
                        {{--<a href="{{url('/activecountry/'.$item->id)}}">--}}
                         {{--<td> <button type="submit" name="status" value="1"><i class="bx bx-check me-2" style="color: green;"></i></button>--}}
                           </form>
                          <form action="{{url('cancelentity/'.$item->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                       <button type="submit" name="status" value="Non Applicable"><i class="bx bx-x me-2" style="color: red;"></i></button>
                        <button type="submit" name="status" value="Applicable"><i class="bx bx-check me-2" style="color: green;"></i></button>
                         </form>
                          }

                  </td>
                  
                  </tr>
             @endforeach
              @endif
        
        
             
                </tfoot>
      </table>
    </a>
 
    </div>
</div>
</div>

          
          

<!-- Footer -->
@include('import.footer')

<!-- / Footer -->

          
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    
    
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
    
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    
   <script src='{{url("")}}/assets/vendor/libs/jquery/jquery.js'></script>
  <script src='{{url("")}}/assets/vendor/libs/popper/popper.js'></script>
  <script src='{{url("")}}/assets/vendor/js/bootstrap.js'></script>
  <script src='{{url("")}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'></script>
  
  <script src='{{url("")}}/assets/vendor/libs/hammer/hammer.js'></script>
  <script src='{{url("")}}/assets/vendor/libs/i18n/i18n.js'></script>
  <script src='{{url("")}}/assets/vendor/libs/typeahead-js/typeahead.js'></script>
  
  <script src='{{url("")}}/assets/vendor/js/menu.js'></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src='{{url("")}}/assets/vendor/libs/select2/select2.js'></script>
<script src='{{url("")}}/assets/vendor/libs/bootstrap-select/bootstrap-select.js'></script>
<script src='{{url("")}}/assets/vendor/libs/moment/moment.js'></script>
<script src='{{url("")}}/assets/vendor/libs/flatpickr/flatpickr.js'></script>
<script src='{{url("")}}/assets/vendor/libs/typeahead-js/typeahead.js'></script>
<script src='{{url("")}}/assets/vendor/libs/tagify/tagify.js'></script>
<script src='{{url("")}}/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js'></script>
<script src='{{url("")}}/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js'></script>
<script src='{{url("")}}/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js'></script>

  <!-- Main JS -->
  <script src='{{url("")}}/assets/js/main.js'></script>

  <!-- Page JS -->
  <script src='{{url("")}}/assets/js/form-validation.js'></script>
</body>

<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-invoice-list.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2022 06:09:41 GMT -->
</html>


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
        $data = client_entity_master::all();
        return view('backend.masterdata.cliententity.index',compact('data'));
    }
    public function ed()
    {
        return view('backend.masterdata.cliententity.edit');
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
            'responsibility2'=>request()->get('responsibility2'),
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
            $data->responsibility2 = $request->input('responsibility2');
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
        //$country_compliance_id = manage_complience_information::where('manage_complience_informations.entity_type',$request->entity_type)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'manage_complience_informations.entity_type')->Select('manage_complience_informations.*','country_compliance__masters.id')->first();

        //$country_compliance_id = manage_complience_information::find('country_compliance_id')->get();
        //dd($country_compliance_id);

        if(manage_complience_information::find('country_compliance_id') === null)
        {
             $data['entity'] = client_entity_master::where('client_entity_masters.entity_type',$request->entity_type)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'client_entity_masters.entity_type')->get();
             $datas3= client_entity_master::find($id2);

        }
        else
        {
             $data['datastore'] = manage_complience_information::where('manage_complience_informations.entity_type',$request->entity_type)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'manage_complience_informations.entity_type')->Select('manage_complience_informations.*','country_compliance__masters.id')->first();
              $datas3= client_entity_master::find($id2);
        }

        //$data['entity'] = client_entity_master::where('client_entity_masters.entity_type',$request->entity_type)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'client_entity_masters.entity_type')->get();


       //$data['group'] = client_entity_master::where('client_entity_masters.entity_type',$request->entity_type)->join('country_compliance__masters', 'country_compliance__masters.entity_type', '=', 'client_entity_masters.entity_type')->Select('client_entity_masters.*')->join('manage_complience_informations', 'manage_complience_informations.entity_type', '=', 'country_compliance__masters.entity_type')->Select('manage_complience_informations.status')->first();

       //$data['datastore'] = 
       // $datas3= client_entity_master::find($id2);


        return view('backend.masterdata.cliententity.view',['datas3' => $datas3],$data);
    }


    public function informationstore(Request $request)
    {
        $input = array(
           'frequency' => $request->frequency,
            'entity_type' => $request->entity_type,
            'entity_id' => $request->entity_id,
            'due_date' => $request->due_date,
            'country_compliance_id' => $request->country_compliance_id,
            'complaince_name' => $request->complaince_name,
             'periodend' => $request->periodend,
              'form' => $request->form,
              'notes' => $request->notes,
            'status' => $request->status,
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


    public function cancelentity(Request $request,$country_compliance_id)
    {
        //$id = role_permission::find('country_compliance_id');

        $data = manage_complience_information::where('country_compliance_id',$country_compliance_id)->first();
        $data->status = $request->input('status');
        //dd($data);
        $data->save();
        return redirect()->back();
    }

}
