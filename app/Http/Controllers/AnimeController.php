<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $animes = Anime::orderBy('anime_id')->paginate(50);

        return view('anime.index', compact('animes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anime.create');
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
        $this->validate($request, [
            'anime_id' => 'required|numeric',
            'name' => 'required|string',
            'genre' => 'required|string',
            'type' => 'required|string',
            'episodes' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:10',
            'members' => 'required|numeric',
        ]);
        $anime = new Anime();
        $anime->anime_id = (int)$request->input('anime_id');
        $anime->name = $request->input('name');
        $anime->genre = $request->input('genre');
        $anime->type = $request->input('type');
        $anime->episodes = (int)$request->input('episodes');
        $anime->rating = (float)$request->input('rating');
        $anime->members = (int)$request->input('members');
        $anime->save();
        return redirect('anime')->with('success', 'Anime has been successfully added');
        //
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
        $anime = Anime::find($id);

        return view('anime.edit', compact('anime'));
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
        $this->validate($request, [
            'anime_id' => 'required|numeric',
            'name' => 'required|string',
            'genre' => 'required|string',
            'type' => 'required|string',
            'episodes' => 'required|numeric',
            'rating' => 'required|numeric|min:0|max:10',
            'members' => 'required|numeric',
        ]);
        $anime = Anime::find($id);
        $anime->anime_id = (int)$request->input('anime_id');
        $anime->name = $request->input('name');
        $anime->genre = $request->input('genre');
        $anime->type = $request->input('type');
        $anime->episodes = (int)$request->input('episodes');
        $anime->rating = (float)$request->input('rating');
        $anime->members = (int)$request->input('members');
        $anime->update();
        return redirect('anime')->with('success', 'Anime has been successfully edited');
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
        $anime = Anime::find($id);
        $anime->delete();
        return redirect('anime')->with('success','Anime has been deleted');
        //
    }

    public function typeAverage()
    {
        $animes =
        Anime::raw(function($animeCollect) {
            return $animeCollect->aggregate([
                ['$group' =>
                    [
                        '_id' => '$type',
                        'avgRating' => [
                            '$avg' => '$rating'
                        ]
                    ]
                ]
            ]);
        });

        return view('anime.typeavg', compact('animes'));
    }

    public function typeSum()
    {
        $animes =
        Anime::raw(function($animeCollect) {
            return $animeCollect->aggregate([
                ['$group' =>
                    [
                        '_id' => '$type',
                        'count' => [
                            '$sum' => 1
                        ]
                    ]
                ]
            ]);
        });

        return view('anime.typesum', compact('animes'));
    }
    
}
