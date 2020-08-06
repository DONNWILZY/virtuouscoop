@extends('layouts.dashboard')
@section('title', $inbox->title)
@section('content')
    <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">View Message</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">View Message</li>
							</ol>

						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title"> Message Priority : @if($inbox->priority == 1)
										Normal
									@elseif($inbox->priority == 2)
										Medium
									@else
										High
									@endif</div>
									</div>
									<div class="card-body">
										<!-- content -->
										<div class="content vscroll" style="max-height:300px">
											<p><b> Message Subject : {{$inbox->title}}</b></p>
											<p> {!! $inbox->body !!}</p>
											<a href="{{route('userMessage')}}" class="btn btn-success" type="button"><i class="fe fe-mail mr-2"></i>  Back To Inbox </a>
                               					 @if(!is_null($inbox->file))
                                			 <a href="{{route('userMessage.download',$inbox->id)}}"><button type="button" class="btn btn-dark"><i class="fe fe-download mr-2"></i>Download</button>
                                		     </a>
											  @else

											@endif
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>

@endsection