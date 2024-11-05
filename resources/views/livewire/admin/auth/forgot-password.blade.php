<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
    <div wire:loading.delay.longest wire:target="sendEmail">
        <div class="position-fixed top-0  w-100 h-100 d-flex justify-content-center align-items-center "
            style="z-index: 1055;background-color: rgba(0, 0, 0, 0.288)">
            <div class="spinner-border text-light">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <!-- Logo -->
                    <div class="card-header py-4 text-center bg-primary">
                        <a href="#">
                            <span><img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="22"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-1 fw-bold">Forgot Password </h4>
                            <p class="text-muted mb-4">Enter your email address to get link.</p>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Email Address</label>
                            <input class="form-control" type="email" wire:model='email'
                                placeholder="Enter your email">
                        </div>

                        <div class="mb-0 text-center">
                            <button class="btn btn-primary" wire:click='sendEmail'>Send Email</button>
                        </div>


                    </div> <!-- end card-body-->
                </div>
                <!-- end card-->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Not you? return <a href="{{ route('admin.login') }}"
                                class="text-muted ms-1"><b>Sign In</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <script>
        window.addEventListener('SendEmailSuccess', (event) => {
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
                    "{{ route('admin.login') }}";
            });
        });
        window.addEventListener('SendEmailFalse', (event) => {
            Swal.fire({
                title: 'Error!',
                text: event.detail[0].message,
                icon: 'error',
                confirmButtonText: 'Okay'
            });
        });
    </script>
</div>
