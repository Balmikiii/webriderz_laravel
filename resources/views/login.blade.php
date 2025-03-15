@extends('links')
@section('login')
    <div class="container-fluid mt-5" id="login_area">
        <div class="container login_form text-decoration-none border">
            <div class="row">
                <div class="col-sm-8 bg-light">
                    <div class="brand-logo ms-3 mt-3">
                        <a href="index.php" class="text-decoration-none text-dark">
                            <h1>logo</h1>
                        </a>
                    </div>
                    <div class="container-fluid text-center p-5 pt-0">
                        <h2 class="text-success">Loge in chating app</h2>
                        <div class="social-icon text-decoration-none mt-3 mb-3 d-flex justify-content-evenly">
                            <a href="#" class="text-dark"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="text-dark"><i class="fa-brands fa-google-plus-g"></i></a>
                            <a href="#" class="text-dark"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                        <form action="{{ url('validate') }}" class="form" method="POST">
                            @csrf
                            <input type="text" class="form-control" placeholder="Email" name="email"
                                autocomplete="off">
                            <input type="password" class="form-control mt-3" placeholder="Password" name="pwd"
                                autocomplete="off">
                            <div class="forgot mt-3 mb-3">
                                <a href="#" class="text-decoration-none text-dark">Forgot your password</a>
                            </div>
                            <input type="submit" class="btn btn-success" name="logein" value="log in">
                        </form>
                    </div>

                </div>
                <div class="col-sm-4 text-center bg-success p-5 text-light">
                    <div class="signup pt-5">
                        <h2 class="pt-5">Hello, Friend!</h2>
                        <p>Enter your personal details and start chaiting with your friends</p>
                        <input type="button" id="sign_btn" class="btn btn-outline-light" value="SIGN UP">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('login_are_cript')
    <script>
        $(document).on("click", "#sign_btn", function() {
            $.ajax({
                url: "register",
                success: function(result) {
                    $("#login_area").html(result);
                }
            });
        });

        $(document).on("click", "#login_btn", function() {
            $.ajax({
                url: "login",
                success: function(result) {
                    $("#login_area").html(result);
                }
            });
        });
    </script>
@endpush
