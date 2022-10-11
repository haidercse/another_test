@extends('backend.layouts.master')

@section('title')
    Dashboard-page
@endsection

@section('admin-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List</h4>
                        <a class="float-right btn btn-success" href="" data-toggle="modal"
                            data-target="#exampleModal">Add</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('user.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    aria-describedby="emailHelp">

                                            </div>
                                            <div class="form-group">
                                                <label for="eamil">Email</label>
                                                <input type="text" name="email" class="form-control" id="email"
                                                    aria-describedby="emailHelp">

                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select name="role_id" id="role" class="form-control">
                                                    <option value="">Select Role</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Author</option>
                                                </select>

                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table  table-bordered" id="admin">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @if ($user->role_id == 1)
                                            <td>Admin</td>
                                        @elseif ($user->role_id == 2)
                                            <td>Author</td>
                                        @else
                                            <td>User</td>
                                        @endif


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#admin").dataTable();
        })
    </script>
@endpush
