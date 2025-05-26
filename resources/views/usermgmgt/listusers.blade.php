<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
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
            <table class="table table-striped" id="userlist">
                <thead><th>S/N</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Role</th><th></thead>
                <tbody>
                    @forelse ($users as $user)
                    
                    <tr>
                        <form action="{{route('update_user')}}" method="post">
                        @csrf
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
                        <td><input type="number" value="{{$user->id}}" name="uid" hidden id="uid"/>
                            <button type="submit" class="btn btn-primary">GO</button></td>
                            </form>
                    </tr>
                    
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
<script>
  new DataTable('#userlist');
</script>
</x-layouts.app>