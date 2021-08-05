<?php

namespace Modules\CommentModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\CommentModule\Entities\Comment;

class CommentController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:comment-create',   ['only' => ['create','store']]);
    //     $this->middleware('permission:comment-edit',     ['only' => ['edit','update']]);
    //     $this->middleware('permission:comment-list',     ['only' => ['show', 'index']]);
    //     $this->middleware('permission:comment-delete',   ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('commentmodule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('commentmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'content'     => 'required',
        ]);

        $request['user_id']=Auth::user()->id;

        $comment =Comment::create($request->only('user_id','product_id','content'));

        if($comment)
        return response()->json([
            'status'=>true,
            'msg'=>'تم انشاء  بنجاح',
        ]);


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('commentmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('commentmodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'content'     => 'required',
        ]);

        $comment =Comment::find($id);
        $comment->update($request->only('content'));
        $comment->save();

        return 'updated';
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $comment =Comment::find($id);

        if(!$comment){
            return "comment not found";
        }

        $comment->delete();
        return 'deleted';
    }

}
