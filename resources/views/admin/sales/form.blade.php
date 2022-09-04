<div class="row">

    <div class="col-md-12">
        <label for="product_infor">Scan or Enter Product Code: </label>
        <input type="text" autofocus name="product" id="product_info" class="form-control">
        <hr>
        <h1 style="color: red; font-weight: bold; font-size: 20px" class="show-product"></h1>
    </div>
    <div class="col-md-12">
        <div class="text-danger">All fields marked * are required.</div>
        {!! Form::label('customer_id', 'Customer', ['class' => 'control-label']) !!}
        <select name="customer_id" class="form-control select2_demo_1">
            <option value="">Choose a Customer</option>
            @if ($customers)
            @foreach($customers as $user)
            <option value="{{ $user->id }}">{{ $user->name }} : {{ $user->mobile_number }}</option>
            @endforeach
            @endif
        </select>
    </div>
</div>

<div class="row" id="product-entry">

</div>

<div class="row">
    <div class="col-md-12">

        {!! Form::label('remark', 'Remark', ['class' => 'control-label']) !!}
        {!! Form::textarea('remark', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}

    </div>
    <div class="col-md-12"> <br>
        {!! Form::submit($formMode === 'edit' ? 'Update' : 'Make Sale', ['class' => 'btn btn-primary pull-right btn-lg']) !!}
    </div>
</div>
@section('scripts')
<script>
    $(document).ready(function(){
        $("#product_info").on('change', function(){
            let productCode = $(this).val();
            $.ajax({
                url: "/admin/stocks/products/"+productCode,
                type: "GET",
                success: function(data) {
                    console.log(data);
                    let price = parseFloat(data.product.cost_price)*parseFloat(data.rmb_price);
                    $(".show-product").html(`<i class="fa  fa-smile-o"></i> ${data.manufacuterer.name} ${data.product.name} - ${data.category.name} | Quantity Available: ${data.stock.quantity_in_hand} | Sale Price: ${price}`);

                    $('#product-entry').prepend(`
                        <div>
                        <div class="col-md-6">
                        <label style="font-weight: bold">Product Name: <span class="text-danger">*</label>
                        <input type="hidden" value="${data.product.id}" name="product_id[]">
                        <input type="hidden" value="${data.stock.id}" name="stock_id[]">
                        <input value="${data.manufacuterer.name} ${data.product.name} - ${data.category.name} #${data.product.code}" type="text" readonly="" class="form-control">
                        </div>
                        <div class="col-md-2">
                        <label style="font-weight: bold">Quantity <span class="text-danger">*</label>
                        <input required="" type="number" class="form-control" placeholder="Quanity" name="quantity[]">
                        </div>
                        <div class="col-md-2">
                        <label style="font-weight: bold">Payment Mode <span class="text-danger">*</label>
                        <select name="is_paid[]" id="" class="form-control" required="">
                        <option value="">--Select mode--</option>
                        <option value="Credit">Credit</option>
                        <option value="Cash">Cash</option>
                        <option value="POS">POS</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        </select>
                        </div>

                        <label>&nbsp;</label> <br>
                        <button type="button" class="delete btn btn-danger"> <i class="fa fa-times"></i>Remove</button>
                        </div>
                        `);
                    $("#product_info").val("");
                    $("#product_info").focus();

                                //End of product prepend
                            },
                            error: function(error){
                                console.log(error)
                                $(".show-product").html(`<i class="fa  fa-frown-o"></i> ${error.responseJSON.error}`);
                                $("#product_info").val("");
                                $("#product_info").focus();
                            }
                        });
        })
        $(document).on("click", "#product-entry .delete", function (e) {
            e.preventDefault();
            $(this).parent().remove();
            $("#product_info").focus();
        });

                    // $(".product").on("change", function(){
                    //     let quantity = $(this).find(':selected').data('product');
                    //     let retail = $(this).find(':selected').data('retail');
                    //     let wholesale = $(this).find(':selected').data('wholesale');
                    //     $('.show-product').text("Quantity Available: "+quantity+" | Retail Price: ₦"+retail+" | Wholesale Price: ₦"+wholesale);
                    // });
// Pricing add
function newMenuItem() {
    var newElem = $('tr.pricing-list-item').first().clone();
    newElem.find('input[type=number]').val('');
    newElem.find('select').val('');
    newElem.find('select').addClass('chosen-select');
        newElem.find('input[type=radio]').prop('checked', false); // Unchecks it
        newElem.appendTo('table#pricing-list-container');
    }
    if ($("table#pricing-list-container").is('*')) {
        $('.add-pricing-list-item').on('click', function (e) {
            e.preventDefault();
            newMenuItem();
        });
        
    }
});
</script>
@endsection
