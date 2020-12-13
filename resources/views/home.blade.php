@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header p-0">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
							<a class="navbar-brand" href="#">Hidden brand</a>
							<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
								<li class="nav-item active">
									<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Link</a>
								</li>
								<li class="nav-item">
									<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
								</li>
							</ul>
							<form class="form-inline my-2 my-lg-0">
								<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
								<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
							</form>
						</div>
					</nav>
				</div>

				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif
					<div class="card-deck mb-4">
						<div class="card">
							{{-- <img src="..." class="card-img-top" alt="..."> --}}
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This is a longer card with supporting text below as a natural
									lead-in to additional content. This content is a little bit longer.</p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
						<div class="card">
							{{-- <img src="..." class="card-img-top" alt="..."> --}}
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This card has supporting text below as a natural lead-in to
									additional content.</p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
						<div class="card">
							{{-- <img src="..." class="card-img-top" alt="..."> --}}
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This is a wider card with supporting text below as a natural
									lead-in to additional content. This card has even longer content than the first to
									show that equal height action.</p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
					<div class="card-deck mb-4">
						<div class="card">
							{{-- <img src="..." class="card-img-top" alt="..."> --}}
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This is a longer card with supporting text below as a natural
									lead-in to additional content. This content is a little bit longer.</p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
						<div class="card">
							{{-- <img src="..." class="card-img-top" alt="..."> --}}
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This card has supporting text below as a natural lead-in to
									additional content.</p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
						<div class="card">
							{{-- <img src="..." class="card-img-top" alt="..."> --}}
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">This is a wider card with supporting text below as a natural
									lead-in to additional content. This card has even longer content than the first to
									show that equal height action.</p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-lg-4">
							<div class="card bg-gradient-default">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0 text-white">Total
												traffic</h5>
											<span class="h2 font-weight-bold mb-0 text-white">350,897</span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-white text-dark rounded-circle shadow">
												<i class="ni ni-active-40"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-sm">
										<span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
										<span class="text-nowrap text-light">Since last month</span>
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card bg-gradient-primary">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0 text-white">New users
											</h5>
											<span class="h2 font-weight-bold mb-0 text-white">2,356</span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-white text-dark rounded-circle shadow">
												<i class="ni ni-atom"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-sm">
										<span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
										<span class="text-nowrap text-light">Since last month</span>
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card bg-gradient-primary">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0 text-white">New users
											</h5>
											<span class="h2 font-weight-bold mb-0 text-white">2,356</span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-white text-dark rounded-circle shadow">
												<i class="ni ni-atom"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-sm">
										<span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
										<span class="text-nowrap text-light">Since last month</span>
									</p>
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
