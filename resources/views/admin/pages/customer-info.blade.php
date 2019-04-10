@extends('admin.layouts.app')
@section('content')
@php
    $page = 'customers-list';
@endphp
<div class="content-wrapper" style="min-height: 901.2px;">
    <section class="content">
        <div class="box box-info" style="min-height: 600px;padding-left:50px;padding-right:50px;">
            <div class="box-header with-border text-center">
                <h3 class="box-title text-info">CUSTOMER</h3>
            </div>
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

                    <div class="text-center">
                            <span style="font-size:25px;" id="email">{{ $customer->email }}</span><br>
                        </div>
                    <div style=" text-align: center;"class="text-center text-info"><i>email</i></div>

                    <div class="text-center">
                            <span style="font-size:25px;" id="contact_no">{{ $customer->contact_no }}</span><br>
                        </div>
                    <div style=" text-align: center;"class="text-center text-info"><i>Contact No</i></div>
                </div>
                <div class="col-lg-8"><br>
                    <div class="text-center">
                        <h4 class="text-info">Items Ordered</h4>    
                    </div> 
                    <div id="customer-table" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="table table-responsive">
                            <table id="customer_table" class="table table-bordered table-striped dataTable text-center" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th rowspan="1" colspan="1" style="width: 150px;">Date Ordered</th>
                                        <th rowspan="1" colspan="1" style="width: 300px;">Product Description</th>
                                        <th rowspan="1" colspan="1" style="width: 200px;">Product Price</th>
                                        <th rowspan="1" colspan="1" style="width: 100px;">Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($customer_orders as $order)
                                        <tr>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->description}}</td>
                                            <td>{{$order->price}}</td>
                                            <td>{{$order->quantity}}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>@include('admin.inc.footer')
@endsection
@section('scripts')
<script>
    $(function () {
        $('#customer_table').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@endsection