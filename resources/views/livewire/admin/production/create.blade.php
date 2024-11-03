<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><a href="#"><i class='bx bxs-left-arrow'></i></a>New production order
                    </h4>
                    <p class="text-muted font-14">Please fill in the details for the new production order.</p>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Production Order ID</label>
                                        <input type="text" class="form-control" @disabled(true)
                                            wire:model='order_id'>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <!-- Title and Add Order Button -->
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label for="simpleinput" class="form-label">Order List</label>
                                        <button class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#addorder">Add Order</button>
                                    </div>

                                    <!-- Order List Table -->
                                    <table class="table table-bordered table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Pet Code</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order_list as $key => $item)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>{{ $item['pet_code'] }}</td>
                                                    <td class="table-action text-center">
                                                        <a href="#" wire:click='removeRow({{ $item['id'] }})'
                                                            class="action-icon">
                                                            <i class="mdi mdi-delete"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (count($order_list) == 0)
                                                <tr>
                                                    <td class="text-center" colspan="3">
                                                        Not Found Data
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>



                                <div class="col-lg-12 mt-3">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Production Order Name</label>
                                        <input type="text" class="form-control" wire:model='order_name'>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Product Details</label>
                                        <textarea type="text" class="form-control" wire:model='order_detail'></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Production Channel</label>
                                        <input type="text" class="form-control" wire:model='order_channel'>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Production Quantity</label>
                                        <input type="number" class="form-control" @disabled(true)
                                            wire:model='ProductQuantity'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Total Price (Bath)</label>
                                        <input type="number" class="form-control" wire:model.live='total_price'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Unit Price (Bath)</label>
                                        <input type="number" class="form-control" @disabled(true)
                                            wire:model='unit_price'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Shipping Cost (Bath)</label>
                                        <input type="number" class="form-control" wire:model='shipping_cost'>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Order Date</label>
                                        <input class="form-control" type="date" name="date"
                                            wire:model='order_date'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Received Date</label>
                                        <input class="form-control" type="date" name="date"
                                            wire:model='received_date'>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" wire:click='create_order'>New
                                    Order</button>

                            </div>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="modal fade" id="addorder" tabindex="-1" aria-labelledby="addorder" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addorder">Select pet code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-2">
                        <label class="form-label">Start pet code</label>
                        <input type="text" wire:model.defer="start_code" class="form-control"
                            placeholder="AA000001">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Last pet code</label>
                        <input type="text" wire:model.defer="last_code" class="form-control"
                            placeholder="AA000010">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveQrCode"
                        wire:click='addOrder'>Create</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('orderCreated', (event) => {
            const originalModal = document.getElementById('addorder');
            const modalInstance = bootstrap.Modal.getInstance(originalModal);

            if (modalInstance) {
                modalInstance.hide(); // Close the modal properly
            }

            Swal.fire({
                title: 'Success!',
                text: event.detail[0].message,
                icon: 'success',
                confirmButtonText: 'Okay'
            });

        });

        window.addEventListener('createdSuccess', (event) => {
            Swal.fire({
                title: 'Success!',
                text: event.detail[0].message,
                icon: 'success',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            }).then(() => {
                window.location.href =
                "{{ route('QrCodeList') }}";
            });
        });

        window.addEventListener('orderFalse', (event) => {
            Swal.fire({
                title: 'Error!',
                text: event.detail[0].message,
                icon: 'error',
                confirmButtonText: 'Okay'
            });
        });
    </script>

</div>
