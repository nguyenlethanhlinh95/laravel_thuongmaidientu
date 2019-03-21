@extends('layout.admin.master')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Edit Product</h1>
    </div>



    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $product->pro_name }}
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" method="POST" action="{{ route('pro_edit_p',['id'=>$product->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="{{ $product->pro_name }}" class="form-control" placeholder="Enter name product" name="txtName" class="txtName">
                        </div>

                        <div class="form-group">
                            <label>Code</label>
                            <input value="{{ $product->pro_code }}" class="form-control" placeholder="Enter name Code" name="txtCode" class="txtCode">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input value="{{ $product->pro_price }}" class="form-control" placeholder="Enter name price" name="txtPrice" class="txtPrice">
                        </div>

                        <div class="form-group">
                            <label>Info</label>
                            <input value="{{ $product->pro_info }}" class="form-control" placeholder="Enter name info" name="txtInfo" class="txtInfo">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control txtImage" placeholder="Enter name image" name="txtImage" id="txtImage">
                            <input id="f_upload" type="hidden" value='upload/products/{{ $product->pro_image }}'>
                        </div>


                        <button type="submit" class="btn btn-default">Submit Button</button>
                        <button type="reset" class="btn btn-default">Reset Button</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

