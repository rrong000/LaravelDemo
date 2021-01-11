@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
                    <button onclick="location.href='http://localhost:85/LaravelDemo/public/posts/create'">新增文章</button>
                    <button onclick="location.href='http://localhost:85/LaravelDemo/public/posts'">查看所有文章</button>
            </div>
        </div>
    </div>
</div>
@endsection
