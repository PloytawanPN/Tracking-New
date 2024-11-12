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
        <label class="header" style="font-size: 20px">{{ __('messages.Health_Issues_edit') }}</label>
        <div class="show-field mt-1">
            <label>{{ __('messages.disease_name') }}</label>
            <div class="input-group mt-1">
                <input wire:model='disease_name' type="text" class="input-field" placeholder="{{ __('messages.please_enter_disease_name') }}"></input>
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.date_diagnosed') }}</label>
            <div class="input-field ">
                <input type="date" class="date-field"
                    wire:model='disease_date'>
            </div>
        </div>

        <div class="button-class">
            <button wire:click='save'>{{ __('messages.Save') }}</button>
            <a href="{{route('HealthIssuesHistort.petSetting',['code' => Session::get('pet-code')])}}" class="back">{{ __('messages.Back') }}</a>
        </div>
    </div>
</div>
