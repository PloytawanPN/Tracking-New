<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h5>QR Code List</h5>
                        <div>
                            <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addQrCodeModal">
                                <i class='bx bx-plus me-1'></i>Add
                            </button>
                            <button class="btn btn-warning me-2" data-bs-toggle="modal"
                                data-bs-target="#filterQrCodeModal">
                                <i class='bx bx-filter me-1'></i>Filter
                            </button>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportQrCodeModal">
                                <i class='bx bx-export me-1'></i>Export
                            </button>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="fixed-header-preview">
                            <table class="table table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pet ID</th>
                                        <th>QrCode Data</th>
                                        <th class="text-center">Active Status</th>
                                        <th class="text-center">Export Status</th>
                                        <th class="text-center">Sold Status</th>
                                        <th>Create At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datalist as $key => $item)
                                        <tr>
                                            <td>{{ ($datalist->currentPage() - 1) * $datalist->perPage() + $key + 1 }}
                                            </td>
                                            <td>{{ $item->pet_code }}</td>
                                            <td>{{ $item->qr_data }}</td>
                                            <td class="text-center">
                                                @if ($item->active_st == 0)
                                                    <span class="badge badge-danger-lighten">Inactive</span>
                                                @else
                                                    <span class="badge badge-success-lighten">Active</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->export_st == 0)
                                                    <span class="badge badge-danger-lighten">Inactive</span>
                                                @else
                                                    <span class="badge badge-success-lighten">Active</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->sold_st == 0)
                                                    <span class="badge badge-danger-lighten">Not Sold</span>
                                                @else
                                                    <span class="badge badge-success-lighten">Sold</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="text-center">
                                                <button type="button" wire:click='Export_qr' class="btn btn-info"><i
                                                        class='bx bx-qr-scan'></i></button>

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


    <div class="modal fade" id="addQrCodeModal" tabindex="-1" aria-labelledby="addQrCodeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQrCodeModalLabel">Add QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addQrCodeForm">
                        <div class="mb-3">
                            <label for="numberOfQRCodes" class="form-label">Number of QR Codes to Create</label>
                            <input type="number" wire:model.defer="numberOfQRCodes" class="form-control"
                                id="numberOfQRCodes" min="1" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveQrCode">Create</button>
                    <button type="button" class="btn btn-primary d-none" id="create_qr"
                        wire:click='createQrCodes'></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Modal -->
    <div class="modal fade" id="filterQrCodeModal" tabindex="-1" aria-labelledby="filterQrCodeModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterQrCodeModalLabel">Filter QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="dateStart" class="form-label">Search</label>
                        <input type="text" class="form-control" id="dateStart" wire:model.live='search' />
                    </div>
                    <!-- Dropdown 1 -->
                    <div class="mb-3">
                        <label for="dropdown1" class="form-label">Active Status</label>
                        <select class="form-select" id="dropdown1" wire:model.live='active_s'>
                            <option value="" selected>Select an option</option>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>

                    <!-- Dropdown 2 -->
                    <div class="mb-3">
                        <label for="dropdown2" class="form-label">Export Status</label>
                        <select class="form-select" id="dropdown2" wire:model.live='export_s'>
                            <option value="" selected>Select an option</option>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>

                    <!-- Dropdown 3 -->
                    <div class="mb-3">
                        <label for="dropdown3" class="form-label">Sold Status</label>
                        <select class="form-select" id="dropdown3" wire:model.live='sold_s'>
                            <option value="" selected>Select an option</option>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dateStart" class="form-label">Date Start</label>
                        <input type="date" class="form-control" id="dateStart" wire:model.live='start_d' />
                    </div>

                    <!-- Date End -->
                    <div class="mb-3">
                        <label for="dateEnd" class="form-label">Date End</label>
                        <input type="date" class="form-control" id="dateEnd" wire:model.live='end_d' />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" onclick="clearFilters()">Clear Filter</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Export Modal -->
    <div class="modal fade" id="exportQrCodeModal" tabindex="-1" aria-labelledby="exportQrCodeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportQrCodeModalLabel">Export QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="exportForm">
                        <div class="mb-3">
                            <label for="exportFormat" class="form-label">Select Format</label>
                            <select class="form-select" id="exportFormat" name="exportFormat">
                                <option value="csv">CSV</option>
                                <option value="xlsx">Excel</option>
                                <option value="pdf">PDF</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="includeHeaders" class="form-label">Include Headers</label>
                            <div>
                                <input type="checkbox" id="includeHeaders" name="includeHeaders" checked>
                                <label for="includeHeaders" class="form-check-label">Yes, include headers</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="exportData()">Export</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('saveQrCode').addEventListener('click', function() {
                const numberOfQRCodes = document.getElementById('numberOfQRCodes').value;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to create " + numberOfQRCodes + " QR Code(s)!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, create it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#create_qr').click();
                        $('#addQrCodeModal').modal('hide');
                    }
                });
            });
        });
        window.addEventListener('qrCodesCreated', (event) => {
            Swal.fire({
                title: 'Success!',
                text: event.detail[0].message,
                icon: 'success',
                confirmButtonText: 'Okay'
            });
        });
        window.addEventListener('qrCodesFalse', (event) => {
            Swal.fire({
                title: 'Error!',
                text: event.detail[0].message,
                icon: 'error',
                confirmButtonText: 'Okay'
            });
        });

        function clearFilters() {
            @this.set('active_s', '');
            @this.set('export_s', '');
            @this.set('sold_s', '');
            @this.set('start_d', null);
            @this.set('end_d', null);
            $('#filterQrCodeModal').modal('hide');
        }
    </script>
</div>
