<?php

namespace App\Http\Controllers;

use App\Equip;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function sortEquips()
    {
        $distances = DB::table('equips')->select('id','name','p1_distance')->orderBy('p1_distance', 'desc')->get();
        $weights = DB::table('equips')->select('id','name','p2_weight')->orderBy('p2_weight', 'desc')->get();
        $speeds = DB::table('equips')->select('id','name','p3_speed')->orderBy('p3_speed', 'desc')->get();
        $times = DB::table('equips')->select('id','name','p4_time','p4_penalties')->get();

        // calcula a pontuação do tempo
        foreach($times as $time)
        {
            $time->p4_time = $time->p4_time + $time->p4_penalties;
        }

        // ordena os tempos
        for($i=0;$i<count($times);$i++)
        {
            $j = $i + 1;
            while($j > 0 && $j < count($times) && $times[$j]->p4_time < $times[$j-1]->p4_time)
            {
                $aux = $times[$j];
                $times[$j] = $times[$j-1];
                $times[$j-1] = $aux;
                $j--;
            }
        }

        // cria o vetor de equipes e inicializa o ponto de todas em zero
        $equips = array();
        foreach($times as $time){
            $equips[$time->name] = 0;
        }

        $pts = 5;
        $last_value = 0;
        foreach($times as $time)
        {
            $equips[$time->name] += $pts;
            if($last_value !== $time->p4_time);
            {
                $pts--;
            }
            $last_value = $time->p4_time;
        }

        // calcula a pontuação das distancias
        $pts = 5;
        $last_value = 0;
        foreach($distances as $distance)
        {
            $equips[$distance->name] += $pts;
            if($last_value !== $distance->p1_distance)
            {
                $pts--;
            }
            $last_value = $distance->p1_distance;
        }

        // calcula a pontuação dos pesos
        $pts = 5;
        $last_value = 0;
        foreach($weights as $weight)
        {
            $equips[$weight->name] += $pts;
            if($last_value !== $weight->p2_weight)
            {
                $pts--;
            }
            $last_value = $weight->p2_weight;
        }

        // calcula a pontuação das velocidades
        $pts = 5;
        $last_value = 0;
        foreach($speeds as $speed)
        {
            $equips[$speed->name] += $pts;
            if($last_value !== $speed->p3_speed)
            {
                $pts--;
            }
            $last_value = $speed->p3_speed;
        }
        asort($equips); // ordena o array em ordem crescente
        $equips = array_reverse($equips, true); // inverte o array mantendo as keys
        return $equips;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $equips = $this->sortEquips();
        return view('custom.home',compact('equips'));
    }
}
