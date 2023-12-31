@extends('backend.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Employee Monthly Salary</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Monthly Salary</li>
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
                    <h3 class="card-title">Select Date</h3>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="from-group col-md-4">
                            <label for="" class="control-label">Date</label>
                            <input type="text" name="date" id="date" class="form-control form-control-sm datepicker" autocomplete="off" placeholder="Date" readonly>
                        </div>
                        <div class="from-group col-md-2">
                            <a href="" class="btn btn-sm btn-success" id="search" style="margin-top: 33px; color: white">Search</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="DocumentResult"></div>
                    <script id="document-template" type="text/x-handlebars-template">
                        <table class="table-sm table-borderd table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    @{{{thsource}}}
                                </tr>
                            </thead>
                            <tbody>
                                @{{#each this}}
                                <tr>
                                    @{{{tdsource}}}
                                </tr>
                                @{{/each}}
                            </tbody>
                        </table>
                    </script>
                </div>
            </div>
        </section>    
        </div>
      </div>
    </section>
  </div>
 <script type="text/javascript">
    $(document).on('click','#search',function(){
        var date = $('#date').val();
        $('.notifyjs-corner').html('');

        if(date ==''){
            $.notify("Date required", {globalPosition: 'top right', className: 'error'});
            return false;
        }
        $.ajax({
            url: "{{route('employee.monthly.salary.get')}}",
            type: "get",
            date: {'date': date},
            beforeSend: function(){
            },
            success: function (data) {
                var source = $("#document-template").html();
                var template = HandLebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
 </script>
  @endsection