@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Sales</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">Home</a>
            </li>
            <li>
                <a>Sales</a>
            </li>
            <li class="active">
                <strong>Create New Sales Request</strong>
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
                <h5>Create New Sales Request</h5>
                <div class="ibox-tools">
                    {{-- <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    +36+
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
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                        <div class="col-md-offset-1">
                        {!! Form::open(['url' => '/admin/sales', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.sales.form', ['formMode' => 'create'])

                        {!! Form::close() !!}
                        </div>

            </div>
        </div>
    </div>
</div>

@endsection
