<?php

namespace App\Http\Controllers;

use App\Models\Wilaya;
use App\Http\Requests\StoreWilayaRequest;
use App\Http\Requests\UpdateWilayaRequest;
use App\Models\Commune;
use Illuminate\Support\Facades\Auth;

class WilayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_commune_user = Auth::user()->commune_id;

        $commune = Commune::find($id_commune_user);
        $user_wilaya = $commune->wilaya;


        if ($user_wilaya) {
            return view('dashboard', compact('user_wilaya', 'commune'));
        } else {

            return  "pas de wilaya !";

        }
    }

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWilayaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wilaya $wilaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wilaya $wilaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWilayaRequest $request, Wilaya $wilaya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wilaya $wilaya)
    {
        //
    }
}
