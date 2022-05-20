<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    // Restrict non logged in user to access certain page
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('review.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'year' => 'required|integer|gte:1900|lte:2022',
            'casts' => 'required',
            'description' => 'required',
            'rating' => 'required|integer|gte:0|lte:100',
            'videoUrl' => 'required|url',
            'image' => 'required|mimes:jpg,png,jpeg|max:5120',
        ]);

        $slugTitle = SlugService::createSlug(Post::class, 'slug', $request->title);

        $newImageName = uniqid() . '-' . $slugTitle . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'slug' => $slugTitle,
            'year' => $request->input('year'),
            'casts' => $request->input('casts'),
            'description' => $request->input('description'),
            'rating' => $request->input('rating'),
            'video_url' => $request->input('videoUrl'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/review')->with('message', 'Your review has been posted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('review.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('review.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:255',
            'year' => 'required|integer|gte:1900|lte:2022',
            'casts' => 'required',
            'description' => 'required',
            'rating' => 'required|integer|gte:0|lte:100',
            'videoUrl' => 'required|url',
        ]);

        Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'year' => $request->input('year'),
                'casts' => $request->input('casts'),
                'description' => $request->input('description'),
                'rating' => $request->input('rating'),
                'video_url' => $request->input('videoUrl'),
                'user_id' => auth()->user()->id,
            ]);

        return redirect('/review')
            ->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/review')
            ->with('message', 'Successfully deleted your post!');
    }
}