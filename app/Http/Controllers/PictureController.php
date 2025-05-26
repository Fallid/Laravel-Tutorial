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
        $path = time() . "_" . $name . "_" . $file->getClientOriginalName();

        Storage::disk('public')->put('' . $path, file_get_contents($file));

        Picture::create([
            'name' => $name,
            'path' => $path
        ]);

        return Redirect::route("picture.create");
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        $url = Storage::url($picture->path);
        return view('storage.picture_detail', compact('url', 'picture'));
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
    public function destroy(Picture $picture)
    {
        $publicDisk = Storage::disk('public');
        $privateDisk = Storage::disk('local');
        $filePath = $picture->path;
        $fileName = basename($filePath);
        $filePrivatePath = 'trash/'.$fileName ;
        $pictureId = Picture::findOrFail($picture->id);

        $fileContent = Storage::disk('public')->get($filePath);
        $privateDisk->put($filePrivatePath, $fileContent);
        $publicDisk->delete($filePath);

        $pictureId->update([
            "path"=>$filePrivatePath
        ]);
        $pictureId->delete();
        return Redirect::route('picture.create');
    }
}
