<div class="container signup_form text-decoration-none border">
    <div class="row">
        <div class="col-sm-8 bg-success text-light">
            <div class="brand-logo ms-3 mt-3">
                <a href="index.php" class="text-decoration-none text-light"><h1>logo</h1></a>
            </div>
            <div class="container-fluid text-center p-5 pt-0">
                <h2 class="text-light">Sign in chating app</h2>
                <div class="social-icon text-decoration-none mt-3 mb-3 d-flex justify-content-evenly">
                    <a href="#" class="text-light"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="text-light"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="text-light"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" required>
                    <input type="text" class="form-control mt-3" placeholder="Email" name="email" autocomplete="off" required>
                    <input type="password" class="form-control mt-3 mb-3" placeholder="Password" name="pwd" autocomplete="off" required>
                    <input type="file" class="form-control mt-3 mb-3" name="file" autocomplete="off">
                    <input type="submit" class="btn btn-outline-light" name="signup" value="Sign up">
                </form>
            </div>
        </div>
        <div class="col-sm-4 text-center bg-light p-5 text-dark">
            <div class="signup pt-5">
                <h2 class="pt-5">Hello, Friend!</h2>
                <p>Enter your personal details and start chating with your friends</p>
                <input type="button" id="login_btn" class="btn btn-outline-success text-dark" value="Loge in">
            </div>
        </div>
    </div>
</div>
