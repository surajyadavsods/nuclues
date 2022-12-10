
<!DOCTYPE html>


<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Email Verification</title>
    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href='{{asset("/assets/img/favicon/favicon.icon")}}' />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href='{{asset("/assets/vendor/fonts/boxicons.css")}}' />
    <link rel="stylesheet" href='{{asset("/assets/vendor/fonts/fontawesome.css")}}' />
    <link rel="stylesheet" href='{{asset("/assets/vendor/fonts/flag-icons.css")}}' />

    <!-- Core CSS -->
    <link rel="stylesheet" href='{{asset("/assets/vendor/css/rtl/core.css")}}" class="template-customizer-core-css' />
    <link rel="stylesheet" href='{{asset("/assets/vendor/css/rtl/theme-default.css")}}" class="template-customizer-theme-css' />
    <link rel="stylesheet" href='{{asset("/assets/css/demo.css")}}' />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href='{{asset("/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}}' />
    <link rel="stylesheet" href='{{asset("/assets/vendor/libs/typeahead-js/typeahead.css")}}' />
    <!-- Vendor -->
<link rel="stylesheet" href='{{asset("/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css")}}' />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href='{{asset("/assets/vendor/css/pages/page-auth.css")}}'>
    <!-- Helpers -->
    <script src='{{asset("/assets/vendor/js/helpers.js")}}'></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src='{{asset("/assets/vendor/js/template-customizer.js")}}'></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src='{{asset("/assets/js/config.js")}}'></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
   

</head>

<body>

  <!-- Content -->

<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
      <div class="w-100 d-flex justify-content-center">
        <img src='{{asset("/assets/img/illustrations/boy-with-rocket-light.png")}}' class="img-fluid" alt="Login image" width="700" data-app-dark-img="illustrations/boy-with-rocket-dark.png" data-app-light-img="illustrations/boy-with-rocket-light.png">
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand mb-5">
          <a href="{{url('dashboard')}}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">

            <div class="ml-5">
            <img src='{{asset("/assets/img/logo.jpg")}}' style="max-width:40%">
            </div>

       </span>
          </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">Two Step Verification 💬</h4>
        <p class="text-start mb-4">
          We sent a verification code to your Email. Enter the code from the Email in the field below.
          <span class="fw-bold d-block mt-2">pra*****@nucleus.com
</span>
        </p>
        <p class="mb-0 fw-semibold">Type your 4 digit security code</p>
        <form>
          <div class="mb-3">
            <div class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
              <input type="text" class="form-control auth-input h-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2" maxlength="1" autofocus>
              <input type="text" class="form-control auth-input h-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2" maxlength="1">
              <input type="text" class="form-control auth-input h-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2" maxlength="1">
              <input type="text" class="form-control auth-input h-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2" maxlength="1">
              
            </div>
            <!-- Create a hidden field which is combined by 3 fields above -->
            <input type="hidden" name="otp" />
          </div>
          <button class="btn btn-primary d-grid w-100 mb-3" style="font:"><a href="{{route('dashboard')}}" style="color:white">
            Verify OTP</a>
          </button>
          <div class="text-center">Didn't get the code?
            <a href="javascript:void(0);">
              Resend
            </a>
          </div>
        </form>
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>

<!-- / Content -->

  
  

  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src='{{asset("/assets/vendor/libs/jquery/jquery.js")}}'></script>
  <script src='{{asset("/assets/vendor/libs/popper/popper.js")}}'></script>
  <script src='{{asset("/assets/vendor/js/bootstrap.js")}}'></script>
  <script src='{{asset("/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js")}}'></script>
  
  <script src='{{asset("/assets/vendor/libs/hammer/hammer.js")}}'></script>
  <script src='{{asset("/assets/vendor/libs/i18n/i18n.js")}}'></script>
  <script src='{{asset("/assets/vendor/libs/typeahead-js/typeahead.js")}}'></script>
  
  <script src='{{asset("/assets/vendor/js/menu.js")}}'></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src='{{asset("/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js")}}'></script>
<script src='{{asset("/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js")}}'></script>
<script src='{{asset("/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js")}}'></script>

  <!-- Main JS -->
  <script src='{{asset("/assets/js/main.js")}}'></script>

  <!-- Page JS -->
  <script src='{{asset("/assets/js/pages-auth.js")}}'></script>
  
</body>

</html>

<!DOCTYPE html>



























<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  
<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/auth-register-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2022 06:11:17 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Cover - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="../../../../themeselection.com/products/sneat-bootstrap-html-admin-template/index.html">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="../../../../fonts.googleapis.com/index.html">
    <link rel="preconnect" href="../../../../fonts.gstatic.com/index.html" crossorigin>
    <link href="../../../../fonts.googleapis.com/css28ebe.css?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
<link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css">
    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
    
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

  <!-- Content -->

  
 

  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
  <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
  <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
  
  <script src="../../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../../assets/js/pages-auth.js"></script>
  
</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/auth-register-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2022 06:11:17 GMT -->
</html>
