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
                        <div class="col-md-4">
                            <img src="https://images.unsplash.com/photo-1618044619888-009e412ff12a?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                 alt="signup form" class="rounded-4 shadow-lg" style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                        <div class="col-md-8 d-flex" style="overflow-x: scroll;">
                            <div class="card-body p-0">
                                <div class="card-header fs-3" style="color: #9A616D;">{{ __('ROOMS MANAGEMENT') }}</div>
                                @if (session('status'))
                                    <div class="alert alert-success m-2" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="p-2 container">
                                        <a href="{{ route('rooms.create') }}" class="btn text-light btn-md rounded-3 shadow-sm mb-2" style="background-color: #9A616D;">Create New Room</a>
                                        <table class="table table-striped table-bordered" id="rooms-table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Address</th>
                                                    <th>Beds</th>
                                                    <th>Washrooms</th>
                                                    <th>Guests</th>
                                                    <th>Price</th>
                                                    <th>Amenities</th>
                                                    <th>Image</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
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
                    <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete this room?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>This action cannot be undone.</p>
                    <p id="delete-timer">5 seconds remaining before deletion.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="triggerDelete(roomId)">Delete Now</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('#rooms-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('rooms.data') }}', 
                columns: [
                    { data: 'address', name: 'address' },
                    { data: 'beds', name: 'beds' },
                    { data: 'washrooms', name: 'washrooms' },
                    { data: 'guests', name: 'guests' },
                    { data: 'price', name: 'price' },
                    { data: 'amenities', name: 'amenities' },
                    {
                        data: 'image', name: 'image', render: function(data) {
                            if (data) {
                                return '<img src="data:image/jpeg;base64,' + data + '" alt="Room Image" style="width: 50px; height: 50px; object-fit: cover;" class="rounded-circle">';
                            } else {
                                return '<span>No Image</span>';
                            }
                        }
                    },
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
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>

@endsection
