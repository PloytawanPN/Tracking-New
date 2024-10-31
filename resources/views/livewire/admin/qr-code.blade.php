<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h5>QR Code List</h5>
                        <div>
                            <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addQrCodeModal">
                                <i class="fas fa-plus me-1"></i>Add
                            </button>
                            <button class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#filterQrCodeModal">
                                <i class="fas fa-filter me-1"></i>Filter
                            </button>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exportQrCodeModal">
                                <i class="fas fa-file-export me-1"></i>Export
                            </button>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="fixed-header-preview">
                            <table id="alternative-page-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pet ID</th>
                                        <th>QrCode Data</th>
                                        <th>Active Status</th>
                                        <th>Export Status</th>
                                        <th>Create At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Data will be populated here --}}
                                </tbody>
                            </table>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->


    <!-- Modal for adding QR Code -->
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
                            <input type="number" class="form-control" id="numberOfQRCodes" min="1" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveQrCode">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Modal -->
    <div class="modal fade" id="filterQrCodeModal" tabindex="-1" aria-labelledby="filterQrCodeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterQrCodeModalLabel">Filter QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="filterForm">
                        <div class="mb-3">
                            <label for="petId" class="form-label">Pet ID</label>
                            <input type="text" class="form-control" id="petId" name="petId"
                                placeholder="Enter Pet ID">
                        </div>
                        <div class="mb-3">
                            <label for="activeStatus" class="form-label">Active Status</label>
                            <select class="form-select" id="activeStatus" name="activeStatus">
                                <option value="">All</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="createAt" class="form-label">Created At</label>
                            <input type="date" class="form-control" id="createAt" name="createAt">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="applyFilter()">Apply Filter</button>
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
</div>
