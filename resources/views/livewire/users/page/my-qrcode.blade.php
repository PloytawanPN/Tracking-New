<div>
    <div wire:loading.delay.longer wire:target="image,save" style="position: absolute">
        @include('Pets.Loader')
    </div>
    <div class="card-form" wire:ignore.self>
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
        <label class="header">{{ __('messages.myqrcode') }}</label>

        <div class="qr-code" style="width: 100%;">
            {!! QrCode::size(400)
                ->style('dot')
                ->eye('circle')
                ->gradient(0, 77, 122, 0, 77, 122, 'diagonal')
                ->margin(1)
                ->generate(route('Galyxie', [$code])) !!}
        </div>

    </div>
</div>
