<!-- success-message-session :: start -->
<?php
    if(isset($_SESSION['warningMessage'])):
?>
    <div class="alert alert-warning alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong> <?= $_SESSION['warningMessage']; ?> </strong>
    </div>
    
<?php
    unset($_SESSION['warningMessage']);
    endif;
?>
<!-- success-message-session :: end -->