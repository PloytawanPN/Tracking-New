<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><a href="{{route('production.list')}}"><i class='bx bxs-left-arrow'></i></a>Production order : {{$OrderDetail->order_id}}
                    </h4>
                    <p class="text-muted font-14">View details for this production order.</p>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Production Order ID</label>
                                        <input type="text" class="form-control" readonly
                                            wire:model='order_id'>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <!-- Title and Add Order Button -->
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label for="simpleinput" class="form-label">Order List</label>
                                    </div>

                                    <!-- Order List Table -->
                                    <table class="table table-bordered table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center col-1">#</th>
                                                <th class="text-center">Pet Code</th>
                                            </tr>
                                        </thead>
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
                                    </table>
                                </div>



                                <div class="col-lg-12 mt-3">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Production Order Name</label>
                                        <input type="text" class="form-control" wire:model='order_name' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Product Details</label>
                                        <textarea type="text" class="form-control" wire:model='order_detail' readonly style="height: 150px;"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Production Channel</label>
                                        <input type="text" class="form-control" wire:model='order_channel'readonly>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Production Quantity</label>
                                        <input type="number" class="form-control" readonly
                                            wire:model='ProductQuantity'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Total Price (Bath)</label>
                                        <input type="number" class="form-control" wire:model.live='total_price' readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Unit Price (Bath)</label>
                                        <input type="number" class="form-control" readonly
                                            wire:model='unit_price'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Shipping Cost (Bath)</label>
                                        <input type="number" class="form-control" wire:model='shipping_cost' readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Order Date</label>
                                        <input class="form-control" type="date" name="date" readonly
                                            wire:model='order_date'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Received Date</label>
                                        <input class="form-control" type="date" name="date" readonly
                                            wire:model='received_date'>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
</div>
