<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class HomeAdminController extends Controller
{
    public function show(){
    	$getAllProducts = Products::all();
    	$products = Products::paginate(10);
    	return view('admin.showProduct',compact('products','getAllProducts'));
    }
    public function delete($id){
    	$product = Products::find($id);
    	$product->delete();
    	return redirect()->route('show');
    }
    public function create(){
    	return view('admin.create');
    }
    public function store(Request $request){
    	$products = new Products;

    	$request->validate([
            'name'   =>  'required',
            'image'  =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $products ->name =$request->input('name');
        if($request->hasFile('image')){
        	$file = $request->image;
            $file->move('upload', $file->getClientOriginalName());
            $folder = '/upload/';
            // $name = str_slug($request->input('name')).'_'.time();
            $filePath = $folder . $file->getClientOriginalName();
            $products -> image = $filePath;
        }
        $products -> save();
        return redirect()->route('show');
    }
    public function details($id){
        $product = Products::find($id);
    	return view('admin.details',compact('product'));
    }
    public function search(Request $request){
    	$products = Products::where('name','like','%'.$request->key.'%')->get();
        return view('admin.search',compact('products'));
    }
    public function update($id){
        $product = Products::find($id);
        return view('admin.update',compact('product'));
    }
    public function save_update(Request $request){
        $products = Products::find($request->id);

        $request->validate([
            'name'   =>  'required',
            'image'  =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $products ->name =$request->input('name');
        if($request->hasFile('image')){
            $file = $request->image;
            $file->move('upload', $file->getClientOriginalName());
            $folder = '/upload/';
            // $name = str_slug($request->input('name')).'_'.time();
            $filePath = $folder . $file->getClientOriginalName();
            $products -> image = $filePath;
        }
        
        $products -> save();
        return redirect()->route('show');
    }
}
