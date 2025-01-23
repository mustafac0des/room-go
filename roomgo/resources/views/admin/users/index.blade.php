@extends('layouts.app')

@section('content')
    @if (auth()->check() && auth()->user()->role !== 'admin')
        <script type="text/javascript">
            window.location.href = "{{ url('admin/dashboard') }}";
        </script>
    @else
        <div class="container p-0">
            <div class="col col-xl-10 rounded-6">
                <div class="card rounded-4">
                    <div class="row g-0">
                        <div class="d-flex" style="overflow-x: scroll;">
                            <div class="card-body p-0">
                                <div class="card-header fs-3" style="color: #9A616D;">{{ __('ADMIN PORTAL') }}</div>
                                @if (session('status'))
                                    <div class="alert alert-success m-2" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="p-2 container">
                                        <a href="{{ route('users.create') }}" class="btn text-light btn-md rounded-3 shadow-sm mb-2" style="background-color: #9A616D;">Create New User</a>
                                        <table class="table table-striped table-bordered" id="users-table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Gender</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Picture</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete this user?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>This action cannot be undone.</p>
                    <p id="delete-timer">5 seconds remaining before deletion.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cancelDeletion()">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirm-delete-btn">Delete Now</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <script>
        var deleteTimeout = null;
        var userIdToDelete = null;
        var deleteInitiated = false;

        function deleteUser(userId) {
            userIdToDelete = userId;
            let countdownTime = 5;
            deleteInitiated = true;

            deleteTimeout = setInterval(function() {
                document.getElementById('delete-timer').textContent = countdownTime + " seconds remaining before deletion.";
                countdownTime--;
                if (countdownTime < 0) {
                    clearInterval(deleteTimeout);
                    triggerDelete(userIdToDelete);
                }
            }, 1000);

            $('#deleteModal').modal('show');
        }

        function cancelDeletion() {
            clearInterval(deleteTimeout);
            $('#deleteModal').modal('hide');
        }

        function triggerDelete(userId) {
            $.ajax({
                url: '/admin/users/' + userId,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#deleteModal').modal('hide');
                    alert('User deleted successfully');
                    location.reload();
                },
                error: function(response) {
                    alert('An error occurred. Please try again.');
                }
            });
        }

        $('#confirm-delete-btn').click(function() {
            clearInterval(deleteTimeout); 
            triggerDelete(userIdToDelete); 
        });

        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('users.data') }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'gender', name: 'gender' },
                    { data: 'address', name: 'address' },
                    { data: 'phone', name: 'phone' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                responsive: true,
                language: {
                    search: "Filter records:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "No records available",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                },
                columnDefs: [
                    {
                        targets: [7, 8],
                        orderable: false,
                        searchable: false
                    }
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

@endsection
