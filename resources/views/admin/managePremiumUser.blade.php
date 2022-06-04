<x-adminlayout>
    <h1>Manage Premium User</h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">isAdmin?</th>
            <th scope="col">isPremium?</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id}}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->isAdmin == 0 ? 'No' : 'Yes' }}</td>
                    <td>{{ $user->isPremium == 0 ? 'No' : 'Yes' }}</td>
                    <td><a href="{{ route('admin.editUser',$user->id) }}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{ route('admin.deleteUser',$user->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
      </table>
</x-adminlayout>
