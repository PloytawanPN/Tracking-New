<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">
                        <a href='{{route('sales.list')}}'><i class='bx bxs-left-arrow'></i></a> Create Sales Invoice
                    </h4>
                    <p class="text-muted font-14">Fill in the details below to create a new sales invoice.</p>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Invoice Code</label>
                                        <input type="text" class="form-control" wire:model='invoice_code' @disabled(true)>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control"  wire:model='name'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Lastname</label>
                                        <input type="text" class="form-control"  wire:model='lastname'>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Phone number</label>
                                        <input type="text" class="form-control" wire:model='phone'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Order Date</label>
                                        <input type="date" class="form-control" wire:model='order_date'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Payment Status</label>
                                        <select class="form-select" wire:model='payment_st'>
                                            <option value="" selected>Please Select</option>
                                            <option value="1">Paid</option>
                                            <option value="0">Pending Payment</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="header-title">
                            <a href="#"><i class='bx bxs-box' style="margin-right: 10px"></i></a>Product
                            Information
                        </h4>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addorder">Add
                            Item</button>
                    </div>
                    <hr>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">

                                        <table class="table table-bordered table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Product Code</th>
                                                    <th>Price (Bath)</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($itemList as $key => $item)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>{{ $item['code'] }}</td>
                                                        <td>{{ $item['price'] }} ฿</td>
                                                        <td class="table-action text-center">
                                                            <a href="#" wire:click='removeRow("{{$item['code']}}")'
                                                                class="action-icon">
                                                                <i class="mdi mdi-delete"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @if (count($itemList) == 0)
                                                    <tr>
                                                        <td class="text-center" colspan="4">
                                                            Not Found Data
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="text" class="form-control" wire:model.live='quantity' @disabled(true)>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Total Price (Bath)</label>
                                        <input type="text" class="form-control" wire:model.live='total_price' @disabled(true)>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->
                    <h4 class="header-title">
                        <a href="#"><i class='bx bxs-truck ' style="margin-right: 10px"></i></a>Shipping
                        Information
                    </h4>
                    <hr>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Shipping Company</label>
                                        <select class="form-control" wire:model='shipping_company'>
                                            <option value="" selected>Please Select</option>
                                            <option value="kerry">Kerry Express</option>
                                            <option value="flash">Flash Express</option>
                                            <option value="nex">Nex Logistics</option>
                                            <option value="thai_post">Thailand Post</option>
                                            <option value="dhl">DHL</option>
                                            <option value="ups">UPS</option>
                                            <option value="grab">Grab Express</option>
                                            <option value="lineman">Lineman</option>
                                            <option value="scg">SCG Logistics</option>
                                            <option value="tnt">TNT</option>
                                            <option value="rabbit">Rabbit Line Pay</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Shipping Date</label>
                                        <input type="date" class="form-control" wire:model='shipping_date'>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Tracking Number</label>
                                        <input type="text" class="form-control" wire:model='tracking_number'>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Shipping Address</label>
                                        <textarea type="text" class="form-control" style="height: 150px" wire:model='address'></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Shipping Fee (Bath)</label>
                                        <input type="number" class="form-control" wire:model.live='shipping_fee'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Total with Shipping (Bath)</label>
                                        <input type="number" class="form-control" @disabled(true) wire:model='total'>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" wire:click='create_invoice'>Create
                                    Invoice</button>
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
                    <h5 class="modal-title" id="addorder">Select Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-2">
                        <label class="form-label">Product Code</label>
                        <select class="form-control" wire:model='product_code'>
                            <option value="" selected>Please Select</option>
                            @foreach ($product_list as $item)
                                <option value="{{ $item->pet_code }}">{{ $item->pet_code }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Price (Bath)</label>
                        <input type="number" wire:model='product_price' class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveQrCode" wire:click='addItem'>Add
                        Item</button>
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
                    "{{ route('sales.list') }}";
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
