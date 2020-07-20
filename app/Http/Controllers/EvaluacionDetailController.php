<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Productor;
use App\Escala;

class EvaluacionDetailController extends Controller
{
    public function view($id){

        $productor = Productor::findOrFail($id);
        //$escala = Escala::find($id);
        $escala = DB::table('sms_escala')
        ->select('sms_escala.rango_inicial', 'sms_escala.rango_final')
        ->from('sms_escala')
        ->where('sms_escala.id_productor','=',$id)
        ->where('sms_escala.fecha_final','=',null)
        ->get()
        ->values([0]);

        $formula_inicial = DB::table('sms_eval_criterio')
        ->select('sms_eval_criterio.id_variable', 'sms_eval_criterio.peso')
        ->from('sms_eval_criterio')
        ->where('sms_eval_criterio.id_productor','=',$id)
        ->where('sms_eval_criterio.fecha_final','=',null)
        ->get();

        var_dump($formula_inicial);



        // $criterio->id_criterio = DB::table('sms_variable')
        //     ->select('sms_variable.id')
        //     ->from('sms_variable')
        //     ->where('sms_variable.nombre','=',$request->input('editorial'))
        //     ->value([0]);
        //

        return view('evaluacionDetail', [
            'productor' => $productor,
            'escala' => $escala,
            'formula_inicial' => $formula_inicial

        ]);
    }
}
