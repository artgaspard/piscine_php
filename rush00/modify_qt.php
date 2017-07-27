<?php
    function modif_qty_bag($id, $n_qty)
    {
        session_start();
        $nb_items = count($_SESSION['bag']['id']);
        for ($i = 0; $i < $nb_items; $i++)
            if ($id == $_SESSION['bag']['id'][$i])
                $_SESSION['bag']['qty'][$i] = $n_qty;
    }
    session_start();
    modif_qty_bag($_POST['id'], $_POST['qty']);
    header ('Location: '.$_SERVER["HTTP_REFERER"].'');
?>