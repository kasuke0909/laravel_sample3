@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Drills List') }}</h2>
        <div class="row">

            @foreach ($drills as $drill)

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $drill->title }}</h3>
                            <a href="{{ route('drills.show',$drill->id) }}" class="btn btn-primary">{{ __('Go Practice')
    }}</a>
                            <a href="{{ route('drills.edit',$drill->id) }}" class="btn btn-warning">{{ __('Go Edit')
    }}</a>
                            <form action="{{ route('drills.delete',$drill->id) }}" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" onclick='return confirm("削除しますか？");'>{{ __('Go Delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
    @endforeach
        </div>
    </div>
@endsection
