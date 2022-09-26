@extends("layouts.app")

@section("title", "Posts Show")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-column p-2 text-center">
                <h1>Title: {{ $post->title }}</h1>
                <h5>Post Date: {{ $post->date }}</h5>
                <img src="{{ asset('storage/' . $post->image) }}" class="w-50 align-self-center" alt="Post Image">
                <p class="fw-bold pt-2">{{ $post->content }}</p>
                <h3>Author: {{ $post->user->name }}</h3>
                <p>Category:
                    <span class="badge badge-pill p-2" style="background-color:{{ $post->category->color }}">
                        {{ $post->category->name }}
                    </span>
                </p>
                <p>
                    Tags:
                    <span class="badge badge-pill" style="background-color:{{ $post->category->color }}">
                        @forelse ($post->tags as $tag)
                            <a href="{{route('admin.tags.show', $tag->id)}}">#{{$tag->name}}</a>
                        @empty
                            #NoTags
                        @endforelse 
                    </span>
                </p>
            </div>
            <div class="d-flex justify-content-center w-100">
                <a href="{{ route("admin.posts.edit", $post->id) }}" class="btn btn-success me-3">Edit</a>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection