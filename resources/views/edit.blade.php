@extends('layouts.app')

@section('content')

    <h1>Eintrag bearbeiten</h1>

    <form action="{{ URL::route('save', $todo_eintrag->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="text" name="name" value="{{$todo_eintrag->todo_eintrag}}" />
        <input type="submit" value="Ändern">
    </form>

@stop