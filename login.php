
<?php
include('core/sessions.php');
include('inc/header.php');
include('navbar.php');
include ('core/validation.php');


?>
<h1>Login Page</h1>


<div class="container">
        <div class="row">
            <div class="col-8 mx-auto bg-light my-5 border border-dark border-3 p-4">
                <h1 class="text-center mb-4">Login Page</h1>
                <form  method="POST"  action="handelers/handelLogin.php">
                <?php foreach(sessionGet('login') as $error):?>
                        <div class="alert alert-danger p-1"><?php echo $error; ?></div>
                    <?php endforeach ?>
                    <?php sessionRemove("login"); ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com" aria-label="Email address" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" aria-label="Password" name="password"  >
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
<?php
include('inc/footer.php');
?>