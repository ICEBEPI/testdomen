<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretypeEngineRequest;
use App\Http\Requests\UpdatetypeEngineRequest;
use App\Models\Engine;
use App\Models\typeEngine;

class TypeEngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeEngines = typeEngine::with('engines')->orderbyDesc('id')->get();
        return view('typeEngines.index', compact(['typeEngines']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeEngines = typeEngine::all();
        return view('typeEngines.create', compact(['typeEngines']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretypeEngineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretypeEngineRequest $request)
    {
        $data = $request->validated();
        typeEngine::create($data);
        return redirect()->route('typeEngines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\typeEngine  $typeEngine
     * @return \Illuminate\Http\Response
     */
    public function show(typeEngine $typeEngine)
    {
        return view('typeEngines.show', compact(['typeEngine']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\typeEngine  $typeEngine
     * @return \Illuminate\Http\Response
     */
    public function edit(typeEngine $typeEngine)
    {
        $engine = Engine::all();
        $typeEngines = typeEngine::all();
        return view('typeEngines.edit', compact(['typeEngine', 'typeEngines', 'engine']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetypeEngineRequest  $request
     * @param  \App\Models\typeEngine  $typeEngine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetypeEngineRequest $request, typeEngine $typeEngine)
    {
        $data = $request->validated();
        $typeEngine->update($data);
        return redirect()->route('typeEngines.index', $typeEngine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\typeEngine  $typeEngine
     * @return \Illuminate\Http\Response
     */
    public function destroy(typeEngine $typeEngine)
    {
        if ($typeEngine->engines->count()) {
            return redirect()->back()->withErrors('Тип двигателя не может быть удален');
        }
        $typeEngine->delete();
        return redirect()->route('typeEngines.index');
    }
}
