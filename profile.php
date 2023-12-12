
<?php
include('core/sessions.php');
include('inc/header.php');
include ('core/validation.php');


?>
<?php
include('navbar.php');
?>

<h1>Profile page</h1>



    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto bg-light my-5 border border-dark border-3">
                <h1 class=" p-2 mt-3"> Profile </h1>
                <div class="mb-5">
                    
                    <h2>Name : <?php echo $_SESSION['auth'][0]?? ' ';?> </h2>
                    <h2>Email :<?php echo $_SESSION['auth'][1]?? ' ';?> </h2>
                </div>

            </div>
        </div>
    </div>


    <?php
include('inc/footer.php');
?>