<div>
    <div class="card-health padding">
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
        <label class="header" style="font-size: 20px">{{ __('messages.medical_history') }} | {{ __('messages.create') }}</label>
        <div class="show-field mt-1">
            <label>{{ __('messages.diagnosis') }}</label>
            <div class="input-group mt-1">
                <input wire:model='diagosis' type="text" class="input-field" placeholder="{{ __('messages.please_enter_diagnosis') }}"></input>
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.treatment_provided') }}</label> 
            <div class="input-group mt-1">
                <textarea wire:model='provided' type="text" class="input-field" placeholder="{{ __('messages.please_enter_treatment_provided') }}" style="min-height: 100px"></textarea>
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.medications') }}</label>
            <div class="input-group mt-1">
                <textarea wire:model='medication' type="text" class="input-field" placeholder="{{ __('messages.please_enter_medications') }}" style="min-height: 100px"></textarea>
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.treatmentDate') }}</label>
            <div class="input-field ">
                <input type="date" class="date-field"
                    wire:model='date'>
            </div>
        </div>

        <div class="button-class">
            <button wire:click='save'>{{ __('messages.Save') }}</button>
            <a href="{{route('MedicalHistory.petSetting',['code' => Session::get('pet-code')])}}" class="back">{{ __('messages.Back') }}</a>
        </div>
    </div>
</div>
