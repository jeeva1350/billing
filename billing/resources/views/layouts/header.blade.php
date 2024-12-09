<header>
   <?php
      $uri = Request::segment(1);$uri1 = Request::segment(2);$uri2 = Request::segment(3);
      $userRoleId = Auth::user()->role_id;
      ?>
   <div class="headr">
      <div class="container">
         <div class="headrs clearfix">
            <ul class="admin-user">
               <li class="{{$uri == Auth::user()->id ? 'actss': ''}}">
                  <a href="{{route('users.show', Auth::user()->id) }}" class="admnname">Welcome {{ Auth::user()->username }}</a>
               </li>
               <li><a href="{{ route('logout') }}" class="logout">Logout</a></li>
            </ul>
         </div>
         <div class="mnu22 clearfix">
            <div class="logo1"></div>
            <div class="scndmnu">
               <div class="mnu clearfix">
                  <ul class="mnus">
                 
                  <li class="{{$uri1 == 'billing' ? 'actss': ''}}"><a href="{{route('billing')}}">Billing</a></li>
                  <li class="{{$uri1 == 'products' ? 'actss': ''}}"><a href="{{route('products')}}">Products</a></li>
                  <li class="{{$uri1 == 'denominations' ? 'actss': ''}}"><a href="{{route('denominations')}}">Denominations</a></li>
                      
                  
                 
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>

<script src="{{ asset('js/vendor/jquery-3.7.0.min.js')}}"></script>
<script>
   $(".admin-user > a").click(function(e) {
       e.preventDefault();
       $(".admin__action-dropdown-menu").toggleClass("actv");
       $(".admin__action-dropdown").toggleClass("actve");
   });
</script>
<script type="text/javascript">
   $(function() {
       $(".sucess").fadeIn();
   
       $(".close7").on('click', function(e) {
           e.preventDefault();
           $(".sucess").fadeOut();
       });
   });
</script>
