<x-pagelayout>
    <div class="container ">
        <div class="col-md-5 offset-3 shadow p-5 mt-3">
            <h2 class="text-center text-success mb-3">Create Post</h2>
        <form action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title">
            </div>

            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mb-3">
                <label for="title">Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            @error('content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group mb-3">
                <label for="title">Content</label>
                <textarea name="content" class="form-control" cols="20" rows="7"></textarea>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
          </form>
        </div>
    </div>
</x-pagelayout>
