@extends('layouts.dashboard')
@section('title', 'My Balance Transfer History')
@section('content')

<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Transfer History</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Transfer History</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Transfer History</h3>
									</div>
									<div class="table-responsive">
										<table class="table card-table table-vcenter text-nowrap">
											
											<thead>
											 @if(count($logs) > 0)
												<tr>

												<th >Reference ID</th>
												<th >Type</th>
												<th >From</th>
												<th >To</th>
												<th >Date</th>
												<th >Amount</th>
												</tr>
											</thead>
											<tbody>
											 @php $id=0;@endphp
											@foreach($logs as $log)
											@php $id++;@endphp
											
												<tr>
													<th>{{$log->reference}}</th>
													 @if($log->type == 1)
													<td>Sent</td>
													 @elseif($log->type == 3)
													 <td>Convert</td>
													 @else
													<td>Received From</td>
												    @endif
													<td>{{$log->name}}</td>
													<td>{{$log->email}}</td>
													<td>{{$log->created_at->diffForHumans()}}</td>
													<td>{{config('app.currency_symbol')}} {{$log->amount + 0}}</td>
												</tr>
											  
											 @endforeach
											</tbody>
										</table>
										@else
                       							 <h3 class="text-center">You have not made any transfer yet.</h3>
                 					  @endif
									</div>
									<!-- table-responsive -->
								</div>
							</div>
						</div>
					

					</div>
				</div>
			</div>
@endsection