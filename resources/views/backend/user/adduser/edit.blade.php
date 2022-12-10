<!DOCTYPE html>

I
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">

  
<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-invoice-list.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2022 06:09:31 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>USERS</title>
    
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


            <!-- Menu -->
            @include('import.sidebar')
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
             @include('import.navbar1')

      

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            
<h4 class="fw-bold py-3 mb-4">
  Edit User
</h4>

<nav aria-label="breadcrumb">
     <ol class="breadcrumb breadcrumb-style1">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">User Management</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{url('user')}}">Users</a>
        </li>

        <li class="breadcrumb-item">
          <a href="javascript:void(0);"> Edit User</a>
        </li>

      </ol>
    </nav>


<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <!-- <h5 class="card-header">FormValidation</h5> -->
      <div class="card-body">

        <form id="formValidationExamples" class="row g-3" action="{{url('user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
@csrf
                            @method('PUT')
          <!-- Account Details -->



         <div class="row  mt-2">
          <div class="col-md-3">

                <label class="form-label" for="formValidationConfirmPass">Name</label>
                <div class="input-group input-group-merge">
                    <input class="form-control" type="text" id="formValidationConfirmPass" name="name" placeholder="Contact Number" aria-describedby="multicol-confirm-password2" value="{{$user->name}}" />
                </div>
                
               </div>

               <div class="col-md-3">

                <label class="form-label" for="formValidationConfirmPass">Email</label>
                <div class="input-group input-group-merge">
                    <input class="form-control" type="text" id="formValidationConfirmPass" name="email" placeholder="Contact Number" aria-describedby="multicol-confirm-password2" value="{{$user->email}}" />
                </div>
               
               </div>
               <div class="col-md-3">

                <label class="form-label" for="formValidationConfirmPass">Designation</label>
                <div class="input-group input-group-merge">
                    <input class="form-control" type="text" id="formValidationConfirmPass" name="designation" placeholder="Contact Number" aria-describedby="multicol-confirm-password2" value="{{$user->designation}}" />
                </div>
               
               </div>

               <div class="col-md-3">

                <label class="form-label" for="formValidationConfirmPass">Password</label>
                <div class="input-group input-group-merge">
                    <input class="form-control" type="text" id="formValidationConfirmPass" name="password" placeholder="Contact Number" aria-describedby="multicol-confirm-password2" value="{{$user->password}}" />
                </div>
               
               </div>
             </div>

               <div class="col-md-3">
             <div class="input-group input-group-merge">
                    <input class="form-control" type="hidden" id="formValidationConfirmPass" name="updated" value="<?=Auth::user()->id?>" />
                </div>
              </div>
<div class="row  mt-2">
            <div class="col-md-3">
            <label class="form-label" for="formValidationSelect2"><span class="mandatory">*</span>Role</label>
                <select id="formValidationSelect2" name="role" class="form-select select2" data-allow-clear="true">
               
@foreach($role as $item)
                
                <option value="{{$item->id}}" <?php if($item->id== $user->role){ echo "selected"; }?>>{{$item->role}}</option>
                @endforeach
                </select>
              </div>
              <div class="col-md-3">

                <label class="form-label" for="formValidationConfirmPass">Contact Number</label>
                <div class="input-group input-group-merge">
                    <input class="form-control" type="text" id="formValidationConfirmPass" name="phone" placeholder="Contact Number" aria-describedby="multicol-confirm-password2" value="{{$user->phone}}" />
                </div>
               
               </div>
            <div class="col-md-3">
               <label class="form-label" for="formValidationSelect2"><span class="mandatory">*</span>Status</label>
                <select id="formValidationSelect2" name="status" class="form-select select2" data-allow-clear="true" value="{{$user->status}}">
                <option value="{{$user->status}}">@if($user->status == 1)Active @else In Active @endif</option>
                <option value="1">Active</option>
                                             <option value="0">In Active</option>
                </select>
            </div>
            <div class="col-md-3">
          
<label class="form-label" for="formValidationSelect2"><span class="mandatory">*</span> Country</label>
                <select id="formValidationSelect2" name="country" class="form-select select2" data-allow-clear="true">
                              <option>{{$user->country}}</option>
@foreach($country as $item)
                
                <option value="{{$item->id}}" <?php if($item->id== $user->country){ echo "selected"; }?>>{{$item->country}}</option>
                @endforeach
                </select>
              </div>

       </div>

          <div class="col-12 mt-5">
            <button type="submit" name="submitButton" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /FormValidation -->
</div>

            
          </div>
          <!-- / Content -->

          
          

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
    
  </div>
  <!-- / Layout wrapper -->

  
  

  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
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

</html>
