@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('general.consumables') }}
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
                    buttons="consumableButtons"
                    fixed_right_number="2"
                    fixed_number="1"
                    api_url="{{ route('api.consumables.index') }}"
                    :presenter="\App\Presenters\ConsumablePresenter::dataTableLayout()"
                    export_filename="export-consumables-{{ date('Y-m-d') }}"
            />

        </x-box>
    </x-container>
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['exportFile' => 'consumables-export', 'search' => true,'showFooter' => true, 'columns' => \App\Presenters\ConsumablePresenter::dataTableLayout()])
@stop
