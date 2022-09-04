@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Products</h2>
        <ol class="breadcrumb">
            <li>
                <a href="">Home</a>
            </li>
            <li>
                <a>Products</a>
            </li>
            <li class="active">
                <strong>All Products Available</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="row">
<div class="col-lg-12">
    <div class="ibox float-e-margins">

        <div class="ibox-title">
                

            <div class="ibox-tools">

            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-5 m-b-xs">
                    {{-- <select class="input-sm form-control input-s-sm inline">
                    <option value="0">Option 1</option>
                    <option value="1">Option 2</option>
                    <option value="2">Option 3</option>
                    <option value="3">Option 4</option>
                </select> --}}
                </div>
                <div class="col-sm-4 m-b-xs">
                    {{-- <div data-toggle="buttons" class="btn-group">
                        <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> Day </label>
                        <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> Week </label>
                        <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> Month </label>
                    </div> --}}
                </div>
                <div class="col-sm-3">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/stocks', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" name="search" placeholder="Search" value="{{ request('search') }}">
                            <span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary"> Find!</button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Cost Price(RMB)</th>
                            <th>Retail Price(₦)</th>
                            <th>Wholesale Price(₦)</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($stocks as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                            {{ $item->product->manufacturer->name ?? 'No Name' }} {{ $item->product->name ?? 'No Name' }}</td>
                            <td>{{ $item->product->manufacturer->name ?? 'In valid' }}</td>
                            <td>{{ $item->product->category->name ?? '' }}</td>
                            <td>{{ $item->product->cost_price ?? ''}}</td>
                            <td>{{ number_format($item->product->cost_price * setting('1RMB') * setting('Retail-Price')) }}.00</td>
                            <td>{{ number_format($item->product->cost_price * setting('1RMB') * setting('Wholesale-Price')) }}.00</td>
                            <td>{{ $item->quantity_in_hand ?? ''  }}</td>
                            <td>
                                <a href="#{{-- {{ url('/admin/products/' . $item->id) }} --}}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $stocks->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>

        </div>
    </div>
</div>
</div>



@endsection
