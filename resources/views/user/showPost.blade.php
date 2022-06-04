<x-pagelayout>
    <div class="container mt-5 text-center">
        <h2>{{ $post->title }}</h2>
        <img src="{{ asset('images/posts/'.$post->image) }}" width="800px" height="400px" alt="">
        <p class="mt-3">{{ $post->content }}</p>
        <div class="text-center">
            @can("adminPremiumPostowner",$post->id)
                <a href="{{ route('editPost',$post->id) }}" class="btn btn-warning">Edit Post</a>
                <a href="{{ route('deletePost',$post->id) }}" class="btn btn-danger">Delete Post</a>
            @endcan
        </div>
    </div>
</x-pagelayout>
