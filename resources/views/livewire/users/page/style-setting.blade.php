<div>
    <div class="card-form" wire:ignore.self>
        <label class="header">{{ __('messages.card_style') }}</label>

        <div class="input-group mt-1 ">
            <label>{{ __('messages.header_setting') }}</label>

            <div style="display: flex;">
                <div class="checkbox-wrapper-30">
                    <span class="checkbox">
                        <input type="checkbox"
                            style="background: linear-gradient(45deg, #004D7A, #008793, #00BF72, #ABEB12);" />
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

                <div class="checkbox-wrapper-30">
                    <span class="checkbox">
                        <input type="checkbox" style="background: linear-gradient(60deg, #FFC976, #E81613);" />
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

                <div class="checkbox-wrapper-30">
                    <span class="checkbox">
                        <input type="checkbox" style="background: linear-gradient(60deg, #FDFD1E, #00CCFF);" />
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

                <div class="checkbox-wrapper-30">
                    <span class="checkbox">
                        <input type="checkbox" style="background:rgb(218, 218, 218)" wire:model.live='custom_color' />
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
                <label style="margin-top: 4px;font-size: 14px">Custom Color</label>
            </div>



            <div class="head-field color "
                style="display: flex;margin-top: 10px ;" id='headerSetting'>
                <div class="show-color">
                    <div id="color-picker-1"></div>
                </div>
                <input type="text" class="input-field" id="color-input-1" wire:model.live="header_color" disabled
                    placeholder="{{ __('messages.please_color') }}">
            </div>

        </div>













        <div class="input-group mt-1">
            <label>{{ __('messages.button_setting') }}</label>
            <div class="head-field color" style="display: flex" id='headerSetting'>
                <div class="show-color">
                    <div id="color-picker-2"></div>
                </div>
                <input type="text" class="input-field" id="color-input-2" wire:model.live="button_color" disabled
                    placeholder="{{ __('messages.please_color') }}">
            </div>
        </div>






        <div class="input-group mt-1">
            <label>{{ __('messages.card_background') }}</label>
            <div class="head-field">
                <input type="text" class="input-field" wire:model='nickname'
                    placeholder="{{ __('messages.nickPlac') }}">
            </div>
        </div>
        <div class="input-group mt-1">
            <label>{{ __('messages.screen_background') }}</label>
            <div class="head-field">
                <input type="text" class="input-field" wire:model='nickname'
                    placeholder="{{ __('messages.nickPlac') }}">
            </div>
        </div>

        <div class="button-class-2">
            <button wire:click='save'>{{ __('messages.Save') }}</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
    <script>
        function createColorPicker(inputId, pickerId, $value) {
            const pickr = Pickr.create({
                el: `#${pickerId}`,
                theme: 'classic',
                default: $value || '#E4E4E4',
                swatches: [
                    '#F44336', '#E91E63', '#9C27B0', '#673AB7',
                    '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4',
                    '#009688', '#4CAF50', '#8BC34A', '#CDDC39',
                    '#FFEB3B', '#FFC107', '#FF5722', '#795548'
                ],
                components: {
                    preview: true,
                    opacity: false,
                    hue: true,
                    interaction: {
                        input: true,
                        hex: true,
                        rgba: false,
                        hsla: false,
                        save: true,
                    }
                }
            });

            pickr.on('save', (color) => {
                const hexColor = color.toHEXA().toString();
                document.getElementById(inputId).value = hexColor;
            });

        }

        if ({{ $custom_color }}) {
            createColorPicker('color-input-1', 'color-picker-1', '{{ $header_color }}');
        }
        /* createColorPicker('color-input-2', 'color-picker-2', '{{ $button_color }}'); */
    </script>

</div>
