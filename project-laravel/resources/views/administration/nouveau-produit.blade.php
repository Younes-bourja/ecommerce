@extends('layouts.master3')
@section('title')
 اضافة منتوج جديد
@stop
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">اضافة منتوج جديد الى المتجر</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<form action="{{route('gestion-produits.store')}}" method="post" enctype="multipart/form-data">
								@csrf
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="card">
							<div class="card-body">
								
                                <div class="mb-2">
									<span class="mg-b-10">صاحب المنتوج  <span class="text-danger">*</span></span>
									<input name="fournisseur" class="form-control SlectBox" required>
								</div>
                                <div class="mb-2">
									<span class="mg-b-10">رقم المنتوج  <span class="text-danger">*</span></span>
									<input name="reference" class="form-control SlectBox" required>
								</div>
                                <div class="mb-2">
									<span class="mg-b-10">اسم المنتوج <span class="text-danger">*</span></span>
									<input name="produit" class="form-control SlectBox" required>
								</div>
								<div>
									<span class="mg-b-10" >الفئة  <span class="text-danger">*</span></span>
									<select  class="SlectBox form-control" name="genre" required>
										<option></option>
										@foreach($categories as $st)
										<option>{{$st->valeur}}</option>
										@endforeach
									</select>
								</div>
								<div class="mb-3">
									<span class="mg-b-10">ثمن المنتوج   <span class="text-danger">*</span></span>
									<input type="number" name="prix" class="form-control SlectBox" required>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="card">
						<div class="card-body">
						<div >
						<p class="mg-b-10">الوصف  <span class="text-danger">*</span></p></div>
					<textarea name="description" style="height: 315px;"
					 class="ql-wrapper ql-wrapper-demo bg-gray-100 w-100"
					 placeholder="تحدث عن المنتوج" required >
									
					</textarea>
				
		     		     </div>
		     		</div>
		         </div>
					<div class="col-lg-12 col-md-12">
						<div class="card" >
							<div class="card-body">
								<div>
									<h4 class="card-title mb-4 tx-18">تحميل الصور</h4>
								</div>
								<div class="row mb-4">
									<div class="col-sm-12 col-md-3">
									 الصورة  الرئيسية:  <span class="text-danger">*</span>

										<input type="file" name="image-principal" class="dropify" data-height="200" required/>
									</div>
									<div class="col-sm-12 col-md-3 mg-t-10 mg-sm-t-0">
									الصورة رقم 2:
										<input type="file" name="image2" class="dropify" data-height="200" />
									</div>
									<div class="col-sm-12 col-md-3">
									    الصورة رقم 3:
										<input type="file" name="image3" class="dropify" data-height="200" />
									</div><div class="col-sm-12 col-md-3">
									    الصورة رقم 4:
										<input type="file" name="image4" class="dropify" data-height="200" />
									</div>
								</div>
								<div>
									<button class="btn btn-teal btn-lg btn-block" type="submit" name="add"  multiple>اضافة المنتوج</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				</form>
				<!-- row closed -->
			
			<!-- Container closed -->
		
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/quill/quill.min.js')}}"></script>
<!-- Internal Form-editor js -->
<script src="{{URL::asset('assets/js/form-editor.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
@if ($errors->any())
<script>
	notif({
		msg: "<b> رقم المنتوج متوفر في المتجر  </b>",
		type: "info"
	});
	
</script>
@endif
@endsection
