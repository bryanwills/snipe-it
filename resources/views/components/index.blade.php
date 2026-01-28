@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('general.components') }}
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
                    buttons="componentButtons"
                    fixed_right_number="2"
                    fixed_number="1"
                    api_url="{{ route('api.components.index') }}"
                    :presenter="\App\Presenters\ComponentPresenter::dataTableLayout()"
                    export_filename="export-components-{{ date('Y-m-d') }}"
            />

        </x-box>
    </x-container>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['exportFile' => 'components-export', 'search' => true, 'showFooter' => true, 'columns' => \App\Presenters\ComponentPresenter::dataTableLayout()])



@stop
