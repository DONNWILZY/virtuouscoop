@extends('layouts.dashboard')

@section('title', $post->title)

@section('content')

<div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">View News</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">View News</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Published {{$post->created_at->diffForHumans()}}</h4>
									</div>
									
									<div class="card-body">
										<div class="jumbotron">
										<div class="atvImg">
                                        <img class="img" class="header-brand-img" src="{{$post->featured}}" />
                                   	    </div>
											<h1 class="display-3">{{$post->title}}</h1>
											<p class="lead">T{!! $post->content !!}</p>
											<hr class="my-4">
											<p>{{$post->category->name}}</p>
											<p class="lead m-0">
												<a class="btn btn-primary btn-lg" href="{{route('userNewmess')}}" role="button">Pespond</a>
											</p>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>


@endsection