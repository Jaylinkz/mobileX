@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>User Management</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="">Home</a>
                </li>
                <li>
                    <a>User</a>
                </li>
                <li class="active">
                    <strong>All Use</strong>
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
                    <a href="{{ url('/admin/users/create') }}" class="btn btn-success btn-sm" title="Add New User">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="bold"> Add User</span>
                    </a>

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
                            {!! Form::open(['method' => 'GET', 'url' => '/admin/users', 'role' => 'search'])  !!}
                            <div class="input-group">
                                <input type="text" class="input-sm form-control" name="search" placeholder="Search">
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> Go!</button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th></th>
                            <th>#</th>
                            <th>Name </th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th>Store</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $item)
                        <tr>
                            <td><input type="checkbox" class="i-checks" name="input[]"></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
<td>{{ date('F d, Y', strtotime($item->created_at)) }}</td>
<td>{{ ($item->store) ? $item->store->name : '' }}</td>
<td>@if ($item->roles[0]->name == 'maintenance-admin') <span class="badge badge-danger"> {{ $item->roles[0]->label }}</span> @else <span class="badge badge-success"> {{ $item->roles[0]->label }}</span>
    @endif</td>
                            <td>
                                @if ($item->is_online == 1)
                                <span><strong></strong><i class="fa fa-circle fa-1x text-navy"></i> Online</span>
                                @else
                                <span><strong></strong><i class="fa fa-circle fa-1x text-danger"></i> Offline</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/admin/users/' . $item->id) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'url' => ['/admin/users', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Delete User',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach


                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
        </div>
</div>
</div>


@endsection
