<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentsController extends PostsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()==null or\Auth::user()->role->name != 'admin')
        {
            return back()->with(['success' => false,
                'message_type' => 'failure',
                'message' => 'You are not allowed to perform this action.']);
        }
        $comments=Comment::orderBy('created_at', 'asc')->get();
        $posts=$this->get_all_posts();
        return view('adminContent', compact('comments','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storecomm(CommentRequest $request,$post_id)
    {
        $comment=new Comment();
        $comment->user_id=\Auth::user()->id; //ID aktualnie zalogowanego
        $comment->post_id=$post_id;
        $comment->message=$request->message; //Nazwa pola z validatora
        if($comment->save())
        {
            return redirect()->route('show',$post_id);
        }
        return "Wystąpił błąd.";
    }

    /**
     * Display  specified resource.
     *
     * @param  int  $postid
     * @return \Illuminate\Http\Response
     */
    public function show_postAndComments($postid)
    {
        $comments=Comment::where('post_id', $postid)->orderBy('updated_at')->get();
        $postdata=$this->showpost($postid);
        return view('posts', compact('postdata','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if (\Auth::user()->id != $comment->user_id) {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        return view('commentEditForm', compact('comment'));
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
        $comment = Comment::find($id);
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if(\Auth::user()->id != $comment->user_id)
        {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        $comment->message = $request->message;
        if($comment->save()) {
            return redirect()->route('show',$comment->post->id);
        }
        return "Wystąpił błąd.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if(\Auth::user()->id != $comment->user_id and \Auth::user()->role->name != 'admin')
        {
            return back()->with(['success' => false,
                'message_type' => 'failure',
                'message' => 'Error in CommentController::destroy('.
                    $comment->id.').']);
        }
        if($comment->delete()){
            return back()->with(['success' => true,
                'message_type' => 'success',
                'message' => 'Success '.
                    $comment->id.'.']);
        }
        return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Wystąpił błąd podczas kasowania komentarza użytkownika '.
                $comment->user->name.'. Spróbuj później.']);
    }

    public function get_users_ComsAndPosts($user_id=1)
    {
        if (!\Auth::check())
        {
            return redirect()->route('/');
        }
        $user_id=\Auth::user()->id;
        $commentsdata = Comment::where('user_id', $user_id)->orderBy('updated_at')->get();
        $postsdata=$this->get_users_posts($user_id);
        return view('home',compact('postsdata','commentsdata'));
    }


}
