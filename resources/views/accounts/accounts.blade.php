<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <x-app-layout>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>
                                        User List
                                    </h3>
                                </div>
                                <div>
                                    <button class="btn btn-primary m-2" data-toggle="modal" data-target="#addUserModal" style="float: :right;">
                                        <i class="bi bi-person mr-1"></i> Add New User
                                    </button>
                                </div>

                                @if (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('error')}}
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach($errors->all() as $err)
                                                <li>{{$err}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td>{{ $account->id }}</td>
                                                <td>{{ $account->name }}</td>
                                                <td>{{ $account->email }}</td>
                                                <td>
                                                    @foreach ($account->roles as $role)
                                                        {{ $role->display_name }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $account->id }}">Edit</a>

                                                    <!-- Delete Button (Example using a form) -->
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $account->id }}">Delete</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add-accounts') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="selectOption" name="role" id="role" class="form-control" required>
                                    <!-- Add options for roles here -->
                                    <option value="administrator">Admin</option>
                                    {{-- <option value="user">User</option> --}}
                                    <option value="faculty">Faculty</option>
                                    <option value="department">Department</option>
                                    <option value="dcca">Dcca</option>
                                    <option value="supervisor">Supervisor</option>

                                </select>
                            </div>
                            <div class="form-group" id="hiddenDepartment" style="display: none;">
                                <label for="departmentid">Department</label>
                                <select name="departmentid" id="departmentid" class="form-control">
                                    <option selected disabled>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="hiddenFaculty" style="display: none;">
                                <label for="facultyid">Faculty</label>
                                <select name="facultyid" id="facultyid" class="form-control">
                                    <option selected disabled>Select Faculty</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <script>
            document.getElementById('selectOption').addEventListener('change', function() {
              var selectedValue = this.value;
              var hiddenDepartment = document.getElementById('hiddenDepartment');
              var hiddenFaculty = document.getElementById('hiddenFaculty');

              if (selectedValue === 'department') {
                hiddenDepartment.style.display = 'block';
                hiddenFaculty.style.display = 'none';
              }else if (selectedValue === 'faculty') {
                hiddenFaculty.style.display = 'block';
                hiddenDepartment.style.display = 'none';
              } else {
                hiddenDepartment.style.display = 'none';
                hiddenFaculty.style.display = 'none';
              }
            });
          </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-rYkO8Va8e/c2C4zF3Pp8Cd1gsVvlvMhzRHCdCZy8XTWGRXP+x3i9Sti8M2I4ikBM" crossorigin="anonymous"></script>

</x-app-layout>


