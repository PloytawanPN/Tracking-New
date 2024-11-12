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
        <label class="header" style="font-size: 20px">{{ __('messages.health_information') }}</label>
        <div class="show-field mt-1">
            <label>{{ __('messages.neutered_status') }}</label>
            <div class="input-group mt-1">
                <select class="input-field select-field" wire:model.live='neutered'>
                    <option value=''>{{ __('messages.PleaseSelect') }}</option>
                    <option value='1'>{{ __('messages.NeuteredTrue') }}</option>
                    <option value='0'>{{ __('messages.NeuteredFalse') }}</option>
                </select>
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.health_conditions_allergies') }}</label>
            <div class="input-group mt-1">
                <textarea wire:model='health_allergies' type="text" class="input-field"
                    placeholder="{{ __('messages.please_provide_conditions_or_allergies') }}" style="min-height: 80px;"></textarea>
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.care_instructions_requirements') }}</label>
            <div class="input-group mt-1">
                <textarea wire:model='care' type="text" class="input-field"
                    placeholder="{{ __('messages.please_provide_special_care_instructions') }}" style="min-height: 80px"></textarea>
            </div>
        </div>
        <div class="button-class">
            <button wire:click='save'>{{ __('messages.Save') }}</button>
        </div>
    </div>
</div>
