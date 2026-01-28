@extends('layouts/default')

{{-- Page title --}}
@section('title')

 {{ $manufacturer->name }}
 {{ trans('general.manufacturer') }}
@parent
@stop

@section('header_right')
  <a href="{{ route('manufacturers.edit', $manufacturer) }}" class="btn btn-primary text-right" style="margin-right: 10px;">{{ trans('general.update') }}</a>
@stop

{{-- Page content --}}
@section('content')
    <x-container columns="2">
        <x-page-column class="col-md-9">
            <x-tabs>
                <x-slot:tabnav>
                    @can('view', \App\Models\Asset::class)
                        <x-tabs.nav-item
                                name="assets"
                                class="active"
                                icon="fas fa-barcode fa-fw"
                                label="{{ trans('general.assets') }}"
                                count="{{ $manufacturer->assets()->AssetsForShow()->count() }}"
                                tooltip="{{ trans('general.assets') }}"
                        />
                    @endcan

                    @can('view', \App\Models\License::class)
                        <x-tabs.nav-item
                                name="licenses"
                                icon="far fa-save"
                                label="{{ trans('general.licenses') }}"
                                count="{{ $manufacturer->licenses->count() }}"
                                tooltip="{{ trans('general.licenses') }}"
                        />
                    @endcan

                    @can('view', \App\Models\Accessory::class)
                        <x-tabs.nav-item
                                name="accessories"
                                icon="far fa-keyboard fa-fw"
                                label="{{ trans('general.accessories') }}"
                                count="{{ $manufacturer->accessories->count() }}"
                                tooltip="{{ trans('general.accessories') }}"
                        />
                    @endcan

                    @can('view', \App\Models\Consumable::class)
                        <x-tabs.nav-item
                                name="consumables"
                                icon="fas fa-tint fa-fw"
                                label="{{ trans('general.consumables') }}"
                                count="{{ $manufacturer->consumables->count() }}"
                                tooltip="{{ trans('general.consumables') }}"
                        />
                    @endcan

                    @can('view', \App\Models\Component::class)
                        <x-tabs.nav-item
                                name="components"
                                icon="fas fa-hdd fa-fw"
                                label="{{ trans('general.components') }}"
                                count="{{ $manufacturer->components->count() }}"
                                tooltip="{{ trans('general.components') }}"
                        />
                    @endcan

                    @can('update', $manufacturer)
                        <x-tabs.nav-item-upload />
                    @endcan

                </x-slot:tabnav>

                <x-slot:tabpanes>
                    <!-- start assets tab pane -->
                    @can('view', \App\Models\Asset::class)
                        <x-tabs.pane name="assets" class="in active">
                            <x-slot:header>
                                {{ trans('general.assets') }}
                            </x-slot:header>

                            <x-slot:bulkactions>
                                <x-table.bulk-assets />
                            </x-slot:bulkactions>

                            <x-slot:content>
                                <x-table
                                        show_column_search="true"
                                        show_advanced_search="true"
                                        buttons="assetButtons"
                                        api_url="{{ route('api.assets.index', ['manufacturer_id' => $manufacturer->id, 'itemtype' => 'assets']) }}"
                                        :presenter="\App\Presenters\AssetPresenter::dataTableLayout()"
                                        export_filename="export-{{ str_slug($manufacturer->name) }}-assets-{{ date('Y-m-d') }}"
                                />
                            </x-slot:content>
                        </x-tabs.pane>
                    @endcan
                    <!-- end assets tab pane -->

                    <!-- start licenses tab pane -->
                    @can('view', \App\Models\License::class)
                        <x-tabs.pane name="licenses">
                            <x-slot:header>
                                {{ trans('general.licenses') }}
                            </x-slot:header>

                            <x-slot:content>
                                <x-table
                                        show_column_search="true"
                                        show_advanced_search="true"
                                        buttons="licenseButtons"
                                        api_url="{{ route('api.licenses.index', ['manufacturer_id' => $manufacturer->id]) }}"
                                        :presenter="\App\Presenters\LicensePresenter::dataTableLayout()"
                                        export_filename="export-{{ str_slug($manufacturer->name) }}-licenses-{{ date('Y-m-d') }}"
                                />
                            </x-slot:content>
                        </x-tabs.pane>
                    @endcan
                    <!-- end licenses tab pane -->

                    <!-- start accessories tab pane -->
                    @can('view', \App\Models\Accessory::class)
                        <x-tabs.pane name="accessories">
                            <x-slot:header>
                                {{ trans('general.accessories') }}
                            </x-slot:header>

                            <x-slot:content>
                                <x-table
                                        show_column_search="true"
                                        show_advanced_search="true"
                                        buttons="accessoryButtons"
                                        api_url="{{ route('api.accessories.index', ['manufacturer_id' => $manufacturer->id]) }}"
                                        :presenter="\App\Presenters\AccessoryPresenter::dataTableLayout()"
                                        export_filename="export-{{ str_slug($manufacturer->name) }}-accessories-{{ date('Y-m-d') }}"
                                />
                            </x-slot:content>
                        </x-tabs.pane>
                    @endcan
                    <!-- end accessories tab pane -->

                    <!-- start consumables tab pane -->
                    @can('view', \App\Models\Consumable::class)
                        <x-tabs.pane name="consumables">
                            <x-slot:header>
                                {{ trans('general.consumables') }}
                            </x-slot:header>

                            <x-slot:content>
                                <x-table
                                        show_column_search="true"
                                        show_advanced_search="true"
                                        buttons="consumableButtons"
                                        api_url="{{ route('api.consumables.index', ['manufacturer_id' => $manufacturer->id]) }}"
                                        :presenter="\App\Presenters\ConsumablePresenter::dataTableLayout()"
                                        export_filename="export-{{ str_slug($manufacturer->name) }}-consumables-{{ date('Y-m-d') }}"
                                />
                            </x-slot:content>
                        </x-tabs.pane>
                    @endcan
                    <!-- end consumables tab pane -->

                    <!-- start components tab pane -->
                    @can('view', \App\Models\Component::class)
                        <x-tabs.pane name="components">
                            <x-slot:header>
                                {{ trans('general.components') }}
                            </x-slot:header>

                            <x-slot:content>
                                <x-table
                                        show_column_search="true"
                                        show_advanced_search="true"
                                        buttons="componentButtons"
                                        api_url="{{ route('api.components.index', ['manufacturer_id' => $manufacturer->id]) }}"
                                        :presenter="\App\Presenters\ComponentPresenter::dataTableLayout()"
                                        export_filename="export-{{ str_slug($manufacturer->name) }}-components-{{ date('Y-m-d') }}"
                                />
                            </x-slot:content>
                        </x-tabs.pane>
                    @endcan
                    <!-- end components tab pane -->

                </x-slot:tabpanes>
            </x-tabs>
        </x-page-column>
        <x-page-column class="col-md-3">

            <x-box>
                <x-box.contact :contact="$manufacturer" img_path="{{ app('manufacturers_upload_url') }}">

                </x-box.contact>
            </x-box>
        </x-page-column>
    </x-container>

@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['exportFile' => 'manufacturer' . $manufacturer->name . '-export', 'search' => false])

@stop
