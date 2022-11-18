<?php

namespace App\Http\Controllers;

use App\Models\Titem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:inventarios.titems.index')->only('index');
        $this->middleware('can:inventarios.titems.create')->only('create','store');
        $this->middleware('can:inventarios.titems.edit')->only('edit','update');
        $this->middleware('can:inventarios.titems.destroy')->only('destroy');
        $this->middleware('can:inventarios.titems.show')->only('show');
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $titems = Titem::all();
        return view('inventarios.titems.index',compact('titems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('inventarios.titems.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $titem = new Titem();
        $titem->nombre = $request->nombre;
        $titem->save();
        return Redirect::route('inventarios.titems.index');
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
        $titem = Titem::findOrfail($id);
        return view('inventarios.titems.edit', compact('titem'));
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
        $titem = Titem::findOrfail($id);
        $titem->nombre = $request->nombre;
        $titem->update();
        return Redirect::route('inventarios.titems.index');
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
        $titem = Titem::findOrFail($id);
        $titem->delete();
        return Redirect::route('inventarios.titems.index');
    }
}
