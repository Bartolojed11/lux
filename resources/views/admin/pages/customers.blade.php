@extends('admin.layouts.app')
@section('content')
@php
    $page = 'customers-list';
@endphp
<div class="content-wrapper" style="min-height: 901.2px;">
    <section class="content">
        <div class="box box-info" style="min-height: 600px;">
            <div class="box-header text-center"><br>
                <h3 class="box-title">LIST OF CUSTOMERS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding-left:40px;padding-right:40px;">
                <div id="users-table" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="table table-responsive">
                        <table id="users_table" class="table table-bordered table-striped dataTable text-center" role="grid">
                            <thead>
                                <tr role="row">
                                    <th rowspan="1" colspan="1" style="width: 150px;">Profile</th>
                                    <th rowspan="1" colspan="1" style="width: 100px;">Fullname</th>
                                    <th rowspan="1" colspan="1" style="width: 200px;">Contact</th>
                                    <th rowspan="1" colspan="1" style="width: 200px;">Email</th>
                                    <th rowspan="1" colspan="1" style="width: 100px;color:red;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($customers as $customer)
                                    <tr>                                    
                                        <td><img src="{{asset('public/storage/profiles/'.$customer->profile_picture)}}"
                                            alt="profile picture" style="border-radius:50%;height:height:30px;width:30px;"></td>
                                        <td>{{ $customer->fullname }}</td>
                                        <td>{{ $customer->contact_no }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>
                                            <a href="/admin/pages/list/customer/{{ $customer->id }}/order">
                                                <button class="btn btn-info btn-sm">View Orders</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        
                    
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
        $('#users_table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false,
            "lengthMenu": [[10, 25, 50], [10, 25, 50]],
        })
    })
</script>
@endsection