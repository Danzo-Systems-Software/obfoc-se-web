@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Wszystkie zgłoszenia</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('reports.create') }}">Stwórz nowe zgłoszenie</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<h3>UWAGA poniżej wyświetlają się tylko otwarte zgłoszenia</h3>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Zgłaszający</th>
        <th>Kategoria zgłoszenia</th>
        <th>Data dodania</th>
        <th>Opis zgłoszenia</th>
        <th>Dotyczy użytkownika (opcj.)</th>
        <th>Status</th>
        <th width="280px">Akcje</th>
    </tr>
    @foreach ($reports as $report)
    <tr>
        <td>{{ $report->id }}</td>
        <td>{{ $report->reporter->name }}</td>
        <td>{{ $report->reportType->name }}</td>
        <td>{{ $report->addedOn }}</td>
        <td>{{ $report->reportContent }}</td>
        <td>{{ $report->focusesOnUser->name }}</td>
        <td>{{ $report->isOpenned }}</td>
        <td>
            <form action="{{ route('reports.destroy',$report->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('reports.show',$report->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('reports.edit',$report->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
