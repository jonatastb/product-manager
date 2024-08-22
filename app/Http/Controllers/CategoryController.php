<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroCategoriaRequest;
use App\Http\Requests\EdicaoCategoriaRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastroCategoriaRequest $request)
    {
        Category::create([
            "name" => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdicaoCategoriaRequest $request, string $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            "name" => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Categoria editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $categoryName = $category->name;
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Categoria '.$categoryName.' excluida com sucesso!');
    }
}
