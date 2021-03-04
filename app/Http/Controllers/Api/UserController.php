<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorCommentsResource;
use App\Http\Resources\AuthorPostResource;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @return UsersResource
     */
    public function index()
    {
        $users = User::paginate();
        return new UsersResource($users);
    }

    /**
     * @param Request $request
     * @return UserResource
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return  new UserResource($user);
    }

    /**
     * @param $id
     * @return UserResource
     */
    public function show($id)
    {
        return new UserResource(User::find($id));
    }

    /**
     * @param Request $request
     * @param $id
     * @return UserResource
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($request->has('name')){
            $user->name = $request->get('name');
        }
        if($request->has('avatar')){
            $user->avatar = $request->get('avatar');
        }
        $user->save();
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $id
     * @return AuthorPostResource
     */
    public function posts($id){
        $user = User::find($id);
        $posts = $user->posts()->paginate();
        return new AuthorPostResource($posts);
    }

    /**
     * @param $id
     * @return AuthorCommentsResource
     */
    public function comments($id){
        $user = User::find($id);
        $comments = $user->comments()->paginate();
        return new AuthorCommentsResource($comments);
    }

    /**
     * @param Request $request
     * @return TokenResource|string
     */
    public function getToken(Request $request){
        $request -> validate(['email =>required', 'paddword=>required']);
        $credentials = $request->only('email' ,'password');
        if(Auth::attempt($credentials)){
            $user= User::where('email', $request->get('email'))->first();
            return new TokenResource(['token'=> $user->api_token]);
        } return 'NOT FOUND ';
    }

}


