<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index()
    {
        $albums = Album::all();
        return response()->json($albums);
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required' 
        ]);
        $album = Album::create($request->all());
        return response()->json(['message'=> 'album created', 
        'album' => $album]);
    }
    /**
     * Display the specified resource.
     *
     * @param  AppAlbum  $album
     * @return IlluminateHttpResponse
     */
    public function show(Albums $album)
    {
        return $album;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  AppAlbum  $album
     * @return IlluminateHttpResponse
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  AppAlbum  $album
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required' 
        ]);
        $expense->name = $request->name;
        $expense->amount = $request->amount;
        $album->description = $request->description();
        $album->save();
        
        return response()->json([
            'message' => 'album updated!',
            'album' => $album
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  AppAlbum  $album
     * @return IlluminateHttpResponse
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return response()->json([
            'message' => 'album deleted'
        ]);
        
    }
}
