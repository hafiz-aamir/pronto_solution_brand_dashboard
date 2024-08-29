
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    @include('layouts.front_layout.css')

    <title>Login</title>

    <style>

      .error {
          color: red;
      }

    </style>

  </head>
  <body>
    <section class="login-section">
      <div class="login-content-parent">
        <div class="login-box">
          <div class="login-box-inner">
            <div class="login-head-para text-center">
              <h3 class="fw-bold">Login to Account</h3>
              <p class="fw-semibold">Please enter your email and password to continue</p>
            </div>

            <form method="POST" action="{{ URL('postlogin') }}" >
            
                @csrf

                <div class="input-and-rem-parent">
                  
                  <div class="input-login position-relative">
                    <label class="fw-semibold" for="email">Email address: </label>
                    <input type="email" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" />
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                  </div>

                  <div class="input-login position-relative">

                  <div class="d-flex align-items-center justify-content-between">
                  <label class="fw-semibold" for="password">Password </label>
                  <!-- <a class="forget-pass-login text-black" href="">Forget Password?</a> -->
                  </div>
                   
                    <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}" />
                    @error('password') <div class="error">{{ $message }}</div> @enderror
                  </div>

                  <!-- <div class="remem-me">
                    <input type="checkbox" /><span>Remember Me</span>
                  </div> -->

                </div>
                <div class="login-btn">
                  <button  class="LoginButton"> Login </button>
                </div>


            </form>

          </div>
        </div>
      </div>
    </section>
  </body>
</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    
    // Set the options that I want
    toastr.options = {
    "closeButton": true,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "1000",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear", 
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }

</script>

@if(Session::has('message'))
<script>
    $(document).ready(function onDocumentReady() {  
    
        toastr.success("{{ Session::get('message') }}");
    
    });
</script>
@elseif(Session::has('error'))
<script>
    $(document).ready(function onDocumentReady() {  
    
        toastr.error("{{ Session::get('error') }}");
    
    });
</script>
@endif