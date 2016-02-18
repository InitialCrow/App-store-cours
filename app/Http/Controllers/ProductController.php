<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;

use App\Product;
use App\Picture;

use App\Category;
use App\Tag;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('title','id');
        $tags = Tag::lists('name','id');
        return view('admin.product.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)

    {
        $product = Product::create($request->all());


        if(!empty($request->input('tag_id'))){
            $product->tags()->attach($request->input('tag_id'));
        }

        $im = $request->file('image');
        if(!empty($im)){
            $product->tags()->attach($request->input('tag_id'));

            $ext = $im->getClientOriginalExtension();
            $uri = str_random(12).'.'.$ext;
            $picture = Picture::create([
                'uri'=>$uri,
                'product_id'=>$product->id
            ]);
            
              
            $im->move('./uploads', $uri);
            
        }
            
            
        

        

        return redirect('product')->with(['message' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::lists('title','id');
        $tags = Tag::lists('name','id');
        $product = Product::find($id);
        $pictures = Picture::find($id);
        return view('admin.product.edit',compact('product','categories','tags','pictures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $im = $request->file('image');
        
        if(!empty($im)){

            if(!is_null($product->picture)){
             
                Storage::delete($product->picture->uri);
                $product->picture->delete();
            }
            $ext = $im->getClientOriginalExtension();
            $uri = str_random(12).'.'.$ext;
            $picture = Picture::create([
                'uri'=>$uri,
                'product_id'=>$product->id
            ]);
            $im->move('uploads', $uri);
            
        }
        $product->update($request->all());
      

        
        $tags = $request->input('tag_id');
         if(empty($tags)){
            $tags =[];
        }
       $product->tags()->sync($tags);

        return redirect('product')->with(['message' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // confirmation after deleted

        $p = Product::find($id);
        if(!is_null($p->picture)){
            Storage::delete($p->picture->uri);
            $p->picture->delete();
        }
        $p->delete();

        return back()->with( ['message' => trans('app.success')] );
    }

}
