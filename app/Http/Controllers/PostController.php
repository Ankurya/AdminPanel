<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
// use App\Models\User;
use App\Models\Comment;
use App\Models\LikeDislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\BlogPostRequst;

class PostController extends Controller
{


/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        
      $posts =  DB::table('users')
        ->join('posts','posts.user_id','=','users.id')
        ->select('posts.*','users.id')
        ->get();

        $total_likes = LikeDislike::all()->count();

        $total_comments = Comment::all()->count();

        return view('posts.index')->with(['posts'=>$posts,'total_likes'=>$total_likes,'total_comments'=>$total_comments]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $createData = [
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'user_id' => auth()->user()->id,

            

        ];
        if ($request->hasFile("profile_pic")) {

            $file = $request->file("profile_pic");
            $imageName = uniqid() . "_" . $file->getClientOriginalName();
            $destinationPath = 'images';
            $file->move($destinationPath, $imageName);
            $createData["profile_pic"] = $imageName;

        }
        $isCreated = Post::create($createData);
        if ($isCreated) {
            return redirect('posts')->with("success", "Post created successfully.");
        } else {
            return redirect('posts')->with("error", "Unable to create post.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('user_id',$id)->first();
        $count = LikeDislike::where('post_id', $id)->count();
        $posts = Post::where('user_id',$id)->with('comments')->first();
        $user_like_count = LikeDislike::where('user_id', $id)->where('user_id', auth()->user()->id)->count();
        dd($user_like_count);
        return view('posts.view')->with(['post' => $post, 'comments' => $posts->comments, 'count'=>$count, 'user_like_count' => $user_like_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('user_id',$id)->first();
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $isUpdated = Post::find($id)->update($request->all());
        if ($isUpdated) {
            return redirect('posts')->with("success", "Post details updated successfully.");
        } else {
            return redirect('posts')->with("success", "Post details not updated.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
         return back();

    }

    public function blockPost($id)
    {

        $user = Post::find($id);

        if ($user->status == '0') {
            $updatedata = [
                'status' => '1',
            ];

            Post::whereId($id)->update($updatedata);
        }
    }

    public function unblockPost($id)
    {
        $user = Post::find($id);

        if ($user->status == '1') {
            $updatedata = [
                'status' => '0',
            ];

            Post::whereId($id)->update($updatedata);
        }
    }
}