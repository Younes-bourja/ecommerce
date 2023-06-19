@extends('layouts.master3')
@section('title')
المتجر
@stop

@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">صفحة المنتوجات المعروضة في المتجر  </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> </span>
						</div>
					</div>
				
						
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!--div-->
			
				<div class="col-xl-12" >
				
						<div class="card">
							<div class="card-header pb-0">
							
								

								
							</div>
							<div class="card-body">
								<div class="table">
								<table class="table card-table table-striped table-vcenter text-nowrap mb-0" id="example1">
										<thead>
											<tr>
                                            <th class=""  >صاحب المنتوج</th>
											<th class=" "  >رقم المنتوج</th>                                           
                                            <th class="" style="width: 70px;" > الصورة</th>
                                            <th class=""  >المنتوج</th>
										    <th class="" >الفئة </th>
                                            <th class="" > الوصف</th>
                                            <th class="" > الثمن</th>
                                            <th class="">Operations</th>
											</tr>
										</thead>
										<tbody>
                                          @foreach($p as $st)
											<tr>
											<td>{{$st->fournisseur}}</td>
											<td>{{$st->reference}}</td>
											<td>
											<img alt="avatar" class="rounded-circle avatar-md mr-2" src="{{URL::asset('assets/img/images/')}}/{{$st->photo}}">
											</td>
											<td>{{$st->produit}}</td>
											<td>{{$st->famille}}</td>
											
											
                                            <td >

											<a class="modal-effect " data-effect="effect-rotate-bottom"
												data-produit_name="{{$st->produit}}" data-prix="{{$st->pv}}"
												 data-image1="{{$st->photo}}" data-category="{{$st->famille}}"
												data-image2="{{$st->image1}}" data-image3="{{$st->image2}}" data-image4="{{$st->image3}}"
												data-description="{{$st->description}}"
												 data-toggle="modal" href="#modaldemo8"  type="submit"  >
                    <svg class="btn btn-outline-info btn-sm dropdown-toggle text-center " 
                    style="height:25px;border-radius: 3rem;"
