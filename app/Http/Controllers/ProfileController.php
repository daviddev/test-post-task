<?php

namespace App\Http\Controllers;

use App\Mail\DeleteAccount;
use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(){
        $posts = Post::query()->with('user')->latest()->paginate(8);
        return view('profile.home', compact('posts'));
    }

    /**
     * Send mail to user
     * Remove the specified resource from storage.
     *
     * @return string
     * @throws \Exception
     */
    public function destroy()
    {
        try{
            $user = User::query()->findOrFail(Auth::id());
            Mail::to($user->email)->send(new DeleteAccount($user));
            $user->delete();
            Auth::logout();
            return redirect(route('login'));
        } catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}
