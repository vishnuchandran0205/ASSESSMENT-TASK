<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Application-1</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              @if ($errors->any())
               <div class="alert alert-danger">
                      <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
               @endif
            
              <h6 class="font-weight-light">Sign in to continue.</h6>
              
              <form class="pt-3" action="{{ url('/login_check') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter email address" onkeyup="return emailVal();">
                  <span id="email-error" style="color: red;"></span>
                </div>
                
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" onkeyup="return passVal();">
                  <span id="password-error" style="color: red;"></span>
                </div>
                
                <div class="mt-3">
                  <button type="submit" onclick="return MainVal();" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                </div>
               
              </form>
              <script>
                function MainVal(){
                  //  alert('hai');
                  var email = document.getElementById('email').value;
                  //alert(email);
                  var password = document.getElementById('password').value;
                  if (email === "") {
                      document.getElementById('email-error').innerHTML = 'This field is required.';
                      return false;
                  } else if (password === "") {
                      document.getElementById('password-error').innerHTML = 'This field is required.';
                      return false;
                  } else {
                      return true;
                  } 
                }
                function emailVal(){
                  var email = document.getElementById('email').value;
                
                  if (email === "") {
                      document.getElementById('email-error').innerHTML = 'This field is required.';
                      return false;
                 
                  } else {
                    document.getElementById('email-error').innerHTML = '';
                      return true;
                  } 
                }
                function passVal(){
                  
                  var password = document.getElementById('password').value;
                  if (password === "") {
                      document.getElementById('password-error').innerHTML = 'This field is required.';
                      return false;
                  } else {
                      document.getElementById('password-error').innerHTML = '';
                      return true;
                  } 
                }
              </script>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
