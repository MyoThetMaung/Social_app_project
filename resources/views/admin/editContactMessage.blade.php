<x-adminlayout>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-10">
                <div class="shadow p-5">
                <h2 class="text-center text-success mb-3">Update Message</h2>
                <form action="{{ route('admin.updateMessage',$message->id) }}" method="POST">
                    @csrf
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="title">Username</label>
                        <input type="text" class="form-control" value="{{ old('username',$message->username) }}" name="username">
                    </div>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="title">Email</label>
                        <input type="text" class="form-control" value="{{ old('username',$message->email) }}"  name="email">
                    </div>

                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="title">Message</label>
                        <textarea name="message" class="form-control" cols="20" rows="7">{{ old('username',$message->message) }}</textarea>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</x-adminlayout>
