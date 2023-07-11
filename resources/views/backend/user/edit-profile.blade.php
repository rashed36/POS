@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
        <div class="row">
        <section class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Profile</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('profiles.view')}}"><i class="fa fa-list"></i> Go Back</a>
                </div>
                <div class="card-body">
                <form method="post" action="{{ route('profiles.update')}}" id="myFrom" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="usertype"> Name</label>
                            <input type="text" name="name" value="{{$editData->name}}" placeholder="Enter User Name" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usertype"> Email</label>
                            <input type="email" name="email" value="{{$editData->email}}" placeholder="abc@gmail.com" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usertype"> Mobile No</label>
                            <input type="text" name="mobile" value="{{$editData->mobile}}" placeholder="Enter User mobile" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usertype"> Address</label>
                            <input type="text" name="address" value="{{$editData->address}}" placeholder="Enter User address" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender"> Gender</label>
                            <select name="gender" id="gender" value="{{ old('gender') }}" class="form-control">
                                <option value=""> Select Gender</option>
                                <option value="Male" {{( $editData->gender=="Male")?"selected":""}}> Male</option>
                                <option value="Female" {{( $editData->gender=="Female")?"selected":""}}>Female</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="usertype"> Image</label>
                            <input type="file" name="image" id="image" value="{{$editData->image}}" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                             <img id="showImage" src="{{(!empty($editData->image))?url('upload/user_image/'.$editData->image):url('upload/no_image.jpg')}}" style="width: 150px;height: 160px; border:1px solid #000;">
                        </div>
                        <div class="form-group col-md-6" style="padding-top: 50px;">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </section>
         
        </div>
      </div>
    </section>
  </div>

  <script type="text/javascript">
$(document).ready(function () {
  $('#myFrom').validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      }
    },
    messages: {
      name: {
        required: "Please select user name ",
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a <em>vaild</em> email address",
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
 
  @endsection