<div>
    <div class="card-form" wire:ignore.self>

        <label class="header">Additional Notes</label>

        <div class="input-group mt-1">
            <label>Care Instructions</label>
            <textarea class="input-field text-area" placeholder="{{ __('messages.BreedPlac') }}"></textarea>
        </div>
        <div class="input-group mt-1">
            <label>Emergency Contact</label>

            <input type="text" class="input-field" wire:model='breed' placeholder="{{ __('messages.BreedPlac') }}">
        </div>

        <div class="button-class-2">
            <button class="gray-bt">{{ __('messages.Back') }}</button>
            <button style="width: 100px">Submit</button>
        </div>
    </div>
</div>
