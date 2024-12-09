@extends('layouts.app')
@section('content')
<div id="content">
   <section id="edit">
      <div class="edits">
         <div class="container">
            <div class="edit7">
               <div class="edits7 clearfix">
                  <div class="flrhed">
                     <h1>+Add Role</h1>
                  </div>
               </div>
               <div class="edtfrm chng">
                  <form action="{{route('roles.new')}}" method="post" id="form" files="true" enctype="multipart/form-data">
                     @csrf
                     <input name="role_id" type="hidden" value="{{ $role->id }}">
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
                           <label for="" class="lbl">Role Name</label>
                           <div class="edtfld2">
                              <input type="text" class="txt7bx form-control" name="name" placeholder="Ex: Manager" value="{{$role->name}}" required>
                           </div>
                        </div>
                     </div>
                 </div>
                     <div class="edtclm">
                           <label for="" class="lbl noast">Status</label>
                           <div class="edtfld2">
                              <input type="checkbox" class="chck" name="status" value="{{ $role->status }}">
                              <label for="styled-checkbox-1" class="chkbx"></label> <br>
                           </div>
                        </div>
                     <div class="edtro">
                        <div class="edtclm3">
                           <div class="edtbtns clearfix">
                              <div class="amtantn">
                                 <input type="submit" class="smits7" value="submit">
                              </div>
                              <a href="{{route('roles') }}" class="back7">back</a>
                           </div>
                        </div>
                     </div>
</div></div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
   $(document).ready(function() {
   
       $('#form').validate({ // initialize the plugin
           rules: {
               role_name: {
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
@endsection
