@extends('admin.layouts.app')
@section('content')
@php
    $page = 'edit-cloth';
@endphp
            <div class="content-wrapper" style="min-height: 901.2px;">
                <section class="content">
                    <div class="box box-info"  style="min-height: 600px;">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title">UPDATE ITEM</h3>
                        </div>
                        <div class="box-body" style="padding-left:5%;padding-right:5%;">
                            <div class="margpad-md">
                                <!-- /.box-header -->
                                <!-- form start -->
                                @include('admin.inc.flash-message')
                                <div class="row">
                                <form class="form-horizontal" action="/admin/pages/{{$cloth[0]->id}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-lg-6">
                                                <table class="table table-bordered" id="add_cloth_tbl" style="margin-right:10px;">
                                                    @if(isset($cloth[0]->cloth_img))
                                                    @php $ctr = 0 ; @endphp
                                                    @foreach($cloth as $cloths)
                                                        @foreach($cloths->cloth_img as $clo)
                                                        <tr id="add_cl_{{$ctr}}">
                                                            <td>
                                                            @php
                                                                $img_arr = [];
                                                                $img_arr = explode('/', $clo->img);
                                                                unset($img_arr[0]);
                                                                unset($img_arr[1]);
                                                                $img_arr = array_values($img_arr);
                                                                $img = implode($img_arr);
                                                                $ctr++;
                                                            @endphp
                                                            <input type="hidden" name="img_hidden[]" value="{{$clo->img}}">
                                                            <img src="{{asset('public/storage/'.$clo->img)}}" style="height:50px;width:px;" alt=""></td>
                                                            <td><span id="image_label" style="display:inlin-block;">{{ $img }}</span></td>
                                                                <td style="width:50px;">
                                                                    <button class="btn btn-sm btn-danger remove_this_img" value="{{$clo->id}}" type="button">x</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                    @endif
                                                    <tbody id="add_cl_base">
                                                    </tbody>
                                                            <tfoot>
                                                            <tr id="add_cloth_tr">
                                                                <td colspan="3">
                                                                    <button class="btn btn-default btn-sm" type="button" onclick="add_cloth_row({{$ctr}})" id="add_cloth">Add</button>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                        </div>
                                        <div class="col-lg-6 col-sm-12" class="add-form">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control" name="category" required>
                                                    <option value="{{$sel_cloth_cath->id}}">{{$sel_cloth_cath->description}}</option>
                                                    @if(count($categories) > 0)
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{ $category->description }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div> <br>
                                            
                                            <div class="form-group">
                                                <label for="desc">Description</label>
                                            <input type="text" class="form-control" id="desc" required value="{{$cloth[0]->description}}" name="desc" placeholder="Description">
                                            </div> <br>
                                            <div class="form-group">
                                                
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="price">Price</b>
                                                        <input type="number" required class="form-control" value="{{$cloth[0]->price}}" style="width:100%;" id="price" name="price" placeholder="price">
                                                    </div>

                                                    <div class="col-lg-6">
                                                            <label for="sale" class="text-danger">SALE(%)</label>
                                                            <input type="number" class="form-control" required value="{{$cloth[0]->sale * 100 }}" id="sale" name="sale" placeholder="0%">      
                                                    </div>
                                                    
                                                    <div class="col-lg-12 col-sm-12">
                                                        <label for="days_sale" class="text-danger">Days of Sale until</b><small> ({{$cloth[0]->sale_end}})</small>
                                                        <input type="number" required class="form-control" style="width:100%;" value="0" id="days_sale" name="days_sale" placeholder="0%">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <b>Gender</b>
                                                        <div class="radio">
                                                            <label>
                                                            <input type="radio" name="gender" id="gender" value="male" {{ $cloth[0]->gender == 'male' ? 'checked' : ''}}>
                                                                Male
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        &nbsp;
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="gender" id="gender" value="female" {{ $cloth[0]->gender == 'female' ? 'checked' : ''}}>
                                                                Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12">
                                                            <table class="table table-bordered" id="" style="margin-right:10px;">
                                                                    <thead class="text-center">
                                                                        <tr>
                                                                            <td ><strong>Size</strong></td>
                                                                            <td><strong>Quantity</strong></td>
                                                                            <td style="with:40px;"></td>
                                                                        </tr>
                                                                    </thead>
                                                                    @php
                                                                        $ctr = 0;   
                                                                    @endphp
                                                                    @foreach($cloth_av as $avail)
                                                                        <tr id="add_avlbty_{{$ctr}}">
                                                                        <td><input type="text" class="form-control" style="width:100%;" value="{{$avail->av_size}}" required name="size[]" id="size"></td>
                                                                        <td><input type="number" class="form-control" style="width:100%;" value="{{$avail->qty}}" required name="qty[]" id="qty"></td>
                                                                            @if($ctr > 0)
                                                                                <td style="width:50px;">
                                                                                    <button class="btn btn-sm btn-danger remove_this_avail" value="{{$avail->id}}" type="button">x</button>
                                                                                </td>
                                                                            @else
                                                                                <td style="width:50px;"></td>
                                                                            @endif
                                                                        </tr>
                                                                        @php $ctr++; @endphp
                                                                    @endforeach
                                                                    <tbody id="add_avlbty_base">
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr id="add_cloth_tr">
                                                                            <td colspan="3">
                                                                                <button class="btn btn-default btn-sm" type="button" onclick="add_cloth_avail({{$ctr}})">Add</button>
                                                                            </td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                    </div>    
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                </div><!-- 1 row -->
                            </div>
                        </div>
                        <div class="box-footer">
                            <center>
                                <button class="btn btn-info" type="submit" name="save">UPDATE</button>
                            </center>
                        </form>
                        </div>
                    </div>  
                </section>          
            </div>
        @endsection
    @section('scripts')
        <script>
            var i = 0;
            function add_cloth_row(index) {
                i+=index;
                let cloth_col = `<tr id="add_cl_${i}">
                                        <td colspan="2"><input type="file" required name="clothes_images[]"></td>
                                        <td style="width:50px;"><button class="btn btn-sm btn-danger" required onclick="remove(add_cl_${i})" type="button">x</button></td>
                                    </tr>`;
                $('#add_cl_base').prepend(cloth_col);
            }
            $('.remove_this_img').on('click', function() {
                id = this.value;
                token = $('input[name=_token]').val();
                $.ajax(
                    {
                        url: "/admin/pages/remove_item/"+id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        }
                    });
                $(this).closest('tr').remove();
            });
            $('.remove_this_avail').on('click', function() {
                            id = this.value;
                            token = $('input[name=_token]').val();
                            $.ajax(
                                {
                                    url: "/admin/pages/remove_avlbty/"+id,
                                    type: 'DELETE',
                                    data: {
                                        "id": id,
                                        "_token": token,
                                    }
                                });
                            $(this).closest('tr').remove();
                        });
            var j = 0;
            function add_cloth_avail(index) {
                j+=index;
                console.log(j);
                let avlbty = `<tr id="add_avlbty_${j}">
                                <td><input type="text" required class="form-control" style="width:100%;" name="size[]" id="size"></td>
                                <td><input type="number" required class="form-control" style="width:100%;" name="qty[]" id="qty"></td>
                                <td class="text-center"><button class="btn btn-danger btn-sm" type="button" onclick="remove(add_avlbty_${j})">x</button></td>
                            </tr>`;
                $('#add_avlbty_base').prepend(avlbty);
            }

            function remove(row) {
                $(row).remove();
            }
        </script>
    @endsection 