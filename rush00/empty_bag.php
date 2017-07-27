<?php
    function empty_bag()
    {
        session_start();
        unset($_SESSION['bag']);
        if (!isset($_SESSION['bag']))
           return (TRUE);
        return (FALSE);
    }
    if (empty_bag() === TRUE)
        header('Location: '.$_SERVER["HTTP_REFERER"].'');
?>