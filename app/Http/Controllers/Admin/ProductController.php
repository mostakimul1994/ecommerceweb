<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('id','desc')->paginate(2);
        $data['categories'] = Category::orderBy('name')->get();
        $data['product_images'] = ProductImage::orderBy('id')->get();
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['vendors'] = Vendor::all();
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $request->validate([
        'category_id' => 'required',
        'vendor_id' => 'required',
        'name' => 'required',
        'descriptions' => 'required',
        'unit_price' => 'required',
        'stock' => 'required|int',
        'status' => 'required|in:'.Product::ACTIVE_STATUS. ',' .Product::INACTIVE_STATUS,
        'image.*' => 'mimes:jpeg,png',
    ]);
      DB::beginTransaction();

try{
       $product = Product::create($request->all());
     if($request->hasFile('image')){

        foreach ($request->image as $file) {

            $path ='image/product';
            $file -> move($path, $file->getClientOriginalName() );
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $path .'/'. $file->getClientOriginalName()

            ]);
        }
    }
    DB::commit();
} 
catch (\Exception $exception)
        {
            DB::rollBack();
            Log::error($exception->getMessage());
        }
  
    session()->flash('message','Product Creation Done');
    return redirect()->route('product.index');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
