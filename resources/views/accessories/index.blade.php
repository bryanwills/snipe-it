@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('general.accessories') }}
@parent
@stop


{{-- Page content --}}
@section('content')
    <x-container>
        <x-box>

            <x-table
                    show_column_search="false"
                    show_footer="true"
                    buttons="accessoryButtons"
                    fixed_right_number="2"
                    fixed_number="1"
                    api_url="{{ route('api.accessories.index') }}"
                    :presenter="\App\Presenters\AccessoryPresenter::dataTableLayout()"
                    export_filename="export-accessories-{{ date('Y-m-d') }}"
            />

        </x-box>
    </x-container>
@stop


@section('moar_scripts')
@include ('partials.bootstrap-table')
@stop
