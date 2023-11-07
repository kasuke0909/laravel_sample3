@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Practice') }}</h2>
        <div class="row">

            @foreach($todos as $todo)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{$todo->contents }}</h3>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
