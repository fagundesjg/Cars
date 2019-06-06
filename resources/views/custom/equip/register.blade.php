@extends('custom.layouts.header')
@section('title')
Cadastrar Equipe
@endsection
@section('content')
<div class="box">
    <div align="center">
        <p>Criar nova Equipe</p>
    </div>
    <form action="{{ route('cadastrar-equipe') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nome da Equipe</label>
            <input
                class="form-control"
                type="text"
                name="name"
                id="name"
                placeholder="Digite o nome da equipe a ser criada"
                required
            />
        </div>
        <input
            type="submit"
            class="btn btn-block btn-success"
            value="Cadastrar Nova Equipe"
        />
    </form>
    @if(Session::has('message'))
    <p class="alert alert-info" style="margin-top: 15px">
        {{ Session::get('message') }}
    </p>
    @endif
</div>
<div class="box">
    <div align="center">
        <p>Cadastrar membros da equipe</p>
    </div>
        <form action={{route('cadastrar-membro-equipe')}} method="POST">
            @csrf
            <div class="form-group">
                <label for="id_equip" id="id_equip">Selecione a Equipe</label>
                <select class="form-control" id="id_equip" name="id_equip">
                    @foreach ($equips as $equip)
                    <option value={{$equip->id}}>{{$equip->name}}</option>
                    @endforeach
                </select>
            </div>
            <input
                type="submit"
                id="button"
                value="Prosseguir"
                class="btn btn-success btn-block"
            />
            </div>

        </form>
@endsection
