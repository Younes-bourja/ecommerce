<?php

namespace App\Http\Controllers;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $c=categories::all();
        $s  =DB::select("SELECT * FROM commande WHERE status LIKE '%في طور الانتضار...%'");
        $tc =DB::select("SELECT * FROM commande WHERE status = 'في طور المعالجة'");
        $tcc=DB::select("SELECT * FROM commande WHERE status = 'في طور الاستلام'");
    
        return view('administration.sections',compact('c','s','tc','tcc'));
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
    public function store(Request $request)
    {
      
        $validated = $request->validate([
            'valeur' => 'required|unique:categories',
        ]);
     
        // The blog post is valid...
     
        categories::create([
    'categorie'=>$request['categorie'],
    'valeur'=>$request->valeur,
]);
session()->flash('add','success');
return redirect('/section');





    }

    /**
     * Display the specified resource.
     */
    public function show(categories $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request['delite-id'];
        categories::find($id)->delete();
        session()->flash('add','la section été suprimer ');
        return redirect('/section');
      }
}
