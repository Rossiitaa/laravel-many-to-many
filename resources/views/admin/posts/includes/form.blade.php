<div>
    <div class="form-group mb-2">
        <label for="title">Title</label>
        <input required name="title" type="text" class="form-control" id="title" placeholder="Enter title"
            value="{{old('title', $post->title)}}">
        @error('title')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>
    
    <div class="form-group mb-2">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10"
            class="form-control">{{old('content', $post->content)}}</textarea>
        @error('content')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group mb-2">
        <label for="image">Image Url</label>
        <input required name="image" type="text" class="form-control" id="image" placeholder="Enter image url"
            value="{{old('image', $post->image)}}">
        @error('image')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group mb-2">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>
                {{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

    <div class="w-100 text-center">
        <button type="submit" class="btn btn-primary text-light">Submit</button>
    </div>
</div>