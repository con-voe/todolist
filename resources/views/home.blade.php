@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <h1><?php echo Auth::user()->name; ?>'s To Do Liste <small><a href="{{ URL::route('new') }}">Neuer Eintrag</a></small></h1>

                <ul>
                @foreach ($todos as $todo)
                    <li>
                        {{ Form::open() }}
                        <input type="checkbox" onClick="this.form.submit()"  {{ $todo->erledigt ? 'checked' : '' }} />

                        <input type="hidden" name="id" value="{{ $todo->id }}" />

                        {{ e($todo->todo_eintrag) }} <small>(<a href="{{ URL::route('delete', $todo->id) }}">x</a>)</small> <medium><a href="{{ URL::route('edit', $todo->id) }}">Bearbeiten</a></medium><br />

                        {{ Form::close() }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
