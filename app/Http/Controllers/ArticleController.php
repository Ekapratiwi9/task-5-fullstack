<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::with('user', 'categories')->paginate(5);
        return view('article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::all();
        return view('article.create', compact('category'));
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
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);

        $file= $request->file('image');
        $file->move('upload', $file->getClientOriginalName());
        $file_name=$file->getClientOriginalName();

       Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $file_name,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

       
        return redirect('article')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::with('categories')->findOrFail($id);
        $category = Categories::all();
        return view('article.edit', compact('article', 'category'));
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

        if (empty($request->file('image'))) {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'image' => 'required|image|mimes:png,jpg,jpeg',
                'user_id' => 'required',
                'category_id' => 'required',
            ]);
    
           Article::findOrFail($id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]);
            return redirect('article')->with('success', 'Article Updated Successfully');
        } else {
            
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'image' => 'required|image|mimes:png,jpg,jpeg',
                'user_id' => 'required',
                'category_id' => 'required',
            ]);

            $article = Article::findOrFail($id);
            Storage::delete($article->image);

            $file= $request->file('image');
            $file->move('upload', $file->getClientOriginalName());
            $file_name=$file->getClientOriginalName();

           $article->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $file_name,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]);
            return redirect('article')->with('success', 'Article Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('article')->with('success', 'Article Delected Successfully');
    }
}
