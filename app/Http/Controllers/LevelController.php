<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response()->json(Level::all());
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
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $level = new Level;
    $level->name = $request->name;
    $level->level_type = $request->level_type;
    $level->save();

    return response()->json($level);
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Level $taksLevel
   * @return \Illuminate\Http\Response
   */
  public function show(Level $taksLevel)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Level $taksLevel
   * @return \Illuminate\Http\Response
   */
  public function edit(Level $taksLevel)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Level $taksLevel
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Level $level)
  {
    $level->id = $request->id;
    $level->name = $request->name;
    $level->level_type = $request->level_type;

    $level->save();

    return response()->json($level);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Level $taksLevel
   * @return \Illuminate\Http\Response
   */
  public function destroy(Level $level)
  {
//    $level->delete();
  }
}
