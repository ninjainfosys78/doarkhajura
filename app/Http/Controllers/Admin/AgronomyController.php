<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agronomy\StoreAgromonyRequest;
use App\Http\Requests\Agronomy\UpdateAgromonyRequest;
use App\Models\Agronomy;
use App\Models\Employee;
use App\Models\ResearchUnit;
use Illuminate\Http\Request;

class AgronomyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agronomies = Agronomy::with(['researchUnit', 'TechnicalOfficer', 'Scientist'])->latest()->get();
        return view('admin.agronomy.index', compact('agronomies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $researchUnits = ResearchUnit::get();
        $employees = Employee::all();
        return view('admin.agronomy.create', compact('researchUnits', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgromonyRequest $request)
    {
        Agronomy::create($request->validated());
        toast('Agromony Material Created Successfully', 'success');
        return redirect(route('admin.agronomy.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agronomy $agronomy)
    {
        // $agronomy->load(['researchUnit', 'TechnicalOfficer', 'Scientist']);
        $researchUnits = ResearchUnit::get();
        $employees = Employee::all();
        return view('admin.agronomy.edit', compact('agronomy', 'researchUnits', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgromonyRequest $request, Agronomy $agronomy)
    {
        $agronomy->update($request->validated());
        toast('Agromony Material Updated Successfully', 'success');
        return redirect(route('admin.agronomy.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agronomy $agronomy)
    {
        $agronomy->delete();
        toast('Agromony Material Deleted Successfully', 'success');
        return redirect(route('admin.agronomy.index'));
    }
}
