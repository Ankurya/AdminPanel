<?php

namespace App\Http\Controllers\Post;

use App\Models\LikeDislike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeDislikeController extends Controller
{
    
    public function likeDislike(Request $request)
    {
        
        $like = LikeDislike::where(['user_id' => $request->user_id, 'post_id' =>  $request->post_id])->first();
        if($like == null)
        {
            $createLike = LikeDislike::create(['user_id'=>$request->user_id,'post_id'=>$request->post_id,'status'=>'1']);
            $like = LikeDislike::all()->count();
        }

     if ($like->status == 1) {
          $like->update(['status'=>'0']);
     } else {
         $like->update(['status'=>'1']);
      
     }
    }
}
