@extends('layouts.master2')
@section('title')
 صفحة المنتوجات
@stop
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
<link href="{{URL::asset('assets/plugins/treeview/treeview.css')}}" rel="stylesheet" type="text/css" />

@endsection


@section('page-header')

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
			
							<h4 class="content-title mb-0 mr-1 my-auto">صفحة المنتوجات</h4>
							<span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>


							<?php

							if(isset($child)):  ?>
					<a class="btn btn-indigo btn-rounded" href="/?page=<?php echo $child;  ?>" style="position: absolute;left: 10px;top: 75px;" onclick="history.back(1)" >
					الرجوع  -> 
							</a>
							<?php else:  ?>
								<div class="row row-md mg-b-20" style="position: absolute;left: 14px;top: 75px;">
									<div class="col-md-12 input-group-prepend">
										<select class="form-control select2-no-search tx-22"  name="genre" id="genre" >
										
											@if(Session::has('categorie'))
											
											@if(Session::get('categorie')=='')
											<option  >جميع الفئات</option>
											@else

											<option > 	{{Session::get('categorie')}}</option>
													 <option  >جميع الفئات</option>	
											@endif	
												
												
												
											@else
											<option  >جميع الفئات</option>	
											@endif
											
											@foreach($categories as $categorie) 
	                                       <option  >  {{$categorie->valeur}} </option>
                                            @endforeach
										</select>
										
									<button  onclick="genre();"  style="border-radius: 3px 0px 0px 3px;height: 38px;"
									class=" btn btn-secondary-gradient mt-0 shadow-none">
										<i class="fa fa-search " ></i></button>
									</div>
									</div>
					<?php endif;  ?>
				     </div>

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row row-sm" style=" z-index: -1;">
				
					<div class="col-md-12">
				
						<div class="row row-sm" >
						@foreach($s as $st)
							<div class="col-md-6 col-lg-4 col-xl-3">
								<div class="card ">
									<div class="card-body">
										<div class="pro-img-box">
											<div class="d-flex product-sale">
											</div>
											<img style="direction: ltr;"  class="w-100" src="{{URL::asset('assets/img/images/')}}/{{$st->photo}}" alt="{{$st->photo}}">
											<a  href="#panier" class="modal-effect adtocart  " data-effect="effect-scale" data-toggle="modal"
											data-produit_ref="{{$st->reference}}"	data-produit_names="{{$st->produit}}"
											 data-image="{{$st->photo}}" data-prix="{{$st->pv}}" >
											 <i class="las la-shopping-cart "></i>
											</a>
											
										</div>
										<div class="d-flex  mt-2">
										

												<a class="modal-effect btn btn-sm text-white btn-rounded  bg-pink " data-effect="effect-rotate-bottom"
												data-produit_name="{{$st->produit}}" data-prix="{{$st->pv}}"
												 data-image1="{{$st->photo}}" data-category="{{$st->famille}}"
												data-image2="{{$st->image1}}" data-image3="{{$st->image2}}" data-image4="{{$st->image3}}"
												data-description="{{$st->description}}"
												 data-toggle="modal" href="#modaldemo8"  type="submit" style="font-size: 13px;">المواصفات</a>
									
											</div>
										<div class="text-center pt-3">
											
											<h3  class="h6 mb-2 mt-4 font-weight-bold text-uppercase ">{{$st->produit}}</h3>
											
											<h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger tx-20">{{$st->pv}} 
												<span class="text-secondary font-weight-normal tx-13  ml-1 prev-price"> {{$st->pv+($st->pv*0.20)}}  </span>
												<span class="text-secondary font-weight-normal tx-14 ml-1 ">@if(Session::has('coin'))  {{Session::get('coin')}}@endif</span>
											</h4>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						
						</div>
						

							<ul class="pagination product-pagination mr-auto" style="justify-content: center;">
							<?php if(isset($child)):  ?>
								<?php else :  ?>	
							{{ $s->onEachSide(2)->links() }}
							<?php endif;  ?>
							</ul>
						</div>
					</div>
				
				<!-- row closed -->

			</div>
			<!-- Container closed -->
		<div class="container-fluid">
		<div class="card">
							<div class="card-body"><br>
		<div class="row row-sm ">
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12 h-100">
						<div class="card ">
							<div class="card-body ">
								<div class="feature2">
									<i class="mdi mdi-airplane-takeoff bg-purple ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<h5 class="mb-2 tx-16">التوصيل بالمجان</h5>
								<span class="fs-14 text-muted">
								 يتم توصيل جميع المنتوجات بالمجان الى عنوان الزبون	بعد التأكد من صحة المعلومات عند الطلب		
												</span>
							</div>
							<br><br>
						</div>
					</div>
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12 h-100">
						<div class="card">
							<div class="card-body  h-100">
								<div class="feature2">
								<i class="mdi mdi-refresh bg-teal ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<h5 class="mb-2 tx-16">الدفع عند الاستلام</h5>
								<span class="fs-14 text-muted">
								 جميع المقتنيات في المتجر هنا يتم الدفع عند استلام الطلبية</span>
							</div>
							<br><br>
						</div>
					</div>
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12 h-100">
						<div class="card">
							<div class="card-body  h-100">
								<div class="feature2">
								<i class="mdi mdi-headset bg-pink  ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<div class="icon-return"></div>
								<h5 class="mb-2  tx-16">خدمة الزبناء</h5>
								<span class="fs-14 text-muted">
								نحن عند خدمه الزبناء للاستفسار او طلب المعلومات	 يرجى مراسلتنا عبر :
							</span>
							<section class="">


      <!-- Google -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #dd4b39;border-radius: 25%;"
        href="mailto: bouyoushopping@gmail.com"
        target="_blank" rel="noopener noreferrer"
        role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- whatsapp -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: green;border-radius: 25%;"
        href="https://wa.me/212656562036/?text=Hi Bouyoushop, Whatsup"
        target="_blank" rel="noopener noreferrer"
        role="button"
        ><i class="fab fa-whatsapp"></i
      ></a>

    </section>
							</div>
						</div>
					</div>
				</div>
		</div>
		</div>
		</div>

		<!-- main-content closed -->
			<!-- Modal effects -->
			
			<!-- Container closed -->
				</div>
					
				</div>
			</div>
		</div>
	<!--  Modal effects-->
	<div class="modal " id="modaldemo8">
			<div class="modal-dialog-lg modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo w-100">
		
					<div class="">
					
					<div class="row row-sm">
					
					<div class="col-xl-12">
				
						<div class="card ">
							<div class="">
							<button aria-label="Close" style="left: 0;position: absolute;z-index: 1;" class="close btn btn-info btn-lg   text-primary float-left" data-dismiss="modal" type="button" >
						<span aria-hidden="true"  class=" tx-90 ">&times;</span></button>
						<br>
								<div class="row row-sm " >
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
										  <div class="tab-pane active" id="img1"></div>
										  <div class="tab-pane" id="img2"></div>
										  <div class="tab-pane" id="img3"></div>
										  <div class="tab-pane" id="img4"></div>
										<ul class="preview-thumbnail nav nav-tabs ">
										  <li class="active mr-0"><a data-target="#img1" id="img-1" data-toggle="tab"></a></li>
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
									
										
										<h6 class="price" style="font-size: 16;"><span class="h3 ml-2" >الثمن:
										<span type="text" id="produit-prix" name="produit-prix" readonly class="w-10 border-0 shadow-none"></span>
										@if(Session::has('coin'))  {{Session::get('coin')}}@endif
										</span></h6>
										<h2>الوصف:</h2>
										<div class="product-description h-100 w-100 border-0 tx-16 shadow-none" id="description" name="description"  readonly></div>
									
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->


				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12 h-100">
						<div class="card">
							<div class="card-body ">
								<div class="feature2">
									<i class="mdi mdi-airplane-takeoff bg-purple ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<h5 class="mb-2 tx-16">التوصيل بالمجان</h5>
								<span class="fs-14 text-muted">
								 يتم توصيل جميع المنتوجات بالمجان الى عنوان الزبون	بعد التأكد من صحة المعلومات عند الطلب		
												</span>
							</div>
							<br><br>
						</div>
					</div>
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12 h-100">
						<div class="card">
							<div class="card-body  h-100">
								<div class="feature2">
								<i class="mdi mdi-refresh bg-teal ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<h5 class="mb-2 tx-16">الدفع عند الاستلام</h5>
								<span class="fs-14 text-muted">
								 جميع المقتنيات في المتجر هنا يتم الدفع عند استلام الطلبية</span>
							</div>
							<br><br>
						</div>
					</div>
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12 h-100">
						<div class="card">
							<div class="card-body  h-100">
								<div class="feature2">
								<i class="mdi mdi-headset bg-pink  ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<div class="icon-return"></div>
								<h5 class="mb-2  tx-16">خدمة الزبناء</h5>
								<span class="fs-14 text-muted">
								نحن عند خدمه الزبناء للاستفسار او طلب المعلومات	 يرجى مراسلتنا عبر :
							</span>
							<section class="">


      <!-- Google -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #dd4b39;border-radius: 25%;"
        href="mailto: bouyoushopping@gmail.com"
        target="_blank" rel="noopener noreferrer"
        role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- whatsapp -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: green;border-radius: 25%;"
        href="https://wa.me/212656562036/?text=Hi Bouyoushop, Whatsup"
        target="_blank" rel="noopener noreferrer"
        role="button"
        ><i class="fab fa-whatsapp"></i
      ></a>

    </section>
							</div>
						</div>
					</div>
				</div>
		
				</div>
				</div>
			</div>
		</div>

		<!-- End Modal effects-->
		<div class="modal fade" id="panier">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content modal-md center">
		<div class="row">

					<div class="col-md-12 ">
					<form action="{{route('produit.store')}}" method="post">
					{{csrf_field()}}

						<div class="card custom-card text-center">
						<a aria-label="Close" class="close mt-2" data-dismiss="modal" type="button" style="position: absolute;left: 5px;">
						<span aria-hidden="true">&times;</span></a>
							<div  id="image"></div>
							
							<div class="card-body">
							 	<div class="card-text">
								 <h4 class="card-title" id="produit-names" name="produit-names"></h4>
								 <textarea id="p-name" name="p-name" hidden ></textarea>
								 <textarea id="produit-ref" name="reference" hidden ></textarea>
								 <textarea id="prix" name="prix" hidden ></textarea>	
								 <textarea id="img" name="img" hidden  ></textarea>							
						
								<div class="input-group mb-3  ">
  <div class="input-group-prepend text-center">
    <span class="input-group-text" id="basic-addon1">الكمية    : </span>
  </div>
  <input type="number" class="form-control text-center"  min="1" max="99" id="qtt" name="quantite"  value="1">
