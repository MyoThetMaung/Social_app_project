<x-pagelayout>
    {{--  Background Imag  --}}
        <header></header>
    {{--  posts  --}}
    <div class="container">
        <h2 class="mt-3">All Post</h2>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                      <img src="{{asset('images/posts/'.$post->image)}}" class="img-fluid"/>
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                      </a>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <h5 class="card-text text-success">{{ $post->user->name }}</h5>
                      <p class="card-text">{{ $post->content }}</p>
                      <a href="{{ route('showPostById',$post->id) }}" class="btn btn-primary">See More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
    <div class="d-flex justify-content-center mt-5">{{ $posts->links() }}</div>
</x-pagelayout>

