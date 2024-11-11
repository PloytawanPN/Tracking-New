<div>
    <div wire:loading.delay.longer wire:target="image,save" style="position: absolute">
        @include('Pets.Loader')
    </div>
    <div class="card-form" wire:ignore.self>
        <div class="settings-dropdown">
            <i class='bx bx-cog settings-icon'></i>
            <div class="settings-menu">
                <ul>
                    @foreach (config('menu') as $menu)
                        <li>
                            <a href="{{ $menu['route'] != '#' ? route($menu['route'], ['code' => Session::get('pet-code')]) : '#' }}"
                                class="menu-option">
                                <div class="text">{{ __($menu['label']) }}</div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <label class="header">{{ __('messages.PetInformation') }}</label>

        <input type="file" wire:model.live='image' name='image' id="imageInput" accept="image/*" required
            style="display: none;">
        <div id="preview_image" class="frame-preview" onclick="setupImagePreview('imageInput')">
            @if ($image)
                <img id="image_owner" src="{{ $image->temporaryUrl() }}" class="preview-image ">
            @else
                <img id="image_owner" src="{{ asset('storage/ProfileImage/Pets/' . $petInfo->pet_image) }}"
                    class="image-profile">
            @endif
        </div>


        <div class="input-group">
            <label>{{ __('messages.PetName') }}</label>
            <input type="text" class="input-field" wire:model='name' placeholder="{{ __('messages.PetNamePlac') }}">
        </div>


        <div class="input-group mt-1">
            <label>{{ __('messages.Species') }}</label>
            <select class="input-field select-field" wire:model.live='species'>
                <option value=''>{{ __('messages.PleaseSelect') }}</option>
                <option value='cat'>{{ __('messages.cat') }}</option>
                <option value='dog'>{{ __('messages.dog') }}</option>
                <option value='other'>{{ __('messages.other') }}</option>
            </select>
            @if ($species == 'other')
                <input type="text" class="input-field mt-1" wire:model='other'
                    placeholder="{{ __('messages.SpeciesPlac') }}">
            @endif
        </div>



        <div class="input-group mt-1">
            <label>{{ __('messages.Breed') }}</label>
            <input type="text" class="input-field" wire:model='breed' placeholder="{{ __('messages.BreedPlac') }}">
        </div>



        <div class="input-group mt-1">
            <label>{{ __('messages.Gender') }}</label>
            <select class="input-field select-field" wire:model.live='gender'>
                <option value=''>{{ __('messages.PleaseSelect') }}</option>
                <option value='male'>{{ __('messages.male') }}</option>
                <option value='female'>{{ __('messages.female') }}</option>
            </select>
        </div>



        <div class="input-group mt-1">
            <label>{{ __('messages.Birthdate') }}</label>
            <div class="input-field ">
                <input type="date" class="date-field" max="{{ \Carbon\Carbon::today()->toDateString() }}"
                    wire:model='birthday'>
            </div>
        </div>



        <div class="input-group mt-1">
            <label>{{ __('messages.ColorMarkings') }}</label>
            <input type="text" class="input-field" wire:model='color'
                placeholder="{{ __('messages.ColorMarkingsPlac') }}">
        </div>

        <div class="input-group mt-1">
            <label>{{ __('messages.EmergencyContact') }}</label>
            <input type="text" class="input-field" wire:model='EmergencyContact'
                placeholder="{{ __('messages.emergency_contact') }}">
        </div>

        <div class="input-group mt-1">
            <label>{{ __('messages.HomeLocation') }}</label>
            <div class="map-bg">
                <div class="loader_bg">
                    <div class="loader"></div>
                </div>
                <div wire:ignore class="map-field" id="map"></div>
            </div>
        </div>

        <div class="button-class-2">
            <button onclick="getLatLng()">{{ __('messages.Save') }}</button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lat = 13.736717;
            var lng = 100.523186;

            var lat_old = @json($lat);
            var lng_old = @json($lng);

            var marker;

            if (lat_old && lng_old) {
                renderMap(lat_old, lng_old);
            } else {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        lat = position.coords.latitude;
                        lng = position.coords.longitude;
                        renderMap(lat, lng);
                    }, function(error) {
                        renderMap(lat, lng);
                    });
                } else {
                    renderMap(lat, lng);
                }
            }

            function renderMap(lat, lng) {
                var map = L.map('map').setView([lat, lng], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                marker = L.marker([lat, lng], {
                    draggable: true,
                }).addTo(map);

                map.on('move', function() {
                    var center = map.getCenter();
                    marker.setLatLng(center);
                });

                marker.on('dragend', function() {
                    var lat = marker.getLatLng().lat;
                    var lng = marker.getLatLng().lng;
                });
            }
            window.getLatLng = function() {

                if (marker) {
                    var lat = marker.getLatLng().lat;
                    var lng = marker.getLatLng().lng;
                    Livewire.dispatch('save', {
                        lat: lat,
                        lng: lng
                    });
                } else {
                    Swal.fire({
                        title: "{{ __('messages.error') }}",
                        text: "{{ __('messages.waitingMap') }}",
                        icon: "error",
                        draggable: false,
                        confirmButtonText: "{{ __('messages.okay') }}",
                        customClass: {
                            confirmButton: 'gradient-btn',
                            icon: 'custom-icon'
                        }
                    });
                }
            }
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {

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
        });
    </script>
</div>
