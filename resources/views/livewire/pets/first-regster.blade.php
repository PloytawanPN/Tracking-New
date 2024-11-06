<div>
    <div wire:loading.delay.longer wire:target="next_to_step2,image" style="position: absolute">
        @include('Pets.Loader')
    </div>
    @if ($this->step == 1)
        <div class="card-form" wire:ignore.self>
            <label class="header">{{ __('messages.PetInformation') }}</label>


            <input type="file" wire:model.live='image' name='image' id="imageInput" accept="image/*" required
                style="display: none;">
            <div id="preview_image" class="frame-preview">
                <i class='bx bx-image-alt'></i>
                @if ($image)
                    <img id="preview" src="{{ $image->temporaryUrl() }}" class="preview-image ">
                @endif
            </div>


            <div class="input-group">
                <label>{{ __('messages.PetName') }}</label>
                <input type="text" class="input-field" wire:model='name'
                    placeholder="{{ __('messages.PetNamePlac') }}">
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
                    <input type="text" class="input-field mt-1" placeholder="{{ __('messages.SpeciesPlac') }}">
                @endif
            </div>



            <div class="input-group mt-1">
                <label>{{ __('messages.Breed') }}</label>
                <input type="text" class="input-field" wire:model='breed'
                    placeholder="{{ __('messages.BreedPlac') }}">
            </div>



            <div class="input-group mt-1">
                <label>{{ __('messages.Gender') }}</label>
                <select class="input-field select-field" wire:model.live='gender'>
                    <option value=''>{{ __('messages.PleaseSelect') }}</option>
                    <option value='m'>{{ __('messages.male') }}</option>
                    <option value='f'>{{ __('messages.female') }}</option>
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
                <label>{{ __('messages.HomeLocation') }}</label>
                <div class="map-bg">
                    <div class="loader_bg">
                        <div class="loader"></div>
                    </div>
                    <div wire:ignore class="map-field" id="map"></div>
                </div>


            </div>
            <div class="button-class">
                <button onclick="getLatLng()">{{ __('messages.Next') }}</button>
            </div>
        </div>
    @endif


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lat = 13.736717;
            var lng = 100.523186;
            var marker;

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
                    Livewire.dispatch('next_to_step2', {
                        lat: lat,
                        lng: lng
                    });
                } else {
                    Swal.fire({
                        title: "Please wait",
                        text: "We are currently loading locations. Please wait a moment.",
                        icon: "error",
                        draggable: false,
                        confirmButtonText: 'Okay',
                        customClass: {
                            confirmButton: 'gradient-btn',
                            icon: 'custom-icon'
                        }
                    });
                }
            }
        });
    </script>
    <script>
        document.getElementById('preview_image').addEventListener('click', function() {
            document.getElementById('imageInput').click();
        });
    </script>
</div>
