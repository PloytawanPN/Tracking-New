<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 align-items-center">
                        <h5>Admins List</h5>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control me-2" wire:model.live='search' placeholder="Search..." style="width: 200px;">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAdmins">
                                <i class='bx bx-plus me-1'></i>Add
                            </button>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="fixed-header-preview">
                            <table class="table table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Updated At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datalist as $key => $item)
                                        <tr>
                                            <td>{{ ($datalist->currentPage() - 1) * $datalist->perPage() + $key + 1 }}
                                            </td>
                                            <td>{{ $item->email }}</td>
                                            <td class="text-center">{{ $item->created_at }}</td>
                                            <td class="text-center">{{ $item->updated_at }}</td>
                                            <td class="text-center">


                                                <button class="btn btn-danger" onclick="delete_admin({{$item->id}})">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                                <button class="d-none" id='confirm_remove_{{$item->id}}' wire:click='delete({{$item->id}})'></button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @if (count($datalist) == 0)
                                <div class="text-center mt-3">
                                    Not Found Data
                                </div>
                            @endif
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->

                    <div class="mt-3">
                        {{ $datalist->links() }}
                    </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->


    <div class="modal fade" wire:ignore.self id="addAdmins" tabindex="-1" aria-labelledby="addQrCodeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQrCodeModalLabel">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addQrCodeForm">
                        <div class="mb-3">
                            <label for="numberOfQRCodes" class="form-label">Email</label>
                            <input type="email" class="form-control" wire:model='email'>
                        </div>
                        <div class="mb-3">
                            <label for="numberOfQRCodes" class="form-label">Password</label>
                            <input type="password" class="form-control" wire:model='password'>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveQrCode" wire:click='create'>Create</button>
                    {{--                     <button type="button" class="btn btn-primary d-none" id="create_qr"
                        wire:click='createQrCodes'></button> --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        function delete_admin(id){
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to remove this user",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, create it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#confirm_remove_'+id).click();
                    }
                });
        }




        window.addEventListener('AdminCreated', (event) => {
            Swal.fire({
                title: 'Success!',
                text: event.detail[0].message,
                icon: 'success',
                confirmButtonText: 'Okay'
            });
        });
        window.addEventListener('AdminFalse', (event) => {
            Swal.fire({
                title: 'Error!',
                text: event.detail[0].message,
                icon: 'error',
                confirmButtonText: 'Okay'
            });
        });
    </script>
</div>
