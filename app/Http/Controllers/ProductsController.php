<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::all();
        return view('admin.products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Validate
        $this->validate($request,
            [
                'txtName' => 'required|min:3|max:100',
                'txtCode' => 'required|min:3|max:100',
                'txtPrice' => 'required|min:3|max:100',
                'txtInfo' => 'required|min:3|max:100',
                'txtName' => 'required|min:3|max:100'
            ],
        [
            'txtName.required' => 'Bạn chưa nhập tên thể loại',
            'txtName.min'      => 'Tên thể loại phải lớn hơn 3 kí tự',
            'txtName.max'      => 'Tên thể loại phải nhỏ hơn 100 kí tự',


            'txtCode.required' => 'Bạn chưa nhập mã Code',
            'txtCode.min'      => 'Mã Code phải lớn hơn 3 kí tự',
            'txtCode.max'      => 'Mã Code phải nhỏ hơn 100 kí tự',

            'txtPrice.required' => 'Bạn chưa nhập Giá',
            'txtPrice.min'      => 'Mã Code phải lớn hơn 3 kí tự',
            'txtPrice.max'      => 'Mã Code phải nhỏ hơn 100 kí tự',

            'txtInfo.required' => 'Bạn chưa nhập mã thông tin',
            'txtInfo.min'      => 'Thông tin phải lớn hơn 3 kí tự',
            'txtInfo.max'      => 'Thông tin phải nhỏ hơn 100 kí tự',

            'txtCode.required' => 'Bạn chưa nhập mã Tên',
            'txtCode.min'      => 'Tên phải lớn hơn 3 kí tự',
            'txtCode.max'      => 'Tên phải nhỏ hơn 100 kí tự',
        ]
            );

        // Insert for database
        $product = new Products;

        $product->pro_name = $request->txtName;
        $product->pro_code = $request->txtCode;
        $product->pro_price = $request->txtPrice;
        $product->pro_info = $request->txtInfo;
        //$product->pro_inmage = $request->txtImage;

        if ($request->hasFile('txtImage'))
        {
            $file = $request->file('txtImage');
            $fileExtend = $file->getClientOriginalExtension(); // lay duoi file
            $name = $file->getClientOriginalName(); // lay ten file

            // check file extendtion
            if ($fileExtend != 'jpg' && $fileExtend != 'png' && $fileExtend != 'jpeg' && $fileExtend != 'jpe' && $fileExtend != 'gif' && $fileExtend != 'bmp' && $fileExtend != 'jfif'){
                return redirect(route('pro_create_p'))->with('err','Thêm không thành công, đuôi file không đúng.');
            }

            $Hinh = str_random(6) ."_". $name;
            while(file_exists('upload/products' . $Hinh)){
                $Hinh = str_random(6) ."_". $name;
            }
            // luu hinh
            $file->move('upload/products', $Hinh);

            // luu ten database
            $product->pro_image = $Hinh;
        }
        else{
            $product->pro_image = "";
        }

        $product->save();
        return redirect(route('pro_create_p'))->with('suc','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Products::find($id);
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // Validate
        $this->validate($request,
            [
                'txtName' => 'required|min:3|max:100',
                'txtCode' => 'required|min:3|max:100',
                'txtPrice' => 'required|min:3|max:100',
                'txtInfo' => 'required|min:3|max:100',
                'txtName' => 'required|min:3|max:100'
            ],
            [
                'txtName.required' => 'Bạn chưa nhập tên thể loại',
                'txtName.min'      => 'Tên thể loại phải lớn hơn 3 kí tự',
                'txtName.max'      => 'Tên thể loại phải nhỏ hơn 100 kí tự',


                'txtCode.required' => 'Bạn chưa nhập mã Code',
                'txtCode.min'      => 'Mã Code phải lớn hơn 3 kí tự',
                'txtCode.max'      => 'Mã Code phải nhỏ hơn 100 kí tự',

                'txtPrice.required' => 'Bạn chưa nhập Giá',
                'txtPrice.min'      => 'Mã Code phải lớn hơn 3 kí tự',
                'txtPrice.max'      => 'Mã Code phải nhỏ hơn 100 kí tự',

                'txtInfo.required' => 'Bạn chưa nhập mã thông tin',
                'txtInfo.min'      => 'Thông tin phải lớn hơn 3 kí tự',
                'txtInfo.max'      => 'Thông tin phải nhỏ hơn 100 kí tự',

                'txtCode.required' => 'Bạn chưa nhập mã Tên',
                'txtCode.min'      => 'Tên phải lớn hơn 3 kí tự',
                'txtCode.max'      => 'Tên phải nhỏ hơn 100 kí tự',
            ]
        );

        // Insert for database
        $product = Products::find($id);

        $product->pro_name = $request->txtName;
        $product->pro_code = $request->txtCode;
        $product->pro_price = $request->txtPrice;
        $product->pro_info = $request->txtInfo;
        //$product->pro_inmage = $request->txtImage;

        if ($request->hasFile('txtImage'))
        {
            $file = $request->file('txtImage');
            $fileExtend = $file->getClientOriginalExtension(); // lay duoi file
            $name = $file->getClientOriginalName(); // lay ten file

            // check file extendtion
            if ($fileExtend != 'jpg' && $fileExtend != 'png' && $fileExtend != 'jpeg' && $fileExtend != 'jpe' && $fileExtend != 'gif' && $fileExtend != 'bmp' && $fileExtend != 'jfif'){
                return redirect(route('pro_create_p'))->with('err','Thêm không thành công, đuôi file không đúng.');
            }


            $Hinh = str_random(6) ."_". $name;
            while(file_exists('upload/products' . $Hinh)){
                $Hinh = str_random(6) ."_". $name;
            }
            // luu hinh
            $file->move('upload/products', $Hinh);

            // xoa hinh cu
            if (isset($product->Hinh))
            {
                unlink( 'upload/products/' .$product->Hinh);
            }


            // luu ten database
            $product->pro_image = $Hinh;
        }
        else{
            $product->pro_image = "";
        }

        $product->save();
        return redirect(route('pro_list'))->with('suc','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }


}
