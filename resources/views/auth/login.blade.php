<x-authlayout>
    <div class="container">
        <div class="col-md-5 offset-3 mt-4 shadow p-4 rounded">
            <h2 class="text-primary text-center mb-3">Login Form</h2>
            @if(Session('message'))
                <p class="text-danger">{{ Session('message') }}</p>
            @endif
            <form action="{{ route('post_login') }}" method="POST">
                @csrf
                <!-- Email input -->
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-outline mb-4">
                  <input type="email" id="form2Example1" name="email" class="form-control" />
                  <label class="form-label" for="form2Example1">Email address</label>
                </div>

                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example2" class="form-control" />
                  <label class="form-label" for="form2Example2">Password</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary offset-5 mb-4">Login</button>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</x-authlayout>

