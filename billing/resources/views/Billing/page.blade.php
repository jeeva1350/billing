@extends('layouts.app')
@section('content')
<div id="content" class="repots msters sttipge">
   <section id="floorplan">
      <div class="florplan recnt">
         <div class="container">
            <div class="flrpln clearfix">
               <div class="flrheds clearfix">
                  <div class="flrhed">
                     <h1>BILLING:{{$mail}}</h1>
                  </div>
                
               </div>
               <div class="actvty7">
                  <table class="actvtytbl blck" >
                     <thead>
                     <tr>
                        <th>Product Id</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Purchase Price</th>
                        <th>Tax % Iterm</th>
                        <th>Tax Payable Iterm</th>
                       
                        <th>Total Price of the Iterm</th>
                    </tr>
                     </thead>
                     <tbody class="row_position">
                     @foreach ($purchaseItems as $item)
            <tr>
                <td>{{ $item->product_id }}</td>
                <td>{{ $item->unit_price }}</td> 
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->purchase_price }}</td>
                <td>{{ $item->tax_percentage }}%</td>
                <td>{{ $item->tax_payable }}</td>
              
                <td>{{ $item->total_price }}</td>
            </tr>
        @endforeach
                     </tbody>
                  </table>
                  <br><br>
                  <div class="pdetils">
      <h3>Purchase Details</h3>
<ul>
    <li><strong>Total price without Tax:</strong> {{ $purchaseDetails->total_without_tax }}</li>
    <li><strong>Total Tax Payable :</strong> {{ $purchaseDetails->net_price - $purchaseDetails->total_without_tax }}</li>
    <li><strong>Net Price of the Purchase Iterm:</strong> {{ $purchaseDetails->net_price }}</li>
    <li><strong>Rounded Net Price:</strong> {{ $purchaseDetails->rounded_net_price }}</li>
    <li><strong>Balance:</strong> {{ $purchaseDetails->balance }}</li>
</ul>
</div>

<div class="psdfis">
<h3>Balance Denoinations</h3>
<ul>
    @foreach ($balanceBreakdown as $denomination)
        <li>{{ $denomination['value'] }}: {{ $denomination['used'] }}</li>
    @endforeach
</ul>
            <div>
</div>
            </div>
         </div>
      </div>
    
   </section>
   <div>
  
</div>
@endsection

