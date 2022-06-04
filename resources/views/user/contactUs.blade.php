<x-pagelayout>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1909.7480816261036!2d96.1758318080986!3d16.801724297107988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ecc12b5e8487%3A0x494b6b56a333d910!2sKyauk%20Myaung%20Ah%20Htet%20Ward%2C%20Yangon%2C%20Myanmar%20(Burma)!5e0!3m2!1sen!2ssg!4v1654162173576!5m2!1sen!2ssg"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <div class="shadow p-5">
                <h2 class="text-center text-success mb-3">Contact Us</h2>
                <form action="{{ route('postContactUs') }}" method="POST">
                    @csrf
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="title">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="title">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>

                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="form-group mb-3">
                        <label for="title">Message</label>
                        <textarea name="message" class="form-control" cols="20" rows="7"></textarea>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</x-pagelayout>
