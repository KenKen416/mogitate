<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;


class ProductsListController extends Controller
{
    public function index()
    {
        $products = Product::with('seasons')->paginate(6);
        return view('products', compact('products'));
    }
    public function detail($id)
    {
        $product = Product::with('seasons')->findOrFail($id);
        $seasons = Season::all();
        return view('detail', compact('product', 'seasons'));
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->seasons()->detach();
        $product->delete();
        return redirect(route('products.index'));
    }
    public function update(UpdateRequest $request)
    {
        $product = Product::findOrFail($request->id);
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ];
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
        $product->update($data);
        $product->seasons()->sync($request->seasons);
        return redirect()->route('products.index');
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $sort = $request->sort;
        $query = Product::with('seasons');
        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        };
        if ($sort == 'high') {
            $query->orderBy('price', 'desc');
        } elseif ($sort == 'low') {
            $query->orderBy('price', 'asc');
        }
        $products = $query->paginate(6);
        return view('products', compact('products'));
    }
    public function register()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }
    public function store(RegisterRequest $request)
    {
        $imagePath = $request->file('image')->store('images', 'public');
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
            'description' => $request->description
        ];
        $product = Product::create($data);
        $product->seasons()->attach($request->seasons);
        return redirect()->route('products.index');
    }
}
