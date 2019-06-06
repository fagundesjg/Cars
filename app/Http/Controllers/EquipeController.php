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
        $equip = Equip::where('id',$request->equip)->firstOrFail();
        $users_of_team = User::all()->where('id_equip',$request->equip);
        $users_not_team = User::all()->where('id_equip','=',0);
        return view('custom.equip.insert-member', compact(['users_of_team','users_not_team','equip']));
    }
}
