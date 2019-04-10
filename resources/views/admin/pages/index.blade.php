@extends('admin.layouts.app')
@section('content')
@php
    $page = 'index';
@endphp
        <div class="content-wrapper" style="min-height: 901.2px;">
            <section class="content">
                <div class="box box-info" style="min-height: 600px;">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title">Customer Orders</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="admin_tbl" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1" style="width: 270px;">CUSTOMER NAME</th>
                                                <th rowspan="1" colspan="1" style="width: 270px;">CUSTOMER EMAIL</th>
                                                <th rowspan="1" colspan="1" style="width: 187.4px;">DATE ORDERED</th>
                                                <th rowspan="1" colspan="1" style="width: 40.8px;"></th>
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
                                                            <a href="/admin/pages/customer/{{$customer->id}}/cart">
                                                                <button class="btn btn-default btn-sm">
                                                                    <span class="fa fa-eye"></span>
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="/admin/pages/customer/cart/confirm" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $customer->id }}">
                                                                <button class="btn btn-info btn-sm" type="submit">
                                                                    <span class="fa fa-check"></span>
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
                    <!-- /.box-body -->
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