<?php

namespace App\Http\Controllers;

use App\Models\Incidencias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Actividades;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncidenciasController extends Controller
{
    public function createIncidencias($id){
        $user = Auth::User();
        $usuarios = User::where('hospital_id',$user->hospital_id)->where('rol','!=','general')->get();
        $actividades = Actividades::find($id);
        $incidencia = Incidencias::all();

        return view('createIncidencias', compact('incidencia','actividades','usuarios','user'));
    }

    public function storeIncidencias(Request $request){
        $usuario = Auth::User();
        $incidencia = new Incidencias();
        $incidencia->cargar_evidencia = $request->cargar_evidencia;
        $incidencia->nombre = $request->nombre;
        $incidencia->notas = $request->notas;
        $incidencia->user_id = $request->nombre_usuario;
        $incidencia->hospital_id = $usuario->hospital_id;
        $incidencia->actividad_id = $request->actividad_id;
        $incidencia->status = $request->status;
        $incidencia->save();

        $actividad = Actividades::find($request->actividad_id);
        $actividad->status = 'resuelto';
        $actividad->save();


        return redirect()->route("homeIndexPanel")->with("success");
    }

    public function editIncidencia($id){

        $usuario = Auth::User();
        if ($usuario->rol== 'subcoordinador'){
            $incidencia = Incidencias::find($id);
            $usuarios = User::where('hospital_id',$incidencia->hospital_id)
                ->where('rol','enlace')
                ->get();
        }else{
            $usuarios = User::where('hospital_id',$usuario->hospital_id)
                ->where('rol','enlace')
                ->get();
        }


        $subcordinador = DB::table('hospitales')
            ->select('users.name','users.apellido')
            ->join ('users','users.id','=','hospitales.subcordinador_id' )
            ->where('hospitales.id',$usuario->hospital_id)->first();

        if ($usuario->rol == 'coordinador' or $usuario->rol== 'subcoordinador' or $usuario->rol== 'enlace'){
            $incidencia = Incidencias::find($id);
            return view('admin.editIncidencia', compact('incidencia','usuarios','subcordinador'));
        }else{
            return redirect()->route('homeIndexPanel');
        }

    }

    public function updateIncidencia(Request $request, $id){
        $usuario = Auth::User();
        $incidencia = Incidencias::find($id);
        $incidencia->status = $request->status;
        $incidencia->save();
        DB::table('incidencia_historico')
            ->insert(array("incidencia_id" => $id,
                "user_id" => $usuario->id,
                "comentario" => $request->comentario,
                "asignacion" => $request->asignacion,
                'created_at'=> $current_date_time = Carbon::now()->toDateTimeString(),
                'updated_at'=> $current_date_time = Carbon::now()->toDateTimeString(),
            ));
        return redirect()->route('showIncidencia',[$id]);
    }

}
