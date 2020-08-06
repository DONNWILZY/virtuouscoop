@extends('layouts.admin')

@section('title', 'Fund Transfer Log')

@section('content')

<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
<script src="{{asset('https://code.jquery.com/jquery-3.3.1.js')}}"></script>
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')}}"></script>
<script src="{{asset('table/tableExport.js')}}"></script>
<script src="{{asset('table/jquery.base64.js')}}"></script>
<script src="{{asset('table/html2canvas.js')}}"></script>
<script src="{{asset('table/jspdf/libs/sprintf.js')}}"></script>
<script src="{{asset('table/jspdf/jspdf.js')}}"></script>
<script src="{{asset('table/jspdf/libs/base64.js')}}"></script>

<link href="{{asset('assets\plugins\datatable\dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')}}"></script>
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Fund Transfer Log</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Fund Transfers Log</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Fund Transfer Log</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												   @if(count($deposits) > 0)
													<tr>
														<th class="text-center">SN</th>
														<th class="text-center">Transaction Id</th>
														<th class="text-center">Amount</th>
														<th class="text-center">Charge</th>
														<th class="text-center">Funded</th>
														<th class="text-center">Receiver</th>
														<th class="text-center">Time</th>
														<th class="text-center">User</th>
														<th class="text-center">Status</th>
													</tr>
												</thead>
												<tbody>
												 @php $id=0;@endphp
												 @foreach($deposits as $deposit)
												 @php $id++;@endphp
                               
													<tr>
														<td class="text-center">{{ $id }}</td>
														<td class="text-center">{{$deposit->reference}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$deposit->amount}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$deposit->charge}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$deposit->net_amount}}</td>
														<td class="text-center">{{$deposit->email}}</td>
														<td class="text-center">{{$deposit->created_at->diffForHumans()}}</td>
														<td class="text-center"><a href="{{route('admin.user.show', $deposit->user->id)}}" class="icon"><span class="badge badge-pill badge-primary">View Payee</span></a></td>
														 @if($deposit->status == 1)
														<td class="text-center"><a href="#" class="icon"><span class="badge badge-pill badge-success">Successful</span></a></td>
														 @else
														 <td class="text-center"><a href="#" class="icon"><span class="badge badge-pill badge-danger">Pending</span></a></td>
														 @endif

											     	</tr>
												 
											  @endforeach
											  @else
											<h3 class="text-center">No Deposit Made Yet</h3>
											@endif											
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\select2.js')}}"></script>
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
<script type="text/javascript">
//$('#employees').tableExport();
$(function(){
	$('#example').DataTable();
      }); 
</script>		
		
@endsection