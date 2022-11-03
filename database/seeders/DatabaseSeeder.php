<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Marca;
use App\Models\Titem;
use App\Models\Tmovimiento;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $marca1=Marca::create(['nombre'=>'Bosh']);
        $marca2=Marca::create(['nombre'=>'Truper']);
        $marca3=Marca::create(['nombre'=>'Castrol']);
        //
        $titem1=Titem::create(['nombre'=>'Herramienta']);
        $titem2=Titem::create(['nombre'=>'Conectores']);
        $titem3=Titem::create(['nombre'=>'Llaves']);
        //item superiores
        $item1 = Item::create([
            'codigo'=>'001',
            'descripcion'=>'What is Lorem Ipsum',
            'marca_id'=>$marca1->id,
            'titem_id'=>$titem1->id
        ]);
        //item inferios
        Item::create([
            'codigo'=>'002',
            'descripcion'=>'What is Lorem Ipsum 01',
            'marca_id'=>$marca1->id,
            'titem_id'=>$titem1->id,
            'item_id'=>$item1->id
        ]);
        Item::create([
            'codigo'=>'003',
            'descripcion'=>'What is Lorem Ipsum 02',
            'marca_id'=>$marca1->id,
            'titem_id'=>$titem1->id,
            'item_id'=>$item1->id
        ]);
        Item::create([
            'codigo'=>'004',
            'descripcion'=>'What is Lorem Ipsum 03',
            'marca_id'=>$marca1->id,
            'titem_id'=>$titem1->id,
            'item_id'=>$item1->id
        ]);
        //otro item
        $item2 = Item::create([
            'codigo'=>'005',
            'descripcion'=>'Where does it come from',
            'marca_id'=>$marca2->id,
            'titem_id'=>$titem2->id
        ]);
        //item inferios
        Item::create([
            'codigo'=>'006',
            'descripcion'=>'Where does it come from 01',
            'marca_id'=>$marca2->id,
            'titem_id'=>$titem2->id,
            'item_id'=>$item2->id
        ]);
        Item::create([
            'codigo'=>'007',
            'descripcion'=>'Where does it come from 02',
            'marca_id'=>$marca2->id,
            'titem_id'=>$titem2->id,
            'item_id'=>$item2->id
        ]);
        Item::create([
            'codigo'=>'008',
            'descripcion'=>'Where does it come from 03',
            'marca_id'=>$marca2->id,
            'titem_id'=>$titem2->id,
            'item_id'=>$item2->id
        ]);
        //otro item
        $item2 = Item::create([
            'codigo'=>'009',
            'descripcion'=>'The standard Lorem Ipsum passage, used since the 1500s',
            'marca_id'=>$marca3->id,
            'titem_id'=>$titem3->id
        ]);
        //tipos de movimientos
        Tmovimiento::create(['nombre'=>'Ingreso','factor'=>1]);
        Tmovimiento::create(['nombre'=>'Reposicion','factor'=>1]);
        Tmovimiento::create(['nombre'=>'Perdida','factor'=>-1]);
        Tmovimiento::create(['nombre'=>'Prestamo','factor'=>-1]);
        Tmovimiento::create(['nombre'=>'Devolucion','factor'=>1]);
    }
}
