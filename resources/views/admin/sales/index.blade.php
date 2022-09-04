@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Sales</h2>
        <ol class="breadcrumb">
            <li>
                <a href="">Home</a>
            </li>
            <li>
                <a>Saless</a>
            </li>
            <li class="active">
                <strong>All Sales</strong>
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
                @if ( ! Auth::user()->hasRole(['admin', 'maintenance-admin']))
                <a href="{{ url('/admin/sales/create') }}" class="btn btn-success btn-sm" title="Add New sale">
                    <i class="fa fa-laptop" aria-hidden="true"></i>
                    <span class="bold"> Make a Sale</span>
                </a>
                @endif

            <div class="ibox-tools">

                {{-- <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a> --}}
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
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/sales', 'role' => 'search'])  !!}
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
                            <th>Customer</th>
                            <th>Sale's Code</th>
                            <th>Time of Sale</th>
                            <th>Sold By</th>
                            <th>Store</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Price Type</th>
                            <th>Date</th>
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->customer->name ?? 'No Customer' }}</td>
                            <td>
                            <a href="{{ url('/admin/sales/' . $item->id) }}" title="View Sale">
                                {{ $item->code }} <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            </td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>{{ $item->user->name }}<br> <span class="badge badge-danger">{{ $item->user->roles[0]->label }}</span></td>
                            <td><span style="font-weight: bold;" class="badge badge-primary">{{ $item->user->store->name ?? '' }}</span></td>
                            <td>{{ $item->orders[0]->quantity ?? '' }}</td>
                            <td>{{ $item->orders[0]->total_price ?? '' }}</td>
                            <td>{{ $item->orders[0]->price_type ?? '' }}</td>
                            <td>{{ date('F d, Y h:i A', strtotime($item->created_at)) }}
                            </td>

                            <td>
                                {{-- <a href="{{ url('/admin/sales/' . $item->id) }}" title="View Sale"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a> --}}
                                {{-- <a href="{{ url('/admin/sales/' . $item->id . '/edit') }}" title="Edit Sale"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a> --}}
                                {{-- {!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/admin/sales', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Delete Sale',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                {!! Form::close() !!} --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $sales->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>

        </div>
    </div>
</div>
</div>

@endsection
