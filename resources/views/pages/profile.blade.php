@extends('layouts.app')
@section('content')
        <div class="container margin-topbottom">
            <div class="row">
                <div class="col-lg-4 col-sm-12 w3-margin-bottom">
                    <div class="card">
                        <div class="card-body">
                            <img class="shadow-sm thumbnail trynibi" style="width:100%;max-height:300px;height:300px;" src="img/1.jpg" alt="Card image">
                            <h5></h5>
                        </div>
                    </div>
                </div>
                @include('inc.tabpane')
            </div>
        </div>
@endsection