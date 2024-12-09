@extends('layouts.app')
@section('content')
<div id="content" class="repots msters sttipge">
   <section id="floorplan">
      <div class="florplan recnt">
         <div class="container">
            <div class="flrpln clearfix">
               <div class="flrheds clearfix">
                  <div class="flrhed">
                     <h1>PRODUCTS</h1>
                  </div>
                  <div class="addbtn"><a href="{{route('products.create')}}">Add</a></div>
               </div>
               <div class="actvty7">
                  <table class="actvtytbl blck" >
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>Name</th>
                           <th>Product Id</th>
                           <th>Available Stocks</th>
                           <th>Price Per Unit</th>
                           <th>Tax Percentage</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody class="row_position">
                        @foreach($products as $pro)
                        <tr>
                           <td>{{$pro->id}}</td>
                           <td>{{$pro->name}}</td>
                           <td>{{$pro->product_id}}</td>
                           <td>{{$pro->available_stocks}}</td>
                           <td>{{$pro->price_per_unit}}</td>
                           <td>{{$pro->tax_percentage}}</td>
                           <td>
                              <div class="actv7">
                                 <a href="{{route('products.show',$pro->id) }}" class="edit">Edit</a>
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

