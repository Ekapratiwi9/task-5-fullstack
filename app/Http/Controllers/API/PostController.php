<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Formatter;
use App\Models\Article;
use Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::with('user', 'categories')->paginate(2);

        if ($data) {
            return Formatter::createApi(200, 'Success', $data);
        }
        else {
            return Formatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'image' => 'required',
                'user_id' => 'required',
                'category_id' => 'required',
            ]);
            
            $article = Article::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]);

            $data = Article::where('id', '=', $article->id)->get();

            if ($data) {
                return Formatter::createApi(200, 'Data Berhasil Ditambahkan', $data);
            }
            else {
                return Formatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
           
                return Formatter::createApi(400, 'Failed');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Article::where('id', '=', $id)->get();

        if ($data) {
            return Formatter::createApi(200, 'Success', $data);
        }
        else {
            return Formatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'image' => 'required',
                'user_id' => 'required',
                'category_id' => 'required',
            ]);
            
            $article = Article::findOrFail($id);

            $article->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
            ]);

            $data = Article::where('id', '=', $article->id)->get();

            if ($data) {
                return Formatter::createApi(200, 'Data Berhasil Diupdate', $data);
            }
            else {
                return Formatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
           
                return Formatter::createApi(400, 'Data Tidak Ditemukan');
            
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

        $data = $article->delete();

        if ($data) {
            return Formatter::createApi(200, 'Data Berhasil Dihapus');
        }
        else {
            return Formatter::createApi(400, 'Failed');
        }
    }
}
