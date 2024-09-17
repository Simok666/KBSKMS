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
            'satuan_kerja_eselon_3' => $this->eselon_tiga->nama_satuan_kerja_eselon_3,
            'satuan_kerja_eselon_2' => $this->eselon_dua->nama_satuan_kerja_eselon_2,
            'satuan_kerja_eselon_1' => $this->eselon_satu->nama_satuan_kerja_eselon_1,
            'nama_jabatan' => $this->nama_jabatan,
            'fungsi' => $this->fungsi->nama_fungsi,
            'email' => $this->email,
            'is_verified' => $this->is_verified
       ];
    }
}
