<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // with() method use lazy load, but needs function in Link model for that
        $links = Auth::user()
        ->links()
        ->withCount('visits')
        ->with('latest_visit')
        ->get();

        return view('links.index', [
            'links' => $links
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
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
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link = Auth::user()->links()->create($request->only(['name', 'link']));
        
        if($link){
            return redirect()->route('links.index');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "LinkController@show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        if($link->user_id != Auth::id()){
            return abort(404);
        }

        return view('links.edit', [
            'link' => $link
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        if($link->user_id != Auth::id()){
            return abort(403);
        }

        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link->update($request->only(['name', 'link']));
        
        return redirect()->route('links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Link $link)
    {
        if($link->user_id != Auth::id()){
            return abort(403);
        }

        $link->delete();

        return redirect()->route('links.index');
    }
}
