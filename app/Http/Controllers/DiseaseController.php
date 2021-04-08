<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiseaseRequest;
use App\Http\Resources\DiseaseResource;
use App\Models\Disease;
use App\Models\District;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(District $district)
    {
        return DiseaseResource::collection($district->disease);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiseaseRequest $request, District $district)
    {
        $disease = $district->disease()->create($request->all());
        // return response('Disease created successfully');
        return new DiseaseResource($disease);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(District $district, Disease $disease)
    {
        return new DiseaseResource($disease);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(DiseaseRequest $request, District $district, Disease $disease)
    {
        $disease = $disease->update($request->all());
        // return response('Disease updated successfully');
        return new DiseaseResource($disease);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */

    public function destroy(District $district, Disease $disease)
    {
        $disease->delete();
        return response('Disease deleted successfully');
    }
}
