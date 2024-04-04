<?php

namespace App\Http\Controllers;

use App\Models\Engine;
use App\Http\Requests\StoreEngineRequest;
use App\Http\Requests\UpdateEngineRequest;
use App\Models\TypeEngine;

class EngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engines = Engine::with('car')->orderByDesc('id')->get();

        return view('engines.index', compact(['engines']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeEngine::all();
        return view('engines.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEngineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEngineRequest $request)
    {
        $data = $request->validated();
        $engine = Engine::create([
            'volume' => $data['volume'],
            'type' => $data['type'],
            'hp' => $data['hp'],
        ]);
        return redirect()->route('engines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Engine  $engine
     * @return \Illuminate\Http\Response
     */
    public function show(Engine $engine)
    {
        return view('engines.show', compact(['engine']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Engine  $engine
     * @return \Illuminate\Http\Response
     */
    public function edit(Engine $engine)
    {
        $types = TypeEngine::all();
        return view('engines.edit', compact(['engine', 'types']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEngineRequest  $request
     * @param  \App\Models\Engine  $engine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEngineRequest $request, Engine $engine)
    {
        $data = $request->validated();
        $engine->update([
            'volume' => $data['volume'],
            'type' => $data['type'],
            'hp' => $data['hp'],
        ]);
        return redirect()->route('engines.index', $engine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Engine  $engine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Engine $engine)
    {
        if($engine->car){
          return redirect()->back()->withErrors('Двигатель установлен на авто');
        }
        $engine->delete();
        return redirect()->back();
    }

}
