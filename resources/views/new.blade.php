@extends('layouts.app')

@section('content')
    <h1>Neuen Eintrag erstellen</h1>

    @foreach($errors->all() as $error)
        <p class="error">{{ $error  }}</p>

        @endforeach

    {{ Form::open() }}

        <input type="text" name="name" placeholder="Dein Eintrag" />
        <input type="submit" value="Erstellen" />
    {{ Form::close() }}

    @stop