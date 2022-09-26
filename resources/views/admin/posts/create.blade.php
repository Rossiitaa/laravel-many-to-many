@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="container-lg">
        <h2 class="mb-3">Create Post</h2>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    
                    @include('admin.posts.includes.form')
                </form>
            </div>
        </div>
    </div>
@endsection