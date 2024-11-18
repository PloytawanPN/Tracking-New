<div>

    @if ($style && $style->button_color)
        @if ($style->button_color == 'custom')
            <style>
                .show-field a {
                    background-image: none;
                    background-color: {{ $style->b_colorcode }};
                }
            </style>
        @else
        <style>
            .show-field a {
                background-image: {{ $style->b_colorcode }};
            }
        </style>
        @endif
    @endif
    @if ($style && $style->header_color)
        <style>
            .header {
                font-size: 27px;
                font-weight: 700;
                background: {{ $style->h_colorcode }};
                background-clip: text;
                color: transparent;
            }
        </style>
    @endif
    @if ($style && $style->bg_image)
        <style>
            .background-img {
                position: fixed;
                width: 100vw;
                height: 100vh;
                background-color: rgb(255, 255, 255);
                top: 0;
                left: 0;
                z-index: -10;
                background-image: url('{{ asset("storage/style/bg/$style->bg_image") }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                filter: brightness(0.6);
            }
            @media (max-width: 930px) {
                .background-img {
                    background-image: url('{{ asset("storage/style/card/$style->card_image") }}');
                    filter: brightness(1);
                }
            }
        </style>
    @endif
    @if ($style && $style->card_image)
        <style>
            .card-pet-profile {
                background-image: url('{{ asset("storage/style/card/$style->card_image") }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            @media (max-width: 930px) {
                .card-pet-profile {
                    background-image: none;
                    background-color: rgba(240, 248, 255, 0);
                    box-shadow: none;
                }
            }
        </style>
    @endif
    <div class="background-img"></div>

    <div class="card-pet-profile">
        <div class="image-profile">
            @if ($petInfo->missing_st)
                <div class="message">{{ __('messages.MiisingPet') }}</div>
            @endif
            <img src="{{ asset('storage/ProfileImage/Pets/' . $petInfo->pet_image) }}">
        </div>
        <div class="right-contain">
            <label class="header">{{ __('messages.PetInformation') }}</label>
            <div class="show-field mt-1">
                <label>{{ __('messages.PetName') }}</label>
                <div class="detail white-space">
                    {{ $petInfo->pet_name ? $petInfo->pet_name : '-' }}
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.Species') }}</label>
                <div class="detail white-space">
                    @if ($petInfo->pet_type == 'other')
                        {{ $petInfo->species_other ? $petInfo->species_other : '-' }}
                    @else
                        {{ $petInfo->pet_type ? __('messages.' . $petInfo->pet_type) : '-' }}
                    @endif
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.Breed') }}</label>
                <div class="detail white-space">
                    {{ $petInfo->pet_breed ? $petInfo->pet_breed : '-' }}
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.Gender') }}</label>
                <div class="detail white-space">
                    {{ $petInfo->pet_gender ? __('messages.' . $petInfo->pet_gender) : '-' }}
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.Birthdate') }}</label>
                <div class="detail white-space">
                    {{ $petInfo->pet_birthday ? \Carbon\Carbon::parse($petInfo->pet_birthday)->format('d/m/Y') : '-' }}
                </div>
            </div>

            <div class="show-field mt-1">
                <label>{{ __('messages.Age') }}</label>
                <div class="detail white-space">
                    @php
                        if ($petInfo->pet_birthday) {
                            $startDate = \Carbon\Carbon::createFromFormat(
                                'Y-m-d H:i:s',
                                $petInfo->pet_birthday,
                            )->startOfDay();
                            $endDate = \Carbon\Carbon::now()->startOfDay();

                            if ($endDate < $startDate) {
                                echo __('messages.invalid_data');
                            } else {
                                $age = $startDate->diff($endDate);

                                if ($age->y > 0) {
                                    echo "{$age->y} " . __('messages.years') . " {$age->m} " . __('messages.months');
                                } else {
                                    echo "{$age->m} " . __('messages.months');
                                }
                            }
                        } else {
                            echo __('messages.incomplete_data');
                        }
                    @endphp
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.ColorMarkings') }}</label>
                <div class="detail">
                    {{ $petInfo->pet_colorMark ? $petInfo->pet_colorMark : '-' }}
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.EmergencyContact') }}</label>
                <div class="detail white-space contact">
                    {{ $petInfo->emergency_contact ? $petInfo->emergency_contact : '-' }}
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.HomeLocation') }}</label><br>
                <div class="mt-1">
                    <?php
                    $url = 'https://www.google.com/maps?q=' . $petInfo->pet_lat . ',' . $petInfo->pet_lng;
                    ?>
                    <a href={{ $url }} target="_blank"><i
                            class='bx bx-current-location'></i>{{ __('messages.home_location') }}</a>
                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

        }); <
        /sc> <
        script >
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {

                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;


                    Livewire.dispatch('savelocation', {
                        lat: latitude,
                        lng: longitude
                    });

                }, function(error) {
                    Livewire.dispatch('savelocation', {
                        lat: 'error',
                        lng: 'error'
                    });
                });
            } else {
                Livewire.dispatch('savelocation', {
                    lat: 'error',
                    lng: 'error'
                });
            }
    </script>
</div>
