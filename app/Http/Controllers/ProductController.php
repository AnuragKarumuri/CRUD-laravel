<?php

namespace App\Http\Controllers;

use App\Mail\SampleEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){
        return view('products.index',[
            'products'=>Product::latest()->get()
        ]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        //validate
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:1000000'
        ]);

        //upload
        $imgName=time().'.'.$request->image->extension();
        // $imgName=$request->image->getClientOriginalName();
       
        $request->image->move(public_path('products'),$imgName);
        
        $product=new Product;
        $product->image=$imgName;
        $product->name=$request->name;
        $product->description=$request->description;

        $product->save();
        $name = $request->input('name');
        $description = $request->input('description');
        $email = 'anurag.karumuri04@gmail.com';

        Mail::to($email)->send(new SampleEmail($name, $description));
        return back()->withSuccess('Item Created Succesfully !!!!!');
    }
    public function edit($id){
        $product=Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
        dd($id);
    }
    public function update(Request $request,$id){
         //validate
         $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $product=Product::where('id',$id)->first();
        if (isset($request->image)){
             //upload
        $imgName=time().'.'.$request->image->extension();
        // $imgName=$request->image->getClientOriginalName();
       
        $request->image->move(public_path('products'),$imgName);
        
        $product->image=$imgName;
        }
       
        $product->name=$request->name;
        $product->description=$request->description;

        $product->save();
        return back()->withSuccess('Item Updated Succesfully !!!!!');
    
    }
    public function destroy($id){
       $product= Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Item Deleted!!!!!!!!!!!!');
    }

    public function show($id){
        $product= Product::where('id',$id)->first();

         return view('products.show',['product'=>$product]); 
    }
}
