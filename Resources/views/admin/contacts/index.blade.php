@extends('layouts.master')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> {{ trans('contact::contacts.title.contacts') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ route('dashboard.index') }}"><i
                            class="fas fa-tachometer-alt"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
                    <li class="breadcrumb-item active"> {{ trans('contact::contacts.title.contacts') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="btn-group float-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.contact.contact.create') }}" class="btn btn-primary" style="padding: 4px 10px;">
                        <i class="far fa-edit"></i> {{ trans('contact::contacts.button.create contact') }}
                    </a>
                </div>
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($contacts)): ?>
                            <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.contact.contact.edit', [$contact->id]) }}">
                                        {{ $contact->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.contact.contact.edit', [$contact->id]) }}" class="btn btn-default"><i class="far fa-edit"></i></a>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.contact.contact.destroy', [$contact->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('core::core.table.created at') }}</th>
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

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('contact::contacts.title.create contact') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.contact.contact.create') ?>" }
                ]
            });
        });
    </script>
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
@endpush
