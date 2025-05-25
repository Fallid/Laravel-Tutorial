<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('storage.create_picture');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file("file");
        $name = $request->name;

        /** gunakan original Name untuk mendapatkan nama dan extension file
         * atau $file->getClientOriginalExtension(); untuk mendapatkan extension filenya saja */
        $path = time() . "_" .$name . "_" . $file->getClientOriginalName();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        Picture::create([
            'name' => $name,
            'path' => $path
        ]);

        return Redirect::route("picture.create");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
