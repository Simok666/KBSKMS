<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contributor;
use App\Models\Kategori;
use App\Http\Resources\Backend\ContributorResource;
use Illuminate\Database\Eloquent\Builder;
use DB;
class HomeController extends Controller
{
    /**
     * function search kategori
     * 
     * @param Request $request
     * @param Contributor $contributor
     */
    public function search (Request $request, Contributor $contributor) {
        $searchTerm = $request->input('nama_kategori');
        $categories = Kategori::where('nama_kategori', 'like', '%' . $searchTerm . '%')
            ->with('contributor')  
            ->withCount(['contributor' => function (Builder $query) {
                $query->where('status', 'publish');
            }])
            ->get();
        
        if(count($categories) == 0) {
            $categories = [
                'message' => 'Kategori Tidak Ditemukan',
            ];
        }

        return response()->json($categories);
    }
}
