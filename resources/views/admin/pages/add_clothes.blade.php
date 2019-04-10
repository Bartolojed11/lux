@extends('admin.layouts.app')
@section('content')
@php
    $page = 'add-cloth';
@endphp
            <div class="content-wrapper" style="min-height: 901.2px;">
                <section class="content">
                    <div class="box box-info"  style="min-height: 600px;">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title">ADD ITEM</h3>
                        </div>
                        <div class="box-body" style="padding-left:5%;padding-right:5%;">
                            <div class="margpad-md">
                                <!-- /.box-header -->
                                <!-- form start -->
                                @include('admin.inc.flash-message')
                                <div class="row">
                                <form class="form-horizontal" action="/admin/pages" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-lg-6">
                                            <table class="table table-bordered" id="add_cloth_tbl" style="margin-right:10px;">
                                                <tbody id="add_cl_0">
                                                    <tr>
                                                        <td><input type="file" name="clothes_images[]" required></td>
                                                        <td style="width:50px;"></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr id="add_cloth_tr">
                                                        <td colspan="2">
                                                            <button class="btn btn-default btn-sm" type="button" id="add_cloth">Add</button>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                                </table>
                                        </div>
                                        <div class="col-lg-6 col-sm-12" class="add-form">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control" name="category" required>
                                                    @if(count($categories) > 0)
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{ $category->description }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div> <br>
                                            
                                            <div class="form-group">
                                                <label for="desc">Description</label>
                                                <input type="text" class="form-control" id="desc" required name="desc" placeholder="Description">
                                            </div> <br>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="price">Price</b>
                                                        <input type="number" required class="form-control" style="width:100%;" id="price" name="price" placeholder="price">
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="sale" class="text-danger">SALE(%)</b>
                                                        <input type="number" required class="form-control" style="width:100%;" value="0" id="sale" name="sale" placeholder="0%">
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        <label for="days_sale" class="text-danger">Days of Sale</b>
                                                        <input type="number" required class="form-control" style="width:100%;" value="0" id="days_sale" name="days_sale" placeholder="0%">
                                                    </div>
                                                    <div class="col-lg-2">
                                                            <b>Gender</b>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="gender" id="gender" value="male" checked="">
                                                                Male
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        &nbsp;
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="gender" id="gender" value="female">
                                                                Female
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12"><br>
                                                        <table class="table table-bordered" id="" style="margin-right:10px;">
                                                            <thead class="text-center">
                                                                <tr>
                                                                    <td ><strong>Size</strong></td>
                                                                    <td><strong>Quantity</strong></td>
                                                                    <td style="with:40px;"></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="add_avlbty_0">
                                                                <tr>
                                                                    <td><input type="text" class="form-control" style="width:100%;" requried name="size[]" id="size"></td>
                                                                    <td><input type="number" class="form-control" style="width:100%;" requried name="qty[]" id="qty"></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr id="add_cloth_tr">
                                                                    <td colspan="3">
                                                                        <button class="btn btn-default btn-sm" type="button" id="btn_avlbty">Add</button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <center>
                                <button class="btn btn-info" type="submit" name="save">ADD</button>
                            </center>
                        </form>
                        </div>
                    </div>  
                </section>          
            </div>
            @include('admin.inc.footer')
        @endsection
    @section('scripts')
        <script>
            var i = 0;
            $('#add_cloth').on('click' , function() {
                i++;
                let cloth_col = `<tr id="add_cl_${i}">
                                        <td><input type="file" required name="clothes_images[]"></td>
                                        <td style="width:50px;"><button class="btn btn-sm btn-danger" onclick="remove(add_cl_${i})" type="button">x</button></td>
                                    </tr>`;
                $('#add_cl_0').append(cloth_col);
            });
            var j = 0;
            $('#btn_avlbty').on('click' , function() {
                j++;

                let avlbty = `<tr id="add_avlbty_${j}">
                                <td><input type="text" required class="form-control" style="width:100%;" name="size[]" id="size"></td>
                                <td><input type="number" required class="form-control" style="width:100%;" name="qty[]" id="qty"></td>
                                <td class="text-center"><button class="btn btn-danger btn-sm" type="button" onclick="remove(add_avlbty_${j})">x</button></td>
                            </tr>`;
                $('#add_avlbty_0').append(avlbty);
            });
            function remove(row) {
                $(row).remove();
            }
        </script>
    @endsection 