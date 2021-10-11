<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use Illuminate\Support\Arr;

class CommentsController extends Controller
{
    public function newComment(CommentFormRequest $request)
    {
        $comment = new Comment(array(
            'restaurant_id' => $request->get('restaurant_id'),
            'comment' => $request->get('comment')
        ));

        $comment->save();
        return redirect()->back()->with('status','Tu comentario ha sido creado!');
    }
}
