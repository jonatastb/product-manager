<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroProdutoRequest;
use App\Http\Requests\EdicaoProdutoRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() 
    {

        $products = Product::where('user_id', Auth::id())->get();
        return view('product.index', compact('products'));
    }
    public function apiIndex() 
    {
        return ProductResource::collection(Product::all());
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(CadastroProdutoRequest $request) 
    {

        Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "category_id" => $request->category_id,
            "user_id" => Auth::id(),
        ]);

        return redirect()->route('product.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(int $id) 
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        if($product->user_id === Auth::id()){
            return view('product.edit', compact('product','categories'));
        }

        return view('product.index');

    }

    public function update(EdicaoProdutoRequest $request, int $id) 
    {

        $product = Product::findOrFail($id);
        if($product->user_id === Auth::id()){   
            $product->update([
                "name" => $request->name,
                "price" => $request->price,
                "category_id" => $request->category_id
            ]);
            return redirect()->route('product.index')->with('success', 'Produto editado com sucesso!');
        }

        return redirect()->route('product.index')->with('error', 'O produto não foi editado!');

    }

    public function destroy(int $id) 
    {

        $product = Product::findOrFail($id);
        if($product->user_id === Auth::id()){   
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Produto editado com sucesso!');
        }

        return redirect()->route('product.index')->with('error', 'O produto não foi editado!');

    }
}
