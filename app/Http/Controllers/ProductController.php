<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::all();
        return view('products.index', ['products' => $products]);

    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        // $newProduct = Product::create($data);
        return redirect(route('product.index'));
    }

    public function edit($id) {
        $product = Student::find($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
        ]);

        $product = Student::find($id);
        $product->name = $request->name;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->description = $request->description;
        $student->update();


        return redirect(route('product.index'))-> with('success', 'Product Update Successfully');
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted Successfully');
    }
}
