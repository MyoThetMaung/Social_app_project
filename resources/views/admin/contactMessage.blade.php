<x-adminlayout>
    <h1>Contact Message</h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach($contactMessages as $message)
                <tr>
                    <th scope="row">{{ $message->id }}</th>
                    <td>{{ $message->username }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->message }}</td>
                    <td><a href="{{ route('admin.editMessage',$message->id) }}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{ route('admin.deleteMessage',$message->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
      </table>
</x-adminlayout>
