@extends('layouts.dashboard')

@section('title', 'All Message From Admin')

@section('content')

<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Message Inbox</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Message Inbox</li>
							</ol>
						</div>
<div class="row">
							<div class="col-md-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="list-group list-group-transparent mb-0 mail-inbox">
										<div class="mt-4 mb-4 ml-4 mr-4 text-center">
											<a href="{{route('userNewmess')}}" class="btn btn-secondary btn-lg btn-block">Compose New Message</a>
										</div>
										<a href="#" class="list-group-item list-group-item-action d-flex align-items-center active " >
											<span class="icon mr-3"><i class="fe fe-inbox"></i></span>Inbox <span class="ml-auto badge badge-success">14</span>
										</a>
										<a href="{{route('userSupports')}}" class="list-group-item list-group-item-action d-flex align-items-center">
											<span class="icon mr-3"><i class="fe fe-send"></i></span>Sent Mail
										</a>
										
									</div>
								</div>
								
								
							</div>
							<div class="col-md-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="card-body p-6">
										<div class="inbox-body">
											<div class="mail-option">
												
												<div class="btn-group hidden-phone">
														<a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
														More
														<i class="fa fa-angle-down "></i>
													</a>
													
													<ul class="dropdown-menu">
														<li><a href="{{route('userSupports')}}"><i class="fa fa-envelope-open"></i> Sent Messages</a></li>
														<li class="divider"></li>
														<li><a href="{{route('userNewmess')}}"><i class="fa fa-pencil"></i> New Message</a></li>
													</ul>
												</div>
											</div>
											<div class="table-responsive">
												<table class="table table-inbox table-hover text-nowrap">
													<tbody>
													@if(count($inboxes) > 0)
													@php $id=0;@endphp
                              					    @foreach($inboxes as $inbox)
                                 				    @php $id++;@endphp
														<tr class="unread">
															<td class="inbox-small-cells">
																<input type="checkbox" class="mail-checkbox">
															</td>
															<td> <a href="{{route('userMessage.show', $inbox->id)}}" class="btn btn-outline-info" type="button">
															Open
															</a></td>
															<td class="view-message  dont-show">{{ $id }}</td>
															<td class="view-message ">{{$inbox->title}}</td>
															<td class="view-message  inbox-small-cells"> @if($inbox->status <> 1)Unread</i><i class="fa fa-star"></i> @endif</td>
															<td class="view-message  text-right">{{ date("j/ n/ Y", strtotime($inbox->created_at)) }}</td>
														</tr>
													@endforeach
													 @else

                       								 <h1 class="text-center">No Messages Yet. Inbox Empty</h1>

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
			</div>

@endsection