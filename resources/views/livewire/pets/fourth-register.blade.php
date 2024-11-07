<div>
    <div wire:loading.delay.longer wire:target="confirm" style="position: absolute">
        @include('Pets.Loader')
    </div>
    <div class="card-form" wire:ignore.self>

        <label class="header">{{ __('messages.AdditionalNotes') }}</label>

        <div class="input-group mt-1">
            <label>{{ __('messages.CareInstructions') }}</label>
            <textarea class="input-field text-area" wire:model='care' placeholder="{{ __('messages.care_instructions') }}"></textarea>
        </div>
        <div class="input-group mt-1">
            <label>{{ __('messages.EmergencyContact') }}</label>

            <input type="text" class="input-field" wire:model='emergency'
                placeholder="{{ __('messages.emergency_contact') }}">
        </div>

        <div class="button-class-2">
            <button class="gray-bt" wire:click='back_step'>{{ __('messages.Back') }}</button>
            <button style="width: 100px" wire:click='submit'>Submit</button>
            <button style="width: 100px" id='confirm_bt' wire:click='confirm' class="d-none"></button>
            
        </div>
    </div>
    <script>
        window.addEventListener('confirmAlert', () => {
            Swal.fire({
                title: "{{ __('messages.are_you_sure') }}",
                text: "{{ __('messages.want_to_save') }}",
                icon: "warning",
                showCancelButton: true,
                cancelButtonColor: "#E2E2E2",
                confirmButtonColor: '#FFBE46',
                draggable: false,
                confirmButtonText: "{{ __('messages.okay') }}",
                cancelButtonText: "{{ __('messages.cancel') }}",
                customClass: {
                    icon: 'custom-icon'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('confirm_bt').click();
                }
            });
        });
    </script>
    <script>
        window.addEventListener('stepFalse', (event) => {
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
</div>
