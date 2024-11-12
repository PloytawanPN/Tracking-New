<div>
    <div class="card-health padding">

        <a href="{{ route('AllergiesHistory.create', ['code' => Session::get('pet-code')]) }}">
            <i class='bx bx-plus add-icon'></i>
        </a>
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
        <div class="top-table">
            <label class="header" style="font-size: 20px">{{ __('messages.allergies_diet') }}</label>
            <div class="show-field mt-1 search">
                <div class="input-group mt-1">
                    <input type="text" class="input-field" placeholder="{{ __('messages.search') }}"
                        wire:model.live='search'></input>
                </div>
            </div>
        </div>

        <table>
            <thead> 
                <tr>
                    <th scope="col" class="text-left">{{ __('messages.allergy_name') }}</th>
                    <th scope="col">{{ __('messages.symptoms') }}</th>
                    <th scope="col" style="width: 80px">{{ __('messages.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataList as $item)
                    <tr>
                        <td scope="row" data-label="{{ __('messages.allergy_name') }}" class="text-left">
                            {{ $item->allergy_name ?? '-' }}
                        </td>
                        <td scope="row" data-label="{{ __('messages.symptoms') }}" class="text-left">
                            {{ $item->symptoms ?? '-' }}
                        </td>


                        <td data-label="{{ __('messages.action') }}" class="action">
                            <a href="{{ route('AllergiesHistory.edit', ['code' => Session::get('pet-code'), 'id' => $item->id]) }}"
                                class="edit"><i class='bx bx-edit-alt'></i></a>
                            <a href="#" class="remove" wire:click='remove({{ $item->id }})'><i
                                    class='bx bx-trash'></i></a>
                        </td>
                    </tr>
                @endforeach
                @if (count($dataList) == 0)
                    <tr>
                        <td colspan='3'>{{ __('messages.not_found_data') }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
