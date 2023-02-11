<!-- success-message-session :: start -->
<?php
    if(isset($_SESSION['successMessage'])):
?>
    <div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong> <?= $_SESSION['successMessage']; ?> </strong>
    </div>
    
<?php
    unset($_SESSION['successMessage']);
    endif;
?>
<!-- success-message-session :: end -->