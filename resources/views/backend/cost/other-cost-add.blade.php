@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Others Cost</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Others Cost</li>
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
                    <h3 class="card-title">
                        @if(isset($editData))
                        Edit Cost
                        @else
                        Add Cost
                        @endif
                    </h3>
                    <a class="btn btn-success float-right btn-sm" href="{{ route('account.cost.view')}}"><i class="fa fa-list"></i> Go Back</a>
                </div>
                <div class="card-body">
                <form method="post" action="{{(@$editData)?route('account.cost.update',$editData->id):route('account.cost.store')}}" id="myFrom" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="date"> Date</label>
                            <input type="text" name="date" value="{{date(@$editData->date)}}" placeholder="Date" id="date" class="form-control datepicker" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="amount"> Amount</label>
                            <input type="text" name="amount" value="{{@$editData->amount}}" id="amount" placeholder="Amount" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="image"> Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                             <img id="showImage" src="{{(!empty(@$editData->image))?url('public/upload/cost_image/'.@$editData->image):url('upload/no_image.jpg')}}" style="width: 300px;height: 100px; border:1px solid #000;">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description"> Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Write description here">{{@$editData->description}}</textarea>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
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
      date: {
        required: true,
      },
      amount: {
        required: true,
      },
      description: {
        required: true,
      }
    },
    messages: {
      date: {
        required: "Please Enter Date ",
      },
      amount: {
        required: "Please enter Amount",
      },
      description: {
        required: "Please enter Description",
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