<?php
    session_start();
    
    if(isset($_SESSION['staffEmail'])) {
        unset($_SESSION['designation']);
        unset($_SESSION['staffEmail']);
        unset($_SESSION['staffName']);
        unset($_SESSION['department']);
        unset($_SESSION['semester']);
        unset($_SESSION['section']);
        unset($_SESSION['studentBatch']);
        unset($_SESSION['rollNumber']);
        
        echo "<script>window.open('../../index.php','_blank').focus();</script>";
        echo "<script>window.close();</script>";
        exit(0);
    }
    
    if(isset($_SESSION['studentEmail'])) {
       unset($_SESSION['designation']);
        unset($_SESSION['studentEmail']);
        unset($_SESSION['studentName']);
        unset($_SESSION['department']);
        unset($_SESSION['semester']);
        unset($_SESSION['section']);
        unset($_SESSION['studentBatch']);
        unset($_SESSION['rollNumber']);
        
        echo "<script>window.open('../../index.php','_blank').focus();</script>";
        echo "<script>window.close();</script>";
        exit(0);
    }
    
?>