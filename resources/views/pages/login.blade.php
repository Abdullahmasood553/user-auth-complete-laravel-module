@extends('layouts.master')
@section('content')

  <section>
      <div class="container">
          <div class="row ">
              <div class="col-md-6 mx-auto">
                  <div class="card">
                      <div class="card-header bg-dark text-white">
                            <h4 class="text-center">Account Login</h4>
                      </div>
                      <div class="card-body">
                          <form >
                              <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" name="email" id="email" class="form-control">
                              </div>

                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                  
                            <button type="submit" class="btn btn-dark btn-block" id="loginBtn">LOGIN</button>
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
        $("#loginBtn").click(function(e) {
  
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            e.preventDefault();
            var email     = $("#email").val();
            var password  = $("#password").val();
    
            $.ajax({
                url: 'user_login',
                type: 'POST',
                data: {
                    email: email,
                    password: password
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                      if(data.success) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'green');
                    $('#notifDiv').text('User Successfully Login');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                    window.location = "{{ route('dashboard') }}";
                  } else if(data.verify_email) {
                      $('#notifDiv').fadeIn();
                       $('#notifDiv').css('background', 'red');
                       $('#notifDiv').text('Verify your account first from email');
                       setTimeout(() => {
                        $('#notifDiv').fadeOut();
                       }, 3000);
                    }
                    } 
                     else {
                       $('#notifDiv').fadeIn();
                       $('#notifDiv').css('background', 'red');
                       $('#notifDiv').text('An error occured. Please try later');
                       setTimeout(() => {
                        $('#notifDiv').fadeOut();
                       }, 3000);
                    }
                }
            });
          });  
        }); 
</script>
@endpush


