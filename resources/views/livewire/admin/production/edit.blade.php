<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><a href="{{ route('production.list') }}"><i
                                class='bx bxs-left-arrow'></i></a>New production order
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

                                    <!-- Order List Table -->
                                    <table class="table table-bordered table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center col-1">#</th>
                                                <th class="text-center">Pet Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tbody>
                                                @foreach ($order_list as $key => $item)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td class="text-center">{{ $item['pet_code'] }}</td>
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
                                        <textarea type="text" class="form-control" wire:model='order_detail' style="height: 150px;"></textarea>
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
                                <button type="button" class="btn btn-primary" wire:click='update_order'>Update</button>

                            </div>
                        </div>
                    </div> 
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
                allowOutsideClick: false,
            }).then(() => {
                window.location.href =
                    "{{ route('production.list') }}";
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
