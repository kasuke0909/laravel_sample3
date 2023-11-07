{{--親テンプレートの読み込み　書き方自体はbootstrap--}}
@extends('layouts.app')

{{--app.blade.phpのmainタグyieldに組み込まれる--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
{{--     __は多言語化対応と翻訳ファイル---}}
                    <div class="card-header">{{ __('Drill Register') }}</div>

                    <div class="card-body">
{{--                        actionで飛び先指定--}}
                        <form method="POST" action="{{ route('drills.new') }}">
                            @csrf
{{--この内容はfor文でループさせて作った方が良い--}}
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
{{--                                    autocompleteは自動補完機能 oldを指定すれば、入力された値が保持される--}}
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
{{--errorがあった時はこの以下の内容を表示する--}}
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
{{--                                        errorだった場合に勝手にmessageに内容を入れてくれる--}}
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
