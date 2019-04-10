@extends('admin.layouts.app')
@section('content')
@php
    $page = 'index';
@endphp
<div class="content-wrapper" style="min-height: 901.2px;">
    <section class="content">
        <div class="box box-info" style="min-height: 600px;">
            <div class="box-header with-border text-center">
                <h3 class="box-title text-info">CUSTOMER CART</h3>
            </div>
            <div class="box-body" style="padding-left:50px;padding-right:50px;">
                <div class="row">
                    <div class="col-lg-4">
                            <h3 class="text-info text-center">Customer Details</h3><hr>
                            <div class="text-center">
                            <img src="{{asset('public/storage/profiles/'.$customer->profile_picture)}}"
                                style="width:120px;height:120px;border-radius:50%;" alt="profile_picture">
                            </div>
                            <br>
                            <br>
                                <div class="text-center">
                                    <span style="font-size:25px;" id="full_name">{{ $customer->fname.' '.$customer->mname.' '.$customer->lname }}</span><br>
                                </div>
                            <div style=" text-align: center;"class="text-center text-info"><i>fullname</i></div>
                            <form action="/admin/pages/customer/message" method="post">
                                @csrf
                            <input type="hidden" name="id" value="{{$customer->id}}">
                                <div class="form-group">
                                        <label for="message">Message:</label>
                                        <textarea class="form-control" rows="5" name="message" id="message" required></textarea>
                                </div>
                                <button class="btn btn-warning btn-block btn-sm" type="submit">
                                        <span class="fa fa-envelope"> Send Message</span>
                                </button>
                            </form>
                            <form action="/admin/pages/customer/cart/confirm" method="post" style="margin-top:4px;">
                                @csrf
                                <input type="hidden" name="id"value="{{$customer->id}}" >
                                <button class="btn btn-info btn-block btn-sm" stype="submit">
                                    <span class="fa fa-check "> Confirm Request</span>
                                </button>
                            </form>
                    </div>
                    <div class="col-lg-8" id="cart">
                        <div class="row">
                            @foreach($req as $order)
                                <div class="col-lg-3" style="padding:4px;">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{'/public/storage/'.$order->img}}" alt="order images"
                                                style="width:100%;height:120px;border-radius:8px 8px 0px 0px">
                                            <div class="card-message">
                                                <span>Item: {{$order->description}}</span><br>
                                                <span class="text-left"style="float:left">Qty. {{$order->quantity}}</span>
                                                <span class="text-right" style="float:right;">Size: {{$order->size}}</span>
                                                <p style="clear:both;">{{$order->price}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('admin.inc.footer')
@endsection