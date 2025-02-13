@extends('layouts.default_with_menu')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-12">
            <div class="card-header"><h3 class="card-title"></h3></div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width: 240px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr class="align-middle">
                            <td>{{ $index + 1 }}.</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ url('/user/'.$user->id) }}">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                <form action="{{ url('/user') }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm_delete();">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-end">
                    {{ $users->links() }}  <!-- Laravel Pagination -->
                </ul>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirm_delete() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                return true;  // Allow form submission
            } else {
                return false;  // Prevent form submission
            }
        });
        return false;  // Prevent form submission by default
    }
</script>
@endsection
