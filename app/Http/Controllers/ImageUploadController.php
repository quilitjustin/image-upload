<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageUploadModel as Upload;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index", [
            'pictures' => Upload::all()
        ]);
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
        //You can use a middleware for this instead
        //But will do it here to avoid confusing the who who will use this where to look
        $request->validate([
            //Can't be empty
            //only accpt the file type ff: jpg, png, jpeg
            //max size of 5048mb
            'image' => ["required", "mimes:jpg,png,jpeg", "max:5048"]
        ]);

        $newName = time().$request->image->extension();

        $request->image->move(public_path('images'), $newName);
    
        $image = new Upload;
        $image->path = $newName;
        $image->save();

        return redirect()->route("index");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
