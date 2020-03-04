<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->getMessages()
            ]);
        }

        Post::query()->create([
            'user_id' => Auth::id(),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::query()->with('comments', 'comments.user')->findOrFail($id);
        return view('profile.post', compact('post'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $post = Post::query()->where([
            'id' => $id,
            'user_id' => Auth::id()
        ])->firstOrFail();
        $post->delete();
        return redirect(route('home'));
    }
}
