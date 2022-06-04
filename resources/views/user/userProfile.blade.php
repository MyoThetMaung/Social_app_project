<x-pagelayout>
    <div class="container ">
        <div class="col-md-5 offset-3 shadow p-5 mt-3">
            <h2 class="text-center text-success mb-3">User Profile</h2>
        <form action="{{ route('post_userProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Username</label>
                <input type="text" class="form-control" value="{{ old('username',Auth::user()->name) }}" name="username">
            </div>

            <div class="form-group mb-3">
                <label for="title">Email</label>
                <input type="text" class="form-control" value="{{ old('email',Auth::user()->email) }}" name="email">
            </div>

            <div class="form-group mb-3">
                <label for="title">Image</label>
                <input type="file" class="form-control" name="image">
                <img src="{{ asset('images/profiles/'.Auth::user()->image) }}" class="mt-2" width=150 height=150 alt="">
            </div>

            <div class="form-group mb-3">
                <label for="title">Old Password</label>
                <input type="text" class="form-control" name="old_password">
            </div>

            <div class="form-group mb-3">
                <label for="title">New Password</label>
                <input type="text" class="form-control" name="new_password">
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
          </form>
        </div>
    </div>
</x-pagelayout>
