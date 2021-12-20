@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Zgłoś coś lub kogoś (ty konfidencie)</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('reports.index') }}">Dobra jednak nie chcę konfić</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>KURWAAAA!</strong>Nawet podpierdolić kogoś nie umiesz dobrze.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('reports.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategoria:</strong>
                <select id="reportTypeID" class="form-control @error('reportTypeID') is-invalid @enderror" name="reportTypeID">
                    @foreach($reportTypes as $reportType)
                        <option value="{{ $reportType->id }}">{{ $reportType->name }}</option>
                    @endforeach
                </select>
                <input type="text" name="reporterID" class="form-control" placeholder="chujuzajebany" value="{{ Auth::user()->id}}" hidden>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Treść zgłoszenia:</strong>
                <textarea class="form-control" style="height:150px" name="reportContent" placeholder="Dawaj wpisz tu coś"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dotyczy użytkownika:</strong>
                <select id="focusesOnUser" class="form-control @error('focusesOnUser') is-invalid @enderror" name="focusesOnUser">
                    <option value="">Brak</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
