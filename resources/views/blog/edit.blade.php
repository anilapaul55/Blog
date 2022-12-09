@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('index')}}">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                @if ($message = Session::get('success'))
                    <div class="alert border-0 alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class='bx bxs-check-circle'></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-dark">Success Alerts</h6>
                                <div class="text-dark">{{ $message }}</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('errors1'))
                  <div class="alert border-0 alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-dark">Warning Alerts</h6>
                            <div class="text-dark">{{ $message }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card border-top border-0 border-4 border-white">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-dark"></i></div>
                            <h5 class="mb-0 text-dark">Update Blog</h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="{{route('update',$blog->id)}}" method="post" id="blog_form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-6">
                                <label for="inputTitle" class="form-label"> Title</label>
                                <input type="text" class="form-control @error('inputTitle') is-invalid @enderror" id="inputTitle" name="inputTitle" value="{{ $blog->blog_title }}" >
                                @error('inputTitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputSubTitle" class="form-label">Sub Title</label>
                                <input type="text" class="form-control @error('inputSubTitle') is-invalid @enderror" id="inputSubTitle" name="inputSubTitle" value="{{ $blog->blog_subtitle }}" >
                                @error('inputSubTitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputimage" class="form-label">Image</label>
                                <input class="form-control @error('inputimage') is-invalid @enderror demoInputBox" type="file" id="inputimage" name="inputimage" src="{{ $blog->blog_image }}" >
                                <span id="file_error" style="color:red;"></span>
                                @error('inputimage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6"> 
                                <img src="{{ asset('uploaded/blogs').'/'.$blog->blog_image}}" height="10" width="80" alt="..." class="img-fluid rounded-bottom">
                            </div>
                            <div class="col-md-12">
                                <label for="inputDescription" class="form-label">Description</label>
                                <textarea class="form-control @error('inputDescription') is-invalid @enderror" id="inputDescription" name="inputDescription" placeholder="description..." rows="3"  >{{$blog->blog_description}}</textarea> 
                                @error('inputDescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror  
                            </div>
                            <div class="col-12">
                                <button type="submit" id="inputbut" class="btn btn-light px-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
		</div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('form[id="blog_form"]').validate({
            rules: {
                inputTitle: {
                    required: true,
                    minlength:3,
                    maxlength:50,
                    letterandnumber:true,
                },
                inputSubTitle: {
                    required: true,
                    minlength: 3,
                    maxlength:50,
                    letterandnumber:true,
                    no_space:true,
                },
                inputDescription: {
                    required: true,
                    minlength:5,
                    maxlength:255,
                },
            },

            onfocusout: function(element) {
                this.element(element);
                $('#inputbut').prop('disabled',false);
            },
        });

        $.validator.addMethod("no_space",function(value, element, regexp) {
           return this.optional(element) || /^\S*$/u.test(value);
        }, "Spaces not allowed.");

        $.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
        }, "Only Letters and spaces are allowed");

        $.validator.addMethod("letterandnumber", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9 ]+$/i.test(value);
        }, "Only Letters and numbers are allowed");
    

        $.validator.addMethod("imageformat", function(value, element) {
            var flag=true;  
            var ext = $('#inputimage').val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
               flag=false;
           }
           return flag;
       },"This image type not allowed");
    });
    
    $('#inputbut').on('click',function(){
        $(this).prop('disabled',true);
        $('#blog_form').submit();
    });
</script>
@endsection