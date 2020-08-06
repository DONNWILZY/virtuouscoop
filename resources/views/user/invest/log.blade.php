@extends('layouts.dashboard')
@section('title', 'My Investments History')
@section('content')

		<link href="{{asset('assets\plugins\datatable\dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">My Investments</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">My Investments</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">My Investments</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
							 @if(count($logs) > 0)
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Reference</th>
                                    <th>Invest Type</th>
                                    <th>Interest Rate</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Reference</th>
                                    <th>Invest Type</th>
                                    <th>Interest Rate</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @php $id=0;@endphp
                                @foreach($logs as $log)
                                    @php $id++;@endphp
                                    <tr>
                                        <td>{{ $id }}</td>
                                        <td>{{$log->reference_id}}</td>
                                        <td>{{$log->invest->plan->style->name}}</td>
                                        <td>{{$log->invest->plan->percentage +0}}%</td>
                                        <td>{{config('app.currency_symbol')}} {{$log->amount + 0 }}</td>
                                        <td>{{ date("j, n, Y", strtotime($log->created_at)) }}</td>
                                        <td>{{ date("g:i A", strtotime($log->created_at)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h2 class="text-center">No Don't Have any Investment Yield Yet. Please select an investment plan to proceed with earnings</h2>
                    @endif		
									</div>
									<!-- table-wrapper -->
								</div>
								<!-- section-wrapper -->
							</div>
						</div>
					</div>
				</div>
			</div>
		

@endsection