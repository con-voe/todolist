@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row" align="center">
            <div class="col">
                <h2>Eintrag bearbeiten</h2>
            </div>
        </div>

        <div class="row" align="center">
            <div class="col">

    <form action="{{ URL::route('save', $todo_eintrag->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
       <!-- <input type="text" name="name" value="{{$todo_eintrag->todo_eintrag}}" /> -->

        <input type="text" class="form-control-sm" name="name" value="{{$todo_eintrag->todo_eintrag}}" />

        <input type="submit" class="btn btn-secondary btn-sm" role="button" value="Ändern">
    </form>

@stop
            </div>
        </div>
    </div>