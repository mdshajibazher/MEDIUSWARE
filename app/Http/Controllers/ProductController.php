<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {

        $products = Product::with('Variant','VariantPrice')->paginate(5);
        $variants = Variant::with('VariantChildren')->get();
        return view('products.index',compact('products','variants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_name' => 'required|max:50|unique:products,title',
            'product_sku' => 'required|max:50|unique:products,sku',
            'description' => 'required',
        ]);

        //return $request;

        $product = new Product;
        $product->title = $request->product_name;
        $product->sku = $request->product_sku;
        $product->description = $request->description;
        $product->save();

        $combination_array_data = [];
        foreach($request->product_variant as $p_variant){
            foreach( $p_variant['tags'] as $tagname){
               $incr_id =  DB::table('product_variants')->insertGetId([
                    'variant' =>  $tagname,
                    'variant_id' => $p_variant['option'],
                    'product_id' => $product->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        $combination_array_data[] = ["id" =>$incr_id, "name" => $tagname];
            }
        }


        foreach($request->product_variant_prices as $p_variant_prices){

            $variant_combination_arr = explode("/",$p_variant_prices['title']);

            foreach($combination_array_data as $data){
                if(isset($variant_combination_arr[0])){
                    if($data['name'] == $variant_combination_arr[0]){
                        $v1 = $data['id'];
                    }else{
                        $v1 = NULL;
                    }
               }else{
                $v1 = NULL;
               }

                if(isset($variant_combination_arr[1])){
                    if($data['name'] == $variant_combination_arr[1]){
                        $v2 = $data['id'];
                    }else{
                        $v2 = NULL;
                    }
                }else{
                    $v2 = NULL;
                }

                if(isset($variant_combination_arr[2])){
                    if($data['name'] == $variant_combination_arr[2]){
                        $v3 = $data['id'];
                    }else{
                        $v3 = NULL;
                    }
                }else{
                    $v3 = NULL;
                }
       
            }
            DB::table('product_variant_prices')->insert([
                'product_variant_one' =>  $v1,
                'product_variant_two' =>   $v2,
                'product_variant_three' => $v3,
                'price' => $p_variant_prices['price'],
                'stock' => $p_variant_prices['stock'],
                'product_id' => $product->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }



        return $product;
        
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('Variant','VariantPrice')->findOrFail($id); 
        $variants = Variant::all();
        return view('products.edit', compact('variants','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    
    public function filter(Request $request){
  
        $variants = Variant::with('VariantChildren')->get();

        // if($request->title != null && $request->variant!=null && $request->price_from != null && $request->price_to != null && $request->date != null){}

        if($request->title == null){
            return "Please Type Any Product Name";
        }

       $products = Product::with('Variant','VariantPrice')->where('title',$request->title)->paginate(10);


        return view('products.index',compact('products','variants'));
    }



}
