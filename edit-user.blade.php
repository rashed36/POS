@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                    <h3>Edit User</h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('users.view')}}"><i class="fa fa-list"></i> User List</a>
                </div>
                <div class="card-body">
                <form method="post" action="{{ route('users.update',$editData->id)}}" id="myFrom">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="usertype">User Role</label>
                            <select name="usertype" id="usertype" value="{{ old('usertype') }}" class="form-control">
                                <option value=""> Select Role</option>
                                <option value="Admin" {{( $editData->usertype=="Admin")?"selected":""}}> Admin</option>
                                <option value="User" {{( $editData->usertype=="User")?"selected":""}}>User</option>
                            </select>
                        </div>
                         <div class="form-group col-md-4">
                            <label for="usertype"> Name</label>
                            <input type="text" name="name" value="{{$editData->name}}" placeholder="Enter User Name" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usertype"> Email</label>
                            <input type="email" name="email" value="{{$editData->email}}" placeholder="abc@gmail.com" class="form-control">
                             <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                        </div>
                        <div class="form-group col-md-6">
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
        usertype: {
        required: true,
      },
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      }
    },
    messages: {
        usertype: {
        required: "Please select user role ",
      },
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