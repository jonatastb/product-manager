<?php

namespace App\Http\Resources;

use App\Http\Requests\CadastroCategoriaRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsToUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nome" => $this->name,
            "valor" => $this->price,
            "categoria" => new CategoryToProductsToUserResource($this->category),
        ];
    }
}
