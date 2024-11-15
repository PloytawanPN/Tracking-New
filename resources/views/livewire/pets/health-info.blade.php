<div>
    <div class="card-health padding">
        <label class="header" style="font-size: 20px">{{ __('messages.HealthInformation') }}</label>
        <div class="show-field mt-1">
            <label>{{ __('messages.neutered_status') }}</label>
            <div class="detail white-space">
                {{ $health->neutered_status == 1 ? __('messages.NeuteredTrue') : __('messages.NeuteredFalse') }}
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.health_conditions_allergies') }}</label>
            <div class="detail white-space" style="min-height: 80px">
                {{ $health->health_allergies ? $health->health_allergies : '-' }}
            </div>
        </div>
        <div class="show-field mt-1">
            <label>{{ __('messages.care_instructions_requirements') }}</label>
            <div class="detail white-space" style="min-height: 80px">
                {{ $health->care_instruction ? $health->care_instruction : '-' }}
            </div>
        </div>
    </div>

    <div class="card-health mt-3">
        <div class="accordion-header">
            <label class="header" style="font-size: 20px">{{ __('messages.vaccination_history') }}</label>
            <i class='bx bx-plus accordion-icon'></i>
        </div>
        <div class="show-field mt-1 accordion-content">
            @foreach ($vaccine as $item)
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3><span class="header-acc">{{ __('messages.vaccine_name') }} :
                                </span>{{ $item->vaccine_name ?? '-' }}
                            </h3>
                            <div class="accordion-icon">▼</div>
                        </div>
                        <div class="accordion-content">
                            <div class="vaccine-info">
                                <span class="vaccine-name">{{ __('messages.pet_age') }}</span>
                                <div>
                                    <span class="vaccine-date">
                                        @php
                                            if ($pet_age && $item->vaccination_date) {
                                                $startDate = \Carbon\Carbon::createFromFormat(
                                                    'Y-m-d H:i:s',
                                                    $pet_age,
                                                )->startOfDay();
                                                $endDate = \Carbon\Carbon::createFromFormat(
                                                    'Y-m-d',
                                                    $item->vaccination_date,
                                                )->startOfDay();

                                                if ($endDate < $startDate) {
                                                    echo __('messages.invalid_data');
                                                } else {
                                                    $age = $startDate->diff($endDate);

                                                    if ($age->y > 0) {
                                                        echo "{$age->y} " .
                                                            __('messages.years') .
                                                            " {$age->m} " .
                                                            __('messages.months');
                                                    } else {
                                                        echo "{$age->m} " . __('messages.months');
                                                    }
                                                }
                                            } else {
                                                echo __('messages.incomplete_data');
                                            }
                                        @endphp
                                    </span>
                                </div>
                            </div>
                            <div class="vaccine-info">
                                <span class="vaccine-name">{{ __('messages.date_admin') }}</span>
                                <div>
                                    <span
                                        class="vaccine-date">{{ $item->vaccination_date ? \Carbon\Carbon::parse($item->vaccination_date)->format('d/m/Y') : '-' }}</span>
                                </div>
                            </div>
                            <div class="vaccine-info">
                                <span class="vaccine-name">{{ __('messages.next_due') }}</span>
                                <div>
                                    <span
                                        class="vaccine-date">{{ $item->next_appointment ? \Carbon\Carbon::parse($item->next_appointment)->format('d/m/Y') : '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($vaccine) == 0)
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3 style="text-align: center">{{ __('messages.not_found_data') }}
                            </h3>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="card-health mt-3">
        <div class="accordion-header">
            <label class="header" style="font-size: 20px">{{ __('messages.health_issues') }}</label>
            <i class='bx bx-plus accordion-icon'></i>
        </div>
        <div class="show-field mt-1 accordion-content">
            @foreach ($issue as $item)
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3><span class="header-acc">{{ __('messages.disease_name') }} :
                                </span>{{ $item->disease_name ?? '-' }}
                            </h3>
                            <div class="accordion-icon">▼</div>
                        </div>
                        <div class="accordion-content">
                            <div class="vaccine-info">
                                <span class="vaccine-name">{{ __('messages.pet_age') }}</span>
                                <div>
                                    <span class="vaccine-date">
                                        @php
                                            if ($pet_age && $item->date_diagnosed) {
                                                $startDate = \Carbon\Carbon::createFromFormat(
                                                    'Y-m-d H:i:s',
                                                    $pet_age,
                                                )->startOfDay();
                                                $endDate = \Carbon\Carbon::createFromFormat(
                                                    'Y-m-d',
                                                    $item->date_diagnosed,
                                                )->startOfDay();

                                                if ($endDate < $startDate) {
                                                    echo __('messages.invalid_data');
                                                } else {
                                                    $age = $startDate->diff($endDate);

                                                    if ($age->y > 0) {
                                                        echo "{$age->y} " .
                                                            __('messages.years') .
                                                            " {$age->m} " .
                                                            __('messages.months');
                                                    } else {
                                                        echo "{$age->m} " . __('messages.months');
                                                    }
                                                }
                                            } else {
                                                echo __('messages.incomplete_data');
                                            }
                                        @endphp
                                    </span>
                                </div>
                            </div>
                            <div class="vaccine-info">
                                <span class="vaccine-name">{{ __('messages.date_diagnosed') }}</span>
                                <div>
                                    <span
                                        class="vaccine-date">{{ $item->date_diagnosed ? \Carbon\Carbon::parse($item->date_diagnosed)->format('d/m/Y') : '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($issue) == 0)
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3 style="text-align: center">{{ __('messages.not_found_data') }}
                            </h3>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="card-health mt-3">
        <div class="accordion-header">
            <label class="header" style="font-size: 20px">{{ __('messages.allergies_diet') }}</label>
            <i class='bx bx-plus accordion-icon'></i>
        </div>
        <div class="show-field mt-1 accordion-content">
            @foreach ($allergy as $item)
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3><span class="header-acc">{{ __('messages.allergy_name') }} :
                                </span>{{ $item->allergy_name ?? '-' }}
                            </h3>
                            <div class="accordion-icon">▼</div>
                        </div>
                        <div class="accordion-content">
                            <div class="vaccine-info">
                                <span class="vaccine-name">{{ __('messages.symptoms') }}</span>
                                <div>
                                    <span class="vaccine-date">{{ $item->symptoms ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($allergy) == 0)
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3 style="text-align: center">{{ __('messages.not_found_data') }}
                            </h3>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <div class="card-health mt-3">
        <div class="accordion-header">
            <label class="header" style="font-size: 20px">{{ __('messages.medical_history') }}</label>
            <i class='bx bx-plus accordion-icon'></i>
        </div>
        <div class="show-field mt-1 accordion-content">
            @foreach ($history as $item)
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>{{ __('messages.treatmentDate') }} :
                                {{ $item->treatment_date ? \Carbon\Carbon::parse($item->treatment_date)->format('d/m/Y') : '-' }}
                            </h3>
                            <div class="accordion-icon">▼</div>
                        </div>
                        <div class="accordion-content" style="border-bottom: 1px solid rgb(201, 201, 201);">
                            <div>
                                <span>{{ __('messages.pet_age') }}</span>
                                <div class="show_detail">
                                    <label>
                                        @php
                                            if ($pet_age && $item->treatment_date) {
                                                $startDate = \Carbon\Carbon::createFromFormat(
                                                    'Y-m-d H:i:s',
                                                    $pet_age,
                                                )->startOfDay();
                                                $endDate = \Carbon\Carbon::createFromFormat(
                                                    'Y-m-d',
                                                    $item->treatment_date,
                                                )->startOfDay();

                                                if ($endDate < $startDate) {
                                                    echo __('messages.invalid_data');
                                                } else {
                                                    $age = $startDate->diff($endDate);

                                                    if ($age->y > 0) {
                                                        echo "{$age->y} " .
                                                            __('messages.years') .
                                                            " {$age->m} " .
                                                            __('messages.months');
                                                    } else {
                                                        echo "{$age->m} " . __('messages.months');
                                                    }
                                                }
                                            } else {
                                                echo __('messages.incomplete_data');
                                            }
                                        @endphp
                                    </label>
                                </div>
                            </div>
                            <div class="mt-1">
                                <span>{{ __('messages.diagnosis') }}</span>
                                <div class="show_detail">
                                    <label>{{ $item->diagnosis ?? '-' }}</label>
                                </div>
                            </div>
                            <div class="mt-1">
                                <span>{{ __('messages.treatment_provided') }}</span>
                                <div class="show_detail">
                                    <label>{{ $item->treatment ?? '-' }}</label>
                                </div>
                            </div>
                            <div class="mt-1">
                                <span>{{ __('messages.medications') }}</span>
                                <div class="show_detail">
                                    <label>{{ $item->medications != '' ? $item->medications : '-' }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($history) == 0)
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3 style="text-align: center">{{ __('messages.not_found_data') }}
                            </h3>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>

    <script>
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                header.parentElement.classList.toggle('open');
                const content = header.nextElementSibling;
                if (content.style.display === 'block') {
                    content.style.display = 'none';
                } else {
                    content.style.display = 'block';
                }
            });
        });
    </script>
</div>
