 <head>
     <meta charset="utf-8">
     <title>Login</title>
     <link rel="icon" type="image/png" sizes="16x16" href="images/logo.svg">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link
         href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kanit:wght@500;700&family=Roboto+Condensed&display=swap"
         rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link
         href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kanit:wght@500;700&family=Mitr:wght@200&family=Prompt:wght@300&family=Roboto+Condensed&display=swap"
         rel="stylesheet">
     <!-- BEGIN: Vendor CSS-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

     <!-- BEGIN: Theme CSS-->
     <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
     <!-- BEGIN: Page CSS-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link
         href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kanit:wght@100;200&family=Mitr:wght@200&family=Prompt:wght@300&family=Roboto+Condensed&display=swap"
         rel="stylesheet">
     <!-- END: Page CSS-->

     <!-- BEGIN: Custom CSS-->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
     <!-- END: Custom CSS-->
     <style>
         .has-icon-left .form-control {
             padding-right: 6rem;
             padding-left: 3rem;
         }

         .rounded-0 {
             border-radius: 10px !important;
         }

         /* html body.bg-full-screen-image {
             background: url(../../app-assets/images/login2.png) no-repeat center center;
             background-size: cover;
         } */
     </style>

 </head>

 <body
     class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page"
     data-open="hover" data-menu="horizontal-menu" data-col="1-column">
     <!-- BEGIN: Content-->
     <div class="app-content content">
         <div class="content-overlay"></div>
         <div class="header-navbar-shadow"></div>
         <div class="content-wrapper">
             <div class="content-header row">
             </div>
             <div class="content-body" style="font-family: 'Kanit', sans-serif; font-weight:500;">
                 <section class="row flexbox-container">
                     <div class="col-xl-8 col-11 d-flex justify-content-center">
                         <div class="card bg-authentication rounded-0 mb-0" style="background-color: #eff2f7;">
                             <div class="row m-0">
                                 <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                     <img src="../../../app-assets/images/pages/login.png" alt="branding logo">
                                 </div>
                                 <div class="col-lg-6 col-12 p-0">
                                     <div class="card rounded-0 mb-0 px-4">
                                         <div class="col-12" style="text-align: center">
                                             <a href="{{ url('home') }}"><img src={{ '/images/infinityV2.png' }}
                                                     style="max-width: 116px; margin-top: 40px" alt=""></a>
                                             <h4 class="mt-2" style="font-size: 1rem;">Phenomenal Software</h4>

                                             <div class="card-title mt-5" style="text-align: center;">
                                                 <h4 class="mb-0" style="font-size: 2rem;">เข้าสู่ระบบ</h4>
                                             </div>

                                             <br>
                                             <div class="card-content"
                                                 style="font-family: 'Kanit', sans-serif; font-weight:300; ">
                                                 <div class="card-body pt-2">
                                                     <form method="POST" action="{{ route('login') }}">
                                                        @csrf
                                                         <div class="col-lg-12 col-sm-12 mt-1">
                                                             <fieldset
                                                                 class="form-label-group form-group position-relative has-icon-left">
                                                                 <input id="phonenumber" type="text"
                                                                     class="form-control @error('phonenumber') is-invalid @enderror"
                                                                     placeholder="เบอร์โทรศัพท์"
                                                                     oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                     name="phonenumber" maxlength="10"
                                                                     style="font-size: 1.3rem;"
                                                                     value="{{ old('phonenumber') }}" required
                                                                     autocomplete="phonenumber" autofocus>
                                                                 <div class="form-control-position" style="top: 14">
                                                                     <i class="bi bi-telephone"></i>
                                                                 </div>
                                                                 @error('phonenumber')
                                                                     <span class="invalid-feedback" role="alert">
                                                                         <strong>{{ $message }}</strong>
                                                                     </span>
                                                                 @enderror
                                                             </fieldset>
                                                         </div>
                                                         <br>

                                                         <div class="col-lg-12 col-sm-12 mt-2">
                                                             <fieldset
                                                                 class="form-label-group position-relative has-icon-left">
                                                                 <div class="position-relative has-icon-right">
                                                                     <input id="password" type="password"
                                                                         class="form-control @error('password') is-invalid @enderror"
                                                                         name="password" placeholder="รหัสผ่าน"
                                                                         required
                                                                         autocomplete="current-password"style="font-size: 1.3rem;">
                                                                     <div class="form-control-position"
                                                                         style="top: 14">
                                                                         <i class="bi bi-eye-slash"
                                                                             id="togglePassword"></i>
                                                                     </div>
                                                                 </div>
                                                                 @error('password')
                                                                     <span class="invalid-feedback" role="alert">
                                                                         <strong>{{ $message }}</strong>
                                                                     </span>
                                                                 @enderror
                                                             </fieldset>
                                                         </div>
                                                         <br>
                                                         <div class="col-12 mt-2" style="text-align: center;">
                                                             <button type="submit"
                                                                 class="btn btn round mr-1 mb-1 float-right btn-inline"
                                                                 style="background-color: #164176;color:white; border-radius: 23px;width: 157px;font-size:1.3rem;">เข้าสู่ระบบ</button>
                                                         </div>
                                                     </form>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </section>

             </div>
         </div>
     </div>
     <script>
         const togglePassword = document.querySelector("#togglePassword");
         const password = document.querySelector("#password");

         togglePassword.addEventListener("click", function() {
             // toggle the type attribute
             const type = password.getAttribute("type") === "password" ? "text" : "password";
             password.setAttribute("type", type);

             // toggle the icon
             this.classList.toggle("bi-eye");
         });

         // prevent form submit
        //  const form = document.querySelector("form");
        //  form.addEventListener('submit', function(e) {
        //      e.preventDefault();
        //  });
     </script>
     <!-- BEGIN: Vendor JS-->
     <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
     <!-- BEGIN Vendor JS-->

     <!-- BEGIN: Page Vendor JS-->
     <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
     <!-- END: Page Vendor JS-->

     <!-- BEGIN: Theme JS-->
     <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
     <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
     <script src="{{ asset('app-assets/js/scripts/components.js') }}"></script>
     <!-- END: Theme JS-->

     <!-- BEGIN: Page JS-->
     <!-- END: Page JS-->
 </body>
 <!-- END: Content-->
 {{-- <div class="container-fluid">
     <div class="bg-img">
         <img src="/images/login2.png" class=" " alt=""
             style="height: 705px;
                width: 1527px;">


         <div class="col-6">

             <div class="card" style="font-family: 'Kanit', sans-serif; font-weight:400;">
                 <div class="row">
                     <div class="col-10" style="text-align: center">
                         <a href="{{ url('home') }}"><img src={{ '/images/infinityV2.png' }}
                                 style="max-width: 220px; margin-top: 40px" alt=""></a>
                         <h4 class="mt-2">Phenomenal Software</h4>

                     </div>

                     <div class="col-lg-12 col-sm-12 mt-4 " style="text-align: center;">
                         <div class="row">
                             <div class="col-lg-10 col-sm-12">
                                 <div class="text ">
                                     <h1 style="margin: 10px; font-family: 'Kanit', sans-serif; font-weight:600; ">
                                         {{ __('เข้าสู่ระบบ') }}</h1>
                                 </div>
                                 <form method="POST" action="{{ route('login') }}">
                                     @csrf
                                     <div class="row justify-content-center">
                                         <div class="col-lg-8 col-sm-10 mt-5">

                                             <input id="numberPhone" type="text"
                                                 class="form-control @error('numberPhone') is-invalid @enderror"
                                                 placeholder="เบอร์โทร"
                                                 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                 name="numberPhone" maxlength="10" style="font-size: 1.3rem;"
                                                 value="{{ old('numberPhone') }}" required autocomplete="numberPhone"
                                                 autofocus>
                                             @error('numberPhone')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror

                                         </div>
                                         <div class="col-lg-8 col-sm-10 mt-2">
                                             <div class="position-relative has-icon-right">
                                                 <input id="password" type="password"
                                                     class="form-control @error('password') is-invalid @enderror"
                                                     name="password" placeholder="รหัสผ่าน" required
                                                     autocomplete="current-password"style="font-size: 1.3rem;">
                                                 <div class="form-control-position" style="top: 14">
                                                     <i class="bi bi-eye-slash" id="togglePassword"></i>
                                                 </div>
                                             </div>
                                             @error('password')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                             <div class="mt-5">
                                                 <button type="submit" class="btn btn-info"
                                                     style="color: #fff;background-color: #164176;border-color: #164176;  border-radius: 30px; width: 150px; height: 40px;">
                                                     {{ __('เข้าสู่ระบบ') }}
                                                 </button>
                                             </div>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <div style="font-family: 'Kanit', sans-serif; font-weight:600;">
     <form method="POST" action="{{ route('login') }}">
         @csrf
         <div class="row mb-4">
             <div class="col-lg-10 col-sm-7" style="text-align: -moz-center">
                 <div class="col-lg-7 col-sm-12">
                     <input id="numberPhone" type="text"
                         class="form-control @error('numberPhone') is-invalid @enderror" placeholder="เบอร์โทร"
                         name="numberPhone" value="{{ old('numberPhone') }}" required autocomplete="numberPhone"
                         autofocus>
                     @error('numberPhone')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>
             </div>
         </div>
         <div class="row mb-4">
             <div class="col-lg-10 col-sm-7" style="text-align: -moz-center">
                 <div class="col-lg-7 col-sm-12">
                     <div class="position-relative has-icon-right">
                         <input id="password" type="password"
                             class="form-control @error('password') is-invalid @enderror" name="password"
                             placeholder="รหัสผ่าน" required autocomplete="current-password">
                         <div class="form-control-position" style="top: 10">
                             <i class="bi bi-eye-slash" id="togglePassword"></i>
                         </div>
                     </div>
                     @error('password')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                     <div class="mt-5">
                         <button type="submit" class="btn btn-info"
                             style="color: #fff;background-color: #164176;border-color: #164176;  border-radius: 30px; width: 150px; height: 40px;">
                             {{ __('เข้าสู่ระบบ') }}
                         </button>
                     </div>
                 </div>
             </div>
         </div>
     </form>
 </div>



 <script>
     const togglePassword = document.querySelector("#togglePassword");
     const password = document.querySelector("#password");

     togglePassword.addEventListener("click", function() {
         // toggle the type attribute
         const type = password.getAttribute("type") === "password" ? "text" : "password";
         password.setAttribute("type", type);

         // toggle the icon
         this.classList.toggle("bi-eye");
     });

     // prevent form submit
     const form = document.querySelector("form");
     form.addEventListener('submit', function(e) {
         e.preventDefault();
     });
 </script> --}}
