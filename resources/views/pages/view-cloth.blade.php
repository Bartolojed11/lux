@extends('layouts.app')
@section('content')
        <div class="container container-margin" style="margin-top:11.4em;margin-bottom:5em;">
            <div class="row">
                <div class="col-lg-5 w3-display-container w3-margin-bottom">
                    <div class="" style="width:100%;max-width:600px;">
                        <img class="mySlides" src="img/_jeans.jpg" style="width:100%">
                        <img class="mySlides w3-grayscale" src="img/_jeans.jpg" style="width:100%">
                        <img class="mySlides w3-sepia" src="img/_jeans.jpg" style="width:100%">

                        <div class="w3-row-padding w3-section">
                            <div class="w3-col s4">
                                <img class="demo w3-opacity" src="img/_jeans.jpg"
                                     style="width:100%" onclick="currentDiv(1)">
                            </div>
                            <div class="w3-col s4">
                                <img class="demo w3-opacity" src="img/_jeans.jpg"
                                     style="width:100%" onclick="currentDiv(2)">
                            </div>
                            <div class="w3-col s4">
                                <img class="demo w3-opacity" src="img/_jeans.jpg"
                                     style="width:100%" onclick="currentDiv(3)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12" style="margin-top:-15px;padding-left:4em;">
                    <h1>Jeans 1</h1>
                    <h4>Price: 3000</h4>
                    <h4>Available Colors. Sizes and Quantity: </h4> <br>
                    <div class="row">
                        <div class="col-lg-2 col-sm-3 col-md-3">
                            <div style="height:50px;width:50px;background-color:gray;border-radius:50%;display:inline-block;margin-right:20px">
                            </div>
                            <p>S,M,L <br> 4,1,2<p>
                        </div>
                        <div class="col-lg-2 col-sm-3 col-md-3">
                            <div style="height:50px;width:50px;background-color:black;border-radius:50%;display:inline-block;margin-right:20px">
                            </div>
                            <p>S,M,L <br> 4,1,2<p>
                        </div>
                        <div class="col-lg-2 col-sm-3 col-md-3">
                            <div style="height:50px;width:50px;background-color:darkblue;border-radius:50%;display:inline-block;margin-right:20px">
                            </div>
                            <p>S,M,L <br> 4,1,2<p>
                        </div>
                    </div><br><br>
                    <button class="btn btn-info">Buy</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-default">Add to Cart</button>
                </div>
            </div>
        </div>
        @endsection
        @section('scripts')
    <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function currentDiv(n) {
                showDivs(slideIndex = n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                if (n > x.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = x.length
                }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                }
                x[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " w3-opacity-off";
            }
            </script>
@endsection