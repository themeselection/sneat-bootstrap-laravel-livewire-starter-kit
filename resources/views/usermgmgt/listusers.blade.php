<x-layouts.app>
    This is a a Test
        @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
<div>
    <div class="card">
        <div class="card-header">USER MANAGEMENT</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead><th>S/N</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Role</th><th></thead>
                <tbody>
                    @forelse ($users as $user)
                    <form action="{{route('update_user')}}" method="post">
                        @csrf
                    <tr>
                        <td>#</td>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>Current Role :  {{$user->role}}<br/>
                            <label for="role" class="form-control-label">New Role</label>
                            <select name="role" class="formselect">
                                <option value='superadmin'>Super Administrator</option>
                                <option value='admin'>Administrator</option>
                                <option value='agent'>Agent</option>
                                <option value='user'>Direct User</option>
                            </select>
                        </td>
                        <td><input type="number" value="{{$user->id}}" name="uid" hidden>
                            <button type="submit" class="btn btn-primary">GO</button></td>
                    </tr>
                    </form>
                    @empty
                    <tr>
                        <td>No Users Registered on System!!</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

</x-layouts.app>