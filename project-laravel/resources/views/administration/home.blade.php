@extends('layouts.master3')
@section('title')
الصفحة الرئيسية - لادارة المتجر
@stop
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">الصفحة الرئيسية</h2>
						
						</div>
					</div>
					
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row row-sm">
					<a class="col-xl-3 col-lg-6 col-md-6 col-xm-12 btn " href="{{ url('/' . $page='gestion-produits') }}">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h3 class="mb-3 tx-19 text-white mr-2">المنتوجات</h3>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white mr-3">
											
										@foreach($p as $st)
                                             {{$st->produit}} 											
                                        @endforeach
											</h4>
										</div>
										<span class="float-right my-auto mr-auto">
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
                    </a>
					<a class="col-xl-3 col-lg-6 col-md-6 col-xm-12 btn" href="{{ url('/' . $page='commande') }}">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h3 class="mb-3 tx-19 text-white mr-2">الطلبات في طور الانتضار</h3>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white mr-3">
											<?php $t1=0;?>@foreach($s as $st)<?php $t1=$t1+1;?>@endforeach <?php echo $t1;?>	
										</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<span class="text-white op-7"></span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
                    </a>
					<a class="col-xl-3 col-lg-6 col-md-6 col-xm-12 btn" href="{{ url('/' . $page='traitement-commandes') }}">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h3 class="mb-3 tx-19 text-white mr-2">الطلبات في طور المعالجة</h3>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white mr-3">
											<?php $t2=0;?>@foreach($tc as $st)<?php $t2=$t2+1;?>@endforeach <?php echo $t2;?>		
										</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<span class="text-white op-7"> </span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
                    </a>
					<a class="col-xl-3 col-lg-6 col-md-6 col-xm-12 btn" href="{{ url('/' . $page='livraison-commandes') }}">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h3 class="mb-3 tx-19 text-white mr-2">الطلبات المستعدة للاستلام</h3>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white mr-3">
											<?php $t1=0;?>@foreach($tcc as $st)<?php $t1=$t1+1;?>@endforeach <?php echo $t1;?>		
											</h4>
										</div>
										<span class="float-right my-auto mr-auto">
											<span class="text-white op-7"></span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
                </a>
				<!-- row closed -->
		
				
				<div class="row row-sm">
					<div class="col-md-12 col-lg-12 col-xl-12">
						<div class="card ">
							<div class="row card-body">
							<div class="col-md-12  col-xl-7">
							<canvas id="myChart" style="width:100%;"></canvas>							
						   </div>
						   
						  
							<div class=" col-md-12  col-xl-5">
							<table class="table table-bordered    text-sm-nowrap tx-16" id="example1">    
      <thead><tr><th class="bg-danger-transparent tx-20">الفئات</th><th class="bg-danger-transparent tx-20"> عدد المنتوجات </th></tr></thead>
      @foreach($row  as $rows)
<tr class="bg-teal-gradient"><td class="bg-teal-gradient">{{$rows->famille}}</td> <td class="bg-teal">{{$rows->produit}} </td> </tr>
                                  @endforeach
      </table>
							</div>
							<div class="card-header bg-transparent pd-b-0 col-md-12 col-xl-12">
							
	<h1 class="text-center text-info bg-primary-transparent text-primary ">
	
					المنتوجات الأكثر مبيعا خلال الشهرين			
	<?php echo -1+date('m').'  و  '.date('m')*1 ; ?>
  
   </h1>
							</div>						 <!-- row opened -->
							<div class="card-header bg-transparent  col-md-12 col-xl-6">
				<table class="table-sm table-hover table-bordered  bg-teal-gradient tx-16  text-right w-100 "> <thead style="border:groove" >
      <thead class="bg-danger-gradient"><tr><th>الشهر</th><th> الكمية</th><th> المنتوج</th></tr></thead>
      @foreach($r3  as $rows)
<tr onclick="ff('{{$rows->produit}}')"><td>{{$rows->d}}</td> <td>{{$rows->q}} </td> <td>{{$rows->produit}} </td> </tr>
                                  @endforeach
      </table></div>
	  
	  <div class="card-header bg-transparent col-md-12 col-xl-6">
				<table class="table-sm table-hover table-bordered  bg-teal-gradient tx-16  text-right w-100 "> <thead style="border:groove" >
      <thead class="bg-danger-gradient"><tr><th>الشهر</th><th> الكمية</th><th> المنتوج</th></tr></thead>
      @foreach($r4  as $rows)
<tr><td>{{$rows->d}}</td> <td>{{$rows->q}} </td> <td>{{$rows->produit}} </td> </tr>
                                  @endforeach
      </table></div>
								
							</div>
							<div class="card-body  ">
								<div class="total-revenue  ">
									<div>
									  <h4>  <?php  $total=0;?>@foreach($r2 as $st)
										<?php  $total=$total+$st->p ?>
										@endforeach <?php  echo $total;?></h4>
									  <label><span class="bg-warning"></span>مجموع الطلبات</label>
									</div>
									<div>
									<h4> <?php  $total=0;?>@foreach($r as $st)
										<?php  $total=$total+$st->p ?>
										@endforeach <?php  echo $total;?></h4>
									  <label><span class="bg-success"></span>الطلبات الناجحة</label>
									</div>
									<div>
									<h4> <?php  $total=0;?>@foreach($r1 as $st)
										<?php  $total=$total+$st->p ?>
										@endforeach <?php  echo $total;?></h4>
									  <label><span class="bg-danger"></span>الطلبات الملغات</label>
									</div>
								  </div>
								<div id="bar" class="sales-bar mt-4"></div>
							</div>
							
