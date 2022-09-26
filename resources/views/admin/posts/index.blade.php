@extends("layouts.app")

@section("title", "Posts Index")

@section('content')
    <div class="container">
        @if (session('message'))
        <div class="alert alert-danger" role="alert">
            {{ session('message') }}
        </div>
    @endif
        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="{{ route("admin.posts.show", $post->id) }}">{{ $post->title }}</a></td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->date }}</td>
                                <td>
                                    <span class="badge badge-pill p-2" style="background-color:{{ $post->category->color }}">
                                        {{ $post->category->name }}
                                    </span>
                                </td> 
                                <td>
                                    @foreach ($post->tags as $tag)
                                        #{{ $tag->name }}  
                                    @endforeach
                                </td>
                                </td>
                                <td>
                                    <a href="{{ route("admin.posts.edit", $post->id) }}" class="btn btn-sm btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h2>There are no posts.</h2>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection