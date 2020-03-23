@extends('layouts.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> {{ trans('contact::contactrequests.title.contactrequests') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ route('dashboard.index') }}"><i
                            class="fas fa-tachometer-alt"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
                    <li class="breadcrumb-item active"> {{ trans('contact::contactrequests.title.contactrequests') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered">
                            <thead>
                            <tr>
                                <th>{{ trans('contact::contact.enviado el') }}</th>
                                <th>{{ trans('contact::contact.full-name') }}</th>
                                <th>{{ trans('contact::contact.email') }}</th>
                                <th>{{ trans('contact::contact.company') }}</th>
                                <th>{{ trans('contact::contact.phone') }}</th>
                                <th>{{ trans('contact::contact.message') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($requests)): ?>
                            <?php foreach ($requests as $request): ?>
                            @if(!$request->status)
                            <tr class="font-weight-bold bg-visto">
                            @else
                            <tr>
                            @endif
                                <td>
                                    {{ $request->created_at }}
                                </td>
                                <td>
                                    {{ $request->name }}
                                </td>
                                <td>
                                    {{ $request->email }}
                                </td>
                                <td>
                                    {{ $request->company }}
                                </td>
                                <td>
                                    {{ $request->phone }}
                                </td>
                                <td>
                                    {{ str_limit(strip_tags($request->message)) }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.contact.contactrequest.show', [$request->id]) }}" class="btn btn-default"><i class="far fa-eye"></i></a>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.contact.contactrequest.destroy', [$request->id]) }}"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('contact::contact.enviado el') }}</th>
                                <th>{{ trans('contact::contact.full-name') }}</th>
                                <th>{{ trans('contact::contact.email') }}</th>
                                <th>{{ trans('contact::contact.company') }}</th>
                                <th>{{ trans('contact::contact.phone') }}</th>
                                <th>{{ trans('contact::contact.message') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>
    @include('core::partials.delete-modal')
@stop

@section('scripts')
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@stop
