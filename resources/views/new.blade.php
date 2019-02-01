@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row" align="center">
        <div class="col">
            <h2>Neuen Eintrag erstellen</h2>
        </div>
        </div>

        <div class="row" align="center">

            <div class="col m-3">
                @foreach($errors->all() as $error)
                    <p class="error">{{ $error  }}</p>

                    @endforeach

                {{ Form::open() }}

                    <input type="text" class="form-control-sm" name="name" placeholder="Dein Eintrag" />

                    <input type="submit" class="btn btn-success btn-sm" role="button" value="Erstellen" />

                {{ Form::close() }}


                @stop
            </div>


    </div>