<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card">

                <!-- Logo -->
                <div class="card-header py-4 text-center bg-primary">
                    <a>
                        <span><img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="22"></span>
                    </a>
                </div>

                <div class="card-body p-4">

                    <div class="text-center w-75 m-auto">
                        <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                        <p class="text-muted mb-4">Enter your email address and password to access admin panel.
                        </p>
                    </div>



                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Email address</label>
                        <input class="form-control" type="email" id="emailaddress" wire:model='email'
                            placeholder="Enter your email">
                    </div>

                    <div class="mb-3">
                        <a href="{{route('admin.forgot.password')}}" class="text-muted float-end"><small>Forgot your
                                password?</small></a>
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" wire:model='password'
                                placeholder="Enter your password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>

                    <div class="mb-3 mb-0 text-center">
                        <button class="btn btn-primary" wire:click='login'> Log In </button>
                    </div>


                </div> <!-- end card-body -->
            </div>

        </div> <!-- end col -->
    </div>
    <script>
        window.addEventListener('loginFalse', (event) => {
            Swal.fire({
                title: 'Error!',
                text: event.detail[0].message,
                icon: 'error',
                confirmButtonText: 'Okay'
            });
        });
    </script>
    <!-- end row -->
</div>
