@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Powody zgłoszeń</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('reportTypes.create') }}">Stwórz nowy powód zgłoszenia</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nazwa</th>
        <th width="280px">Akcje</th>
    </tr>
    @foreach ($reportTypes as $reportType)
    <tr>
        <td>{{ $reportType->id }}</td>
        <td>{{ $reportType->name }}</td>
        <td>
            <form action="{{ route('reportTypes.destroy',$reportType->id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('reportTypes.edit',$reportType->id) }}">Edytuj</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Usuwaci</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
