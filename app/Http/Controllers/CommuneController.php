<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Http\Requests\StoreCommuneRequest;
use App\Http\Requests\UpdateCommuneRequest;
use App\Models\Wilaya;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    public function get_all_communes( StoreCommuneRequest $request ,  $id_wilaya  )
    {
        
        $all_communes = Commune::select('*')
        ->where('wilaya_id', '=',  $id_wilaya )->get();
        if( count ($all_communes) ) {
            $com =   ' <x-label for="commune" value="commune"  />  ' ;
            $com .=  "<select name='commune_id'  
            class='form-select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full'  >
                
            <option>  </option>" ;
            
            foreach ($all_communes as $commune => $val ) {
                $id = $val['id']  ;
                $name = $val['name']  ;
                $com .= " <option  value='$id'  > " .  $name. "   </option> " ;             
            }
             
            $com .=   "</select>" ;
    
            return   $com   ;
        }else {
            return " <div class=' alert-warning text-center alert'> pas de communes ! </div> " ;
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommuneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Commune $commune)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commune $commune)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommuneRequest $request, Commune $commune)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commune $commune)
    {
        //
    }
}
