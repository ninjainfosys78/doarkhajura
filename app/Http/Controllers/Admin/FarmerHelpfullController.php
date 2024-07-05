<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\UpdateFaqRequest;
use App\Http\Requests\FarmerHelpfull\StoreFarmerHelpfullRequest;
use App\Http\Requests\FarmerHelpfull\UpdateFarmerHelpfullRequest;
use App\Models\FarmerHelpfull;
use App\Models\ResearchUnit;
use Illuminate\Http\Request;

class FarmerHelpfullController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $famerHelpfulls=FarmerHelpfull::latest()->get();
        return view('admin.farmerHelpfull.index', compact('famerHelpfulls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $researchUnits = ResearchUnit::all();
        return view('admin.farmerHelpfull.create',compact('researchUnits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFarmerHelpfullRequest $request)
    {
        FarmerHelpfull::create($request->validated());
       toast('Farmer Helpfull Material Created Successfully', 'success');
       return redirect(route('admin.farmerHelpfull.index'));
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
    public function edit(FarmerHelpfull $farmerHelpfull)
    {
        // $farmerHelpfull->load('researchUnit');
        $researchUnits=ResearchUnit::get();
        return view('admin.farmerHelpfull.edit', compact('farmerHelpfull','researchUnits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFarmerHelpfullRequest $request, FarmerHelpfull $farmerHelpfull)
    {
        $farmerHelpfull->update($request->validated());
        toast('Farmer Helpfull Material Updated Successfully','success');
        return redirect(route('admin.farmerHelpfull.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FarmerHelpfull $farmerHelpfull)
    {
        if ($farmerHelpfull->file) {
            $this->deleteFile($farmerHelpfull->getRawOriginal('file'));
        }

        $farmerHelpfull->delete();
        toast('Farmer Helpfull Material Deleted Successfully','success');
        return back();
    }
}
