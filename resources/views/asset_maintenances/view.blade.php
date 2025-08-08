<?php
use Carbon\Carbon;
?>
@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('admin/asset_maintenances/general.view') }} {{ $assetMaintenance->title }}
@parent
@stop

{{-- Page content --}}
@section('content')
  <div class="row">
    <div class="col-md-9">

      <div class="box box-default">
        <div class="box-body">
          <div class="row-new-striped">
            <div class="row">

                <div class="col-md-3">
                  {{ trans('admin/asset_maintenances/form.asset_maintenance_type') }}
                </div>
                <div class="col-md-9">
                  {{ $assetMaintenance->asset_maintenance_type }}
                </div>

            </div> <!-- /row -->

            <div class="row">
              <div class="col-md-3">
                {{ trans('general.asset') }}
              </div>
              <div class="col-md-9">
                <a href="{{ route('hardware.show', $assetMaintenance->asset_id) }}">
                  {{ $assetMaintenance->asset->present()->fullName }}
                </a>
              </div>
            </div> <!-- /row -->

            @if ($assetMaintenance->asset->model)
              <div class="row">
                <div class="col-md-3">
                  {{ trans('general.asset_model') }}
                </div>
                <div class="col-md-9">
                  <a href="{{ route('models.show', $assetMaintenance->asset->model_id) }}">
                    {{ $assetMaintenance->asset->model->name }}
                  </a>
                </div>
              </div> <!-- /row -->
            @endif

            @if ($assetMaintenance->asset->company)
              <div class="row">
                <div class="col-md-3">
                  {{ trans('general.company') }}
                </div>
                <div class="col-md-9">
                  <a href="{{ route('companies.show', $assetMaintenance->asset->company_id) }}">
                    {{ $assetMaintenance->asset->company->name }}
                  </a>
                </div>
              </div> <!-- /row -->
            @endif


            @if ($assetMaintenance->supplier)
            <div class="row">
              <div class="col-md-3">
                {{ trans('general.supplier') }}
              </div>
              <div class="col-md-9">
                <a href="{{ route('suppliers.show', $assetMaintenance->supplier_id) }}">
                  {{ $assetMaintenance->supplier->name }}
                </a>
              </div>
            </div> <!-- /row -->
            @endif

            <div class="row">
              <div class="col-md-3">
                {{ trans('admin/asset_maintenances/form.start_date') }}
              </div>
              <div class="col-md-9">
                {{ Helper::getFormattedDateObject($assetMaintenance->start_date, 'date', false) }}
              </div>
            </div> <!-- /row -->

            <div class="row">
              <div class="col-md-3">
                {{ trans('admin/asset_maintenances/form.completion_date') }}
              </div>
              <div class="col-md-9">
                @if ($assetMaintenance->completion_date)
                  {{ Helper::getFormattedDateObject($assetMaintenance->completion_date, 'date', false) }}
                @else
                  {{ trans('admin/asset_maintenances/message.asset_maintenance_incomplete') }}
                @endif
              </div>
            </div> <!-- /row -->

            <div class="row">
              <div class="col-md-3">
                {{ trans('admin/asset_maintenances/form.asset_maintenance_time') }}
              </div>
              <div class="col-md-9">
                {{ $assetMaintenance->asset_maintenance_time }}
              </div>
            </div> <!-- /row -->

            @if ($assetMaintenance->cost > 0)
            <div class="row">
              <div class="col-md-3">
                {{ trans('admin/asset_maintenances/form.cost') }}
              </div>
              <div class="col-md-9">
                {{ \App\Models\Setting::getSettings()->default_currency .' '. Helper::formatCurrencyOutput($assetMaintenance->cost) }}
              </div>
            </div> <!-- /row -->
            @endif

            <div class="row">
              <div class="col-md-3">
                {{ trans('admin/asset_maintenances/form.is_warranty') }}
              </div>
              <div class="col-md-9">
                {{ $assetMaintenance->is_warranty ? trans('admin/asset_maintenances/message.warranty') : trans('admin/asset_maintenances/message.not_warranty') }}
              </div>
            </div> <!-- /row -->

            @if ($assetMaintenance->notes)
            <div class="row">
              <div class="col-md-3">
                {{ trans('admin/asset_maintenances/form.notes') }}
              </div>
              <div class="col-md-9">
                {!! nl2br(Helper::parseEscapedMarkedownInline($assetMaintenance->notes)) !!}
              </div>
            </div> <!-- /row -->
            @endif


          </div><!-- /row-new-striped -->
      </div><!-- /box-body -->
    </div><!-- /box -->

    </div> <!-- col-md-9  end -->
    <div class="col-md-3">

      @if ($assetMaintenance->image!='')
        <div class="col-md-12 text-center" style="padding-bottom: 17px;">
          <img src="{{ Storage::disk('public')->url(app('asset_maintenances_path').e($assetMaintenance->image)) }}" class="img-responsive img-thumbnail" style="width:100%" alt="{{ $assetMaintenance->name }}">
        </div>
      @endif

      <div class="col-md-12">

        <ul class="list-unstyled" style="line-height: 22px; padding-bottom: 20px;">

          @if ($assetMaintenance->notes)
            <li>
              <strong>{{ trans('general.notes') }}</strong>:
              {!! nl2br(Helper::parseEscapedMarkedownInline($assetMaintenance->notes)) !!}
            </li>
          @endif

          @if ($assetMaintenance->address!='')
            <li>{{ $assetMaintenance->address }}</li>
          @endif
          @if ($assetMaintenance->address2!='')
            <li>{{ $assetMaintenance->address2 }}</li>
          @endif
          @if (($assetMaintenance->city!='') || ($assetMaintenance->state!='') || ($assetMaintenance->zip!=''))
            <li>{{ $assetMaintenance->city }} {{ $assetMaintenance->state }} {{ $assetMaintenance->zip }}</li>
          @endif
          @if ($assetMaintenance->manager)
            <li>{{ trans('admin/users/table.manager') }}: {!! $assetMaintenance->manager->present()->nameUrl() !!}</li>
          @endif
          @if ($assetMaintenance->company)
            <li>{{ trans('admin/companies/table.name') }}: {!! $assetMaintenance->company->present()->nameUrl() !!}</li>
          @endif
          @if ($assetMaintenance->parent)
            <li>{{ trans('admin/locations/table.parent') }}: {!! $assetMaintenance->parent->present()->nameUrl() !!}</li>
          @endif
          @if ($assetMaintenance->ldap_ou)
            <li>{{ trans('admin/locations/table.ldap_ou') }}: {{ $assetMaintenance->ldap_ou }}</li>
          @endif


          @if ((($assetMaintenance->address!='') && ($assetMaintenance->city!='')) || ($assetMaintenance->state!='') || ($assetMaintenance->country!=''))
            <li>
              <a href="https://maps.google.com/?q={{ urlencode($assetMaintenance->address.','. $assetMaintenance->city.','.$assetMaintenance->state.','.$assetMaintenance->country.','.$assetMaintenance->zip) }}" target="_blank">
                {!! trans('admin/locations/message.open_map', ['map_provider_icon' => '<i class="fa-brands fa-google" aria-hidden="true"></i>']) !!}
                <x-icon type="external-link"/>
              </a>
            </li>
            <li>
              <a href="https://maps.apple.com/?q={{ urlencode($assetMaintenance->address.','. $assetMaintenance->city.','.$assetMaintenance->state.','.$assetMaintenance->country.','.$assetMaintenance->zip) }}" target="_blank">
                {!! trans('admin/locations/message.open_map', ['map_provider_icon' => '<i class="fa-brands fa-apple" aria-hidden="true" style="font-size: 18px"></i>']) !!}
                <x-icon type="external-link"/></a>
            </li>
          @endif

        </ul>
      </div>

      @can('update', $assetMaintenance)
        <div class="col-md-12">
          <a href="{{ route('maintenances.edit', [$assetMaintenance->id]) }}" style="width: 100%;" class="btn btn-sm btn-warning btn-social">
            <x-icon type="edit" />
            {{ trans('general.update') }}
          </a>
        </div>
      @endcan
    </div>

    </div> <!-- row  end -->

@stop
