@extends('Admin.Layout.Layout')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">


            <div class="row">
                <div class="col-xxl-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Summarize</h4>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm rounded">
                                                @if ($sumary < 0)
                                                    <span
                                                        class="avatar-title bg-danger-lighten h3 my-0 text-danger rounded">
                                                        <i class="mdi mdi-currency-eth"></i>
                                                    </span>
                                                @else
                                                    <span
                                                        class="avatar-title bg-success-lighten h3 my-0 text-success rounded">
                                                        <i class="mdi mdi-currency-eth"></i>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="mt-0 mb-1 font-20">{{ number_format($sumary) }} THB</h4>
                                            <p class="mb-0 text-muted">
                                                @if ($sumary < 0)
                                                    <i class="mdi mdi-arrow-down-bold text-danger"></i>
                                                @else
                                                    <i class="mdi mdi-arrow-up-bold text-success"></i>
                                                @endif
                                                My Finances
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row align-items-end justify-content-between mt-3">
                                        <div class="col-sm-6">
                                            <h4 class="mt-0 text-muted fw-semibold mb-1">Loss
                                                {{ number_format($sumary_per) }}%</h4>
                                        </div> <!-- end col -->

                                        <div class="col-sm-5">
                                            <div class="text-end">
                                                <div id="currency-eth-chart" data-colors="#727cf5"></div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Revenue</h4>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm rounded">
                                                <span class="avatar-title bg-success-lighten h3 my-0 text-success rounded">
                                                    <i class="mdi mdi-currency-btc"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="mt-0 mb-1 font-20"> {{ number_format($totalSale) }} THB</h4>
                                            <p class="mb-0 text-muted"><i
                                                    class="mdi mdi-arrow-up-bold text-success"></i>Revenue from sales</p>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Expenses</h4>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm rounded">
                                                <span class="avatar-title bg-danger-lighten h3 my-0 text-danger rounded">
                                                    <i class="mdi mdi-currency-btc"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="mt-0 mb-1 font-20">{{ number_format($total) }} THB</h4>
                                            <p class="mb-0 text-muted"><i
                                                    class="mdi mdi-arrow-down-bold text-danger"></i>Total cost</p>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm rounded">
                                                <span class="avatar-title bg-danger-lighten h3 my-0 text-danger rounded">
                                                    <i class="mdi mdi-currency-btc"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="mt-0 mb-1 font-20">{{ number_format($total_price) }} THB</h4>
                                            <p class="mb-0 text-muted"><i
                                                    class="mdi mdi-arrow-down-bold text-danger"></i>Production expenses</p>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm rounded">
                                                <span class="avatar-title bg-danger-lighten h3 my-0 text-danger rounded">
                                                    <i class="mdi mdi-currency-btc"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="mt-0 mb-1 font-20">{{ number_format($product_deli) }} THB</h4>
                                            <p class="mb-0 text-muted"><i
                                                    class="mdi mdi-arrow-down-bold text-danger"></i>Product delivery</p>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm rounded">
                                                <span class="avatar-title bg-danger-lighten h3 my-0 text-danger rounded">
                                                    <i class="mdi mdi-currency-btc"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="mt-0 mb-1 font-20">{{ number_format($Expense_total) }} THB</h4>
                                            <p class="mb-0 text-muted"><i
                                                    class="mdi mdi-arrow-down-bold text-danger"></i>Other expenses</p>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->
@endsection
@section('style')
@endsection
@section('script')
@endsection
