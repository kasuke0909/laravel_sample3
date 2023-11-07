@extends('layouts.app')
@section('content')

    <div id="todo">
        <todo-component
            :todos="{{$todos}}"
        ></todo-component>
    </div>
@endsection
