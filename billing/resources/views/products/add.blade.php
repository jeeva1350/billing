@extends('layouts.app')
@section('content')
<div id="content">
   <section id="edit">
      <div class="edits">
         <div class="container">
            <div class="edit7">
               <div class="edits7 clearfix">
                  <div class="flrhed">
                     <h1>+Add products</h1>
                  </div>
               </div>
               <form action="{{route('products.new')}}" method="post" id="form" files="true" enctype="multipart/form-data">
                  <input type="hidden" name="auth_id" value="{{ Auth::user()->id }}"/>
                  @csrf
                  @if(!empty($item))
                  <input type="hidden" name="item_id" value="{{ $item->id }}"/>
                  @endif
                  <div class="fodcontd">
                     <div class="lnkks">
                        <ul class="fodcateg">
                           <li class="selts"><a href="" data-sects="0">products</a></li>
                        </ul>
                     </div>
                     <div class="bakrest ptops">
                        <div class="fods">
                           <div class="edtro">
                              <div class="edtclm">
                                 <label for="" class="lbl">Product Name</label>
                                 <div class="edtfld2">
                                    <input type="text" class="txt7bx form-control" name="name" placeholder="Product Name" value="{{ !empty($item) ? $item->name : ''}}" required>
                                 </div>
                              </div>
                           </div>
                           <div class="edtro">
                              <div class="edtclm">
                                 <label for="" class="lbl">Product Id</label>
                                 <div class="edtfld2">
                                    <input type="text" class="txt7bx form-control" name="product_id" placeholder="P001" value="{{ !empty($item) ? $item->product_id : ''}}" required>
                                 </div>
                              </div>
                           </div>
                           <div class="edtro">
                              <div class="edtclm">
                                 <label for="" class="lbl">Available Stocks</label>
                                 <div class="edtfld2">
                                    <input type="text" class="txt7bx form-control" name="available_stocks" placeholder="Available Stocks" value="{{ !empty($item) ? $item->available_stocks : ''}}" required>
                                 </div>
                              </div>
                           </div>
                              
                             
                           <div class="edtro">
                              <div class="edtclm">
                                 <label for="" class="lbl">Price Per Unit</label>
                                 <div class="edtfld2">
                                    <input type="text" class="txt7bx form-control" name="price_per_unit" placeholder="Price Per Unit(140.00)" value="{{ !empty($item) ? $item->price_per_unit : ''}}" required>
                                 </div>
                              </div>
                           </div>
                           <div class="edtro">
                              <div class="edtclm">
                                 <label for="" class="lbl">Tax Percentage</label>
                                 <div class="edtfld2">
                                    <input type="text" class="txt7bx form-control" name="tax_percentage" placeholder="Tax Percentage(2.0)" value="{{ !empty($item) ? $item->tax_percentage : ''}}" required>
                                 </div>
                              </div>
                           </div> 
                        </div>
                        
                        </div>
                        
                        <div class="edtro fodsout">
                           <div class="edtclm3">
                              <div class="edtbtns clearfix">
                                 <div class="amtantn">
                                    <input type="submit" class="smits7" value="submit">
                                 </div>
                                 <a href="{{route('products') }}" class="back7">back</a>
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
=
<script src="{{ asset('js/vendor/jquery-3.7.0.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{ asset('js/jquery.validate.min.js')}}"></script>

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


@endsection