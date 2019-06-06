<?php

namespace App\Http\Controllers;

use App\Equip;
use App\User;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCreateForm(){
        $equips = Equip::orderBy('created_at','desc')->paginate(10);
        return view('custom.equip.register',compact(['equips']));
    }

    public function create(Request $request)
    {
        $equip = new Equip();
        $equip->name = $request->name;
        $equip->save();
        return redirect('cadastrar-equipe')->with('message', 'Equipe cadastrada com sucesso!');;
    }

    public function showInsertMemberForm(Request $request) {
        $equip = Equip::where('id',$request->id_equip)->firstOrFail();
        $users_of_team = User::all()->where('id_equip',$request->id_equip);
        $users_not_team = User::all()->where('id_equip','=',0);
        return view('custom.equip.insert_member', compact(['users_of_team','users_not_team','equip']));
    }

    public function getInsertMemberForm($id_equip) {
        $equip = Equip::where('id',$id_equip)->firstOrFail();
        $users_of_team = User::all()->where('id_equip',$id_equip);
        $users_not_team = User::all()->where('id_equip','=',0);
        return view('custom.equip.insert_member', compact(['users_of_team','users_not_team','equip']));
    }

    public function setEquipeValue(Request $request)
    {
        if(isset($request->id_user) && isset($request->id_equip)){
        $equip = Equip::find($request->id_equip);
        $user = User::find($request->id_user);

        $user->id_equip = $equip->id;
        $user->save();
        }
        return redirect('cadastrar-membro-equipe/'. $request->id_equip );
    }

    public function unsetEquipeValue($id_equip,$id_user)
    {
        if(isset($id_user)){
        $user = User::find($id_user);
        $user->id_equip = 0;
        $user->save();
        }
        return redirect('cadastrar-membro-equipe/'. $id_equip);
    }

    public function showSelectEquip()
    {
        $equips = Equip::orderBy('name','asc')->get();
        return view('custom.equip.select_equip', compact('equips'));
    }

    public function showInsertResultForm(Request $request)
    {
        $equip = Equip::find($request->id_equip);
        return view('custom.equip.insert_results',compact('equip'));
    }

    public function createResult(Request $request) {
        $equip = Equip::find($request->id_equip);
        $equip->p1_distance = $request->p1_distance;
        $equip->p2_weight = $request->p2_weight;
        $equip->p3_speed = $request->p3_speed;
        $equip->p4_time = $request->p4_time;
        $equip->p4_penalties = $request->p4_penalties;
        $equip->save();
        return redirect('/');
    }
}
