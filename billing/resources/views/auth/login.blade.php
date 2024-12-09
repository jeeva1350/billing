<!doctype html>
<html class="no-js" lang="">

   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>{{env('APP_NAME')}}</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="apple-touch-icon" href="yogavana-icon.png">
      <link rel="apple-tile-icon" href="yogavana-tile.png">
      <link rel="apple-wide-icon" href="yogavana-wide.png">
      <link rel="stylesheet" href="https://use.typekit.net/ibh7yun.css">
      <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
      <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
   </head>
   <body>
      <div class="main login77">
         <div class="login">
            <div class="logn">
               <div class="lgn1">
                  <div class="logo">
                  <a href="">Billing Application</a>
                  </div>
               </div>
               <div class="lgn2">
                  <div class="frm">
                     <form method="POST" action="{{ route('authenticate') }}">
                        @csrf
                        <h1>login</h1>
                        <div class="frms">
                           <div class="txtclm">
                              <input type="text" class="txtbx form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" id="email"  autofocus>
                              @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                           </div>
                           <div class="txtclm">
                              <input type="password" class="txtbx form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="PASSWORD" id="password" name="password" required>
                              @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
                           </div>
                           <div class="txtclm">
                              <div class="amtantn">
                                 <button type="submit" class="smit">
                                 {{ __('Login') }}
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
      <script src="{{asset('js/vendor/jquery-1.12.0.min.js')}}"></script>
      <script src="{{asset('js/main.js')}}"></script>
   </body>
</html>
