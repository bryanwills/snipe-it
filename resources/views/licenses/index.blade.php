@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('admin/licenses/general.software_licenses') }}
@parent
@stop


{{-- Page content --}}
@section('content')
    <x-container>
        <x-box>

            <x-table
                    show_column_search="false"
                    show_advanced_search="true"
                    show_footer="true"
                    buttons="licenseButtons"
                    fixed_right_number="2"
                    fixed_number="1"
                    api_url="{{ route('api.licenses.index', ['status' => e(request('status'))]) }}"
                    :presenter="\App\Presenters\LicensePresenter::dataTableLayout()"
                    export_filename="export-licenses-{{ date('Y-m-d') }}"
            />

        </x-box>
    </x-container>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table')

@stop
