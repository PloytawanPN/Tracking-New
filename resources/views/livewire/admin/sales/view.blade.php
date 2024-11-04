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
                                        <input type="text" class="form-control" value='{{$invoid_data->invoice_code}}' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control"  value='{{$invoid_data->name}}' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Lastname</label>
                                        <input type="text" class="form-control"  value='{{$invoid_data->lastname}}' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Phone number</label>
                                        <input type="text" class="form-control" value='{{$invoid_data->phone}}' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Order Date</label>
                                        <input type="date" class="form-control" wire:model='order_date' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Payment Status</label>
                                        <select class="form-select" wire:model='payment_st' disabled>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($itemList as $key => $item)
                                                    <tr>
                                                        <td class="text-center col-1">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>{{ $item->product_code }}</td>
                                                        <td>{{ $item->price }} ฿</td>
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
                                        <input type="text" class="form-control" value='{{$invoid_data->quantity}}' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Total Price (Bath)</label>
                                        <input type="text" class="form-control" value='{{$invoid_data->total_item_price}}' readonly>
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
                                        <select class="form-control" wire:model='shipping_company' disabled>
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
                                        <input type="date" class="form-control" wire:model='shipping_date' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Tracking Number</label>
                                        <input type="text" class="form-control" value='{{$invoid_data->tracking_number}}' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Shipping Address</label>
                                        <textarea type="text" class="form-control" style="height: 150px" wire:model='ship_address' readonly></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Shipping Fee (Bath)</label>
                                        <input type="number" class="form-control" value='{{$invoid_data->shipping_fee}}' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Total with Shipping (Bath)</label>
                                        <input type="number" class="form-control" value='{{$invoid_data->total_w_shipping}}' readonly>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

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
