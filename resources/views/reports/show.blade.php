@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Poka reporta</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('reports.index') }}">Wracaci</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID:</strong>
            {{ $report->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Zgłaszający:</strong>
            @isset($report->reporter->name)
            {{ $report->reporter->name }}
            @endisset

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Typ zgłoszenia:</strong>
            @isset($report->reportType->name)
                {{$report->reportType->name}}
            @endisset
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Added on:</strong>
            {{ $report->addedOn }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Treść zgłoszenia:</strong>
            {{ $report->reportContent }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dotyczy użytkownika:</strong>
            @isset($report->focusesOnUser->name)
                {{$report->focusesOnUser->name}}
            @endisset

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status:</strong>
            {{ $report->status }}
        </div>
    </div>
</div>
@endsection
