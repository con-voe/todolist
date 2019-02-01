@extends('layouts.app')

<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Lato', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
</style>



@section('content')

   <!--TEST CODE -->

    <div class="container">

        <div class="row m-5">

            <div class="col-8" align="center">
                <h1><?php echo Auth::user()->name; ?>'s To Do Liste</h1>
            </div>
            <div class="col-4" align="right">
                <a href="{{ URL::route('new') }}" class="btn btn-success btn-md" role="button">Neuer Eintrag</a>
            </div>
        </div>

        @foreach ($todos as $todo)
            {{ Form::open() }}
    <div class="row m-3">

        <div class="col-1">

        </div>
    <div class="col-9">
        <input type="checkbox" onClick="this.form.submit()"  {{ $todo->erledigt ? 'checked' : '' }} />

        <input type="hidden" name="id" value="{{ $todo->id }}" />

        {{ e($todo->todo_eintrag) }}

        <hr>

        </div>
        <div class="col-1">
            <a href="{{ URL::route('edit', $todo->id) }}" class="btn btn-outline-secondary btn-sm" role="button">Bearbeiten</a>
        </div>
        <div class="col-1">
            <a href="{{ URL::route('delete', $todo->id) }}" class="btn btn-outline-primary btn-sm" role="button">Löschen</a><br />
        </div>

    </div>
            {{ Form::close() }}
        @endforeach

    </div>

   <!--TEST CODE ENDE -->


   <!-- ORGINAL CODE

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
           <div class="alert alert-success" role="alert">
    {{ session('status') }}
                   </div>
    @endif
               </div>

               <div class="row center-block">
                   <div class="col">
                       <h1><?php echo Auth::user()->name; ?>'s To Do Liste <a href="{{ URL::route('new') }}" class="btn btn-success btn-md" role="button">Neuer Eintrag</a></h1>
                        </div>
                    </div>
                        <ul>
                    @foreach ($todos as $todo)

           {{ Form::open() }}
                   <input type="checkbox" onClick="this.form.submit()"  {{ $todo->erledigt ? 'checked' : '' }} />

                            <input type="hidden" name="id" value="{{ $todo->id }}" />

                            {{ e($todo->todo_eintrag) }}
                   <a href="{{ URL::route('edit', $todo->id) }}" class="btn btn-secondary btn-sm" role="button">Bearbeiten</a>
                            <a href="{{ URL::route('delete', $todo->id) }}" class="btn btn-primary btn-sm" role=button">Löschen</a><br />

                            {{ Form::close() }}

       @endforeach
               </ul>

               </div>
           </div>

       </div>

    -->


</div>
</div>
@endsection
