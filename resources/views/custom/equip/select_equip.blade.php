@extends('custom.layouts.header')
@section('title')
Inserir Resultado Equipe
@endsection
@section('content')
<div class="box">
    <form method="post" action={{route('preencher-resultados-equipe')}}>
        @csrf
        <p>Selecione a equipe que deseja inserir os resultados</p>
        <select class="form-control" name="id_equip">
            @foreach ($equips as $equip)
                <option value={{$equip->id}}>{{$equip->name}}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-success btn-block" value="Prosseguir" style="margin-top: 15px"/>
    </form>
</div>
@endsection
