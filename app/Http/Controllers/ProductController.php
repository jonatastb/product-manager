<?php


namespace App\Http\Controllers;

use OpenApi\Attributes as OA;
use App\Http\Requests\CadastroProdutoRequest;
use App\Http\Requests\EdicaoProdutoRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/**
 * @OA\Info(
 *     title="My First API",
 *     version="0.1"
 * )
 */

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::where('user_id', Auth::id())->paginate(5);
        return view('product.index', compact('products'));
    }
    public function allIndexAdmin() 
    {
        if(Auth::check() && Auth::user()->is_admin){
            $products = Product::paginate(5);
            return view('admin.index', compact('products'));
        }else{
            return redirect()->route('void');
        }
    }
    public function usersIndexProductsAdmin() 
    {
        if(Auth::check() && Auth::user()->is_admin){
            $users = User::paginate(5);
            return view('admin.users', compact('users'));
        }else{
            return redirect()->route('void');
        }
    }
    public function usersProduct(int $id) 
    {
        if(Auth::check() && Auth::user()->is_admin){
            $user = User::findOrFail($id);
            $products = Product::where('user_id', $id)->paginate(5);
            return view('admin.productByUser', compact('user', 'products'));
        }else{
            return redirect()->route('void');
        }
    }
    /**
     *  @OA\GET(
     *      path="/api/produtos",
     *      summary="Retorna todos os produtos",
     *      description="Retorna todos os produtos (id, nome, valor) a categoria do produto (id,nome) e o usuario que criou (id,nome)",
     *      tags={"Produtos"},
     *      @OA\Response(
     *          response=200,
     *          description="Lista de produtos do usuário",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="id", type="integer", example=1),
     *                  @OA\Property(property="nome", type="string", example="Coca-cola"),
     *                  @OA\Property(property="valor", type="number", format="float", example=6.00),
     *                  @OA\Property(
     *                      property="categoria",
     *                      type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="nome", type="string", example="Bebidas")
     *                  ),
     *                  @OA\Property(
     *                      property="usuario",
     *                      type="object",
     *                      @OA\Property(property="id", type="integer", example=1),
     *                      @OA\Property(property="nome", type="string", example="João da Silva")
     *                  )
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Usuário não encontrado"
     *      )
     *  )
     */
    public function apiIndex() 
    {
        return ProductResource::collection(Product::all());
    }
    /**
     *  @OA\GET(
     *      path="/api/usuario/{id}/produtos",
     *      summary="Retorna os produtos de um usuário específico",
     *      description="Retorna todos os produtos de um usuário específico criou, incluindo o ID, nome, valor.O nome e id categoria dos produtos.",
     *      tags={"Produtos"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *          description="ID do usuário"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Lista de produtos do usuário",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="usuario",
     *                  type="object",
     *                  @OA\Property(property="id", type="integer", example=1),
     *                  @OA\Property(property="nome", type="string", example="João da Silva"),
     *                  @OA\Property(
     *                      property="produtos",
     *                      type="array",
     *                      @OA\Items(
     *                          type="object",
     *                          @OA\Property(property="id", type="integer", example=1),
     *                          @OA\Property(property="nome", type="string", example="Coca-cola"),
     *                          @OA\Property(property="valor", type="number", format="float", example=6.00),
     *                          @OA\Property(
     *                              property="categoria",
     *                              type="object",
     *                              @OA\Property(property="id", type="integer", example=1),
     *                              @OA\Property(property="nome", type="string", example="Bebidas")
     *                          )
     *                      )
     *                  )
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Usuário não encontrado"
     *      )
     *  )
     */
    public function getByUser(int $id) 
    {
        return new UserResource(User::where('id', $id)->first());
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

        if(Auth::check() && ($product->user_id === Auth::id() || Auth::user()->is_admin)){
            return view('product.edit', compact('product','categories'));
        }else{
            return redirect()->route('void');
        }

    }

    public function update(EdicaoProdutoRequest $request, int $id) 
    {

        $product = Product::findOrFail($id);
        if($product->user_id === Auth::id() || Auth::user()->is_admin){   
            $product->update([
                "name" => $request->name,
                "price" => $request->price,
                "category_id" => $request->category_id
            ]);
            if($product->user_id === Auth::id()){
                return redirect()->route('product.index')->with('success', 'Produto editado com sucesso!');
            }else{
                return redirect()->route('product.allIndexAdmin')->with('success', 'Produto editado com sucesso!');
            }
        }

        return redirect()->route('product.index')->with('error', 'O produto não foi editado!');

    }

    public function destroy(int $id) 
    {

        $product = Product::findOrFail($id);
        if($product->user_id === Auth::id() || Auth::user()->is_admin){   
            $product->delete();

            if($product->user_id === Auth::id()){
                return redirect()->route('product.index')->with('success', 'Produto excluído com sucesso!');
            }else{
                return redirect()->route('product.allIndexAdmin')->with('success', 'Produto excluído com sucesso!');
            }
        }

        return redirect()->route('product.index')->with('error', 'O produto não foi editado!');

    }
}
