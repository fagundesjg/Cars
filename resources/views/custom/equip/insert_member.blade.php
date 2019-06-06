@extends('custom.layouts.header')
@section('title')
    Inserir Membros Equipe
@endsection
@section('content')
    <div class="box">
        <p>Integrantes da equipe <strong>{{$equip->name}}</strong></p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users_of_team as $user)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$user->name}}</td>
                <td>
                    <button class="btn btn-sm fas fa-trash bg-danger" style="color: white" type="submit" form={{"form".$user->id}}>
                    </button>
                </td>
            </tr>
            <form id={{"form".$user->id}} method="POST" action={{"/remover-membro-equipe/".$equip->id."/".$user->id}}>
            @csrf
            <input type="hidden" name="_method" value="PUT">
            </form>
            @endforeach
        </tbody>
        </table>
    </div>

    <div class="box">
        <p>Adicione novos membros a equipe <strong>{{$equip->name}}</strong></p>
        <form method="POST" action={{route('cadastrar-membro-equipe')}}>
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id_equip" value={{$equip->id}}>
            <div class="form-group">
                <label for="id_user">Selecione um usuário</label>
                <select name="id_user" id="id_user" class="form-control">
                    @foreach ($users_not_team as $user)
                    <option value={{$user->id}}>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Adicionar"/>
        </form>
    </div>
@endsection
