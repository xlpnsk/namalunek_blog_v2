<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postdata=Post::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('postdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()==null or (\Auth::user()->role->name != 'admin' and \Auth::user()->role->name != 'writer'))
        {
            return back();
        }
        $postdata=new Post();
        return view('postForm', compact('postdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if(\Auth::user()==null or (\Auth::user()->role->name != 'admin' and \Auth::user()->role->name != 'writer'))
        {
            return back();
        }
        $postdata=new Post();
        $postdata->user_id=\Auth::user()->id; //ID aktualnie zalogowanego
        $postdata->title=$request->title; //Nazwy pol z validatora
        $postdata->photo=$request->photo;
        $postdata->content=$request->post_content;
        $postdata->summary=$request->summary;
        if($postdata->save())
        {
            return redirect()->route('home');
        }
        return "Error.";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showpost($id)
    {
        $postdata = Post::find($id);
        return $postdata;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if (\Auth::user()->id != $post->user_id) {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'You are not allowed to perform this action.']);
        }
        return view('postEditForm', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if(\Auth::user()->id != $post->user_id)
        {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'You are not allowed to perform this action.']);
        }
        $post->title = $request->title;
        $post->photo = $request->photo;
        $post->content = $request->post_content;
        $post->summary = $request->summary;
        if($post->save()) {
            return redirect()->route('home');
        }
        return "Error.";
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
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if(\Auth::user()->id != $post->user_id and \Auth::user()->role->name != 'admin')
        {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'You are not allowed to perform this action.']);
        }
        if($post->delete()){
            return redirect()->route('/')->with(['success' => true,
                'message_type' => 'success',
                'message' => 'Post "'.
                    $post->title.'" has been deleted succesfully.']);
        }
        return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Error. Post "'.
                $post->title.'" have not been deleted. Try again later.']);
    }

    /**
     * Give the specified user's resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function get_users_posts($user_id)
    {
        $postdata = Post::where('user_id', $user_id)->orderBy('updated_at')->get();
        return compact('postdata');
    }

    /**
     * Give all resources.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_posts()
    {
        $postdata=Post::orderBy('created_at', 'desc')->get();
        return $postdata;
    }
}
