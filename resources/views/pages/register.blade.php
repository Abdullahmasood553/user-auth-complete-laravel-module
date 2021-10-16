@extends('layouts.master')
@section('content')

    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                              <h4 class="text-center">Account Register</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">
                                </div>
    
                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name">
                                </div>
    
    
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                                </div>
    
                                <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                              </div>
    
                              <button type="submit" class="btn btn-dark btn-block" id="save_form">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection





@push('javascript')
<script>
        $(document).ready(function() {
            $('#save_form').on('click', function(e) {
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var email = $("#email").val();
                var password = $("#password").val();
    
                $.ajax({
                    type: 'POST',
                    url: 'save_register',
                    data: {
                        '_token': '<?= csrf_token() ?>',
                        email: email,
                        fname: fname,
                        lname: lname,
                        password: password
                    },
                    success:function(data) {
                if (data.exists) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'red');
                    $('#notifDiv').text('Email already exists');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                } else if (data.success) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'green');
                    $('#notifDiv').text(data.success);
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                    $('[name="fname"]').val('');
                    $('[name="lname"]').val('');
                    $('[name="email"]').val('');
                    $('[name="password"]').val('');
                } else {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'red');
                    $('#notifDiv').text('An error occured. Please try later');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
                $(this).text('Save');
                $(this).removeAttr('disabled');
                 }.bind($(this))
                });
            });
        });
    </script>
@endpush




