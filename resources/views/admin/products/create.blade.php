@extends('layout.admin.master')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Create Product</h1>
    </div>



    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Product
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">



                    {{--@if(count($errors) > 0)--}}
                        {{--<div class="alert alert-danger alertBox">--}}
                            {{--@foreach($errors->all() as $err)--}}
                                {{--<strong>{{$err}}</strong><br/>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    <form role="form" method="POST" action="{{route('pro_create_p')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" placeholder="Enter name product" name="txtName" class="txtName">
                        </div>

                        <div class="form-group">
                            <label>Code</label>
                            <input class="form-control" placeholder="Enter name Code" name="txtCode" class="txtCode">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" placeholder="Enter name price" name="txtPrice" class="txtPrice">
                        </div>

                        <div class="form-group">
                            <label>Info</label>
                            <input class="form-control" placeholder="Enter name info" name="txtInfo" class="txtInfo">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control txtImage" placeholder="Enter name image" name="txtImage" id="txtImage">
                        </div>


                        <button type="submit" class="btn btn-default">Submit Button</button>
                        <button type="reset" class="btn btn-default">Reset Button</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


