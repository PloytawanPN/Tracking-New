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
        <label class="header" style="font-size: 20px">{{ __('messages.allergies_diet') }} | {{ __('messages.create') }}</label>
        <div class="show-field mt-1">
            <label>{{ __('messages.allergy_name') }}</label>
            <div class="input-group mt-1">
                <input wire:model='allergy' type="text" class="input-field" placeholder="{{ __('messages.allergy_name_required') }}"></input>
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.symptoms') }}</label>
            <div class="input-group mt-1">
                <textarea wire:model='symptoms' type="text" class="input-field" placeholder="{{ __('messages.symptoms_required') }}" style="min-height: 150px"></textarea>
            </div>
        </div>

        <div class="button-class">
            <button wire:click='save'>{{ __('messages.Save') }}</button>
            <a href="{{route('AllergiesHistory.petSetting',['code' => Session::get('pet-code')])}}" class="back">{{ __('messages.Back') }}</a>
        </div>
    </div>
</div>