</div>   	
</div>
								<button class="btn btn-indigo btn-rounded btn-block" type="submit">
								<i class="fa fa-cart-plus icon-size text-white text-danger-shadow">
												اضف الى السلة
												</i>	 </button>
							</div>
						 </div>
					</form>
					</div>
					</div>
			</div>
		</div></div>

	
		<div class="modal fade" id="panier-qtt">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content modal-sm center">
		<div class="row">

					<div class="col-md-12 ">
					<form action="produit/update" method="post">
					{{method_field('PUT')}}						
						{{csrf_field()}}
						<div class="card custom-card text-center">
						<a aria-label="Close" class="close mt-2 " data-dismiss="modal" type="button" style="position: absolute;left: 5px;">
						<span aria-hidden="false">&times;</span> </a>
							<div  id="panier-image"></div>
							
							<div class="card-body">
							 	<div class="card-text">
								 <h4 class="card-title" id="panier-names" name="panier-names"></h4>
								 <textarea id="panier-name" name="panier-name" hidden ></textarea>
								 <textarea id="panier-ref" name="panier-ref" hidden ></textarea>
								 <textarea id="panier-id" name="panier-id" hidden ></textarea>	
						
								<div class="input-group mb-3  ">
  <div class="input-group-prepend text-center">
    <span class="input-group-text" id="basic-addon1">الكمية    : </span>
  </div>
  <input type="number" class="form-control text-center" min="1" max="100" id="p-qtt" name="panier-qtt"  >
