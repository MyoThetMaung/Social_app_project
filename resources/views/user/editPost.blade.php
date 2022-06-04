<x-pagelayout>
    <div class="container ">
        <div class="col-md-5 offset-3 shadow p-5 mt-3">
            <h2 class="text-center text-success mb-3">Edit Post</h2>
        <form action="{{ route('updatePost',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" value="{{ old('title',$post->title) }}" class="form-control" name="title">
            </div>

            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mb-3">
                <label for="title">Image</label>
                <input type="file" class="form-control" name="image"> <br>
                <img src="{{ asset('images/posts/'.$post->image) }}" width="200px" height="200px" alt="">
            </div>

            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mb-3">
                <label for="title">Content</label>
                <textarea name="content" class="form-control" cols="20" rows="7">{{ old('title',$post->content) }}</textarea>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Update Post</button>
          </form>
        </div>
    </div>
</x-pagelayout>
