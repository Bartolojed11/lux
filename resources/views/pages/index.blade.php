@extends('layouts.app')
@section('content')
<div class="w3-display-container">
    <img src="{{asset('img/3.jpg')}}" class="img-responsive w3-opacity-min shadow" width="120%;" alt="img">
    <div class="modal fade" id="signIn">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal body -->
                <div class="modal-body">
                    <center>
                        <h3><b>Lux</b></h3>
                    </center>
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Remember me
                            </label>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Sign In</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
</div>


<div class="container container-margin">
    <div class="col-lg-12">
        <center>
                <h1><b>Popular Products</b></h1>
        </center><br>
    </div>
<div class="row">
    <div class="col-lg-3 w3-display-container w3-hover-opacity w3-margin-bottom pointer">
        <img src="img/_jeans.jpg" class="" style="width:100%;height:200px" class="shadow-sm">
        <div class="carousel-caption">
            <button class="btn btn-outline-info"><b>Add to Cart</b> <span class="badge badge-info">New</span></button>
        </div>
    </div>
    <div class="col-lg-3 w3-display-container w3-hover-opacity w3-margin-bottom pointer">
        <img src="img/_shorts.jpg" class="" style="width:100%;height:200px">
        <div class="carousel-caption">
            <button class="btn btn-outline-info"><b>Add to Cart</b> <span class="badge badge-info">New</span></button>
        </div>
    </div>
    <div class="col-lg-3 w3-display-container w3-hover-opacity w3-margin-bottom pointer">
        <img src="img/_shirts.jpg" class="" style="width:100%;height:200px">
        <div class="carousel-caption">
            <button class="btn btn-outline-info"><b>Add to Cart</b> <span class="badge badge-info">New</span></button>
        </div>
    </div>

    <div class="col-lg-12">
        <center>
                <h1><b>Sale</b></h1>
        </center><br>
        <div class="row">
            <div class="col-lg-3 w3-display-container w3-hover-opacity w3-margin-bottom pointer">
                <img src="img/4.jpg" class="" style="width:100%;height:200px" class="shadow-sm">
                <div class="carousel-caption">
                    <button class="btn btn-outline-danger"><b>Add to Cart</b> <span class="badge badge-danger">New</span></button>
                </div>
            </div>
            <div class="col-lg-3 w3-display-container w3-hover-opacity w3-margin-bottom pointer">
                <img src="img/5.jpg" class="" style="width:100%;height:200px" class="shadow-sm">
                <div class="carousel-caption">
                    <button class="btn btn-outline-danger"><b>Add to Cart</b> <span class="badge badge-danger">New</span></button>
                </div>
            </div>
            <div class="col-lg-3 w3-display-container w3-margin-bottom pointer">
                    <div class="card">
                            <img src="img/6.jpg" class="" style="width:100%;height:200px" class="shadow-sm">
                            <br><button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-shopping-cart"></span><span class="badge badge-danger">30%off</span></button>
                        </div>
                    </div>
                {{-- </div> --}}
            <div class="col-lg-3 w3-display-container w3-margin-bottom pointer">
                <div class="card">
                    <div class="card-body">
                        <img src="img/6.jpg" class="" style="width:100%;height:200px" class="shadow-sm">
                        <button class="btn btn-danger btn-sm"><b>Add to Cart</b> <span class="badge badge-danger">30%off</span></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 w3-display-container w3-hover-opacity w3-margin-bottom pointer">
                <img src="img/7.jpg" class="" style="width:100%;height:200px" class="shadow-sm">
                <div class="carousel-caption">
                    <button class="btn btn-outline-danger"><b>Add to Cart</b> <span class="badge badge-danger">New</span></button>
                </div>
            </div>
            
        </div>
    </div>

</div>
<br><br>
<center>
    <h1><b>Popular Products</b></h1>
</center>
<br>
<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
        <li data-target="#demo" data-slide-to="3"></li>
        <li data-target="#demo" data-slide-to="4"></li>
    </ul>
    <div class="carousel-inner">
        <div class="row">
            <div class="col-lg-6">
                    <div class="carousel-item active">
                            <img src="img/4.jpg" alt="Los Angeles" >
                            <div class="carousel-caption">
                                <button class="btn btn-outline-light">Add to Cart <span class="badge badge-light">New</span></button>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/5.jpg" alt="Chicago" width="800" height="300">
                            <div class="carousel-caption">
                                <button class="btn btn-outline-light">Add to Cart <span class="badge badge-light">New</span></button>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/6.jpg" alt="New York" width="800" height="300">
                            <div class="carousel-caption">
                                <button class="btn btn-outline-light">Add to Cart <span class="badge badge-light">New</span></button>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/7.jpg" alt="New York" width="800" height="300">
                            <div class="carousel-caption">
                                <button class="btn btn-outline-light">Add to Cart <span class="badge badge-light">New</span></button>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/_shirts.jpg" alt="New York" width="800" height="300">
                            <div class="carousel-caption">
                                <button class="btn btn-outline-light">Add to Cart <span class="badge badge-light">New</span></button>
                            </div>
                        </div>
                
            </div>

        </div>
        
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
</div>
@endsection