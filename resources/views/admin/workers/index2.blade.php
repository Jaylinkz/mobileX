<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fontawesomeicons.com/bootstrap/icons/cart">
 {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/cart.css">  --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}
.modal form label {
	font-weight: normal;
}
</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;
			});
		} else{
			checkbox.each(function(){
				this.checked = false;
			});
		}
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
<div class="container-xl w-100 p-3">
	<div class="form-group">
		<form action="{{url('workersDashboard')}}" method="get">
			@csrf
			<div class="">
				<input type="submit" class="btn btn-info" value="back to dashboard">
			</div>
		</form>
	</div>
	@if(session('message'))
	<div>{{session('message')}}</div>
	@endif
	<div class="form-group">
	<form method="POST" action="{{route('search')}}">
		@csrf
		<div class="input-group no-border">
			<input type="text" value="" name="item" class="form-control" placeholder="Search...">
			<span class="input-group-addon">
				<i class="now-ui-icons ui-1_zoom-bold"></i>
			</span>
			<div class="form-group">
			<button class="btn btn-info">search</button>
		</div>
		</div>
	</form>
</div>
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2> <b>Manage products</b></h2>
					</div>
					{{-- <div class="float-right"> --}}
						<a href="#cartModal" data-target="#cartModal" data-toggle="modal" class="btn btn-info"><ion-icon name="cart-outline"></ion-icon>Cart({{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})</a>
						{{-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Category</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 --}}
					{{-- </div> --}}
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>



						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Name</th>
						<th>Model</th>
						<th>Category</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Cost Price</th>
						<th>Actions</th>
					</tr>

				</thead>
				<tbody>
					@foreach ($products as $product)
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>{{$product->name}}</td>
						<td>{{$product->model}}</td>
						<td>{{$product->category->name}}</td>
						<td>{{$product->quantity}}</td>
						<td><span>&#8358;</span> {{$product->price}}</td>
						<td><span>&#8358;</span> {{$product->cost_price}}</td>
						{{-- <td>{{$product->store->getName() ?? 'default'}}</td> --}}
						<td>
							@if ($cart->count())
								In cart
							@else
							<form method="POST" action="{{route('cart.add')}}">
								@csrf
								<input type="hidden" name="product_id" value="{{$product->id}}">
								<div class="form-group">
								<input type="number" name="quantity" placeholder="Quantity">
							</div>
							<div class="form-group">
								<button  class="btn btn-info position-relative" style="float: right">cart</button>
							</div>

							</form>
							@endif
                            @if (Auth::guard('work')->check())
                            <a href="{{url('sales',$product->id)}}" class="btn btn-info text-white m-100">sale</a>
							{{-- <a href="#deleteEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Add to cart">CART</i></a> --}}
                            @endif
							{{-- <a href="#deleteEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Add to cart">CART</i></a> --}}
						</td>

					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="clearfix">

				<ul class="pagination">
					{{$products->links()}}

				</ul>
			</div>
		</div>
	</div>
</div>
<!-- cart Modal HTML -->
<div id="cartModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Quantity</th>
						<th>Price</th>
					</tr>

				</thead>
				<tbody>
					@foreach($cart as $cartProduct)
					<tr>
						<td>{{$cartProduct->name}}</td>
						<td>{{$cartProduct->qty}}</td>
						<td><span>&#8358;</span> {{$cartProduct->price}}</td>

					</tr>
					@endforeach
					<div>
					<td>Total: <span>&#8358;</span>{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</td></div>
					<td>
						<div>
							<form method="POST" action="{{route('checkout')}}">
								@csrf
								<div class="form-group">
									<select  id="categories" name="categories[]"  multiple required>
										@foreach($customers as $customer)
										<option value ="{{$customer->id}}">{{$customer->name}}</option>
										@endforeach
									  </select>
								</div>
								<div class="form-group">
									<select id="sale" name="sale_type">
										<option value="credit">Credit</option>
										<option value="Cash">Cash</option>
									  </select>
								</div>
								<div class="form-group">
								<button class="btn-btn-success" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="checkout">checkout </i></button>
							</div>
						</form>
						</div>

					</td>
				</tbody>
			</table>


	</div>

</div>
</div>
<!-- Edit Modal HTML -->

<!-- Delete Modal HTML -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
