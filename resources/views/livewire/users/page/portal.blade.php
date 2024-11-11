<div>
    <div class="topic-header">
        <label class="header">{{ __('messages.choose_your_pet') }}</label>
        <p>{{ __('messages.pets_list_description') }}</p>
    </div>
    <div class="card-contain">
        @foreach ($petList as $item)
            <div class="card-pet" wire:click='redirectProfile("{{$item->pet_code}}")'>
                <div class="image-frame">
                    <img src='{{ asset('storage/ProfileImage/Pets/'.$item->pet_image) }}'>
                </div>
                <div class="pet-name">{{$item->pet_name}}</div>
            </div>
        @endforeach
    </div>
</div>
