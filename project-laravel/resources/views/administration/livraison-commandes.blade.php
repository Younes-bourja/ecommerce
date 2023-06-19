@extends('layouts.master3')
@section('title')
قسم الطلبيات
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
							<h4 class="content-title mb-0 my-auto">صفحة الطلبيات  المستعدة للإستلام </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> </span>
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
								<table class="table table table-hover  text-md-nowrap" id="example1">
										<thead>
											<tr>
											<th class=" "  >رقم الطلب</th>
                                            <th class=""  >صاحب الطلب</th>
                                            <th class=""  >الطلب</th>
										    <th class="" >المبلغ الاجمالي</th>
                                            <th class="" > الحالة</th>
                                            <th class="" >تاريخ الطلب</th>
                                            <th class="" >تاريخ العملية</th>
                                            <th class="">Operations</th>
											<th class="">Imprimer</th>
											</tr>
										</thead>
										<tbody>
                                            <?php $t=0;?>
											@foreach($tcc as $st)
                                            <?php $t=$t+1;?>
											<tr>
											<td>CMD-{{$st->id}}</td>
                                            <td >

                <a  href="#client<?php echo $t;?>" class="modal-effect " data-effect="effect-scale" 
                    data-toggle="modal" >
                    <svg class="btn btn-outline-info btn-sm dropdown-toggle text-center " 
                    style="height:25px;border-radius: 3rem;"
xmlns="http://www.w3.org/2000/svg" width="60" height="40" fill="currentColor" class="bi bi-eye mb-2" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg>	 </a>
                     <div class="modal fade" id="client<?php echo $t;?>">
			<div class="modal-dialog modal-dialog-centered " role="document">
			<div class="modal-content modal-lg center ">
            <div class="modal-header  bg-secondary-gradient">
			<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body  bg-light-gradient">
            <?php echo $st->client; ?>
			</div></div>
		</div></div>
                                        </td>
										<td >
                <a  href="#commande<?php echo $t;?>" class="modal-effect " data-effect="effect-scale" 
                    data-toggle="modal" >
                    <svg class="btn btn-outline-info btn-sm dropdown-toggle text-center " 
                    style="height:25px;border-radius: 3rem;"
