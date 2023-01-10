@extends('mainLayout.layout')
@section('title','Trip Designer || New Air Ticket')
@section('airTicket','active')
@section('newAirTicket','active')
@section('ticketMenu','menu-open')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Air Ticket Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Air Ticket Management</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Air Ticket</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: none;">
                                {{ Form::open(array('url' => 'createNewAirTicket',  'method' => 'post' ,'class' =>'form-horizontal')) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Reservation PNR</label>
                                            <input type="text" class="form-control" id="reservation_pnr" name="reservation_pnr" placeholder="Enter Reservation PNR" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Airlines PNR</label>
                                            <input type="text" class="form-control" id="airline_pnr" name="airline_pnr" placeholder="Airlines Reservation PNR" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Issue date</label>
                                            <div class="input-group date" id="dob" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#dob" name="issue_date" placeholder="26-09-2027 3:15 PM" required/>
                                                <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Vendor Name</label>
                                            <select class="form-control select2bs4" name="vendor" id="vendor" style="width: 100%;" required>
                                                <option value="">Select Vendor Name</option>
                                                @foreach($vendors as $vendor)
                                                    <option value="{{$vendor->name}}">{{$vendor->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Issued By(ticket)</label>
                                            <select class="form-control select2bs4" name="issued_by" id="issued_by" style="width: 100%;" required>
                                                <option value="">Select ticket Name</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->name}}">{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Flight Type</label>
                                            <select class="form-control select2bs4" name="f_type" id="f_type" style="width: 100%;" required>
                                                <option value="">Select Flight Type</option>
                                                <option value="One Way">One Way</option>
                                                <option value="Round Trip">Round Trip</option>
                                                <option value="Multi City">Multi City</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Flight Class</label>
                                            <select class="form-control select2bs4" name="f_class" id="f_class" style="width: 100%;" required>
                                                <option value="">Select Class</option>
                                                <option value="Economy">Economy</option>
                                                <option value="Business">Business</option>
                                                <option value="Premium Economy">Premium Economy</option>
                                                <option value="First Class">First Class</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group" style="background: #e7e7e1;">
                                            <label style="margin-left: 5px;">Flight Details</label>
                                        </div>
                                    </div>
                                    <div class="row after-add-more" style="margin-left: 5px;">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>From</label>
                                                <select class="form-control select2bs4" name="a_from[]" id="from" style="width: 100%;" required>
                                                    <option value="">Select From</option>
                                                    @foreach($airports as $airport)
                                                        <option value="{{$airport->name.'('.$airport->iata_codes.')'}}">{{$airport->name.'('.$airport->iata_codes.')'}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>To</label>
                                                <select class="form-control select2bs4" name="a_to[]" id="to" style="width: 100%;" required>
                                                    <option value="">Select To</option>
                                                    @foreach($airports as $airport)
                                                        <option value="{{$airport->name.'('.$airport->iata_codes.')'}}">{{$airport->name.'('.$airport->iata_codes.')'}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Departure</label>
                                                <div class="input-group date" id="d_time1" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#d_time1" name="d_time[]" placeholder="26-09-2027 3:15 PM" required/>
                                                    <div class="input-group-append" data-target="#d_time1" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Arrival</label>
                                                <div class="input-group date" id="a_time1" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#a_time1" name="a_time[]" placeholder="26-09-2027 3:15 PM" required/>
                                                    <div class="input-group-append" data-target="#a_time1" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Flight Number</label>
                                                <input type="text" class="form-control" id="f_number" name="f_number[]" placeholder="Enter Flight Number" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Airlines</label>
                                                <select class="form-control select2bs4" name="airlines[]" id="airline" style="width: 100%;" required>
                                                    <option value="">Select Airlines</option>
                                                    @foreach($airlines as $airline)
                                                        <option value="{{$airline->name.'('.$airline->code.')'}}">{{$airline->name.'('.$airline->code.')'}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label></label>
                                            <div class="form-group" style="margin-top: 8px;">
                                                <button type="button" class="btn btn-info btn-block add_more" id="ad_more" value="1">Add More Flight</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group" style="background: #e7e7e1;">
                                            <label style="margin-left: 5px;">Passenger Details</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 newPassenger" style="margin-left: 0px;">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Passenger Number</label>
                                                <select class="form-control select2bs4" name="pax_number" id="pax_number" style="width: 100%;" required>
                                                    <option value="">Select From</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                    <option value="4">Four</option>
                                                    <option value="5">Five</option>
                                                    <option value="6">Six</option>
                                                    <option value="7">Seven</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group" style="background: #e7e7e1;">
                                            <label style="margin-left: 5px;">Price  Details</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Agent Price</label>
                                            <input type="number" class="form-control" id="a_price" name="a_price" min="1" placeholder="Enter Agent Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Client Price</label>
                                            <input type="number" class="form-control" id="c_price" name="c_price" min="1"  placeholder="Enter Client Price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>VAT</label>
                                            <input type="number" class="form-control" id="vat" name="vat" min="0" value="0" placeholder="Enter VAT">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>AIT</label>
                                            <input type="number" class="form-control" id="ait" name="ait" min="0" value="0" placeholder="Enter AIT">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group" style="background: #e7e7e1;">
                                            <label style="margin-left: 5px;">Payment  Details</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> Payment Type</label>
                                            <select class="form-control select2bs4" name="payment_type" id="payment_type" style="width: 100%;" required>
                                                <option value="">Select Payment Type</option>
                                                @foreach($payment_types as $payment_type)
                                                    <option value="{{$payment_type->type}}">{{$payment_type->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Due Amount</label>
                                                <input type="number" class="form-control" id="due" name="due" min="0" value="0" placeholder="Enter Due Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Payments Details</label>
                                            <textarea class="form-control" id="p_details" name="p_details" rows="5" placeholder="Write Payments Detail..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning float-right">Save</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Air Ticket Management</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example11" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>S.L</th>
                                        <th>Booking Date</th>
                                        <th>Issued By</th>
                                        <th>R.PNR</th>
                                        <th>A.PNR</th>
                                        <th>Status</th>
                                        <th>Vendor</th>
                                        <th>F.Type</th>
                                        <th>A.Price</th>
                                        <th>C.Price</th>
                                        <th>VAT</th>
                                        <th>AIT</th>
                                        <th>P.Type</th>
                                        <th>Due</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($tickets as $ticket)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$ticket->issue_date}}</td>
                                            <td>{{$ticket->issued_by}}</td>
                                            <td>{{$ticket->reservation_pnr}}</td>
                                            <td>{{$ticket->	airline_pnr}}</td>
                                            <td>
                                                @if($ticket->	status == 'Issued')
                                                    <button type="button" class="btn btn-success">{{$ticket->status}}</button>
                                                @endif
                                                @if($ticket->	status == 'Refunded')
                                                    <button type="button" class="btn btn-info">{{$ticket->status}}</button>
                                                @endif
                                                @if($ticket->	status == 'Cancelled')
                                                    <button type="button" class="btn btn-danger">{{$ticket->status}}</button>
                                                @endif
                                                @if($ticket->	status == 'Reissued')
                                                    <button type="button" class="btn btn-warning">{{$ticket->status}}</button>
                                                @endif
                                            </td>
                                            <td>{{$ticket->vendor}}</td>
                                            <td>{{$ticket->	f_type}}</td>
                                            <td>{{$ticket->	a_price}}</td>
                                            <td>{{$ticket->	c_price}}</td>
                                            <td>{{$ticket->	vat}}</td>
                                            <td>{{$ticket->	ait}}</td>
                                            <td>{{$ticket->	payment_type}}</td>
                                            <td>
                                                @if((int)$ticket->due_amount > 0)
                                                    <button type="button" class="btn btn-danger">{{$ticket->due_amount}}</button>
                                                @else
                                                    {{$ticket->	due_amount}}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu" style="">
                                                        <a class="dropdown-item" href="{{url('viewTicket?id='.$ticket->id)}}">View</a>
                                                        <a class="dropdown-item" href="{{url('editTicketPage?id='.$ticket->id)}}">Edit</a>
                                                        <a class="dropdown-item delete" data-id="{{$ticket->id}}" data-toggle="modal" data-target="#modal-danger" href="{{url('deleteTicket?id='.$ticket->id)}}">Delete</a>
                                                        <a class="dropdown-item" href="{{url('editPaymentStatus?id='.$ticket->id)}}">Edit Payment Status</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <div class="modal fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-body">
                            <p style="text-align: center; font-size: 25px;">Are You Sure!!</p>
                        </div>
                        {{ Form::open(array('url' => 'deleteAirTicket',  'method' => 'post')) }}
                        {{ csrf_field() }}
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id" class="id">
                            <button type="submit" class="btn btn-outline-light">Delete</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4',
        })
        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $('.id').val(id);
        });
        $('#dob').datetimepicker({
            format: 'YYYY-DD-MM HH:mm:ss',
            icons: { time: 'far fa-clock' }
        });
        $('#d_time1,#a_time1').datetimepicker({
            format: 'YYYY-DD-MM HH:mm:ss',
            icons: { time: 'far fa-clock' }
        });
        $('#pax_number').on('change', function() {
            var pax_value = this.value;
            $('.feedback').remove();
            var html= '<div class="row feedback">';
            for(var i=0; i<pax_value; i++){
                var pax_name = 'pax_name'+i;
                html += '<div class="col-md-4"> <div class="form-group"> <label>Passengers</label> <select class="form-control select2bs4" name="pax_name[]" id="'+pax_name+'" style="width: 100%;" required> <option value="">Select Passenger Name</option>';
                <?php
                foreach($passengers as $passenger)
                {
                ?>
                html += '<option value="<?php echo $passenger->id; ?>"><?php echo $passenger->f_name." ".$passenger->l_name; ?></option>';
                <?php
                }
                ?>
                html += '</select></div></div>';
                html += '<div class="col-sm-4"> <div class="form-group"> <label>Ticket Number</label> <input type="text" class="form-control" id="t_number" name="t_number[]" placeholder="Enter Ticket Number" required> </div> </div>'
                html += '<div class="col-sm-4"> <div class="form-group"> <label>Luggage</label> <input type="text" class="form-control" id="luggage" name="luggage[]" placeholder="Enter Luggage" required> </div> </div>'
            }
            html += '</div>';

            $('.newPassenger').append(html);
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            });
        });

        $("body").on("click",".add_more",function(){
            var val = $('#ad_more').val();
            val = parseInt(val) + 1;
            $('#ad_more').val(val)
            var from = 'from' + val.toString();
            var to = 'to' + val.toString();
            var d_time  = 'd_time' + val.toString();
            var a_time = 'a_time'  + val.toString();
            var airline = 'airline'  + val.toString();
            var html = '';
            html += '<div class="row" id="inputFormRow" style="margin-left: 5px;">';
            html += '<div class="col-sm-3"> <div class="form-group"> <label>From</label>';
            html += '<select class="form-control select2bs4" name="a_from[]" id="'+from+'"  style="width: 100%;" required> <option value="">Select From</option>';
            <?php
                foreach($airports as $airport1)
                {
                ?>
                html += "<option value='<?php echo  $airport1->name."(".$airport1->iata_codes.")"; ?>'><?php echo $airport1->name."(".$airport1->iata_codes.")"; ?></option>";
                <?php
                    }
                ?>
            html += '</select></div></div>';
            html += '<div class="col-sm-3"><div class="form-group"> <label>To</label> <select class="form-control select2bs4" name="a_to[]" id="'+to+'" style="width: 100%;" required> <option value="">Select To</option>';
            <?php
                foreach($airports as $airport2)
                {
                ?>
                html += "<option value='<?php echo $airport2->name."(".$airport2->iata_codes.")"; ?>'><?php echo $airport2->name."(".$airport2->iata_codes.")" ; ?></option>";
                <?php
                }
                ?>
            html += '</select></div></div>';
            html += '<div class="col-sm-3"><div class="form-group"><label>Departure</label> <div class="input-group date" id="'+d_time+'" data-target-input="nearest"> <input type="text" class="form-control datetimepicker-input" data-target="#'+d_time+'" name="d_time[]" placeholder="26-09-2027 3:15 PM" required/> <div class="input-group-append" data-target="#'+d_time+'" data-toggle="datetimepicker"> <div class="input-group-text"><i class="fa fa-calendar"></i></div> </div> </div></div> </div>';
            html += '<div class="col-sm-3"> <div class="form-group"> <label>Arrival</label> <div class="input-group date" id="'+a_time+'" data-target-input="nearest"> <input type="text" class="form-control datetimepicker-input" data-target="#'+a_time+'" name="a_time[]" placeholder="26-09-2027 3:15 PM" required/> <div class="input-group-append" data-target="#'+a_time+'" data-toggle="datetimepicker"> <div class="input-group-text"><i class="fa fa-calendar"></i></div> </div> </div> </div> </div>';
            html += '<div class="col-sm-3"> <div class="form-group"> <label>Flight Number</label> <input type="text" class="form-control" id="f_number" name="f_number[]" placeholder="Enter Flight Number" required> </div> </div>';
            html += '<div class="col-sm-3"> <div class="form-group"> <label>Airlines</label> <select class="form-control select2bs4" name="airlines[]" id="'+airline+'" style="width: 100%;" required> <option value="">Select Airlines</option>';
            <?php
                foreach($airlines as $airline)
                {
                        ?>
                html += "<option value='<?php  echo $airline->name." (".$airline->code." )" ; ?>'> <?php echo $airline->name." (".$airline->code." )" ; ?></option>";
                <?php
                }
                ?>
            html += '</select></div></div>';
            html += '<div class="col-sm-2"><label></label><div class="form-group" style="margin-top: 8px;"><button type="button" class="btn btn-warning btn-block removeFlight" id="removeFlight" value="1">Remove Flight</button></div></div>';
            html += '</div>';
            $('.after-add-more').append(html);
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            });
            $('#'+d_time).datetimepicker({
                format: 'YYYY-DD-MM hh:mm',
                icons: { time: 'far fa-clock' }
            });
            $('#'+a_time).datetimepicker({
                format: 'YYYY-DD-MM hh:mm',
                icons: { time: 'far fa-clock' }
            });
        });
        $(document).on('click', '#removeFlight', function () {
            var val = $('#ad_more').val();
            val = parseInt(val) - 1;
            if(val<1)
                val = 1;
            $('#ad_more').val(val);
            $(this).closest('#inputFormRow').remove();
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            });
        });
    </script>
@endsection