xmlns="http://www.w3.org/2000/svg" width="60" height="40" fill="currentColor" class="bi bi-eye mb-2" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>	 </a>
       
                                        </td>
										
											<td>{{$st->pv}}</td>
											<td class="text-center">
											
													<a href="#edite" class="btn btn-sm btn-info"
												 class="modal-effect "  data-effect="effect-scale" 
												  data-toggle="modal" data-id="{{$st->id}}"
												  data-produit="{{$st->produit}}"
												  data-prix="{{$st->pv}}" data-m1="{{$st->photo}}"
												  >
														<i class="las la-pen"></i>
													</a>
													<a href="#delite" class="btn btn-sm btn-danger"
													class="modal-effect "  data-effect="effect-scale" 
												 data-toggle="modal" data-produit="{{$st->produit}}" 
												 data-id="{{$st->id}}" data-m1="{{$st->photo}}"
												 data-m2="{{$st->image1}}" data-m3="{{$st->image2}}"
												 data-m4="{{$st->image3}}" data-ref="{{$st->reference}}">
														<i class="las la-trash"></i>
													</a>
											</td>
                                            
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/modal-edite-->
					
					<div class="modal  fade" id="edite">
			         <div class="modal-dialog modal-dialog-centered" role="document">
				         <div class="modal-content  modal-sm ">
				            <div class="row">

                         <div class="col-md-12 ">
                           <form action="edit-prix" method="post">
						   {{method_field('GET')}}						
	                        {{csrf_field()}}
                        
	                        <div class="card custom-card text-center">
	                        <a aria-label="Close" class="close mt-2" data-dismiss="modal" type="button" style="position: absolute;left: 5px;">
	                        <span aria-hidden="true">&times;</span></a>
	                        	<div  id="m-image"></div>
		                        <textarea id="m-id" name="m-id" hidden ></textarea>

		                        <div class="card-body">
			                 <div class="card-text">
			                 <h4 class="card-title" ><span id="m-produit" name="m-produit"></span></h4>
			                 <h4 >  السعر الحالي: <strong class="mr-2"><span id="m-prix" name="m-prix" ></span></strong></h4>
			                 <div class="input-group-prepend text-center">
                               <span class="input-group-text" id="basic-addon1"> السعر الجديد: </span>
                             </div>
                             <input type="number" class="form-control text-center"  min="1"  id="nv-prix" name="nv-prix" >
		                     </div>
              		      </div>
              		    </div>
						  <div class="modal-footer " style="direction: ltr">						
				        <button class="btn ripple btn-secondary-gradient w-50" data-dismiss="modal" type="button">الغاء</button>
						<button class="btn ripple btn-info-gradient  w-50" type="submit">تاكيد<i class="fe fe-check text-white"></i></button>
					</div></form>
              				</div>
              			</div>
              		</div>
					  </div>
              		</div>

		<!--/modal-delite-->

		<div class="modal fade" id="delite">
			<div class="modal-dialog modal-dialog-centered  " role="document">
			   <div class="modal-content modal-md">
		            <div class="row">
					<form action="gestion-produits/destroy" method="post">
					<div class="col-md-12 ">
						{{method_field('DELETE')}}						
						{{csrf_field()}}

						<div class="card custom-card text-center">
						<a aria-label="Close" class="close mt-2" data-dismiss="modal" type="button" style="position: absolute;left: 5px;">
						<span aria-hidden="true">&times;</span></a>
							<div  id="d-image"></div>
							
							<div class="card-body">
							 	<div class="card-text">
								 <h4 class="card-title" ><span id="d-produit-name" name="produit-name"></span></h4>
								 <textarea id="d-img1" name="img1" hidden ></textarea>
								 <textarea id="d-img2" name="img2" hidden ></textarea>
								 <textarea id="d-img3" name="img3" hidden ></textarea>	
								 <textarea id="d-img4" name="img4" hidden  ></textarea>	
								 <textarea id="pname" name="pname" hidden  ></textarea>	 
								 <textarea id="ref" name="ref" hidden  ></textarea>							
								 <textarea id="id-delite" name="id-delite" hidden  ></textarea>							
						
								  <div class="input-group mb-3  ">
                                    <div class="input-group-prepend text-center">
                                    <h4 > رقم المنتوج: <strong class="mr-2"><span id="d-ref" name="d-ref" ></span></strong></h4>
                                    </div>
                                  </div>   	
                                </div>
				          	</div>
				          </div>

						
							<div class="modal-footer " style="direction: ltr">						
				        <button class="btn ripple btn-secondary-gradient  w-50" data-dismiss="modal" type="button">الغاء</button>
						<button class="btn ripple btn-danger-gradient w-50" type="submit">تاكيد<i class="fe fe-trash text-white ml-2"></i></button>
					</div>	</div>
					</form>
				</div>
					
					
			</div>
		</div>
	</div>

		<div class="modal " id="modaldemo8">
			<div class="modal-dialog-lg modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo w-100">
					<div class="modal-body">
						<button style="position: absolute;top: 8px;left: 8px;" aria-label="Close" class="close " data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body h-100">
								<div class="row row-sm ">
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
										  <div class="tab-pane active" id="img1"></div>
										  <div class="tab-pane" id="img2"></div>
										  <div class="tab-pane" id="img3"></div>
										  <div class="tab-pane" id="img4"></div>
										<ul class="preview-thumbnail nav nav-tabs">
										  <li class="active"><a data-target="#img1" id="img-1" data-toggle="tab"></a></li>
										  <li><a data-target="#img2" data-toggle="tab" id="img-2" ></a></li>
										  <li><a data-target="#img3" data-toggle="tab" id="img-3"></a></li>
										  <li  class="mr-3"><a data-target="#img4" data-toggle="tab" id="img-4"></a></li>
										</ul>
									</div></div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
										<h4 class="product-title mb-1">
											<div   name="produit-name" id="produit-name" readonly class="w-100 border-0 shadow-none"></div>
										</h4>
										<div class="text-muted tx-13 mb-1"  name="category" id="category"></div>
										<div class="rating mb-1">
										
										
										<h4 class="price" style="font-size: 16;"><span class="h3 ml-2" >الثمن:
										<span type="text" id="produit-prix" name="produit-prix" readonly class="w-10 border-0 shadow-none"></span>
										</span>
										@if(Session::has('coin'))  {{Session::get('coin')}}@endif</h4>
										<h2>الوصف:</h2>
										<div class="product-description h-100 w-100 border-0 shadow-none" id="description" name="description"  readonly></div>
									
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				</div>
			</div>
		</div>
		</div></div>
