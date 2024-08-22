<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    
    public static $wrap = null;
    
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nome" => $this->name,
            "valor" => $this->price,
            "categoria" => new CategoryToProductResource($this->category),
            "usuario" => new UserToProductResource($this->user),
        ];
    }
}
