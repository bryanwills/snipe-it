@extends('layouts/default')

@section('title0')

  @php
    $requestStatus = request()->input('status');
    $requestOrderNumber = request()->input('order_number');
    $requestCompanyId = request()->input('company_id');
    $requestStatusId = request()->input('status_id');
  @endphp

  @if (($requestCompanyId) && ($company))
    {{ $company->name }}
  @endif



@if ($requestStatus)
  @if ($requestStatus=='Pending')
    {{ trans('general.pending') }}
  @elseif ($requestStatus=='RTD')
    {{ trans('general.ready_to_deploy') }}
  @elseif ($requestStatus=='Deployed')
    {{ trans('general.deployed') }}
  @elseif ($requestStatus=='Undeployable')
    {{ trans('general.undeployable') }}
  @elseif ($requestStatus=='Deployable')
    {{ trans('general.deployed') }}
  @elseif ($requestStatus=='Requestable')
    {{ trans('admin/hardware/general.requestable') }}
  @elseif ($requestStatus=='Archived')
    {{ trans('general.archived') }}
  @elseif ($requestStatus=='Deleted')
    {{ ucfirst(trans('general.deleted')) }}
  @elseif ($requestStatus=='byod')
    {{ strtoupper(trans('general.byod')) }}
  @endif
@else
{{ trans('general.all') }}
@endif
{{ trans('general.assets') }}

  @if (Request::has('order_number'))
    : Order #{{ strval($requestOrderNumber) }}
  @endif
@stop

{{-- Page title --}}
@section('title')
@yield('title0')  @parent
@stop


{{-- Page content --}}
@section('content')



<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
       
          <div class="row">
            <div class="col-md-12">

                @include('partials.asset-bulk-actions', ['status' => $requestStatus])
                   
              <table
                data-columns="{{ \App\Presenters\AssetPresenter::dataTableLayout() }}"
                data-cookie-id-table="{{ request()->has('status') ? e(request()->input('status')) : ''  }}assetsListingTable"
                data-id-table="{{ request()->has('status') ? e(request()->input('status')) : ''  }}assetsListingTable"
                data-side-pagination="server"
                data-show-footer="true"
                data-sort-order="asc"
                data-sort-name="name"
                data-search-text="{{ session()->get('search') }}"
                data-show-columns-search="true"
                data-toolbar="#assetsBulkEditToolbar"
                data-bulk-button-id="#bulkAssetEditButton"
                data-bulk-form-id="#assetsBulkForm"
                data-buttons="assetButtons"
                id="{{ request()->has('status') ? e(request()->input('status')) : ''  }}assetsListingTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.assets.index',
                    array('status' => e($requestStatus),
                    'order_number'=>e(strval($requestOrderNumber)),
                    'company_id'=>e($requestCompanyId),
                    'status_id'=>e($requestStatusId))) }}"
                data-export-options='{
                "fileName": "export{{ (Request::has('status')) ? '-'.str_slug($requestStatus) : '' }}-assets-{{ date('Y-m-d') }}",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
              </table>

            </div><!-- /.col -->
          </div><!-- /.row -->
        
      </div><!-- ./box-body -->
    </div><!-- /.box -->
  </div>
</div>
@stop

@section('moar_scripts')
@include('partials.bootstrap-table')

@stop
