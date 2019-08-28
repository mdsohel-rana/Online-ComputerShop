<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index' ,'show']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
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

//search.................................................
    public function search(Request $request){
        $search_text = $request->search;
        $posts = Post::orderBy('created_at', 'desc')
            ->where('title', 'like', '%'.$search_text.'%')
            ->orwhere('body', 'like', '%'.$search_text.'%')
        
        
            ->paginate(10);
    
            return view('posts.index')->withposts($posts);
    }


    //find Catagory..........................

    public function findcat(Request $request){
        $button = $request->button;
        $posts = Post::orderBy('created_at', 'desc')
            ->where('title', 'like', '%'.$button.'%')
            ->orwhere('body', 'like', '%'.$button.'%')
        
        
            ->paginate(10);
    
            return view('posts.index')->withposts($posts);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|required|max:1999'
        ]);
        //handle file upload
         if($request->hasFile('cover_image')){
             //get file ext
             $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
             //filename
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             //just ext
             $extension = $request->file('cover_image')->getClientOriginalExtension();
             //Store file name
             $fileNameToStore = $filename.'_'.time().'.'.$extension;
             //upload
             $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

         }else{
             $fileNameToStore = 'noimage.jpg';
         }


        //Posts Jobs
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Job Posted Successsfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
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

        //check for authenticate user to its operation
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'You are unauthorized to access this page');
        }
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //handle file upload
        if($request->hasFile('cover_image')){
            //get file ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Store file name
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }

        //update Jobs
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Job Updated Successsfully');
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

        //check for authenticate user to its operation
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'You are unauthorized to access this page');
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete Imaghe
            Storage::delete('public/cover_images/'.$post->cover_image);

        }

       $post->delete(); 
       return redirect('/posts')->with('success', 'Job Deleted Successsfully');
    }
}
