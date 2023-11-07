@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('todos.create') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="todo" class="col-md-4 col-form-label text-md-right">{{ __('TODO') }}</label>

                                <div class="col-md-6">
                                    <input id="todo" type="text" class="form-control @error('todo') is-invalid @enderror" name="todo" value="{{ old('todo') }}" required autocomplete="todo" autofocus>

                                    @error('todo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
