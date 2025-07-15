<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;


class ProductsListController extends Controller
{
    public function index(){
        $products = Product::with('seasons')->paginate(6);
        return view('products',compact('products'));
    }
    public function detail($id){
        $product = Product::with('seasons')->findOrFail($id);
        $seasons = Season::all();
        return view('detail',compact('product','seasons'));
    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->seasons()->detach();
        $product->delete();
        return redirect(route('products.index'));
    }
    public function update(Request $request){
        $product = Product::findOrFail($request->id);
        $data = [
            'name'=>$request->name,
            'price'=>$request->price,
        ];
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images','public');
            $data['image'] =$imagePath;
        }
        $product->update($data);
        $product->seasons()->sync($request->seasons);
        return redirect()->route('products.index');
    }
}
