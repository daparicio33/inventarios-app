<?php

namespace Database\Seeders;

use App\Models\Almacene;
use App\Models\Cargo;
use App\Models\Cliente;
use App\Models\Encargado;
use App\Models\Item;
use App\Models\Marca;
use App\Models\Titem;
use App\Models\Tmovimiento;
use App\Models\User;
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
        //creando clientes
        Cliente::create([
            'dniRuc'=>'43053643',
            'nombre'=>'Davis Williams',
            'apellido'=>'Aparicio Palomino',
            'telefono'=>'935526612',
            'telefono2'=>'935526612',
            'direccion'=>'Psj. Toribio Rodriguez de Mendoza 105',
            'email'=>'dwaparicicio@gmail.com'
        ]);
        Cliente::create([
            'dniRuc'=>'12345678',
            'nombre'=>'Pedro',
            'apellido'=>'Castillo Terrones',
            'telefono'=>'935526612',
            'telefono2'=>'935526612',
            'direccion'=>'Jr. Palacio de Gorbierno 123',
            'email'=>'dwaparicicio@gmail.com'
        ]);
        //creando usuarios
        $administrador = User::create([
            'name'=>'Administrador',
            'email'=>'administrador@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $jefe = User::create([
            'name'=>'Jefe de Almacen',
            'email'=>'jefe@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $almacenero = User::create([
            'name'=>'Almacenero',
            'email'=>'almacenero@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        //crear almacen
        $almacen = Almacene::create([
            'nombre'=>'Almacen Programacion',
            'observacion'=>'este almacen pertence al laboratorio de programacion'
        ]);
        //cargos
        $cargo1 = Cargo::create([
            'nombre'=>'Administrador'
        ]);
        $cargo2 = Cargo::create([
            'nombre'=>'Jefe de Almacen'
        ]);
        $cargo3 = Cargo::create([
            'nombre'=>'Almacenero'
        ]);
        //creando encargados
        Encargado::create([
            'user_id'=>$administrador->id,
            'cargo_id'=>$cargo1->id,
            'almacene_id'=>$almacen->id,
        ]);
        Encargado::create([
            'user_id'=>$jefe->id,
            'cargo_id'=>$cargo2->id,
            'almacene_id'=>$almacen->id,
        ]);
        Encargado::create([
            'user_id'=>$almacenero->id,
            'cargo_id'=>$cargo3->id,
            'almacene_id'=>$almacen->id,
        ]);
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
            'descripcion'=>'Maleta de Correccion',
            'marca_id'=>$marca1->id,
            'titem_id'=>$titem1->id,
            'almacene_id'=>$almacen->id
        ]);
        //item inferios
        Item::create([
            'codigo'=>'002',
            'descripcion'=>'What is Lorem Ipsum 01',
            'marca_id'=>$marca1->id,
            'titem_id'=>$titem1->id,
            'item_id'=>$item1->id,
            'almacene_id'=>$almacen->id
        ]);
        Item::create([
            'codigo'=>'003',
            'descripcion'=>'What is Lorem Ipsum 02',
            'marca_id'=>$marca1->id,
            'titem_id'=>$titem1->id,
            'item_id'=>$item1->id,
            'almacene_id'=>$almacen->id
        ]);
        Item::create([
            'codigo'=>'004',
            'descripcion'=>'What is Lorem Ipsum 03',
            'marca_id'=>$marca1->id,
            'titem_id'=>$titem1->id,
            'item_id'=>$item1->id,
            'almacene_id'=>$almacen->id
        ]);
        //otro item
        $item2 = Item::create([
            'codigo'=>'005',
            'descripcion'=>'Juego de llaves de precision',
            'marca_id'=>$marca2->id,
            'titem_id'=>$titem2->id,
            'almacene_id'=>$almacen->id
        ]);
        //item inferios
        Item::create([
            'codigo'=>'006',
            'descripcion'=>'Where does it come from 01',
            'marca_id'=>$marca2->id,
            'titem_id'=>$titem2->id,
            'item_id'=>$item2->id,
            'almacene_id'=>$almacen->id
        ]);
        Item::create([
            'codigo'=>'007',
            'descripcion'=>'Where does it come from 02',
            'marca_id'=>$marca2->id,
            'titem_id'=>$titem2->id,
            'item_id'=>$item2->id,
            'almacene_id'=>$almacen->id
        ]);
        Item::create([
            'codigo'=>'008',
            'descripcion'=>'Where does it come from 03',
            'marca_id'=>$marca2->id,
            'titem_id'=>$titem2->id,
            'item_id'=>$item2->id,
            'almacene_id'=>$almacen->id
        ]);
        //otro item
        $item2 = Item::create([
            'codigo'=>'009',
            'descripcion'=>'Kit de Mantenimiento de Dados',
            'marca_id'=>$marca3->id,
            'titem_id'=>$titem3->id,
            'almacene_id'=>$almacen->id
        ]);
        //tipos de movimientos
        Tmovimiento::create(['nombre'=>'Ingreso','factor'=>1,'administrador'=>'SI']);
        Tmovimiento::create(['nombre'=>'Reposicion','factor'=>1,'administrador'=>'SI']);
        Tmovimiento::create(['nombre'=>'Perdida','factor'=>-1,'administrador'=>'SI']);
        Tmovimiento::create(['nombre'=>'Prestamo','factor'=>-1,'administrador'=>'NO']);
        Tmovimiento::create(['nombre'=>'Devolucion','factor'=>1,'administrador'=>'SI']);
    }
}
