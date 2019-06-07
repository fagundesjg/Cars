@extends('custom.layouts.header')
@section('title')
    Página Inicial
@endsection
@section('content')
    <div class="box">
        <div align="center" style="display: flex">
            <p>Bem vindo,</p>
            <p class="text-primary" style="margin-left: 5px">{{Auth::user()->name}}</p>
        </div>
        <div style="display: flex;flex-direction: column">
            <div style="display: flex;flex-direction: row">
                <p>Atualmente sua equipe é: </p>
                @if (isset($myTeam))
                    <p style="margin-left: 5px" class="text-primary">{{$myTeam->name}}</p>
                @else
                <p style="margin-left: 5px" class="text-primary">nenhuma <i class="far fa-sad-tear"></i></p>
                @endif
            </div>
        </div>
    </div>
    <div class="box" style="margin-bottom: 30px">
        <div align="center">
            <p>Classificação</p>
        </div>
        <table class="table table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Equip</th>
                <th scope="col">Pts</th>
                @if (Auth::user()->access_level === 'admin')
                <th scope="col">Ações</th>
                @endif
            </thead>
            <tbody>
            @foreach ($equips as $equip => $pts)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$equip}}</td>
                    <td>{{$pts}}</td>
                    @if (Auth::user()->access_level === 'admin')
                        <td scope="col">
                            <button class="btn btn-sm fas fa-trash bg-danger" style="color: white" type="submit" form={{"form-".str_replace(' ','-',$equip)}}>
                            </button>
                        </td>
                        <form id={{"form-".str_replace(' ','-',$equip)}} method="POST" action={{"/remover-equipe/".str_replace(' ','-',$equip)}}>
                            @csrf
                        </form>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(Session::has('message'))
        <p class="alert alert-info" style="margin-top: 15px">
            {{ Session::get('message') }}
        </p>
        @endif
    </div>
@endsection
