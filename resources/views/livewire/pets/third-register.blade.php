<div>
    <div class="card-form" wire:ignore.self>

        <label class="header">Health Information</label>

        <div class="input-group mt-1">
            <label>Spayed / Neutered</label>
            <input type="text" class="input-field" wire:model='breed' placeholder="{{ __('messages.BreedPlac') }}">
        </div>
        <div class="input-group mt-1">
            <label>Health / Allergies</label>
            <textarea class="input-field text-area" placeholder="{{ __('messages.BreedPlac') }}"></textarea>
        </div>

        <div class="button-class-2">
            <button class="gray-bt">{{ __('messages.Back') }}</button>
            <button>{{ __('messages.Next') }}</button>
        </div>
    </div>
</div>
