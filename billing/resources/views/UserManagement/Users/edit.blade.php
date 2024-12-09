@extends('layouts.app')
@section('content')
<div id="content">
   <section id="edit">
      <div class="edits">
         <div class="container">
            <div class="edit7">
               <div class="edits7 clearfix">
                  <div class="flrhed">
                     <h1>+EDit User</h1>
                  </div>
               </div>
               <div class="edtfrm chng">
                  <form action="{{route('users.new')}}" method="post" id="form" files="true" enctype="multipart/form-data">
                     @csrf
                     <input name="usr_id" type="hidden" value="{{ $users->id }}">
                     <div class="fodcontd">
                                    <div class="lnkks">
                                        <ul class="fodcateg">
                                            <li class="selts"><a href="" data-sects="0">General Information</a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="bakrest">
                                        <div class="fods">
                     <div class="edtro">
                        <div class="edtclm">
                           <label for="" class="lbl">User Name</label>
                           <div class="edtfld2">
                              <input type="text" class="txt7bx form-control" name="username" placeholder="Ex:  Ground Space" value="{{ $users->username }}" required>
                           </div>
                        </div>
                        <div class="edtclm">
                           <label for="" class="lbl">Email</label>
                           <div class="edtfld2">
                              <input type="text" class="txt7bx form-control" name="email" placeholder="alex@gmail.com" value="{{ $users->email }}" readonly required>
                           </div>
                        </div>
                        <div class="edtclm">
                           <label for="" class="lbl">Role</label>
                           <div class="edtfld">
                              <select name="role_id" class="form-control" required>
                                 <option value="">--Select Role--</option>
                                 @foreach ($roles as $country => $value)
                                 <option value="{{ $value->id }}" {{ $value->id == $users->role_id ? 'selected' : ''}}> {{ $value->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="edtclm">
                           <div class="edtfld2">
                           <a href="{{route('changePassword') }}" id="{{ $users->id}}" class="delPass">Change Password</a>
                           </div>
                        </div>
                        </div>
                        <div class="edtclm">
                           <label for="" class="lbl noast">Status</label>
                           <div class="edtfld2">
                              <input type="checkbox" class="chck" name="status" value="{{ $users->status }}">
                              <label for="styled-checkbox-1" class="chkbx"></label> <br>
                           </div>
                        </div>
                        <div class="edtro fodsout">
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
   $('input[name="status"][value=1]').prop("checked", true);
   $('input[name="status"]').on("change", function() {
       if ($(this).is(':checked')) {
           $(this).val("1");
       } else {
           $(this).val("0");
       }
   });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript">
   // $("#delete").val();
   $('.delPass').bind('click', function(e) {
       e.preventDefault();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       var usrId = $(this).attr('id');
       var url = $(this).attr('href');
       swal({
               title: "Change Password!",
               text: "Type your Password:",
               type: "input",
               showCancelButton: true,
               confirmButtonColor: '#EB984E',
               closeOnConfirm: false,
               animation: "slide-from-top",
               inputPlaceholder: "Password"
           },
           function(inputValue) {
               if (inputValue === false) return false;
               if (inputValue === "") {
                   swal.showInputError("Type your Password!");
                   return false
               }
               $.post(url, {
                       token: $('meta[name="csrf-token"]').attr('content'),
                       pass: inputValue,
                       usr_id: usrId
                   },
                   function(data, status) {
                       swal("Succesfully Password Changed ", " Password: " + inputValue, "success");
                   });
           });
   });
</script>
@endsection
