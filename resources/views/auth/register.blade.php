<x-authlayout>
    <div class="container">
        <div class="col-md-5  offset-3 mt-4 shadow p-4 rounded">
            <h2 class="text-primary text-center mb-3">Register Form</h2>
            <form action="{{ route('post_register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                  <div class="col">
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-outline">
                      <input type="text" id="form3Example1" name="username" value="{{ old('username') }}" class="form-control" />
                      <label class="form-label" for="form3Example1">Username</label>
                    </div>
                  </div>
                </div>

                <!-- Email input -->
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3" name="email" value="{{ old('email') }}" class="form-control" />
                  <label class="form-label" for="form3Example3">Email</label>
                </div>

                <!-- Password input -->
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" name="password" class="form-control" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>

                <!-- Confirm Password input -->
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" name="password_confirmation" class="form-control" />
                  <label class="form-label" for="form3Example4">Confirm Password</label>
                </div>

                <!-- Image input -->
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="form-outline mb-4">
                  <input type="file" id="form3Example4" name="image" class="form-control" />
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary offset-5 mb-4">Register</button>

                <!-- Login buttons -->
                <div class="text-center">
                  <p>Already register? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</x-authlayout>

