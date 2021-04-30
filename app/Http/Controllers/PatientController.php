<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PatientResource::collection(Patient::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $patient = Patient::create($request->all());

        return new PatientResource($patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return new PatientResource($patient);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update($request->all());

        return response('Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response('Deleted', 201);
    }

    public function search(Request $request)
    {
        if ($request->firstName && $request->lastName) {
            $patient = Patient::where('firstName', 'LIKE', '%' . $request->firstName . '%')
                ->orWhere('lastName', 'LIKE', '%' . $request->lastName . '%')
                ->get();
        } elseif ($request->firstName) {
            $patient = Patient::where('firstName', 'LIKE', '%' . $request->firstName . '%')
                ->get();
        } elseif ($request->lastName) {
            $patient = Patient::where('lastName', 'LIKE', '%' . $request->lastName . '%')
                ->get();
        } else {
            $patient = Patient::all();
        }

        return PatientResource::collection($patient);
    }
}
