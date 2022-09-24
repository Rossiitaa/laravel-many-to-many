@extends("layouts.app")

@section("title", "Tags Index")

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-danger" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <table class="table table-dark">
                    <thead>
                        <th>ID</th>
                        <th>Tag Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td><a href="{{ route("admin.tags.show", $tag->id) }}">{{ $tag->id }}</a></td>
                                <td>{{ $tag->name }}</td>

                                <td class="d-flex">
                                    <a href="{{ route("admin.tags.edit", $tag->id) }}" class="btn btn-sm btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.tags.destroy', $tag->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection