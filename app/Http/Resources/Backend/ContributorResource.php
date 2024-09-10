<?php

namespace App\Http\Resources\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Backend\ImageResource;


class ContributorResource extends JsonResource
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
            'judul' => $this->judul,
            'dekskripsi' => $this->dekskripsi,
            'nama_kategori' => $this->kategori->nama_kategori,
            'image_thumbnail' => ImageResource::collection($this->getMedia('image_thumbnail')), 
            'upload_lampiran' => ImageResource::collection($this->getMedia('upload_lampiran')),
            'tag' => $this->tag,
            'user_contributor' => $this->user->name ?? null, 
            'id_user_contributor' => $this->id_user_contributor,
            'id_kategori' => $this->id_kategori,
            'tipe' => $this->tipe,
            'status' => $this->status,
            'status_verifikator' => $this->status_verifikator,
            'id_user' => $this->id_user
        ];
    }
}
