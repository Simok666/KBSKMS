<?php

namespace App\Http\Resources\Backend\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
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
            'nama' => $this->name,
            'nip' => $this->nip,
            'satuan_kerja_eselon_3' => $this->satuan_kerja_eselon_3,
            'satuan_kerja_eselon_2' => $this->satuan_kerja_eselon_2,
            'satuan_kerja_eselon_1' => $this->satuan_kerja_eselon_1,
            'nama_jabatan' => $this->nama_jabatan,
            'fungsi' => $this->fungsi,
            'email' => $this->email,
       ];
    }
}
