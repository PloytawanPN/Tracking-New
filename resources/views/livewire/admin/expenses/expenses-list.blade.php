<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 align-items-center">
                        <h5>Production List</h5>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control me-2" wire:model.live='search' placeholder="Search..." style="width: 200px;">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addExpenseModal">
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
                                        <th>Expense Name</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Payment Date</th>
                                        <th class="text-center">Payment Method</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datalist as $key => $item)
                                        <tr>
                                            <td>{{ ($datalist->currentPage() - 1) * $datalist->perPage() + $key + 1 }}
                                            </td>
                                            <td>{{ $item->expense_name }}</td>
                                            <td class="text-center">{{ $item->amount }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse( $item->payment_date )->format('d/m/Y') }}</td>
                                            <td class="text-center">{{config('cache.Payment-Method.'.$item->payment_method.'.name')}}</td>

                                            {{-- <td class="text-center">
                                                <a href="{{ route('production.view', ['id' => Crypt::encryptString($item->order_id)]) }}" class="btn btn-info">
                                                    <i class='bx bx-show'></i>
                                                </button>
                                            </td> --}}
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


    <div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExpenseModalLabel">Add New Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addExpenseForm">
                        <div class="mb-3">
                            <label for="expenseName" class="form-label">Expense Name</label>
                            <input type="text" class="form-control" id="expenseName" wire:model='expense_name'>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" wire:model='amount'>
                        </div>
                        <div class="mb-3">
                            <label for="paymentDate" class="form-label">Payment Date</label>
                            <input type="date" class="form-control" id="paymentDate" wire:model='payment_date'>
                        </div>
                        <div class="mb-3">
                            <label for="paymentMethod" class="form-label">Payment Method</label>
                            <select class="form-select" id="paymentMethod" wire:model='payment_method'>
                                <option value="" selected>Please select</option>
                                <option value="1">Cash</option>
                                <option value="2">Credit Card</option>
                                <option value="3">Bank Transfer</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click='add_expense'>Add Expense</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('expenseCreated', (event) => {
            const originalModal = document.getElementById('addExpenseModal');
            const modalInstance = bootstrap.Modal.getInstance(originalModal);

            if (modalInstance) {
                modalInstance.hide();
            }
            Swal.fire({
                title: 'Success!',
                text: event.detail[0].message,
                icon: 'success',
                confirmButtonText: 'Okay'
            });
        });
        window.addEventListener('expenseFalse', (event) => {
            const originalModal = document.getElementById('addExpenseModal');
            const modalInstance = bootstrap.Modal.getInstance(originalModal);

            if (modalInstance) {
                modalInstance.hide();
            }
            Swal.fire({
                title: 'Error!',
                text: event.detail[0].message,
                icon: 'error',
                confirmButtonText: 'Okay'
            });
        });
    </script>

</div>
