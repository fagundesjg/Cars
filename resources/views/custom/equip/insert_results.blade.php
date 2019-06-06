@extends('custom.layouts.header')
@section('title')
    Inserir Resultados da Equipe
@endsection
@section('content')
    <div class="box" style="margin-bottom: 30px">
        <form method="POST" action={{route('cadastrar-resultado')}}>
            @csrf
            <input type="number" value={{$equip->id}} name="id_equip" hidden>
            <span style="display: flex; align-items:center; justify-content: center">
            <h4>Resultados da equipe</h4>
            <h4 class="text-primary" style="margin-left: 5px">{{$equip->name}}</h4>
            </span>
            <p>1. Prova Rampa</p>
            <div class="form-group">
                <label for="p1_distance">Distancia (m/s)</label>
                <input min="0" value={{$equip->p1_distance}} step="0.001" class="form-control" type="number" name="p1_distance" placeholder="Insira a distância que o carrinho percorreu" required/>
            </div>

            <p>2. Prova Peso</p>
            <div class="form-group">
                <label for="p2_weight">Peso (gramas)</label>
                <input min="0" value={{$equip->p2_weight}} step="0.001" class="form-control" type="number" name="p2_weight" placeholder="Insira o peso em gramas que o carrinho carregou" required/>
            </div>

            <p>3. Prova Velocidade</p>
            <div class="form-group">
                <label for="p3_speed">Velocidade (m/s)</label>
                <input min="0" value={{$equip->p3_speed}} step="0.001" class="form-control" type="number" name="p3_speed" placeholder="Insira a velocidade máxima atingida pelo carrinho" required/>
            </div>

            <p>4. Prova Manobra</p>
            <div class="form-group">
                <label for="p4_time">Tempo (segundos)</label>
                <input min="0" value={{$equip->p4_time}} step="0.001" class="form-control" type="number" name="p4_time" placeholder="Insira o tempo gasto pelo carrinho" required/>
                <br>
                <label for="p4_penalties">Numero de penalidades</label>
                <input min="0" value={{$equip->p4_penalties}} step="1.000" class="form-control" type="number" name="p4_penalties" placeholder="Insira a quantidade de penalidades" required/>
            </div>
            <input type="submit" class="btn btn-block btn-success" value="Confirmar" />
        </form>
    </div>
@endsection
