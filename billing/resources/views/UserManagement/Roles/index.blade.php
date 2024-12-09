@extends('layouts.app')
@section('content')
<div id="content" class="repots userss seriess">
   <section id="floorplan">
      <div class="florplan recnt">
         <div class="container">
            <div class="flrpln clearfix">
               <div class="flrheds clearfix">
                  <div class="flrhed">
                     <h1>Roles </h1>
                  </div>
                  <div class="addbtn" title="Add new"><a href="{{route('roles.create')}}">Add</a></div>
               </div>
            </div>
            <div class="actvty7">
               <table class="actvtytbl blck" id="example">
                  <thead>
                     <tr>
                        <th>Role Name</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($roles as $role)
                     <tr>
                        <td>{{ $role->name }}</td>
                        <td class="text-center">
                           @php $v = $role->status ? 0 : 1;
                           $a = $role->id . "," . $v;@endphp
                           <div class="mebu"><button class="butwid {{$role->status? 'blue' : ''}}"><a href="{{route('roles.edit',$a)}}" class="askDelete" name="Click to {{$role->status ? 'Deactivate' : 'Activate'}}" onclick="return {{$role->status ? 'areyousure()' : 'areyousure1()'}};"><span class="shadow-none badge badge-primary">{{$role->status ? 'Deactivate' : 'Activate'}}</span></a></button></div>
                        </td>
                        <td>
                           <div class="actv7">
                              <a href="{{route('roles.show', $role->id) }}" class="edit">Edit</a>
                           </div>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('js/vendor/jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{ asset('js/datatables.min.js')}}"></script>
<script>
   function areyousure()
      {
      	return confirm('Are you sure you want to Deactive this Role?');
      }
      function areyousure1()
      {
      	return confirm('Are you sure you want to Active this Role?');
      }
       $(document).ready(function() {
           $('#example').DataTable({
               responsive: true,
               "pageLength": 10,
               aLengthMenu: [
                   [10, 25, 50, 100, 200, -1],
                   [10, 25, 50, 100, 200, "All"]
               ],
               iDisplayLength: -1,
               'order': [],
               dom: 'lBfrtip',
               buttons: [{
                   extend: 'excelHtml5',
                   title: 'Roles'
               }]
           });
       });
   $(function() {
       $(document).tooltip({
           position: {
               my: "center bottom-20",
               at: "center top",
               using: function(position, feedback) {
                   $(this).css(position);
                   $("<div>")
                       .addClass("arrow")
                       .addClass(feedback.vertical)
                       .addClass(feedback.horizontal)
                       .appendTo(this);
               }
           }
       });
   });
</script>
@endsection
