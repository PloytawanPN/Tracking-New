<nav class="navbar-custome">
    <div class="navbar-logo">
        <img src="{{ asset('assets/images/paw-solid.svg') }}">
        <h3>{{ config('app.name') }}</h3>
    </div>
    <div class="navbar-switch">
        
        @if ($status == 1)
            <div class="dropdown">
                <button class="dropbtn" id='openbt'><i class='bx bx-menu'></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="{{route('pet.profile', ['code' => $this->code])}}">{{__('messages.PetInformation')}}</a>
                    <a href="{{route('owner.profile', ['code' => $this->code])}}">{{__('messages.ownerInformation')}}</a>
                    <a href="{{ route('pet.healthInfo', ['code' => $this->code]) }}">{{ __('messages.HealthInformation') }}</a>
                    <a href="{{route('login.user')}}">{{__('messages.login')}}</a>
                </div>
            </div>
        @endif
        @if ($status == 2)
            <div class="dropdown">
                <button class="dropbtn" id='openbt'><i class='bx bx-menu'></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="{{ route('profile.user') }}">{{ __('messages.user_setting') }}</a>
                    <a href="{{ route('portal.user') }}">{{ __('messages.pet_setting') }}</a>
                    <a href="#" wire:click='logout'>{{ __('messages.logout') }}</a>
                    {{-- <a href="#">Health Info</a>
                    <a href="#">Vaccinations</a>
                    <a href="#">Health Issues</a>
                    <a href="#">Diet/Allergies</a>
                    <a href="#">Medical History</a>
                    <a href="#">Weight Log</a> --}}
                </div>
            </div>
        @endif
        <label for="filter" class="switch" aria-label="Toggle Filter">
            <input type="checkbox" id="filter" wire:model.live='lang' wire:click='changelang' />
            <span>EN</span>
            <span>TH</span>
        </label>
    </div>

    <script>
        document.getElementById("openbt").addEventListener("click", function(event) {
            var dropdown = document.getElementById("myDropdown");
            dropdown.classList.toggle("show");

            if (dropdown.classList.contains("show")) {

                var dropdown๘ๅ = document.querySelector('.settings-menu');
                dropdown_1.style.display = 'none';
            }

            event.stopPropagation();
        });

        document.addEventListener("click", function(event) {
            var dropdown = document.getElementById("myDropdown");
            var button = document.getElementById("openbt");

            if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                dropdown.classList.remove("show");
            }
        });

        var links = document.querySelectorAll(".dropdown-content a");
        links.forEach(function(link) {
            link.addEventListener("click", function() {
                var dropdown = document.getElementById("myDropdown");
                dropdown.classList.remove("show");
            });
        });
    </script>
    <script>
        window.addEventListener('False', (event) => {
            Swal.fire({
                title: "{{ __('messages.error') }}",
                text: event.detail[0].message,
                icon: "error",
                draggable: false,
                confirmButtonText: "{{ __('messages.okay') }}",
                customClass: {
                    confirmButton: 'gradient-btn',
                    icon: 'custom-icon'
                }
            });
        });
    </script>

    <script>
        window.addEventListener('Confirm', (event) => {
            Swal.fire({
                title: "{{ __('messages.confirmation_prompt') }}",
                text: event.detail[0].message,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#fa7153",
                cancelButtonColor: "#e4e4e4",
                confirmButtonText: "{{ __('messages.okay') }}",
                cancelButtonText: "{{ __('messages.cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch(event.detail[0].method);
                }
            });
        });
    </script>

    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        container: 'swal2-container',
                        popup: 'swal2-popup',
                        title: 'swal2-title-2',
                        icon: 'swal2-icon-2'
                    },
                    background: 'linear-gradient(to right,#008793, #00BF72)',
                    willOpen: () => {
                        const swalContainer = document.querySelector('.swal2-container');
                        swalContainer.style.position = 'fixed';
                        swalContainer.style.zIndex = 9999999;
                    },
                });

            });
        </script>
    @endif
</nav>
