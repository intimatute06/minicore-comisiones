<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use App\Models\ReglaComision;
class ReporteComisionesController extends Controller
{
    public function index(Request $request){
        $vendedores = Vendedor::all();

        $reglas=ReglaComision::orderBy('monto_minimo')->get();

        $desde = $request->input('desde');
        $hasta = $request->input('hasta');

        $resultados=[];

        if ($desde && $hasta){
            foreach($vendedores as $vendedor){
                $total = (float) $vendedor->ventas()
                ->whereBetween('fecha',[$desde,$hasta])
                ->sum('monto');

                $tasa = 0;
                foreach($reglas as $regla){
                    if($total>=$regla->monto_minimo){
                        $tasa= $regla->tasa;
                    }
                }

                $comision = $total * $tasa / 100;

                $resultados[]=[
                    'nombre' => $vendedor->nombre,
                    'total' => $total,
                    'tasa' => $tasa,
                    'comision' => $comision
                ];
            }



        }

        return view('reporte',['vendedores'=>$vendedores,'reglas'=>$reglas,'resultados'=>$resultados, 'desde'=> $desde, 'hasta'=>$hasta]);
       
    }
}
