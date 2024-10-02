<?php

namespace App\Http\Resources\Backend\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubKategoriResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'id_kategori' => $this->id_kategori,
            'nama_sub_kategori' => $this->nama_sub_kategori,
            'kategori' => $this->kategori->nama_kategori ?? null, 
        ];
    }
}
