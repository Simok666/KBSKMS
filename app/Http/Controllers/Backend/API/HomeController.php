<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contributor;
use App\Models\Kategori;
use App\Http\Resources\Backend\ContributorResource;
use Illuminate\Database\Eloquent\Builder;
use DB;
use App\Models\Like;
use App\Models\Rating;
use App\Models\Share;
use App\Models\Comment;

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

    /**
     * function get kategori
     * 
     * @param Request $request
     * @param Contributor $contributor
     */
    public function getContent (Request $request, Contributor $contributor) {
        $nameKategori = $request->category;
        $content = $contributor::with('kategori')->whereHas('kategori', function ($query) use ($nameKategori) {
            $query->where('nama_kategori', $nameKategori);
        })
        ->where('status', 'publish')
        ->paginate("10");
        
        return ContributorResource::collection($content);
    }

    /**
     * function get single content
     * 
     * @param Request $request
     * @param Contributor $contributor
     */
    public function getBlog (Request $request, Contributor $contributor) {
        $slugContent = $request->slug;
        $content = $contributor::with('likes', 'comments.user')
                ->where('slug', $slugContent)
                ->where('status', 'publish')
                ->first();
    
        return new ContributorResource($content);
    }

    /**
     * function like konten
     * 
     * @param Request $request
     * @param Like $like
     * @param Contributor $contributor
     */
    public function like (Request $request, like $like, Contributor $contributor) {
        try {
        DB::beginTransaction();
        $userId = $request->user()->id ?? null;
        $contributorId = $request->contributor_id;
        $id = $request->id ?? null;
        $liked = $request->liked == "true" ? true : false;
       
        if($userId) {
            $dataLike = $like::updateOrCreate(
                [
                    'user_id' => request("userId"),
                    'contributor_id' => $contributorId,
                ],
                [
                    'user_id' => $userId,
                    'contributor_id' => $contributorId,
                    'liked' => $liked
                ]
            );
        }
        DB::commit();
        
        }catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating data: ' . $ex->getMessage()], 400);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
        }

    }

    /**
     * function like konten
     * 
     * @param Request $request
     * @param Rating $rating
     * @param Contributor $contributor
     */
    public function rating (Request $request, Rating $rating, Contributor $contributor) {
        try {
        DB::beginTransaction();
        $userId = $request->user()->id ?? null;
        $contributorId = $request->contributor_id;
        $ratings = $request->rating;
       
        if($userId) {
            $dataLike = $rating::updateOrCreate(
                [
                    'user_id' => request("userId"),
                    'contributor_id' => $contributorId,
                ],
                [
                    'user_id' => $userId,
                    'contributor_id' => $contributorId,
                    'rating' => $ratings
                ]
            );
        }
        DB::commit();
        
        }catch(\Illuminate\Database\QueryException $ex) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred creating data: ' . $ex->getMessage()], 400);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
        }

    }

    /**
     * share the widget
     * 
     * @param Request $request
     * @param Share $share
     */
    public function share(Request $request, Share $share) {
        try {
            
            DB::beginTransaction();
            $userId = $request->user()->id ?? null;
            $contributorId = $request->contributor_id;
            $is_shared = $request->isShare == "true" ? true : false;
            $platform = $request->platform;
            
            if($userId) {
                
                $dataShare = $share::create(
                    [
                        'user_id' => $userId,
                        'contributor_id' => $contributorId,
                        'is_shared' => $is_shared,
                        'platform' => $platform
                    ]
                );
            }
            DB::commit();
            
            }catch(\Illuminate\Database\QueryException $ex) {
                DB::rollBack();
                return response()->json(['error' => 'An error occurred creating data: ' . $ex->getMessage()], 400);
            }catch(\Exception $e) {
                DB::rollBack();
                return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
            }
    }

     /**
     * share the widget
     * 
     * @param Request $request
     * @param Comment $comment
     */
    public function comment(Request $request, Comment $comment) {
        try {
            DB::beginTransaction();
            $userId = $request->user()->id ?? null;
            $contributorId = $request->contributor_id;
            $komentar = $request->komentar;
          
            if($userId) {
                
                $dataComment = $comment::create(
                    [
                        'user_id' => $userId,
                        'contributor_id' => $contributorId,
                        'komentar' => $komentar,
                    ]
                );
            }
            DB::commit();
           
            $data = $comment::with('user', 'contributor')
                ->whereHas('contributor', function ($query) use ($contributorId) {
                    $query->where('contributor_id', $contributorId);
                })
                ->get();
                
            return response()->json($data);
            
            }catch(\Illuminate\Database\QueryException $ex) {
                DB::rollBack();
                return response()->json(['error' => 'An error occurred creating data: ' . $ex->getMessage()], 400);
            }catch(\Exception $e) {
                DB::rollBack();
                return response()->json(['error' => 'An error occurred while creating data: ' . $e->getMessage()], 400);
            }
    }
    
}
