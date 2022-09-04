@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Sale's Receipt</h2>
		<ol class="breadcrumb">
			<li>
				<a href="/admin">Home</a>
			</li>
			<li class="active">
				<strong>Sale's Receipt</strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="m-b-md">


								<h2><a href="{{ url('/admin/sales') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> <br><br> {{ $sale->code }}</h2>
							</div>
							<div class="ticket" id="printableArea">
								{{-- <img src="" alt="Logo"> --}}
								<h3>{{ setting('company') ?? '-' }}.</h3>
								<p class="centered">Receipt
									<br> {{ setting('address') ?? '-' }}
									<table>
										<thead>
											<tr>
												<th class="quantity">Qty.</th>
												<th class="description">Des.</th>
												<th class="price">₦</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($sale->orders as $item)
											<tr>
												<td class="quantity">{{ $item->quantity ?? '-' }}</td>
												<td class="description"> {{ $item->product->manufacturer->name ?? '' }} {{ $item->product->name ?? '' }} ({{ $item->product->category->name ?? '' }}) </td>
												<td class="price">{{ number_format($item->unit_price, 2) }}</td>
											</tr>
											@php
                                            $total += $item->total_price
                                            @endphp
                            {{ $item->total_price }}
											@endforeach
											<tr>
												<td class="quantity"></td>
												<td class="description">TOTAL</td>
												<td class="price">₦{{ number_format($total, 2) }}</td>
											</tr>
										</tbody>
									</table>
									<p class="centered">Thanks for your purchase!
										</p>
										<style type="text/css">
			td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}

		</style>
									</div>
<input class="btn btn-primary" id="print-btn" type="button" onclick="printDiv('printableArea')" value="Print page" />								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<script type="text/javascript">
    function printDiv(divName) {
      document.getElementById('print-btn').style.display="none";
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
  }
</script>
		
@endsection