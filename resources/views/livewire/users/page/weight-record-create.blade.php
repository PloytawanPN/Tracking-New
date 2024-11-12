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
        <label class="header" style="font-size: 20px">{{ __('messages.save_weight') }} | {{ __('messages.create') }}</label>
        <div class="show-field mt-1">
            <label>{{ __('messages.weight_kg') }}</label>
            <div class="input-group mt-1">
                <input wire:model='weight' type="number" class="input-field" placeholder="{{ __('messages.enter_weight') }}"></input>
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.measurement_date') }}</label>
            <div class="input-field ">
                <input type="date" class="date-field"
                    wire:model='date'>
            </div>
        </div>

        <div class="button-class">
            <button wire:click='save'>{{ __('messages.Save') }}</button>
            <a href="{{route('WeightRecord.petSetting',['code' => Session::get('pet-code')])}}" class="back">{{ __('messages.Back') }}</a>
        </div>
    </div>
</div>
