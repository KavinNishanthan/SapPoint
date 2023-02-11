<!-- error-message-session :: start -->
<?php
    if(isset($_SESSION['errorMessage'])):
?>
    <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close cancel" data-dismiss="alert" aria-label="close">&times;</a>
    <strong> <?= $_SESSION['errorMessage']; ?> </strong>
    </div>
    
<?php
    unset($_SESSION['errorMessage']);
    endif;
?>
<!-- error-message-session :: end -->