xmlns="http://www.w3.org/2000/svg" width="60" height="40" fill="currentColor" class="bi bi-eye mb-2" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
</svg></a>

                    
<div class="modal fade "  id="commande<?php echo $t;?>">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
			<div class="modal-content modal-lg center">
            <div class="modal-header  bg-secondary-gradient">
			<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body  bg-light-gradient">  <?php echo $st->imprimante; ?>
            <h4 align=center><?php echo " الثمن الاجمالي : ".$st->prixtotal; ?>
			@if(Session::has('coin'))  {{Session::get('coin')}}@endif</h4>
		
			</div></div>
		</div></div>
                                            </td>
											<td>{{$st->prixtotal}}</td>
											<td  >
											<span class="badge bg-warning-transparent text-warning mr-auto ">
											<?php echo $st->status ;?>...</span>	
                                             </td>
                                            <td  style="direction: ltr">{{$st->datecommande}}</td>
                                            <td  style="direction: ltr">{{$st->date}}</td>

											<td class="text-center">
												<a  href="#accept"  class=" btn btn-sm btn-success"
												class="modal-effect "  data-effect="effect-scale" 
												data-toggle="modal" data-id="{{$st->id}}">
												<i class="fe fe-check text-white"></i>
												</a>
												
											    <a href="#refuse" class="btn btn-sm btn-danger mr-2"
												 class="modal-effect "  data-effect="effect-scale" 
												 data-toggle="modal" data-id="{{$st->id}}">
														<i class="fe fe-x text-white "></i>
												</a>
											</td>
                                            <td class="text-center">
                                                <a href="#imprimer"  class="btn btn-primary  btn-sm "
                                                 class="modal-effect "
                                                 data-effect="effect-scale" 
                                                 data-toggle="modal"
                                                 data-total="{{$st->prixtotal}}"
												 data-ref="{{$st->id}}" 
												 data-date="{{$st->date}}" 
                                                data-client="{{ $st->client }}" 
                                                data-commande=" {{ $st->imprimante}}">
										<i class="mdi mdi-printer "></i>
									</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/modal-->
					
		<div class="modal  effect-scale show" id="accept">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo ">
					<div class="modal-header ">
						<h6 class="modal-title">قبول الطلب</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<form action="livraison-commandes/update" method="post">
						{{method_field('PUT')}}						
						{{csrf_field()}}
					<div class="modal-body">
					
							تاكيد قبول الطلب رقم : 
							<strong class="mr-2">CMD-<span id="accept-id" name="accept-id"></span></strong>				
										
							<textarea id="id" name="id" hidden ></textarea>	

						</div>
					<div class="modal-footer " style="direction: ltr">						
				        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">خروج</button>
						<button class="btn ripple btn-success " type="submit">تاكيد</button>
					</div></form>
				</div>
			</div>
		</div>

		<!--/modal-edite-->
		<div class="modal effect-fall show" id="refuse">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">رفض الطلب</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form action="livraison-commandes/update" method="post">
						{{method_field('PUT')}}						
						{{csrf_field()}}
						تاكيد رفض الطلب رقم : <strong class="mr-2">CMD-<span id="refuse-id" name="refuse-id"></span></strong>				
						<textarea id="idrefuse" name="idrefuse" hidden ></textarea>	

						</div>
						<div class="modal-footer " style="direction: ltr">						
				        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">خروج</button>
						<button class="btn ripple btn-danger " type="submit">تاكيد</button>
					</div></form>
				</div>
			</div>
		</div>
        <div class="modal effect " id="imprimer"  >
			<div class="modal-dialog modal-dialog-centered " role="document">
				<div class="modal-content modal-content-demo modal-lg">
					<div class="modal-body modal-lg "  id="print">
					
					<div class="col-2 float-right"   >
						
						<img src="{{URL::asset('assets/img/brand/logo.png')}}"  class="sign-favicon ht-100"  alt="logo">
						<h3 class="main-logo1 text-center   tx-24">Bouyou<span>Sho</span>p</h3>
							</div>
					<br><br><br><br>
                        <div class="col-6"   id="client" ></div>
						<div class="input-group mb-3">
    <div class="input-group-prepend mr-3 ml-3"><span>   رقم الطلبية   : </span> </div>
  
  <div  id="ref" ></div>-CMD</div>
                        <div class="col-12" id="commande"></div>
                        <div class="col-12" id="total"></div>
						<div class="input-group mb-3  ">
  <div class="input-group-prepend mr-3 ml-3">
    <span>   بتاريخ   :  </span>
  </div>
  <div style="direction: ltr;" id="date" ></div>
</div>                       </div>
                  
				     <button class="btn ripple btn-info btn-block tx-18"  type="button">
                     <i class="mdi mdi-printer "></i>
                     </button>
				</div>
			</div>
		</div>


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
$('#accept').on('show.bs.modal',function(event){

var button=$(event.relatedTarget)
var id=button.data('id')
var modal=$(this)
document.getElementById("accept-id").innerHTML = id;
document.getElementById("id").innerHTML = id;
});
$('#refuse').on('show.bs.modal',function(event){

var button=$(event.relatedTarget)
var id=button.data('id')
var modal=$(this)
document.getElementById("refuse-id").innerHTML = id;
document.getElementById("idrefuse").innerHTML = id;


});

$('#imprimer').on('show.bs.modal',function(event){

var button=$(event.relatedTarget)
var ref=button.data('ref')
var client=button.data('client')
var commande=button.data('commande')
var total=button.data('total')
var date=button.data('date')

var modal=$(this)
document.getElementById("ref").innerHTML =ref;
document.getElementById("date").innerHTML =date;
document.getElementById("client").innerHTML = client;
document.getElementById("commande").innerHTML = commande;
document.getElementById("total").innerHTML = "<table  class='table table-bordered mb-2'><tr><td>المبلغ الاجملي :</td><td class='text-center'> "+total+" @if(Session::has('coin'))  {{Session::get('coin')}}@endif </td></tr></table>";
var p = document.getElementById("print").innerHTML;
document.body.innerHTML=p;
 
 print();
  location.reload();

});
 
</script>
@if(Session::has('success'))
<script>
	notif({
		msg: "<b>تمت العملية بنجاح</b>",
		type: "success"
	});</script>
@endif
@endsection