@extends('layouts.app')
@section('content')
<div id="content">
   <section id="edit">
      <div class="edits">
         <div class="container">
            <div class="edit7">
               <div class="edits7 clearfix">
                  <div class="flrhed">
                     <h1>+Add User</h1>
                  </div>
               </div>
               <div class="edtfrm chng">
                  <form action="{{route('users.new')}}" method="post" id="form" files="true" enctype="multipart/form-data">
                     @csrf
                     <div class="fodcontd">
                        <div class="lnkks">
                           <ul class="fodcateg">
                              <li class="selts"><a href="" data-sects="0">General Information</a></li>
                           </ul>
                        </div>
                     <div class="bakrest ptops">
                        <div class="fods">
                         <div class="edtro">
                         <div class="edtclm">
                           <label for="" class="lbl">User Name</label>
                           <div class="edtfld2">
                              <input type="text" class="txt7bx form-control" name="username" placeholder="User Name" required>
                           </div>
                        </div>
                        <div class="edtclm">
                           <label for="" class="lbl">Email</label>
                           <div class="edtfld2">
                              <input type="text" class="txt7bx form-control" name="email" placeholder="Email" required>
                           </div>
                        </div>
                        <div class="edtclm">
                           <label for="" class="lbl">Password</label>
                           <div class="edtfld2">
                              <input type="password" class="txt7bx form-control" name="password" placeholder="Password" required>
                           </div>
                        </div>
                        <div class="edtclm">
                           <label for="" class="lbl">Role</label>
                           <div class="edtfld">
                              <select name="role_id" class="form-control" required>
                                 <option value="">--Select Role--</option>
                                 @foreach ($roles as $country => $value)
                                 <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                        <div class="edtclm">
                           <label for="" class="lbl noast">Status</label>
                           <div class="edtfld2">
                              <input type="checkbox" class="chck" name="status" value="">
                              <label for="styled-checkbox-1" class="chkbx"></label> <br>
                           </div>
                        </div>
                        <div class="edtro">
                           <div class="edtclm3">
                              <div class="edtbtns clearfix">
                                 <div class="amtantn">
                                    <input type="submit" class="smits7" value="submit">
                                 </div>
                                 <a href="{{route('users') }}" class="back7">back</a>
                              </div>
                           </div>
                        </div>
                     </div>
</div>
                    </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
<script src="{{ asset('js/vendor/jquery-3.7.0.min.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
   $('input[name="status"]').on("change", function() {
       if ($(this).is(':checked')) {
           $(this).val("1");
       } else {
           $(this).val("0");
       }
   });
</script>
<script>
   $(document).ready(function() {
       $('#form').validate({ // initialize the plugin
           rules: {
               username: {
                   required: true
               },
               email: {
                   required: true
               },
               role_id: {
                   required: true
               },
               password: {
                   required: true
               },
           }
       });
   });
</script>
@endsection
