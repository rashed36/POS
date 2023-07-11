@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
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
                    <h3>Edit Password</h3>
                </div>
                <div class="card-body">
                <form method="post" action="{{ route('profiles.password.update')}}" id="myFrom">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="usertype">Curent Password</label>
                            <input type="password" id="current_password" name="current_password" placeholder="Enter old Password" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usertype">New Password</label>
                            <input type="password" id="new_password" name="new_password" placeholder="Enter New Password" class="form-control">
                        </div>
                         <div class="form-group col-md-4">
                            <label for="usertype"> Confirm Password</label>
                            <input type="password" name="password2" placeholder="Confirm Password " class="form-control">
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
      current_password: {
        required: true,
        minlength: 6  
      },
        new_password: {
        required: true,
        minlength: 6
      },
      password2: {
        required: true,
        equalTo: '#new_password'
      }
    },
    messages: {
        current_password: {
        required: "Please enter current password",
      },
      new_password: {
        required: "Please enter new password",
        minlength: "Password will be minimum 6 characters or numbers",
      },
      password2: {
        required: "Please enter confirm password",
        equalTo: "Confirm password dos't match",
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