@extends('layouts.app')
@section('content')
<div id="cart" class="container margin-topbottom" style="min-height:75px;">
        <div class="row">
                <div class="col-lg-3 w3-display-container w3-margin-bottom pointer">
                    <div class="card">
                        <img src="img/_jeans.jpg" class="" style="width:100%;height:130px" class="shadow-sm">
                        <div class="card-body">
                            <small>Black Jeans</small><br>
                            <small>P399.00</small><br>
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 w3-display-container w3-margin-bottom pointer">
                    <div class="card">
                        <img src="img/_shorts.jpg" class="" style="width:100%;height:130px">
                        <div class="card-body">
                            <small>Women's Short</small><br>
                            <small>P457.00</small><br>
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 w3-display-container w3-margin-bottom pointer">
                    <div class="card">
                        <img src="img/_shirts.jpg" class="" style="width:100%;height:130px">
                        <div class="card-body">
                            <small>Men's Shirt</small><br>
                            <small>P699.00</small><br>
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 w3-display-container w3-margin-bottom pointer">
                    <div class="card">
                        <img src="img/_jeans.jpg" class="" style="width:100%;height:130px">
                        <div class="card-body">
                            <small>Black Jeans</small><br>
                            <small>P399.00</small><br>
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </div>
                    </div>
                </div>
            </div><hr>
            <center>
                <button class="btn btn-info">Purchase </button>
                <button class="btn btn-danger">Cancel</button>
            </center><br>
    </div>
@endsection