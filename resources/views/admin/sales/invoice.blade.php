@extends('layouts.master')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Invoice</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="/admin">Home</a>
                        </li>
                        <li>
                            Sales Order
                        </li>
                        <li class="active">
                            <strong>Invoice</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        {{-- <a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                        <a href="#" class="btn btn-white"><i class="fa fa-check "></i> Save </a> --}}
                        <a href="{{ url('admin/sales/invoice-print', ['id' => $sale->id])}}" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>From:</h5>
                                    <address>
                                        <strong>{{ setting('company') }}.</strong><br>
                                        {{ setting('address') }}<br />

                                        <abbr title="Phone">Phone: </abbr> {{ setting('phone') }}
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No.</h4>
                                    <h4 class="text-navy">{{ $sale->code }}</h4>
                                    <span>To:</span>
                                    <address>
                                        <strong>{{ $sale->customer->name ?? 'No Customer name'}}.</strong>{{-- <br>
                                        112 Street Avenu, 1080<br>
                                        Miami, CT 445611<br> --}}
                                        <br />
                                        <abbr title="Phone">Phone:</abbr> {{ $sale->customer->mobile_number ?? 'No Phone Number' }}
                                    </address>
                                    <p>
                                        <span><strong>Invoice Date:</strong> {{ date('F d, Y', strtotime($sale->created_at))}}</span><br/>
                                        {{-- <span><strong>Due Date:</strong> March 24, 2014</span> --}}
                                    </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Product List</th>
                                        <th>Payment Status</th>
                                        <th>Product Order Code</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sale->orders as $item)
                                        <tr>
                                            <td>
                                               <div><strong>
                                                   {{ $item->product->name }}
                                               </strong></div>
                                            </td>

                                            <td>
                                                @if ($item->is_paid == "Credit")
                                                <span class="label label-danger"><i class="fa fa-times"></i> {{ $item->is_paid }}</span>
                                                @else
                                                <span class="label label-primary"><i class="fa fa-check"></i> {{ $item->is_paid }}</span>
                                                @endif
                                            </td>
                                            <td>
                                               {{ $item->code }}
                                            </td>

                                            <td>
                                               {{ $item->quantity }}
                                            </td>
                                            <td>
                                            {{ $item->unit_price }}
                                            </td>
                                            <td>
                                            
                                            @php
                                            $total += $item->total_price
                                            @endphp
                            {{ $item->total_price }}.00
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                {{-- <tr>
                                    <td><strong>Sub Total :</strong></td>
                                    <td>$1026.00</td>
                                </tr>
                                <tr>
                                    <td><strong>TAX :</strong></td>
                                    <td>$235.98</td>
                                </tr> --}}
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td><h2>₦ {{ $total }}.00</h2></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                </div>
            </div>
        </div>
@endsection

