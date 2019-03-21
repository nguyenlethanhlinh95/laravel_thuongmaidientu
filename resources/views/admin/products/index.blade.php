@extends('layout.admin.master')

@section('content')
    <h1 class="page-header">List product</h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            List product
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Price</th>
                        <th>Info</th>
                        <th>Image</th>
                        <th>Create at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--output data--}}
                    <?php $i = 1; ?>

                    @foreach($products as $product)

                        <tr @if( $i%2 !=0) {{ 'class="odd gradeX"' }} @else {{'class="even gradeC"'}} @endif >
                            <td>{{ $product->pro_name }}</td>
                            <td>{{ $product->pro_code }}</td>
                            <td>{{ $product->pro_price }}</td>
                            <td>{{ $product->pro_info }}</td>
                            <td>@if(isset($product->pro_image)) <img width="100px" height="auto" src="{{ 'upload/products/'.$product->pro_image }}" alt="{{ $product->pro_name }}"> @else {{ 'khong co file' }} @endif</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <a href="#"><i class="fa fa-trash-o"></i></a>
                                <a href="#"><i class="fa fa-plus-circle"></i></a>
                                <a href="{{route('pro_edit', ['id'=>$product->id] )}}"><i class="fa fa-wrench"></i></a>
                            </td>
                        </tr>
                    {{--<tr class="even gradeC">--}}
                        {{--<td>Trident</td>--}}
                        {{--<td>Internet Explorer 5.0</td>--}}
                        {{--<td>Win 95+</td>--}}
                        {{--<td class="center">5</td>--}}
                        {{--<td class="center">C</td>--}}
                    {{--</tr>--}}

                        <?php $i++; ?>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->

        </div>
        <!-- /.panel-body -->
    </div>
@endsection
