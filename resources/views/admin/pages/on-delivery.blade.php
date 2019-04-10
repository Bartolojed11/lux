@extends('admin.layouts.app')
@section('content')
@php
    $page = 'on-delivery';
@endphp
<div class="content-wrapper" style="min-height: 901.2px;">
    <section class="content">
        <div class="box box-info" style="min-height: 600px;padding-left:50px;padding-right:50px;">
            <div class="box-header with-border text-center">
                <h3 class="box-title text-info">On Delivery</h3>
            </div>
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="container-fluid">
                        <div class="table table-responsive">
                            <table id="admin_tbl" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th rowspan="1" colspan="1" style="width: 270px;">CUSTOMER NAME</th>
                                        <th rowspan="1" colspan="1" style="width: 270px;">CUSTOMER EMAIL</th>
                                        <th rowspan="1" colspan="1" style="width: 187.4px;">DATE ORDERED</th>
                                        <th rowspan="1" colspan="1" style="width: 40.8px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td class="sorting_1">{{$customer->fullname}}</td>
                                                <td>{{$customer->email}}</td>
                                                <td>{{$customer->created_at}}</td>
                                                <td class="text-center">
                                                    <form action="/admin/pages/customer/cart/delivered" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$customer->id}}">
                                                        <button class="btn btn-success btn-sm" type="submit">
                                                            <span class="fa fa-check-circle"> Delivered</span>
                                                        </button>
                                                    </form>
                                                </td>
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
</div>
@include('admin.inc.footer')
@endsection
@section('scripts')
<script>
    $(function () {
        $('#admin_tbl').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@endsection