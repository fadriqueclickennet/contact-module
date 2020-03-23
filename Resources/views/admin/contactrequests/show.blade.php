@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> {{ trans('contact::contactrequests.title.contactrequest') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i
                            class="fas fa-tachometer-alt"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('admin.contact.contactrequest.index') }}">{{ trans('contact::contactrequests.title.contactrequests') }}</a>
                </li>
                <li class="breadcrumb-item current">{{ trans('contact::contactrequests.title.contactrequest') }}</li>
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
                <div class="card-header with-border">
                    <h3 class="card-title">{{ trans('contact::contactrequests.request information') }}</h3>
                </div>
                <div class="card-body">
                    <dl class="dl-horizontal">
                        <dt>{{ trans('contact::contact.full-name') }}</dt>
                        <dd>{{ $request->name }}</dd>
                        <dt>{{ trans('contact::contact.email') }}</dt>
                        <dd><a href="mailto:{{ $request->email }}">{{ $request->email }}</a></dd>
                        <dt>{{ trans('contact::contact.company') }}</dt>
                        <dd>{{ $request->company }}</dd>
                        <dt>{{ trans('contact::contact.phone') }}</dt>
                        <dd>{{ $request->phone }}</dd>
                        <dt>{{ trans('contact::contact.message') }}</dt>
                        <dd>{!! nl2br(e($request->message)) !!}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
@stop