</div>   	
</div>
								<button class="btn btn-indigo btn-rounded btn-block" type="submit">
								<i class="fa fa-cart-plus icon-size text-white text-danger-shadow">
												اضف الى السلة
												</i>	 </button>
							</div>
						 </div>
					</form>
					</div>
					</div>
			</div>
		</div></div>
	
@endsection


@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>

<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<!--Internal  Notify js -->
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script>
$('#modaldemo8').on('show.bs.modal',function(event){
	var img1=img2=img3=img4="";var image1=image2=image3=image4="";
var button=$(event.relatedTarget)
var produit_name=button.data('produit_name')
var prix=button.data('prix')
var description=button.data('description')
 image1=button.data('image1')
 image2=button.data('image2')
 image3=button.data('image3')
 image4=button.data('image4')
 category=button.data('category')

var modal=$(this)

document.getElementById("description").innerHTML = description;
document.getElementById("produit-name").innerHTML = produit_name;
document.getElementById("produit-prix").innerHTML = prix;
document.getElementById("category").innerHTML = category;
 img1='<img src="{{URL::asset("assets/img/images")}}/'+image1+'">';
 img2='<img src="{{URL::asset("assets/img/images")}}/'+image2+'">';
 img3='<img src="{{URL::asset("assets/img/images")}}/'+image3+'">';
 img4='<img src="{{URL::asset("assets/img/images")}}/'+image4+'">';

document.getElementById("img1").innerHTML = img1;
document.getElementById("img2").innerHTML = img2;
document.getElementById("img3").innerHTML = img3;
document.getElementById("img4").innerHTML = img4;
if(image1!=""){document.getElementById("img-1").innerHTML = img1;}
else{document.getElementById("img-1").innerHTML = "";}
if(image2!=""){document.getElementById("img-2").innerHTML = img2;}
else{document.getElementById("img-2").innerHTML = "";}
if(image3!=""){document.getElementById("img-3").innerHTML = img3;}
else{document.getElementById("img-3").innerHTML = "";}
if(image4!=""){document.getElementById("img-4").innerHTML = img4;}
else{document.getElementById("img-4").innerHTML = "";}
document.getElementById("img-1").click();

});
$('#panier').on('show.bs.modal',function(event){
	var button=$(event.relatedTarget)
var produit_name=button.data('produit_names')
var image=button.data('image')
var ref=button.data('produit_ref')
var prix=button.data('prix')
var modal=$(this)

var img1='<img    src="{{URL::asset("assets/img/images")}}/'+image+'">';

document.getElementById("image").innerHTML = img1;
document.getElementById("produit-names").innerHTML = produit_name;
document.getElementById("p-name").innerHTML = produit_name;
document.getElementById("produit-ref").innerHTML = ref;
document.getElementById("prix").innerHTML = prix;
document.getElementById("img").innerHTML = image;

});

