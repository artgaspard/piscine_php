<?php
session_start();
    function isinbag($id) //Doublon (also in add_bag)
    {
        session_start();
        if (count($_SESSION['bag']['id']) === 0)
            return (FALSE);
        foreach ($_SESSION['bag']['id'] as $key)
            if ($key == $id)
                return (TRUE);
        return (FALSE);
    }
    function empty_bag() //Doublon (also in empty_bag)
    {
        session_start();
        unset($_SESSION['bag']);
        if (!isset($_SESSION['bag']))
           return (TRUE);
        return (FALSE);
	}
    function del_item($id)
    {
        session_start();
        if (isinbag($id) === FALSE)
            return (FALSE);
        $new = array("id"=>array(), "name"=>array(), "qty"=>array(), "price"=>array());
        $nb_items = count($_SESSION['bag']['id']);
        if ($nb_items == 0)
            return ;
        for ($i = 0; $i < $nb_items; $i++)
        {
            if ($_SESSION['bag']['id'][$i] != $id)
            {
                array_push($new['id'], $_SESSION['bag']['id'][$i]);
                array_push($new['name'], $_SESSION['bag']['name'][$i]);
                array_push($new['qty'], $_SESSION['bag']['qty'][$i]);
                array_push($new['price'], $_SESSION['bag']['price'][$i]);
            }
        }
        $_SESSION['bag'] = $new;
        unset($new);
        if (count($_SESSION['bag']['id']) == 0)
        {
                if (empty_bag() === TRUE)
                 ;   // echo("Bag's content has been removed.\n");
        }
        else
           ; // echo("Item has been removed.");
    }
    session_start();
    del_item($_POST['id']);
    header ('Location: '.$_SERVER["HTTP_REFERER"].'');
?>
