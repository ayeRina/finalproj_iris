@extends('layouts.app')
@section('content')
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Manage Users</h3>
                            <a href="{{ url('client/users/create') }}" class="btn btn-outline-primary btn-sm">Add New User</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th>Create Date</th>
                                    <th>Fullname</th>
                                    <th>Email Address</th>
                                    <th style="width: 120px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $key => $user)
                                    <tr>
                                    <td>{{ $key+ 1 }}</td>
                                    <td>{{ $user->created_date}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>
                                        <a href="{{ URL('client/users', $user->id) }}/edit" class="btn btn-success btn-sm">Edit</a>
                                        @if($user->id !== auth()->user()->id)
                                        <a href="javascript:;" onclick="removeUser({{ $user->id }})" class="btn btn-danger btn-sm">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                    <td class="text-center" colspan="5">No data Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection

@push('scripts')
<script>
    function removeUser(id){
        if(confirm('Are you sure want to delete this user?')){
            $.ajax({
                type:"DELETE",
                url:"{{ url('client/users') }}/" + id,
                dataType:'json',
                success:function(response){
                        location.reload();
                }
            });
        }
        

    }
</script>
@endpush