$('#panier-qtt').on('show.bs.modal',function(event){
var button=$(event.relatedTarget)
var produit_name=button.data('produit_names')
var image=button.data('image')
var ref=button.data('produit_ref')
var id=button.data('id')
var qtt=button.data('qtt')
var modal=$(this)

var img1='<img    src="{{URL::asset("assets/img/images")}}/'+image+'">';

document.getElementById("panier-image").innerHTML = img1;
document.getElementById("panier-names").innerHTML = produit_name;
document.getElementById("panier-name").innerHTML = produit_name;
document.getElementById("panier-ref").innerHTML = ref;
document.getElementById("panier-id").innerHTML = id;
document.getElementById("p-qtt").value =qtt;

});
function genre(){
var genre=document.getElementById("genre").value;;
document.location.href="/?famille="+genre;

}
</script>
@if(Session::has('error'))
<script>
	notif({
		msg: "<b> الكمية مرفوضة !!!! </b>",
		type: "error"
	});
	</script>
@endif
@if(Session::has('delite'))
<script>
	  document.getElementById("sidebarpanier").click();
	  notif({
		msg: "<b>تم حدف المنتوج !!!     </b>",
		type: "warning"
	}); 
</script>
@endif
@if(Session::has('success'))
<script>
	notif({
		msg: "<b>تمت اضافة المنتوج الى السلة بنجاح</b>",
		type: "success"
	});</script>
@endif
@if(Session::has('successqtt'))
<script>
    document.getElementById("sidebarpanier").click();
	notif({
		msg: "<b>تمت  بنجاح</b>",
		type: "success"
	});</script>
@endif
@if(Session::has('successfuly'))
<script>
	notif({
		msg: '<i class="icon ion-ios-checkmark-circle-outline tx-100 tx-white lh-1 mg-t-20 d-inline-block"></i><h4 class="tx-white tx-semibold mg-b-20">تم ارسال الطلب بنجاح</h4><p class="mg-b-10 mg-x-10">سيتم التواصل معك قريبا</p>',
		type: "info"
	});</script>
@endif
@endsection