@endsection
@section('js')

<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>
	
$('#modaldemo8').on('show.bs.modal',function(event){
	
var button=$(event.relatedTarget)
var produit_name=button.data('produit_name')
var prix=button.data('prix')
var description=button.data('description')
var image1=button.data('image1')
var image2=button.data('image2')
var image3=button.data('image3')
var image4=button.data('image4')
var category=button.data('category')

var modal=$(this)

document.getElementById("description").innerHTML = description;
document.getElementById("produit-name").innerHTML = produit_name;
document.getElementById("produit-prix").innerHTML = prix;
document.getElementById("category").innerHTML = category;
var img1='<img src="{{URL::asset("assets/img/images")}}/'+image1+'">';
var img2='<img src="{{URL::asset("assets/img/images")}}/'+image2+'">';
var img3='<img src="{{URL::asset("assets/img/images")}}/'+image3+'">';
var img4='<img src="{{URL::asset("assets/img/images")}}/'+image4+'">';

if(image1!=""){document.getElementById("img-1").innerHTML = img1;
	document.getElementById("img1").innerHTML = img1;
}
else{document.getElementById("img-1").innerHTML = "";
	document.getElementById("img1").innerHTML = "";}
if(image2!=""){document.getElementById("img-2").innerHTML = img2;
	document.getElementById("img2").innerHTML = img2;
}
else{document.getElementById("img-2").innerHTML = "";
	document.getElementById("img2").innerHTML = "";
}
if(image3!=""){document.getElementById("img-3").innerHTML = img3;
	document.getElementById("img3").innerHTML = img3;
}
else{document.getElementById("img-3").innerHTML = "";
	document.getElementById("img3").innerHTML = "";
}
if(image4!=""){document.getElementById("img-4").innerHTML = img4;
	document.getElementById("img4").innerHTML = img4;
}
else{document.getElementById("img-4").innerHTML = "";
	document.getElementById("img4").innerHTML = "";
}
document.getElementById("img-1").click();
});	

$('#delite').on('show.bs.modal',function(event){

var button=$(event.relatedTarget)
var produit=button.data('produit')
var id=button.data('id')
var reference=button.data('ref')
var image1=button.data('m1')
var image2=button.data('m2')
var image3=button.data('m3')
var image4=button.data('m4')

var modal=$(this)
var img1='<img src="{{URL::asset("assets/img/images")}}/'+image1+'">';

document.getElementById("d-image").innerHTML = img1;
document.getElementById("d-img1").innerHTML = image1;
document.getElementById("d-img2").innerHTML = image2;
document.getElementById("d-img3").innerHTML = image3;
document.getElementById("d-img4").innerHTML = image4;
document.getElementById("id-delite").innerHTML = id;
document.getElementById("d-produit-name").innerHTML = produit;
document.getElementById("d-ref").innerHTML = reference;
document.getElementById("pname").innerHTML = produit;
document.getElementById("ref").innerHTML = reference;

});	

$('#edite').on('show.bs.modal',function(event){

var button=$(event.relatedTarget)
var id=button.data('id')
var m1=button.data('m1')
var prix=button.data('prix')
var produit=button.data('produit')
var modal=$(this)
var img1='<img src="{{URL::asset("assets/img/images")}}/'+m1+'">';
document.getElementById("m-image").innerHTML = img1;
document.getElementById("m-produit").innerHTML = produit;
document.getElementById("m-prix").innerHTML = prix;
document.getElementById("m-id").innerHTML = id;
document.getElementById("nv-prix").value =prix;

});
</script>
@if(session()->has('add'))
<script>
	notif({
		msg: "<b>تمت اضافة منتوج جديد بنجاح</b>",
		type: "success"
	});
	
</script>
@endif
@if(Session::has('delite'))
<script>
	notif({
		msg: "<b>تم حدف  المنتوج</b>",
		type: "warning"
	});
	
</script>
@endif
@if(Session::has('success'))
<script>
	notif({
		msg: "<b>تمت العملية بنجاح</b>",
		type: "success"
	});</script>
@endif

@endsection