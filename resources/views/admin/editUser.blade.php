<x-adminlayout>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-10">
                <div class="shadow p-5">
                <h2 class="text-center text-success mb-3">Contact Us</h2>
                <form action="{{ route('admin.updateUser',$user->id) }}" method="POST" >
                    @csrf
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="title">Username</label>
                        <input type="text" value="{{ old('name',$user->name) }}" class="form-control" name="name">
                    </div>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="title">Email</label>
                        <input type="text" value="{{ old('email',$user->email) }}" class="form-control" name="email">
                    </div>

                    @error('isAdmin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="title">Admin?</label>
                        <select name="isAdmin" class="form-select">
                            <option value="0" {{ $user->isAdmin == '0' ? 'selected' : ''}}>No</option>
                            <option value="1" {{ $user->isAdmin == '1' ? 'selected' : ''}}>Yes</option>
                        </select>
                    </div>

                    @error('isPremium')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="title">Premium?</label>
                        <select name="isPremium" class="form-select">
                            <option value="0" {{ $user->isPremium == '0' ? 'selected' : ''}}>No</option>
                            <option value="1" {{ $user->isPremium == '1' ? 'selected' : ''}}>Yes</option>
                        </select>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</x-adminlayout>
