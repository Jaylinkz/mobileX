@extends('layouts.master')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="@if($user->gender == 'male') {{ asset('img/male.png') }} @else {{ asset('img/female.png') }} @endif"" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    {{ $user->name}}
                                </h2>
                                <h4> {{ $user->roles[0]->label }} </h4>
                                {{-- <small>
                                    There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form Ipsum available.
                                </small> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                <strong>{{ count($today_sale) }}</strong> Today Sales
                            </td>
                            <td>
                                <strong>{{ count($total_sale) }}</strong> Total Sales
                            </td>

                        </tr>
                        <tr>
                          {{--   <td>
                                <strong>61</strong> Comments
                            </td>
                            <td>
                                <strong>54</strong> Articles
                            </td> --}}
                        </tr>
                        <tr>
                            <td>
                                <strong></strong>
                            </td>
                            <td>
                                <strong></strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    @foreach($today_sale as $sale)
                        @foreach ($sale->orders as $order)
                        @if ($order->quantity >= $order->product->wholesale_min_quantity)
                        @php
                        $total += $order->quantity * $order->product->whole_sale_price
                        @endphp

                        @else

                        @php
                        $total += $order->quantity * $order->product->retail_price
                        @endphp

                        @endif
                        @endforeach
                    @endforeach
                    <small>Sales amount in last 24 hours</small>
                    <h2 class="no-margins">₦ {{ $total }}.00</h2>
                    <div id="sparkline1"></div>
                </div>


            </div>
            <div class="row">

                <div class="col-lg-3">

                    <div class="ibox">
                        <div class="ibox-content">
                            <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                <h3>About {{ $user->name}}</h3>

                            {{-- <p class="small">
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't.
                                <br/>
                                <br/>
                                If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                anything embarrassing
                            </p> --}}

                            <p class="small font-bold">
                                @if ($user->is_online == 1)
                                <span><strong>Status: </strong><i class="fa fa-circle text-navy"></i> Online</span>
                                @else
                                <span><strong>Status: </strong><i class="fa fa-circle text-danger"></i> Offline</span>
                                @endif
                                </p>

                        </div>
                    </div>




                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>Private message</h3>

                            <p class="small">
                                Send private message to Manager
                            </p>

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="email" class="form-control" placeholder="Message subject">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" placeholder="Your message" rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary btn-block">Send</button>

                        </div>
                    </div>

                </div>



                <div class="col-lg-9">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Basic activity stream</h5>
                            </div>

                            <div class="ibox-content">
                            @if ($activity_logs)
                            @foreach ($activity_logs as $log)
                            <div class="stream-small">
                                    @if($log->log_name == 'login')
                                <span class="label label-primary"> Login</span>
                                    @elseif($log->log_name == 'logout')
                                <span class="label label-danger"> Logout</span>
                                @elseif($log->log_name == 'sales')
                                <span class="label label-warning"> Sales</span>
                                    @else
                                    <span class="label label-success"> Default</span>
                                    @endif
                                        <span style="font-weight: bold">{{ $log->created_at->diffForHumans() }}</span>
                                    <span class="text-muted"> at {{ date('h:s:i a', strtotime($log->created_at))}}  </span>   {{ $log->description }} <a href="#">{{ $log->subject_type }}</a>
                            </div>
                            @endforeach
                            @else
                            <div>Sorry! No activity Log yet</div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
