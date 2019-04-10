<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Lux | Admin</title>
        <link rel="stylesheet" href="{{asset('css/admin_bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skin-black.css')}}">
        <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/slideshow.css')}}">
        <style>
            .margin-topbottom {
                margin-top: 10em;
                margin-bottom: 10em;
            }
            .margpad-md{
                margin-top: 3em;
                padding-bottom: 4em;
            }
            .img_input{
                width:100px;
                color:transparent;
            }
            #cart{
                height:500px;
                overflow-x:auto;
                border:1px solid lightgray;
            }
            #cart::-webkit-scrollbar {
                width: 8px;
            }
            #cart::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            }
            #cart::-webkit-scrollbar-thumb {
                background-color: darkgrey;
                outline: 1px solid slategrey;
            }
            .card-body {
                border:1px solid gray;
                border-radius:8px;
                height:220px;
            }
            .card-message {
                padding-left:4px;
                padding-right:4px;
                margin-top:4px;
            }
            
        </style>
    </head>
    <body class="sidebar-mini skin-black" style="height: auto; min-height: 100%;">
        <div class="wrapper" style="height: auto; min-height: 100%;">
        @include('admin.inc.head')
        @include('admin.inc.sidebar')
        @yield('content')

        
        </div>
    </div>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/a_bootstrap.min.js')}}"></script>
        <script src="{{asset('js/adminlte.min.js')}}"></script>
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
        @yield('scripts')
    </body>
</html>