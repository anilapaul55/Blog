@extends('layouts.app')

@section('content')
<div class="page-wrapper">
		<div class="page-content">
			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item active" aria-current="page"><a href="">Blogs</a></li>
							<li class="breadcrumb-item active" aria-current="page"><a href="">Blog List</a></li>
						</ol>
					</nav>
				</div>
			</div>
			<!--end breadcrumb-->
			@if ($message = Session::get('success'))
                <div class="alert border-0 alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Success Alerts</h6>
                            <div class="text-white">{{ $message }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($message = Session::get('errors'))
				<div class="alert border-0 alert-dismissible fade show py-2">
					<div class="d-flex align-items-center">
						<div class="font-35 text-white"><i class='bx bx-info-circle'></i>
						</div>
						<div class="ms-3">
							<h6 class="mb-0 text-white">Warning Alerts</h6>
							<div class="text-white">{{ $message }}</div>
						</div>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
            @endif
			<div class="card">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-lg-3 col-xl-2">
							<div class="ms-auto"><a href="{{route('create')}}" class="btn btn-light radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Blog</a></div>
						</div>
					</div>
				</div>
			</div>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table mb-0" id="blogs">
								<thead class="table-light">
									<tr>
										<th>No#</th>
										<th>Title</th>
										<th>Subtitle</th>
										<th>Image</th>
										<th>Description</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								<?php $i = 1; ?>
                                @foreach($blogs as $blog)
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="ms-2">
													<h6 class="mb-0 font-14">{{$i++}}</h6>
												</div>
											</div>
										</td>
										<td>{{$blog->blog_title}}</td>
										<td>{{$blog->blog_subtitle}} </td>
										<td> <div class="col">
											<img src="{{ asset('uploaded/blogs').'/'.$blog->blog_image}}" height="10" width="80" alt="..." class="img-fluid rounded-bottom">
										</div> </td>
										<td>{{Str::limit($blog->blog_description, 25, $end='.......')}}</td>
										<td>
										<div class="d-flex order-actions">
												<a href="{{route('edit',$blog['id'])}}" title="edit" class="">Edit</a>
												<a href="{{route('destroy',$blog['id'])}}" title="delete" class="ms-3">Delete</i></a>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
