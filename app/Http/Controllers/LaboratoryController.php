<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use App\Http\Requests\StoreLaboratoryRequest;
use App\Http\Requests\UpdateLaboratoryRequest;
use App\Models\Analyse;
use App\Models\Commune;
use App\Models\Wilaya;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user_auth =   Auth::user() ->id ;
        $all_labs = DB::table('laboratories')
            ->join('communes', 'communes.id', '=', 'laboratories.commune_id')
            ->join('users', 'users.commune_id', '=', 'communes.id')
            ->select('laboratories.*' , 'communes.name as commune_name' )
            -> where( 'users.id' , $id_user_auth ) 
            ->get();

        if (count($all_labs) > 0) {
            return view('all_labs', ['all_labs' => $all_labs]);
        } else {
            Session::flash('error',   "pas de  laboratoires dans votre commune!!"  );
            return view('all_labs' );
        }

        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaboratoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function get_info_lab( $id )
    {



        // $info_lab = DB::table('laboratories')
        // ->join('communes', 'communes.id', '=', 'laboratories.commune_id')  
        // ->where('laboratories.id', $id) 
        // ->select('laboratories.*', 'communes.name as commune_name' )
        // ->get();

        $info_lab = Laboratory::find($id) ;

        $info_commune = Commune::find($info_lab-> commune_id)  ;

        $info_wilaya = Wilaya::find($info_commune-> wilaya_id)  ;

        
 
        $analyses =  DB::table('laboratory_analysis')
        ->join('laboratories', 'laboratories.id', '=', 'laboratory_analysis.laboratory_id')  
        ->join('analyses', 'analyses.id', '=', 'laboratory_analysis.analyse_id')  
        ->where('laboratory_analysis.laboratory_id', $info_lab -> id) 
        ->select('laboratory_analysis.*' , "analyses.name as analyses_name" , "analyses.prix as prix"  )
        ->get();  

        if( ! empty( $info_lab  ) ) {
            return view(  'lab_info' , [ 'info_lab' => $info_lab , 'info_commune'  => $info_commune , 'info_wilaya'  => $info_wilaya , 'analyses' => $analyses ] ) ;

        } else {
            return view(  'lab_info' , compact( "error" , "erreur !!" )  )   ;

        }

       
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratory $laboratory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaboratoryRequest $request, Laboratory $laboratory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratory $laboratory)
    {
        //
    }
}
