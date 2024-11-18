<div>
    <div wire:loading.delay.longer wire:target="image_card,image_bg,save" style="position: absolute">
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

        <label class="header">{{ __('messages.card_style') }}</label>

        <div class="input-group mt-1 ">
            <label>{{ __('messages.header_setting') }}</label>
            <div style="display: flex">
                <div class="select-color">
                    <div class="checkbox-wrapper-30">
                        <span class="checkbox" style="color: #00BF72">
                            <input type="radio" style="color: #00BF72" wire:model='header' value="green" />
                            <svg>
                                <use xlink:href="#checkbox-30" class="checkbox"></use>
                            </svg>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                            <symbol id="checkbox-30" viewBox="0 0 22 22">
                                <path fill="none" stroke="currentColor"
                                    d="M5.5,11.3L9,14.8L20.2,3.3l0,0c-0.5-1-1.5-1.8-2.7-1.8h-13c-1.7,0-3,1.3-3,3v13c0,1.7,1.3,3,3,3h13 c1.7,0,3-1.3,3-3v-13c0-0.4-0.1-0.8-0.3-1.2" />
                            </symbol>
                        </svg>
                    </div>
                    <div class="show-color"
                        style="background: linear-gradient(45deg, #004D7A, #008793, #00BF72, #ABEB12);"> </div>
                </div>
                <div class="select-color">
                    <div class="checkbox-wrapper-30">
                        <span class="checkbox" style="color: #5871F3">
                            <input type="radio" style="color: #5871F3" wire:model='header' value="pink" />
                            <svg>
                                <use xlink:href="#checkbox-30" class="checkbox"></use>
                            </svg>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                            <symbol id="checkbox-30" viewBox="0 0 22 22">
                                <path fill="none" stroke="currentColor"
                                    d="M5.5,11.3L9,14.8L20.2,3.3l0,0c-0.5-1-1.5-1.8-2.7-1.8h-13c-1.7,0-3,1.3-3,3v13c0,1.7,1.3,3,3,3h13 c1.7,0,3-1.3,3-3v-13c0-0.4-0.1-0.8-0.3-1.2" />
                            </symbol>
                        </svg>
                    </div>
                    <div class="show-color" style="background: linear-gradient(45deg, #686FFF, #F7ACFF);"> </div>
                </div>
                <div class="select-color">
                    <div class="checkbox-wrapper-30">
                        <span class="checkbox" style="color: #FF1178">
                            <input type="radio" style="color: #FF1178" wire:model='header' value="orage" />
                            <svg>
                                <use xlink:href="#checkbox-30" class="checkbox"></use>
                            </svg>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                            <symbol id="checkbox-30" viewBox="0 0 22 22">
                                <path fill="none" stroke="currentColor"
                                    d="M5.5,11.3L9,14.8L20.2,3.3l0,0c-0.5-1-1.5-1.8-2.7-1.8h-13c-1.7,0-3,1.3-3,3v13c0,1.7,1.3,3,3,3h13 c1.7,0,3-1.3,3-3v-13c0-0.4-0.1-0.8-0.3-1.2" />
                            </symbol>
                        </svg>
                    </div>
                    <div class="show-color" style="background: linear-gradient(45deg, #FF1178, #F89928);"> </div>
                </div>
                <div class="select-color">
                    <div class="checkbox-wrapper-30">
                        <span class="checkbox" style="color: #b1b1b1">
                            <input type="radio" style="color: #b1b1b1" wire:model='header' value="custom" />
                            <svg>
                                <use xlink:href="#checkbox-30" class="checkbox"></use>
                            </svg>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                            <symbol id="checkbox-30" viewBox="0 0 22 22">
                                <path fill="none" stroke="currentColor"
                                    d="M5.5,11.3L9,14.8L20.2,3.3l0,0c-0.5-1-1.5-1.8-2.7-1.8h-13c-1.7,0-3,1.3-3,3v13c0,1.7,1.3,3,3,3h13 c1.7,0,3-1.3,3-3v-13c0-0.4-0.1-0.8-0.3-1.2" />
                            </symbol>
                        </svg>
                    </div>
                    <input type="color" class="input-color" wire:model.live="color_header"
                        value="{{ $color_header }}">
                    <label class="custom-label">{{ __('messages.custom') }}</label>
                </div>
            </div>
        </div>

        <div class="input-group mt-1">
            <label>{{ __('messages.button_setting') }}</label>
            <div style="display: flex">
                <div class="select-color">
                    <div class="checkbox-wrapper-30">
                        <span class="checkbox" style="color: #00BF72">
                            <input type="radio" style="color: #00BF72" wire:model='button' value="green" />
                            <svg>
                                <use xlink:href="#checkbox-30" class="checkbox"></use>
                            </svg>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                            <symbol id="checkbox-30" viewBox="0 0 22 22">
                                <path fill="none" stroke="currentColor"
                                    d="M5.5,11.3L9,14.8L20.2,3.3l0,0c-0.5-1-1.5-1.8-2.7-1.8h-13c-1.7,0-3,1.3-3,3v13c0,1.7,1.3,3,3,3h13 c1.7,0,3-1.3,3-3v-13c0-0.4-0.1-0.8-0.3-1.2" />
                            </symbol>
                        </svg>
                    </div>
                    <div class="show-color"
                        style="background: linear-gradient(45deg, #004D7A, #008793, #00BF72, #ABEB12);"> </div>
                </div>
                <div class="select-color">
                    <div class="checkbox-wrapper-30">
                        <span class="checkbox" style="color: #5871F3">
                            <input type="radio" style="color: #5871F3" wire:model='button' value="pink" />
                            <svg>
                                <use xlink:href="#checkbox-30" class="checkbox"></use>
                            </svg>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                            <symbol id="checkbox-30" viewBox="0 0 22 22">
                                <path fill="none" stroke="currentColor"
                                    d="M5.5,11.3L9,14.8L20.2,3.3l0,0c-0.5-1-1.5-1.8-2.7-1.8h-13c-1.7,0-3,1.3-3,3v13c0,1.7,1.3,3,3,3h13 c1.7,0,3-1.3,3-3v-13c0-0.4-0.1-0.8-0.3-1.2" />
                            </symbol>
                        </svg>
                    </div>
                    <div class="show-color" style="background: linear-gradient(45deg, #686FFF, #F7ACFF);"> </div>
                </div>
                <div class="select-color">
                    <div class="checkbox-wrapper-30">
                        <span class="checkbox" style="color: #FF1178">
                            <input type="radio" style="color: #FF1178" wire:model='button' value="orage" />
                            <svg>
                                <use xlink:href="#checkbox-30" class="checkbox"></use>
                            </svg>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                            <symbol id="checkbox-30" viewBox="0 0 22 22">
                                <path fill="none" stroke="currentColor"
                                    d="M5.5,11.3L9,14.8L20.2,3.3l0,0c-0.5-1-1.5-1.8-2.7-1.8h-13c-1.7,0-3,1.3-3,3v13c0,1.7,1.3,3,3,3h13 c1.7,0,3-1.3,3-3v-13c0-0.4-0.1-0.8-0.3-1.2" />
                            </symbol>
                        </svg>
                    </div>
                    <div class="show-color" style="background: linear-gradient(45deg, #FF1178, #F89928);"> </div>
                </div>
                <div class="select-color">
                    <div class="checkbox-wrapper-30">
                        <span class="checkbox" style="color: #b1b1b1">
                            <input type="radio" style="color: #b1b1b1" wire:model='button' value="custom" />
                            <svg>
                                <use xlink:href="#checkbox-30" class="checkbox"></use>
                            </svg>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                            <symbol id="checkbox-30" viewBox="0 0 22 22">
                                <path fill="none" stroke="currentColor"
                                    d="M5.5,11.3L9,14.8L20.2,3.3l0,0c-0.5-1-1.5-1.8-2.7-1.8h-13c-1.7,0-3,1.3-3,3v13c0,1.7,1.3,3,3,3h13 c1.7,0,3-1.3,3-3v-13c0-0.4-0.1-0.8-0.3-1.2" />
                            </symbol>
                        </svg>
                    </div>
                    <input type="color" class="input-color" wire:model.live="color_button"
                        value="{{ $color_button }}">
                    <label class="custom-label">{{ __('messages.custom') }}</label>
                </div>
            </div>
        </div>

        <div class="input-group mt-1">
            <label>{{ __('messages.card_background') }}</label>

            <input type="file" accept="image/*" id="imageInputCard" wire:model.live="image_card"
                class="form-control d-none">
            <div class="preview-sp" id='image_card'>
                <i class='bx bx-image'></i>
                @if ($image_card)
                    <img src="{{ $image_card->temporaryUrl() }}" alt="Preview">
                @elseif($card_style)
                    @if ($card_style->card_image && !$clear_c)
                        <img src="{{ asset('storage/style/card/' . $card_style->card_image) }}" alt="Preview">
                    @endif
                @endif
            </div>
            <button class="clear-img" wire:click='clearcard'>{{ __('messages.resetpicture') }}</button>
        </div>

        <div class="input-group mt-1">
            <label>{{ __('messages.screen_background') }}</label>

            <input type="file" accept="image/*" id="imageInputBG" wire:model.live="image_bg"
                class="form-control d-none">
            <div class="preview-sp" id='image_BG'>
                <i class='bx bx-image'></i>
                @if ($image_bg)
                    <img src="{{ $image_bg->temporaryUrl() }}" alt="Preview">
                @elseif($card_style)
                    @if ($card_style->bg_image && !$clear_bg)
                        <img src="{{ asset('storage/style/bg/' . $card_style->bg_image) }}" alt="Preview">
                    @endif
                @endif
            </div>
            <button class="clear-img" wire:click='clearbg'>{{ __('messages.resetpicture') }}</button>
        </div>


        <div class="button-class-2">
            <button wire:click='save'>{{ __('messages.Save') }}</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr"></script>
    <script>
        document.getElementById('image_card').addEventListener('click', function() {
            document.getElementById('imageInputCard').click();
        });
        document.getElementById('image_BG').addEventListener('click', function() {
            document.getElementById('imageInputBG').click();
        });
    </script>
</div>


{{--  <div>
    <button id="colorPickerButton" class="btn btn-primary">
        เลือกสี
    </button>
    <input type="color" id="colorPicker" wire:model="color" value="{{ $color }}" style="display: none;">
    <div class="mt-3">
        <span>สีที่เลือก (HEX):</span>
        <span style="display: inline-block; width: 50px; height: 20px; background-color: {{ $color }}"></span>
        <span>{{ $color }}</span>
    </div>

    <script>
        document.getElementById('colorPickerButton').addEventListener('click', function() {
            document.getElementById('colorPicker').click();
        });
        document.getElementById('colorPicker').addEventListener('input', function(event) {
            @this.set('color', event.target.value);
        });
    </script>
</div>
 --}}
