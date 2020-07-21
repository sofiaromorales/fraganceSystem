<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Productor;
use App\Proveedor;


class EvaluacionContratoController extends Controller
{
    public function view($id_productor, $id_proveedor){

        $productor = Productor::findOrFail($id_productor);
        //$proveedor = Proveedor::findOrFail($id_proveedor);

        $proveedor = DB::table('sms_proveedores')
        ->join('sms_paises','sms_paises.codigo','=','sms_proveedores.cod_pais')
        ->where('sms_proveedores.id','=',$id_proveedor)
        ->select(
            'sms_proveedores.nombre AS proveedor_nombre',
            'sms_proveedores.pag_web AS proveedor_pag_web',
            'sms_proveedores.telefono AS proveedor_telefono',
            'sms_proveedores.correo AS proveedor_correo',
            'sms_proveedores.desc_ubicacion AS proveedor_desc_ubicacion',
            'sms_paises.nombre AS pais_nombre'
        )
        ->distinct()
        ->get();


        $productos = DB::table('sms_materia_prima_esencias')
        ->select(
            'sms_materia_prima_esencias.nombre',
            'sms_materia_prima_esencias.nombre_alternativo',
            'sms_materia_prima_esencias.num_ipc',
            'sms_materia_prima_esencias.num_tsca_cas',
            'sms_materia_prima_esencias.num_einecs',
            'sms_materia_prima_esencias.descripcion_visual',
            'sms_materia_prima_esencias.vida_util',
            'sms_materia_prima_esencias.solubilidad',
            'sms_materia_prima_esencias.inflamabilidad',
            'sms_materia_prima_esencias.proceso'
        )
        ->from('sms_materia_prima_esencias')
        ->where('sms_materia_prima_esencias.id_proveedor', '=', $id_proveedor)
        ->distinct()
        ->get();

        // $condiciones_pago = DB::table('sms_condicion_pago')
        // ->select(
        //     'sms_condicion_pago.tipo',
        //     'sms_condicion_pago.cantidad_cuotas'
        // )
        // ->from('sms_condicion_pago')
        // ->where('sms_condicion_pago.id_proveedor','=',$id_proveedor)
        // ->where('sms_condicion_pago.vigencia','=',true)
        // ->select(
        //     'sms_cuotas.sms_cuotas.porcentaje_pago',
        //
        // )
        // ->from('sms_cuotas')
        // ->where('sms_cuotas.cod_cond_pago','=','sms_condicion_pago.codigo')
        // ->distinct()
        // ->get();


        $condiciones_pago = DB::table('sms_condicion_pago')
        ->leftJoin('sms_cuotas','sms_condicion_pago.codigo','=','sms_cuotas.cod_cond_pago')
        ->where('sms_condicion_pago.id_proveedor','=',$id_proveedor)
        ->select(
            'sms_condicion_pago.tipo',
            'sms_condicion_pago.cantidad_cuotas',
            'sms_cuotas.porcentaje_pago AS pago_porcentajes',
            'sms_cuotas.dias_para_pago AS pago_dias',
            'sms_cuotas.recargo',
            'sms_cuotas.descuento',
            'sms_cuotas.cod_cond_pago',
        )
        ->distinct()
        ->get();



        $condiciones_envio = DB::table('sms_envio')
        ->join('sms_paises','sms_envio.cod_pais','=','sms_paises.codigo')
        ->where('sms_envio.id_proveedor','=',$id_proveedor)
        ->select('sms_envio.tipo_transporte AS envio_transporte','sms_envio.costo AS envio_costo','sms_paises.nombre AS envio_pais')
        ->distinct()
        ->get();

        var_dump($condiciones_pago);




        return view('evaluacionContrato', [
            'productor' => $productor,
            'proveedor' => $proveedor,
            'productos' => $productos,
            'condiciones_pago' => $condiciones_pago,
            'condiciones_envio' => $condiciones_envio
        ]);
    }
}
