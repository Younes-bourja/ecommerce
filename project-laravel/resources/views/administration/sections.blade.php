@extends('layouts.master3')
@section('title')
قسم  الفئات
@stop

@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">صفحة الاعدادات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> </span>
						</div>
					</div>
				
						
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!--div-->
				
				<div class="col-xl-12" >
				@if ($errors->any())
				<div class="alert alert-danger mg-b-0" role="alert">
											<button aria-label="Close" class="close" data-dismiss="alert" type="button">
												<span aria-hidden="true">&times;</span>
											</button>
											@foreach ($errors->all() as $message)
											<li>{{$message}}</li>
											@endforeach
										</div>


                @endif
			
				@if(session()->has('add'))
								<div class="alert alert-success mg-b-0" role="alert">
											<button aria-label="Close" class="close" data-dismiss="alert" type="button">
												<span aria-hidden="true">&times;</span>
											</button>
											<strong>{{session()->get('add')}}</strong>
										</div>
								@endif
								@if(session()->has('error'))
								<div class="alert alert-danger mg-b-0" role="alert">
											<button aria-label="Close" class="close" data-dismiss="alert" type="button">
												<span aria-hidden="true">&times;</span>
											</button>
											<strong>{{session()->get('error')}}</strong> 
										
										</div>
								@endif
						<div class="card">
							<div class="card-header pb-0">
								
								<div class="d-flex justify-content-between">
								
									<a class="modal-effect btn btn-success"   data-effect="effect-scale" data-toggle="modal" href="#add">
										اضافة فئة جديدة</a>
								</div>
								

								
							</div>
							<div class="card-body">
								<div class="table">
								<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
											
												<th >نوع الفئة</th>
												<th >الفئة</th>
												<th class="text-center">Operations</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach($c as $st)
											<tr>
											
											<td >{{$st['categorie']}}</td>
											<td>{{$st->valeur}}</td>
											<td class="text-center">
												<a  data-id="{{$st->id}}" 
												 data-valeur="{{$st->valeur}}"  data-categorie='{{$st->categorie}}'
											 href="#delite" data-effect="effect-scale" data-toggle="modal" class="modal-effect btn btn-sm btn-danger">
														<i class="las la-trash"></i>
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
					
		<div class="modal  effect-scale show" id="add">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title" >اضافة فئة جديدة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form action="{{route('section.store')}}" method="post">
						{{csrf_field()}}
				
											<div class="form-group">
												نوع الفئة :
												<select  class="SlectBox form-control" name="categorie" required>
										<option></option>
										<option>العملة</option>
										<option>المنتوج</option>
												</select>
											</div>
											<div class="form-group">
												اسم الفئة:
                                                <input  class="form-control" name="valeur"  type="text" >									
									       </div>
										
							
						</div>
					<div class="modal-footer " style="direction: ltr;">					
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
						<button class="btn ripple btn-primary" type="submit"> اضافة</button>
					</div></form>
				</div>
			</div>
		</div>

		<!--/modal- delite-->
		<div class="modal effect-slide-in-bottom show" id="delite">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">حدف الفئة </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form action="section/destroy" method="post">
						{{method_field('DELETE')}}						
						{{csrf_field()}}
						<div class="form-group">
												<input class="form-control" id="delite-id"  name="delite-id" type="hidden">
											</div>
											<div class="form-group">
												النوع :
												<div class="form-control" id="categorie"  name="section-name-edite" type="text" readonly>
											</div></div>
											الفئة:
											<div class="form-group">
												<div class="form-control" id="valeur"  name="section-name-edite" type="text" readonly>
											</div></div>
											
						</div>
						<div class="modal-footer " style="direction: ltr;">					
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
						<button class="btn ripple btn-danger" type="submit">حدف</button>
					</div></form>
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
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>

$('#delite').on('show.bs.modal',function(event){

var button=$(event.relatedTarget)
var id=button.data('id')
var categorie=button.data('categorie')
var valeur=button.data('valeur')

var modal=$(this)
modal.find('.modal-body #delite-id').val(id)
document.getElementById("valeur").innerHTML = valeur;
document.getElementById("categorie").innerHTML = categorie;

});
</script>
@endsection