<?php

namespace App\Http\Controllers;

use App\Models\reportType;
use Illuminate\Http\Request;

class reportTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportTypes= reportType::all();
        return view('reportTypes.index', compact('reportTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reportTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        reportType::create($request->all());
        return redirect()->route('reportTypes.index')->with('success','Stworzono typ zgłoszenia.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function edit(reportType $reportType)
    {
        return view('reportTypes.edit', compact('reportType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reportType $reportType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $reportType->update($request->all());
        return redirect()->route('reportTypes.index')->with('success','Zaaktualizowano pomyślnie typ zgłoszenia.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function destroy(reportType $reportType)
    {
        $reportType->delete();
        return redirect()->route('reportTypes.index')->with('success','Usunąłeś pomyślnie typ zgłoszenia');;
    }
}
