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
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nome" => $this->name,
            "valor" => $this->price,
            "categoria" => new CategoryResource($this->category),
            "usuario" => new UserResource($this->user),
        ];
    }
}
