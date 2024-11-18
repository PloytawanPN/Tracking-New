<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 align-items-center">
                        <h5>Production List</h5>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control me-2" wire:model.live='search' placeholder="Search..." style="width: 200px;">
                            <a class="btn btn-success" href='{{route('production.create')}}'>
                                <i class='bx bx-plus me-1'></i>Add
                            </a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="fixed-header-preview">
                            <table class="table table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Order Name</th>
                                        <th class="text-center">Total Price</th>
                                        <th class="text-center">Order At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datalist as $key => $item)
                                        <tr>
                                            <td>{{ ($datalist->currentPage() - 1) * $datalist->perPage() + $key + 1 }}
                                            </td>
                                            <td>{{ $item->order_id }}</td>
                                            <td>{{ $item->order_name }}</td>
                                            <td class="text-center">{{ number_format($item->total_price, 0) }} ฿</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($item->order_at)->format('d/m/Y') }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('production.view', ['id' => Crypt::encryptString($item->order_id)]) }}" class="btn btn-info">
                                                    <i class='bx bx-show'></i>
                                                </a>
                                                <a href="{{ route('production.edit', ['id' => Crypt::encryptString($item->order_id)]) }}" class="btn btn-warning">
                                                    <i class='bx bx-edit'></i>
                                                </a>
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
                </div>
            </div>
        </div>
    </div>

</div>
