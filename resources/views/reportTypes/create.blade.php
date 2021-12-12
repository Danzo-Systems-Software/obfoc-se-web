@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Dodaj nowy typ zgłoszenia</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('reportTypes.index') }}">Wróć do listy</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>KURWAAAAAAAAAAAAA!</strong>Coś zjebałeś z inputem.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('reportTypes.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nazwa:</strong>
                <input type="text" name="name" class="form-control" placeholder="Nazwa">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Potwierdź</button>
        </div>
    </div>

</form>
@endsection
