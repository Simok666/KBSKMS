<?php

namespace App\Http\Resources\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Backend\ImageResource;

class DahsboardUserResource extends JsonResource
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
            'nip' => $this->nip,
            'name' => $this->name,
            'bidang_keahlian' => $this->bidang_keahlian,
            'bidang_pendidikan' => $this->bidang_pendidikan,
            'image_profile' => ImageResource::collection($this->getMedia('image_profile')) ?? null,
            'badge_contributor' => $this->badgeContributor ?? null,
            'badge_verificator' => $this->badgeVerificator ?? null,
            'badge_contributor_id' => $this->badge_contributor_id,
            'badge_verificator_id' => $this->badge_verificator_id
        ];
    }
}
