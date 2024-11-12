<div>
    <div class="card-pet-profile">
        <div class="image-profile">
            <img src="{{ asset('assets\images\profile.jpg') }}">
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
                        {{ $petInfo->pet_type ? $petInfo->pet_type : '-' }}
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
                    {{ $petInfo->pet_gender ? $petInfo->pet_gender : '-' }}
                </div>
            </div>
            <div class="show-field mt-1">
                <label>{{ __('messages.Birthdate') }}</label>
                <div class="detail white-space">
                    {{ $petInfo->pet_birthday ? $petInfo->pet_birthday : '-' }}
                </div>
            </div>

            <div class="show-field mt-1">
                <label>{{ __('messages.Age') }}</label>
                <div class="detail white-space">
                    2 years 4 months
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
</div>
