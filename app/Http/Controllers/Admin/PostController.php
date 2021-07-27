<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        //dd($category);
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        //nuova istanza
        $newPost = new Post();
        $slug = Str::slug($data['title'], '-');
        
        $slugVerifica = Post::where('slug', $slug)->first();
        //dd($slugVerifica);

        $slug_base = $slug;
        $count = 1;

        while($slugVerifica != null){
            
            $slug = $slug_base . "-" . $count;

            $slugVerifica = Post::where('slug', $slug)->first();
            $count++;
        }

        $data['slug'] = $slug;
        

        $newPost->fill($data);
        
        $newPost->save();
        return redirect()->route('admin.posts.show', $newPost->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        //dd($data);
        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required',
            'category_id' => 'nullable|exists:categories,id'
        ]);

               
        //dd($slug != $post->slug);
        if($data['title'] != $post->title) {

            $slug = Str::slug($data['title'], '-');
        
            $slugVerifica = Post::where('slug', $slug)->first();
            //dd($slugVerifica);
    
            $slug_base = $slug;
            $count = 1;
    
            while($slugVerifica != null){
                
                $slug = $slug_base . "-" . $count;
    
                $slugVerifica = Post::where('slug', $slug)->first();
                $count++;
            }

            $data['slug'] = $slug;
        }       

        $post->update($data);
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()
            ->route('admin.posts.index')
            ->with('deleted', $post->title);;
    }
}
