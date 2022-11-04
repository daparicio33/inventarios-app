<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Marca;
use App\Models\Titem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
        ->where('almacene_id','=',almacen())
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
                //como tiene padre vamos a buscar sus atributos
                $padre = Item::findOrFail($request->item_id);
                $item->marca_id = $padre->marca_id;
                $item->titem_id = $padre->titem_id;
            }else{
                $item->marca_id = $request->marca_id;
                $item->titem_id = $request->titem_id;
            }
            if($request->hasFile('url')){
                $url = Storage::put('public/items', $request->file('url'));
                $item->url = $url;
            }
            $item->codigo = $request->codigo;
            $item->descripcion = $request->descripcion;
            $item->almacene_id = almacen();
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
        $item = Item::findOrFail($id);
        $marcas = Marca::pluck('nombre','id')->toArray();
        $titems = Titem::pluck('nombre','id')->toArray();
        $items = Item::all();
        return view('inventarios.items.edit',compact('item','marcas','titems','items'));
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
        try {
            //code...
            $item = Item::findOrFail($id);
            if ($request->item_id != 0){
                $item->item_id = $request->item_id;
                //como tiene padre vamos a buscar sus atributos
                $padre = Item::findOrFail($request->item_id);
                $item->marca_id = $padre->marca_id;
                $item->titem_id = $padre->titem_id;
            }else{
                $item->marca_id = $request->marca_id;
                $item->titem_id = $request->titem_id;
            }
            if($request->hasFile('url')){
                $url = Storage::put('public/items', $request->file('url'));
                $item->url = $url;
            }
            $item->codigo = $request->codigo;
            $item->descripcion = $request->descripcion;
            $item->update();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('inventarios.items.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('inventarios.items.index')
        ->with('info','se actualizo de forma correcta el archivo');
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
        try {
            //code...
            $item = Item::findOrFail($id);
            $item->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('inventarios.items.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('inventarios.items.index')
        ->with('info','el item se elimino correctamente');
    }
}
