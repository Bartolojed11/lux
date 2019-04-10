@extends('admin.layouts.app')
    @section('content')
    @php
        $page = 'cloth-info';
    @endphp
            <div class="content-wrapper" style="min-height: 901.2px;">
                <section class="content">
                    <div class="box box-info" style="min-height: 600px;">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title">CLOTH INFOMRATION</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-6">
                                      <div class="w3-content" style="max-width:1200px">
                                        @foreach($imgs as $img)
                                            <img class="mySlides" src="{{asset('public/storage/'.$img->img)}}" style="height:400px;width:100%">
                                        @endforeach
                                      
                                        <div class="w3-row-padding w3-section">
                                            @php
                                                $i = 1;
                                            @endphp
                                        @foreach($imgs as $img)
                                        <div class="w3-col s4">
                                            <img class="w3-opacity w3-hover-opacity-off" src="{{asset('public/storage/'.$img->img)}}" style="height:80px;width:100%" onclick="currentDiv({{ $i }})">
                                            @php $i++ @endphp
                                        </div>
                                        @endforeach
                                        </div>
                                      </div>
                                </div>
                                <div class="col-lg-6">
                                <h2 class="text-info">{{ strtoupper($cloth->description) }}</h2>
                                <h4>PRICE: &#8381;{{ ($cloth->price) }}</h4>
                                <h4 class="text-danger">SALE: {{ $cloth->sale * 100}}%</h4>
                                <h4 class="text-danger">SALE END: {{ $cloth->sale_end }}</h4>
                                @if(count($cloth_av) > 0)
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <td>Size</td>
                                                <td>Quantity</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cloth_av as $avail)
                                                <tr>
                                                    <td>{{$avail->av_size}}</td>
                                                    <td>{{$avail->qty}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                                <a href="/admin/pages/{{$cloth->id}}/edit">
                                    <button class="btn btn-info">Update</button>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- /.box-body -->
                </section>
        </div>
        @include('admin.inc.footer')
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
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
             x[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
          }
          x[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " w3-opacity-off";
        }
        </script>
    @endsection