<div id="container44" style="min-width: 300px; height: 300px; margin: 1em"></div>
						</div>
					</div>
				
				</div>
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
	
new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: [<?php foreach($row as $st): echo "'".$st->famille."'".",";endforeach ?>],
    datasets: [{
      backgroundColor: ["#b91d47","#00aba9","#2b5797", "#e8c3b9","#1e7145","#90EE90","#FFA07A","#20B2AA","#FFFFE0","#7B68EE"],
      data: [<?php foreach($row as $st): echo $st->produit.",";endforeach ?>],
    }]
  },
  options: {
    title: {
      display: true,
      text: "الفئات المتوفرة في المتجر"
    }
  }
});
	$('#container44').highcharts({
		chart: {
		height: 249,	
		fontFamily: 'Nunito, sans-serif', 
	  },
	 
		title: {
	    text: '',
	   },
		colors: ["#198954", '#f93a5a', '#f7a556'],
    xAxis: {
        categories: [<?php foreach($r2 as $st): echo "'".$st->d."'".",";endforeach ?> ]
    },
	series: [{
		  name: 'مرسلة بنجاح',
		  data: [<?php foreach($r as $st): echo $st->p.",";endforeach ?>]
		},
	   {
		  name: 'ملغية',
		  data: [<?php foreach($r1 as $st): echo $st->p.",";endforeach ?>]
	  }, {
		  name: 'مجموع الطلبيات',
		  data: [<?php foreach($r2 as $st): echo $st->p.",";endforeach ?>]
	  }],
});
	$('#compositeline4').sparkline('html', {
		lineColor: 'rgba(255, 255, 255, 0.6)',
		lineWidth: 2,
		spotColor: false,
		minSpotColor: false,
		maxSpotColor: false,
		highlightSpotColor: null,
		highlightLineColor: null,
		fillColor: 'rgba(255, 255, 255, 0.2)',
		chartRangeMin: 0,
		chartRangeMax: 20,
		width: '100%',
		height: 30,
		disableTooltips: true
	});
	/* Dashboard content closed*/
	
	
	/* Apexcharts (#bar) */
	var optionsBar = {
	  chart: {
		height: 249,
		type: 'bar',
		toolbar: {
		   show: false,
		},
		fontFamily: 'Nunito, sans-serif',
		dropShadow: {
	      enabled: true,
		   top: 8,
		   left: 8,
		   blur: 10,
		   opacity: 0.2,
		 }
	  },
	 colors: ["#198954", '#f93a5a', '#f7a556'],
	 plotOptions: {
				bar: {
				  dataLabels: {
					enabled: false
				  },
				  columnWidth: '42%',
				  endingShape: 'rounded',
				}
			},
	  dataLabels: {
		  enabled: false
	  },
	  stroke: {
		  show: true,
		  width: 2,
		  endingShape: 'rounded',
		  colors: ['transparent'],
	  },
	  responsive: [{
		  breakpoint: 576,
		  options: {
			   stroke: {
			  show: true,
			  width: 1,
			  endingShape: 'rounded',
			  colors: ['transparent'],
			},
		  },
		  
		  
	  }],
	   series: [{
		  name: 'مرسلة بنجاح',
		  data: [<?php foreach($r as $st): echo $st->p.",";endforeach ?>]
		},
	   {
		  name: 'ملغية',
		  data: [<?php foreach($r1 as $st): echo $st->p.",";endforeach ?>]
	  }, {
		  name: 'مجموع الطلبيات',
		  data: [<?php foreach($r2 as $st): echo $st->p.",";endforeach ?>]
	  }],
	  xaxis: {
		  categories: [<?php foreach($r2 as $st): echo "'".$st->d."'".",";endforeach ?> ],
	  },
	  fill: {
		  opacity: 1
	  },
	  legend: {
		show: false,
		floating: true,
		position: 'top',
		horizontalAlign: 'left',
		// offsetY: -36

	  },
	  // title: {
	  //   text: 'Financial Information',
	  //   align: 'left',
	  // },
	  tooltip: {
		  y: {
			  formatter: function (val) {
				  return "   " + val + "  "
			  }
		  }
	  }
	}
	const collection1 = document.getElementsByClassName("highcharts-axis highcharts-yaxis");
collection1[0].innerHTML = "";
const collection = document.getElementsByClassName("highcharts-credits");
collection[0].innerHTML = "";
	getElementsByClassName("highcharts-axis highcharts-yaxis").style.display = "none";
	getElementsByClassName("highcharts-credits").style.display = "none";




function ff(x){    alert (x);};
</script>	
@endsection