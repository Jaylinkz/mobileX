@extends('layouts.master')

@section('content')


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Sale's details</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="/admin">Home</a>
                        </li>
                        <li class="active">
                            <strong>Sale's detail</strong>
                        </li>
                    </ol>
                </div>
            </div>
            {{-- <a href="{{ url('/admin/sales') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/sales', $sale->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Sale',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!} --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        
                                        
                                        <h2><a href="{{ url('/admin/sales') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> {{ $sale->code }}</h2>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">
                                        <dt>Payment Mode:</dt> <dd>
                                            @if ($sale->orders()->first()->is_paid == "Credit")
                                            <span class="label label-danger">{{ $sale->orders()->first()->is_paid }}</span>
                                            @else
                                            <span class="label label-primary">{{ $sale->orders()->first()->is_paid }}</span>
                                            @endif
                                        </dd>
                                        <br>
                                        <dt>Sold By:</dt> <dd>{{ $sale->user->name }}</dd>
                                        <br>
                                        <dt>Sale's Code:</dt> <dd>  {{ $sale->code }} </dd>
                                        <br>
                                        <dt>Customer:</dt> <dd><a href="#" class="text-navy"> {{ $sale->customer->name ?? "No Customer name" }}</a> </dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Date Sold:</dt> <dd> {{ date('d.m.Y h:i:s a', strtotime($sale->created_at)) }}</dd>
                                        <br>
                                        <dt>Date Updated:</dt> <dd>  {{ date('d.m.Y h:i:s a', strtotime($sale->updated_at)) }} </dd>

                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Remark:</dt>
                                        <dd>
                                            <small><strong>{{ $sale->remark }}</strong></small>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab-1" data-toggle="tab">Orders (Products Sold) <span class="label label-danger">{{ count($sale->orders)}}</span></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                <div class="tab-content">
                                <div class="tab-pane active" id="tab-1">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Returned</th>
                                            <th>Unit Price (₦)</th>
                                            <th>Total (₦)</th>
                                            <th>Payment Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sale->orders as $item)
                                        <tr>
                                            
                                            <td>
                                                {{ $item->product->manufacturer->name }}
                                               {{ $item->product->name }}
                                            </td>
                                            <td>
                                               {{ $item->product->category->name }}
                                            </td>
                                            <td>
                                               {{ $item->quantity }}
                                            </td>
                                            <th>
                                                @if ($item->is_returned > 0)
                                                <span class="badge badge-danger"> {{ $item->is_returned }}</span>
                                                @else
                                                <span class="badge badge-danger"> {{ $item->is_returned }}</span>
                                                @endif
                                            </th>
                                            <td>
                                            {{ $item->unit_price }}
                                            </td>
                                            <td>
                                           
                                            @php
                                            $total += $item->total_price
                                            @endphp
                                            {{ $item->total_price }}
                                            </td>

                                            <td>
                                                @if ($item->is_paid == "Credit")
                                                <span class="label label-danger"><i class="fa fa-times"></i> {{ $item->is_paid }}</span>
                                                @else
                                                <span class="label label-primary"><i class="fa fa-check"></i> {{ $item->is_paid }}</span>
                                                @endif
                                            </td>

                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    <hr />
<div class="lead text-right">Grand Total (₦) = {{ number_format($total, 2) }}</div>
<hr />
<div class="text-right">
    <a target="_blank" class="btn btn-primary btn-rounded" href="{{ url('admin/sales/receipt', ['id' => $sale->id])}}">Print Receipt</a> &nbsp; &nbsp; &nbsp;
    <a target="_blank" class="btn btn-primary btn-rounded" href="{{ url('admin/sales/invoice', ['id' => $sale->id])}}">Generate Invoice</a></div>
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
            <div class="col-lg-3">
                {{-- <div class="wrapper wrapper-content project-manager">
                    <h4>Project description</h4>
                    <img src="img/zender_logo.png" class="img-responsive">
                    <p class="small">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look
                        even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing
                    </p>
                    <p class="small font-bold">
                        <span><i class="fa fa-circle text-warning"></i> High priority</span>
                    </p>
                    <h5>Project tag</h5>
                    <ul class="tag-list" style="padding: 0">
                        <li><a href="#"><i class="fa fa-tag"></i> Zender</a></li>
                        <li><a href="#"><i class="fa fa-tag"></i> Lorem ipsum</a></li>
                        <li><a href="#"><i class="fa fa-tag"></i> Passages</a></li>
                        <li><a href="#"><i class="fa fa-tag"></i> Variations</a></li>
                    </ul>
                    <h5>Project files</h5>
                    <ul class="list-unstyled project-files">
                        <li><a href="#"><i class="fa fa-file"></i> Project_document.docx</a></li>
                        <li><a href="#"><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                        <li><a href="#"><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                        <li><a href="#"><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
                    </ul>
                    <div class="text-center m-t-md">
                        <a href="#" class="btn btn-xs btn-primary">Add files</a>
                        <a href="#" class="btn btn-xs btn-primary">Report contact</a>

                    </div>
                </div> --}}
            </div>
        </div>

@endsection
