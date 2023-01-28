<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CronJobController extends Controller
{
    public function Indextruncate(){
        $usuario = Auth::User();
        if ($usuario->email== 'myxomatos46@gmail.com' or 'sedykc@hotmail.com') {
            return view ('admin.adminTruncate');
        }else{
            return redirect()->route('homeIndexPanel');
        }

    }

    public function truncate(){
//        $date = Carbon::now()->subDays(40);
        $usuario = Auth::User();
        if ($usuario->email== 'myxomatos46@gmail.com' or 'sedykc@hotmail.com')
        {
            DB::table('reportes')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();
            DB::table('incidencia_historico')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();
            DB::table('incidencias')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();
            DB::table('historico_censo')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();
            DB::table('actividades')->whereMonth(
                'created_at', '=', Carbon::now()->subMonth()->month
            )->delete();


            return view ('admin.succesTruncate');

            }else{
            return redirect()->route('homeIndexPanel');
        }
    }
}
