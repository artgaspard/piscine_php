<?php
    function modif_qty_bag($id, $n_qty)
    {
        session_start();
        $nb_items = count($_SESSION['bag']['id']);
        for ($i = 0; $i < $nb_items; $i++)
            if ($id == $_SESSION['bag']['id'][$i])
                $_SESSION['bag']['qty'][$i] += $n_qty;
    }
    function add_bag($data) //$data = array de donnees de l'article (id, nom, prix, quntite)
    {
        session_start();
        if (!isset($_SESSION['bag']))
        {
            $_SESSION['bag'] = array();             // Panier
            $_SESSION['bag']['id'] = array();
            $_SESSION['bag']['item'] = array();     // Nom de l'article
            $_SESSION['bag']['price'] = array();    // Prix de l'article
            $_SESSION['bag']['qty'] = array();       // Quantite
            //echo("Bag has been created\n\n");
        }
        array_push($_SESSION['bag']['id'], $data['id']);
        array_push($_SESSION['bag']['item'], $data['item']);
        array_push($_SESSION['bag']['qty'], $data['qty']);
        array_push($_SESSION['bag']['price'], $data['price']);
        //echo("Article added with success\n\n");
    }

    function isinbag($id)
    {
        session_start();
        if (count($_SESSION['bag']['id']) === 0)
            return (FALSE);
        foreach ($_SESSION['bag']['id'] as $key)
            if ($key == $id)
                return (TRUE);
        return (FALSE);
    }
    session_start();
    $data['id'] = $_POST['id'];
    $data["qty"] = (int)$_POST['qty'];
    $data['item'] = $_POST['item'];
    $data['price'] = $_POST['price'];
    if (isinbag($data['id']) === FALSE)
        add_bag($data);
    else
        modif_qty_bag($data['id'], $data['qty']);
    header ('Location: '.$_SERVER["HTTP_REFERER"].'');
?>
