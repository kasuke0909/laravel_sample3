@extends('layouts.app')
@section('content')
    <div id="app">
{{--Laravelのコントローラからのきた変数をVueで使いたい--}}
        <example-component
            title="{{__('Practice').'「'.$drill->title.'」'}}"
{{--:key="key"--}}
            :drill="{{$drill}}"
            category_name="{{$drill->category_name}}">
        </example-component>
    </div>
@endsection
