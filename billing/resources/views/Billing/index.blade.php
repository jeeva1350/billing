@extends('layouts.app')
@section('content')
<div id="content">
   <section id="edit">
      <div class="edits">
         <div class="container">
            <div class="edit7">
               <div class="edits7 clearfix">
                  <div class="flrhed">
                     <h1>Billing</h1>
                  </div>
               </div>
               <form action="{{route('billing.new')}}" method="post" id="form" files="true" enctype="multipart/form-data">
                  <input type="hidden" name="auth_id" value="{{ Auth::user()->id }}"/>
                  <input type="hidden" name="total_without_tax" value="">
                  <input type="hidden" name="total_tax" value="">
                  <input type="hidden" name="net_price" value="">
                  <input type="hidden" name="rounded_net_price" value="">
                  @csrf
                  <div class="fodcontd">
                     <div class="lnkks">
                        <ul class="fodcateg">
                        </ul>
                     </div>
                     <div class="bakrest ptops">
                        <div class="fods">
                           <div class="edtro">
                              <div class="edtclm">
                                 <label for="" class="lbl">Customer Email</label>
                                 <div class="edtfld2">
                                    <input type="text" class="txt7bx form-control" name="c_mail" placeholder="Customer Mail" required>
                                 </div>
                              </div>
                           </div>
                           <div class="edtro">
                              <div class="edtclm">
                                 <label for="" class="lbl">Billing Section</label>
                                 <div class="edtfld2">
                                    <div id="form-container">
                                       <div class="product-row przce">
                                          <!-- Initial product row with dropdown for product ID -->
                                          <select class="txt7bx form-control product-id" name="Product[]" required>
                                             <option value="">Select Product</option>
                                             @foreach($products as $pro)
                                             <option value="{{$pro->product_id}}">{{$pro->product_id}}({{$pro->name}})</option>
                                             @endforeach                
                                          </select>
                                          <input type="number" class="txt7bx form-control quantity" name="Qty[]" placeholder="Quantity" required>
                                          <span class="product-price"></span>
                                       </div>
                                    </div>
                                    <button type="button" class="addfield" onclick="addField()">Add More</button>
                                    <div>
                                       <span id="grand-total">Grand Total: 0</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
            
         </div>
      </div>
      <div class="container">
         <div class="edit7">
            <div class="fodcontd">
               <div class="lnkks">
                  <ul class="fodcateg">
                  </ul>
               </div>
               <div class="bakrest ptops">
                  <div class="fods">
                     <div class="edtro">
                        <div class="edtclm">
                           <label for="" class="lbl1">Denoinations</label>
                        </div>
                     </div>
                     <br><br>
                     @foreach($denominations as $pro)
                     <div class="edtro">
                        <div class="edtclm">
                           <label for="" class="lbl1">{{$pro->value}}</label>
                           <div class="edtfld2">
                              <input type="text" id="count_{{$pro->id}}" class="txt7bx form-control" value="{{$pro->count}}" readonly>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     <div class="edtro">
                        <div class="edtclm">
                           <label for="" class="lbl">Cash Paid By Customer</label>
                           <div class="edtfld2">
                              <input type="text" class="txt7bx form-control" name="amount" placeholder="Amount" required>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="edtro fodsout">
                  <div class="edtclm3">
                     <div class="edtbtns clearfix">
                        <a href="{{route('denominations') }}" class="back7">Cancel</a>
                        <div class="amtantn">
                           <input type="submit" class="smits7" value="Generate Bill">
                        </div>
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
</section>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
<script>
   $(document).ready(function() {
       $('#form').validate({
           rules: {
               name: {
                   required: true
               }
           }
       });
   });
   
</script>


<script>
    // Pass PHP products to JavaScript as JSON
    const products = @json($products);
    
    function addField() {
        const container = document.getElementById("form-container");
        const newRow = document.createElement("div");
        newRow.className = "product-row przce";
        
        // Create a dropdown for product ID and a quantity input field
        newRow.innerHTML = `
            <select class="txt7bx form-control product-id" name="Product[]" required>
                <option value="">Select Product</option>
                ${products.map(product => `<option value="${product.product_id}">${product.product_id}(${product.name})</option>`).join('')}
            </select>
            <input type="number" class="txt7bx form-control quantity" name="Qty[]" placeholder="Quantity" required>
            <span class="product-price">Price: 0</span>
        `;
        
        container.appendChild(newRow);
    }
    
    function calculateTotal() {
        let grandTotal = 0;
        let totalWithoutTax = 0;
        let totalTax = 0;

        // Loop through each product row and calculate the price based on selected product and quantity
        document.querySelectorAll(".product-row").forEach(row => {
            const productId = row.querySelector(".product-id").value;
            const quantity = parseFloat(row.querySelector(".quantity").value) || 0;
            const priceSpan = row.querySelector(".product-price");

            // Find the product from the products array
            const product = products.find(p => p.product_id === productId);

            if (product && quantity > 0) {
                // Calculate prices and tax
                const unitPrice = product.price;
                const taxAmount = (unitPrice * product.tax) / 100;
                const unitPriceWithTax = unitPrice + taxAmount;
                const totalPrice = unitPriceWithTax * quantity;

                priceSpan.textContent = `Price: ${totalPrice.toFixed(2)}`;
                grandTotal += totalPrice;
                totalWithoutTax += unitPrice * quantity;
                totalTax += taxAmount * quantity;
            } else {
                priceSpan.textContent = "Price: 0";
            }
        });

        

    // Calculate rounded net price and balance
    const roundedNetPrice = Math.round(grandTotal);


        // Update hidden field values
        document.querySelector("input[name='total_without_tax']").value = totalWithoutTax.toFixed(2);
        document.querySelector("input[name='total_tax']").value = totalTax.toFixed(2);
        document.querySelector("input[name='net_price']").value = grandTotal.toFixed(2);
        document.querySelector("input[name='rounded_net_price']").value = roundedNetPrice;
        document.getElementById("grand-total").textContent = `Grand Total: ${grandTotal.toFixed(2)}`;
    }

    // Add event listener for input changes to trigger price calculation
    document.getElementById("form-container").addEventListener("input", calculateTotal);
</script>



@endsection