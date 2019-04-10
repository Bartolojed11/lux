@extends('admin.layouts.app')
    @section('content')
    @php
        $page = 'cloth-category-list';
        $cloth_list_cat = $item;
    @endphp
            <div class="content-wrapper" style="min-height: 901.2px;">
                <section class="content">
                    <div class="box box-info" style="min-height: 600px;">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title">LIST OF {{ strtoupper($item) }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="cloth-table" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="container-fluid">
                                            <div class="table table-responsive">
                                            <table id="admin_tbl" class="table table-bordered table-striped dataTable text-center" role="grid">
                                                <thead>
                                                    <tr role="row">
                                                        <th rowspan="1" colspan="1" style="width: 150px;">DESCRIPTION</th>
                                                        <th rowspan="1" colspan="1" style="width: 100px;">ORGINAL PRICE</th>
                                                        <th rowspan="1" colspan="1" style="width: 200px;">DISCOUNT</th>
                                                        <th rowspan="1" colspan="1" style="width: 100px;">SALE ENDS</th>
                                                        <th rowspan="1" colspan="1" style="width: 100px;border-right:0px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @if(count($cloths) > 0)
                                                            @foreach($cloths as $cloth)
                                                                    <tr>
                                                                        <td style="width:250px;">{{ $cloth->description }}</td>
                                                                        <td>&#8381; {{ $cloth->price }}</td>
                                                                        <td  style="width:250px;">{{ ($cloth->sale) * $cloth->price }}</td>
                                                                        <td>{{ $cloth->sale_end }} </td>
                                                                        <td colspan="1">
                                                                            <a href="/admin/pages/{{$cloth->id}}/info">
                                                                                <button class="btn btn-sm btn-default update-this-item" type="button">
                                                                            <span class="fa fa-eye"></span></button></a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <a href="/admin/pages/{{$cloth->id}}/edit"><button class="btn btn-sm btn-info update-this-item" type="button">
                                                                            <span class="fa fa-edit"></span></button></a>
                                                                        </td>
                                                                        {{-- <td>
                                                                            <form action="/admin/pages/{{$cloth->id}}" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="btn btn-sm btn-danger" value="{{$cloth->id}}" type="submit"><span class="fa fa-trash"></span></button>
                                                                        </form></td> --}}
                                                                    </tr>
                                                            @endforeach
                                                        @endif
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
    </div>
    @endsection
    @section('scripts')
    <script>
        $(function () {
            $('#admin_tbl').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
@endsection