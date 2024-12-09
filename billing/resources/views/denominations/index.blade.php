@extends('layouts.app')
@section('content')
<div id="content" class="repots msters sttipge">
   <section id="floorplan">
      <div class="florplan recnt">
         <div class="container">
            <div class="flrpln clearfix">
               <div class="flrheds clearfix">
                  <div class="flrhed">
                     <h1>denominations</h1>
                  </div>
                  <div class="addbtn"><a href="{{route('denominations.create')}}">Add</a></div>
               </div>
               <div class="actvty7">
                  <table class="actvtytbl blck" >
                     <thead>
                        <tr>
                           
                           <th>value</th>
                           <th>Count</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody class="row_position">
                        @foreach($denominations as $pro)
                        <tr>
                           <td>{{$pro->value}}</td>
                           <td>{{$pro->count}}</td>
                           <td>
                              <div class="actv7">
                                 <a href="{{route('denominations.show',$pro->id) }}" class="edit">Edit</a>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection

