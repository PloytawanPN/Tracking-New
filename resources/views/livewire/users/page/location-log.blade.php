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
        <div class="top-table">
            <label class="header" style="font-size: 20px">{{ __('messages.LocationLog') }}</label>
        </div>

        <table style="margin-top: 10px">
            <thead>
                <tr>

                    <th scope="col">{{ __('messages.location.lat') }}</th>
                    <th scope="col">{{ __('messages.location.lng') }}</th>
                    <th scope="col">{{ __('messages.location.date_received') }}</th>
                    <th scope="col">{{ __('messages.location.action_taken') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($location as $item)
                    <tr>
                        <td data-label="{{ __('messages.location.lat') }}">{{ $item->qr_lat }}</td>
                        <td data-label="{{ __('messages.location.lng') }}">{{ $item->qr_lng }}</td>
                        <td data-label="{{ __('messages.location.date_received') }}">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}</td>
                        <td data-label="{{ __('messages.location.action_taken') }}" class="action">
                            <?php
                            $url = 'https://www.google.com/maps?q=' . $item->qr_lat . ',' . $item->qr_lng;
                            ?>
                            <a href={{ $url }} target="_blank" class="edit"><i class='bx bxs-map'></i></a>
                        </td>
                    </tr>
                @endforeach
                @if (count($location) == 0)
                    <tr>
                        <td colspan='4'>{{ __('messages.not_found_data') }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
