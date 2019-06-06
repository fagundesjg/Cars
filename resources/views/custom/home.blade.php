@extends('custom.layouts.header')
@section('title')
    Página Inicial
@endsection
@section('content')
    <div class="box">
        <div align="center">
            <p>Classificação</p>
        </div>
        <table class="table table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Equip</th>
                <th scope="col">Pts</th>
            </thead>
            <tbody>
            @foreach ($equips as $equip)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{array_search($equip,$equips)}}</td>
                    <td>{{$equip}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
