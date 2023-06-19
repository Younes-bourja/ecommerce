<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\produits;
use App\Models\paniers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

  
    /**
     
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tstuser=Session::get('userpanier');
        if($tstuser==''){
            $MAC = exec('getmac');
            $MAC = strtok($MAC,' ');
            Session::put('userpanier',$MAC);   
   
   };
   $testcoin=Session::get('coin');
   if($testcoin==''){	
          $coins= DB::select("SELECT valeur FROM categories WHERE categorie='العملة'");
          foreach($coins as $row):
           Session::put('coin',$row->valeur);
   
          endforeach;
        };
   if(isset($_GET['famille'])){
    if($_GET['famille']=='جميع الفئات'){ Session::put('categorie','');}
    else {Session::put('categorie',$_GET['famille']);} }
    else {Session::put('categorie','');};
  
   
   $categorie=Session::get('categorie');;
   $ppss=Session::get('userpanier');
   $p = DB::select("SELECT * FROM paniers WHERE client='$ppss'");
   $categories = DB::select("SELECT valeur FROM categories WHERE categorie='المنتوج'");

        $s=produits::where('famille','like','%'.$categorie.'%')->paginate(8); 
        $produits=produits::all();
      

        return view('produits.products',compact('s','p','produits','categories'));
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
        $tstuser=Session::get('userpanier');
     if($tstuser==''){
          
            $MAC = exec('getmac');
            $MAC = strtok($MAC,' ');        
            Session::put('userpanier',$MAC);   
};
$qtt=$request['quantite'];
$ref=$request['reference'];
$ppss=Session::get('userpanier');
   $p = DB::select("SELECT * FROM paniers WHERE client='$ppss' AND reference='$ref'");
 if(!$p & $request['quantite']<100 & $request['quantite']>0){
paniers::create([

        'client'=>Session::get('userpanier'),
        'matricule'=>Session::get('userpanier'),
        'image'=>$request['img'],
        'prix'=>$request['prix'],
        'produit'=>$request['p-name'],
        'quantite'=>$request['quantite'],
        'reference'=>$request['reference'], 
]);
return back()->with('success','data add successfaly');
}elseif($p!="" & $request['quantite']<100 & $request['quantite']>0){
    $p = DB::update("UPDATE  paniers SET quantite='$qtt' WHERE client='$ppss' AND reference='$ref'");
    return back()->with('success','data add successfaly');
}  
return back()->with('error','!!!!'); 



    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {    
        $username= $request['name'];
        $userphone= $request['phone'];
        $ville=$request['ville'];
        $adresse= $request['adresse'];    
        $pp=Session::get('userpanier');
        $userpanier= rand(10,10000);
        $ppss=$userpanier.'-'.$pp;
        $table='<table class="table table-sm table-bordered bg-light">';
        $client= "<tr><td>الاسم الكامل </td><td>".$username."</td></tr><tr><td>الهاتف </td><td>"
                 .$userphone."</td></tr><tr><td>المدينة</td><td>"
                 .$ville."</td></tr><tr><td>العنوان</td><td>".$adresse."</td></tr></table>";
         $prixtotal=0;
         $imprimante='<table class="table table-sm table-bordered"><tr><th>رقم المنتوج</th><th>المنتوج</th><th>ثمن الوحدة</th><th>الكمية</th><th>الثمن الكلي</th></tr>';
         $client=$table.$client;
         $commande="";
        $produits= DB::select("SELECT *  FROM paniers WHERE client='$pp'");
        if($produits !=""){
        foreach($produits as $row):
        $imprimante=$imprimante." <tr><td> ".$row->reference."</td><td>".$row->produit."</td><td>".$row->prix
                    ."</td><td>".$row->quantite."</td><td>".$row->quantite*$row->prix."</td></tr>" ;
        $commande=$commande.$row->produit." x".$row->quantite." "." ".$row->quantite*$row->prix." <br>" ;

        $prixtotal=$prixtotal+$row->quantite*$row->prix;
        endforeach;
        $imprimante=$imprimante."</table>";
        DB::insert("INSERT INTO  commande(client,matricule,commande,imprimante,prixtotal,status)
        VALUES ( '$client','$ppss','$commande' ,'$imprimante',$prixtotal,'<div style=\"color: blue;\">في طور الانتضار...</div>')");
        DB::insert("INSERT INTO  statistique(cmd,reference,produit,qtte,etat)
       
        SELECT client,reference,produit,quantite,matricule FROM paniers WHERE client='$pp'");
        DB::update("UPDATE statistique SET cmd='$ppss' where cmd='$pp'");
              }else{
                return back()->with('error','!!!!'); }

         

        DB::delete("DELETE  FROM paniers WHERE client='$pp'");
       
        return back()->with('successfuly','!!!!'); }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produits $cr)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=$request['panier-id'];
    
  if($request['panier-qtt']<100 & $request['panier-qtt']>0){
        $panier=paniers::find($id);
        $panier->update([
           'quantite'=>$request['panier-qtt'],]);
           return back()->with('successqtt','successfaly'); 
        }
        return back()->with('error','successfaly'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request['id'];
        paniers::find($id)->delete();
        return back()->with('delite','data delite successfaly');
    }
   

    public function search(Request $request)
    {
        $tstuser=Session::get('userpanier');
        if($tstuser==''){
        
            $MAC = exec('getmac');
            $MAC = strtok($MAC,' ');        
            Session::put('userpanier',$MAC);   
   
   };
$id=$request['id'] ;
$ppss=Session::get('userpanier');
$s=DB::select("SELECT *  FROM produits WHERE id='$id'");
$p = DB::select("SELECT * FROM paniers WHERE client='$ppss'");
$produits=produits::all();
$page=$request['page'];
if(!$page){$page=1;}
session()->flash('id','$page');
return view('produits.products',compact('s','p','produits'))->with('child',$page);;
    }
}
