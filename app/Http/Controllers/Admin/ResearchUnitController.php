<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResearchUnit\StoreResearchUnitRequest;
use App\Http\Requests\ResearchUnit\UpdateResearchUnitRequest;
use App\Models\ResearchUnit;
use Illuminate\Http\Request;

class ResearchUnitController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchUnits = ResearchUnit::with('researchUnits.researchUnit')
            ->whereNull('research_unit_id')
            ->orderBy('research_unit_id')
            ->paginate(10);

        return view('admin.ResearchUnit.index', compact('researchUnits'));
    }



    public function subResearchUnit(Request $request)
    {
        $request->validate([
            'research_unit_id' => ['required']
        ]);

        return response()->json([
            'data' => ResearchUnit::filterData($request->all())->get()
        ]);
    }

    public function create()
    {
        $mainResearchUnits = ResearchUnit::whereNull('research_unit_id')->get();

        return view('admin.ResearchUnit.create', compact('mainResearchUnits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResearchUnitRequest $request)
    {
        ResearchUnit::create($request->validated());
        toast('Research Unit created successfully', 'success');
        return redirect(route('admin.researchUnit.index'));
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
    public function edit(ResearchUnit $researchUnit)
    {
        $mainResearchUnits = ResearchUnit::whereNull('research_unit_id')->get();
        return view('admin.ResearchUnit.edit', compact('mainResearchUnits', 'researchUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResearchUnitRequest $request, ResearchUnit $researchUnit)
    {
        $researchUnit->update($request->validated());
        toast('Research Unit updated successfully', 'success');
        return redirect(route('admin.researchUnit.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResearchUnit $researchUnit)
    {
        $researchUnit->researchUnits()->delete();
        $researchUnit->delete();

        toast('शाखा सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
