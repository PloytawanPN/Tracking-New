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
                    <a href="#">Pet Information</a>
                    <a href="#">Owner Information</a>
                    <a href="#">Health Information</a>
                    <a href="#">Login Account</a>
                </div>
            </div>
        @endif
        @if ($status == 2)
            <div class="dropdown">
                <button class="dropbtn" id='openbt'><i class='bx bx-menu'></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="#">Pet Info</a>
                    {{-- <a href="#">Health Info</a>
                    <a href="#">Vaccinations</a>
                    <a href="#">Health Issues</a>
                    <a href="#">Diet/Allergies</a>
                    <a href="#">Medical History</a>
                    <a href="#">Weight Log</a> --}}
                    <a href="#" wire:click='logout'>Logout</a>
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
</nav>
