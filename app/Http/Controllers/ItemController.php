<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Marca;
use App\Models\Titem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::orderBy('id','desc')
        ->where('item_id','=',null)
        ->get();
        return view('inventarios.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items = Item::all();
        $marcas = Marca::pluck('nombre','id')->toArray();
        $titems = Titem::pluck('nombre','id')->toArray();
        return view('inventarios.items.create',compact('marcas','titems','items'));
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
        try {
            //code...
            $item = new Item();
            if ($request->item_id != 0){
                $item->item_id = $request->item_id;
            }
            $item->codigo = $request->codigo;
            $item->descripcion = $request->descripcion;
            $item->marca_id = $request->marca_id;
            $item->titem_id = $request->titem_id;
            $item->save();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            return Redirect::route('inventarios.items.index');
        }
        return Redirect::route('inventarios.items.index');
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
