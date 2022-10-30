<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Formatter;
use Exception;
use App\Models\Categories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categories::all();

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
        //
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
                'name' => 'required',
            ]);
            
            $category = Categories::create([
                'name' => $request->name,
            ]);

            $data = Categories::where('id', '=', $category->id)->get();

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
            $data = Categories::where('id', '=', $id)->get();

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
                'name' => 'required',
            ]);
            
            $category = Categories::findOrFail($id);

            $category->update([
                'name' => $request->name,
            ]);

            $data = Categories::where('id', '=', $category->id)->get();

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
        $category = Categories::findOrFail($id);

        $data = $category->delete();

        if ($data) {
            return Formatter::createApi(200, 'Data Berhasil Dihapus');
        }
        else {
            return Formatter::createApi(400, 'Failed');
        }
    }
}
