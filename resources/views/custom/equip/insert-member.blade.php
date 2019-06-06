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
                <td class="fas fa-trash"></td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>

    <div class="box">
        <p>Adicione novos membros a equipe <strong>{{$equip->name}}</strong></p>
        <div class="form-group">
            <label for="user">Selecione um usuário</label>
            <select name="user" id="user" class="form-control">
                    @foreach ($users_not_team as $user)
                    <option value={{$user->id}}>{{$user->name}}</option>
                    @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-success btn-block" value="Adicionar"/>
    </div>
@endsection
