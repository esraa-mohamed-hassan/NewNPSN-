<div class="c-sidebar-brand">
    <p class="p_brand c-sidebar-brand-full"> {{ __('lang.npsn') }} </p>

    <img class="c-sidebar-brand-full img_log" src="{{ asset('/assets/img/logos/npsn.png') }}" alt="CoreUI Logo">

    <img class="c-sidebar-brand-minimized" src="{{ asset('assets/img/logos/npsn.png') }}" width="118" height="46"
        alt="CoreUI Logo">
</div>

<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('home.index') }}">
            <span class="c-sidebar-nav-icon cil-home"></span>
            {{ __('lang.dashboard') }}
        </a>
    </li>

    <li class="c-sidebar-nav-item">
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-eyedropper c-sidebar-nav-icon"></i>
            {{ __('lang.updating_data') }}
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('incomingreport.index') }}"><span class="c-sidebar-nav-icon"></span>
                    {{ __('lang.recording_incoming_reports') }}
                </a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('recordingEvent.index') }}"><span class="c-sidebar-nav-icon"></span>
                    {{ __('lang.recording_event_data') }}
                </a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('recordingScenario.index') }}"><span class="c-sidebar-nav-icon"></span>
                    {{ __('lang.recording_scenarios') }}
                </a></li>
        </ul>
    </li>
    </li>

    <li class="c-sidebar-nav-item">
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-spreadsheet c-sidebar-nav-icon"></i>
            {{ __('lang.reports') }}
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    {{ __('lang.typical_reports') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                            href="{{ route('reportsOperation.index') }}"><span class="c-sidebar-nav-icon"></span>
                            {{ __('lang.typical_reports_operation') }}
                        </a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                            href="{{ route('typicalReportsPlaces.index') }}"><span class="c-sidebar-nav-icon"></span>
                            {{ __('lang.typical_reports_places') }}
                        </a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                            href="{{ route('typicalMedicalServices.index') }}"><span
                                class="c-sidebar-nav-icon"></span>
                            {{ __('lang.typical_reports_medical') }}
                        </a></li>
                </ul>
            </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    {{ __('lang.statistical_reports') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                            href="{{ route('statisticalCommunications.index') }}"><span
                                class="c-sidebar-nav-icon"></span>
                            {{ __('lang.statistical_communications') }}
                        </a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                            href="{{ route('statisticalEvents.index') }}"><span class="c-sidebar-nav-icon"></span>
                            {{ __('lang.statistical_events_received') }}
                        </a></li>
                </ul>
            </li>
        </ul>
    </li>
    </li>

    <li class="c-sidebar-nav-item">
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-calculator c-sidebar-nav-icon"></i>
            {{ __('lang.inquiries') }}
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('specificResponsible.index') }}"><span class="c-sidebar-nav-icon"></span>
                    {{ __('lang.inquiries_specific_responsible') }}
                </a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('inquiryCommunications.index') }}"><span class="c-sidebar-nav-icon"></span>
                    {{ __('lang.inquiries_communications') }}
                </a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('specificInquiry.index') }}"><span class="c-sidebar-nav-icon"></span>
                    {{ __('lang.specific_inquiries') }}
                </a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('inquiryScenarios.index') }}"><span class="c-sidebar-nav-icon"></span>
                    {{ __('lang.inquiries_scenario') }}
                </a></li>
        </ul>
    </li>
    </li>

    <li class="c-sidebar-nav-item">
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-phone c-sidebar-nav-icon"></i>
            {{ __('lang.dalil_phones') }}
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('dalilPhone.index') }}"><span
                        class="c-sidebar-nav-icon"></span>
                    {{ __('lang.dalil_phones') }}
                </a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"
                    href="{{ route('inquiryPhones.index') }}"><span class="c-sidebar-nav-icon"></span>
                    {{ __('lang.inquiries_phones') }}
                </a></li>
        </ul>
    </li>
    </li>

    @if (auth()->user()->menuroles == 'admin')
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('users.index') }}">
                <span class="c-sidebar-nav-icon cil-user"></span>
                {{ __('lang.users') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('entity.index') }}">
                <span class="c-sidebar-nav-icon cil-pencil"></span>
                {{ __('lang.report_destinations') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('event.index') }}">
                <span class="c-sidebar-nav-icon cil-pencil"></span>
                {{ __('lang.event_type') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('operationData.index') }}">
                <span class="c-sidebar-nav-icon cil-user"></span>
                {{ __('lang.operation_data') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('gatheringPlaces.index') }}">
                <span class="c-sidebar-nav-icon cil-user"></span>
                {{ __('lang.gathering_places') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('medicalServices.index') }}">
                <span class="c-sidebar-nav-icon cil-hospital"></span>
                {{ __('lang.medical_services') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('dalilEntity.index') }}">
                <span class="c-sidebar-nav-icon cil-phone"></span>
                {{ __('lang.dalil_entity') }}
            </a>
        </li>
    @endif
    <li class="c-sidebar-nav-item">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <a class="c-sidebar-nav-link" href="javascript:void(0)">

                <button type="submit" class="btn" style="display: contents;color: #f1f3f6;">
                    <i class="cil-account-logout c-sidebar-nav-icon"></i>
                    {{ __('lang.logout') }}
                </button>
            </a>

        </form>

    </li>

</ul>

<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
    data-class="c-sidebar-minimized"></button>
</div>
