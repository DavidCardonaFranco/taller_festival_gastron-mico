<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;

class commentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CommentFormRequest $request)
    {
        $comment = new Comment(array(
            'restaurant_id' => $request->get('restaurant_id'),
            'comment' => $request->get('comment')
        ));

        $comment->save();
        return redirect()->back()->with('status','Tu comentario ha sido creado!');
    }
}
