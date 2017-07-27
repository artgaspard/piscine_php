<?php
session_start();
//include 'add_bag.php';
 	function modif_qty_bag($id, $n_qty)
    {
        session_start();
        $nb_items = count($_SESSION['bag']['id']);
        for ($i = 0; $i < $nb_items; $i++)
            if ($id == $_SESSION['bag']['id'][$i])
                $_SESSION['bag']['qty'][$i] = $n_qty;
    }
    function count_qty($id)
    {
        session_start();
        $nb_items = count($_SESSION['bag']['id']);
        for ($i = 0; $i < $nb_items; $i++)
            if ($id == $_SESSION['bag']['id'][$i])
                return ($_SESSION['bag']['qty'][$i]);
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
            echo("Bag has been created\n\n");
        }
        array_push($_SESSION['bag']['id'], $data['id']);
        array_push($_SESSION['bag']['item'], $data['item']);
        array_push($_SESSION['bag']['qty'], $data['qty']);
        array_push($_SESSION['bag']['price'], $data['price']);
        echo("Article added with success\n\n");
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
                    echo("Bag's content has been removed.\n");
        }
        else
            echo("Item has been removed.");
    }
$file = unserialize(file_get_contents('database/products'));
?>
<html><body>
<br />
<td><a href="./index.php?link=cat&cat=katana">KATANAS</a></td>
<br />
<?php
if ($_GET['cat'] == 'katana')
{
    $i = 0;
    while ($file[$i] != NULL)
    {
        $j = 0;
        while ($file[$i][$j] != NULL)
        {
            if ($file[$i][$j]['type1'] == $_GET['cat'])
            {
                ?>
                <div class="product">
                    <?php 
                echo "<p class='product-title'>".$file[$i][$j]['item']."</p>";
                if ($file[$i][$j]['type2'] == 'sales')
                    echo "- NOW ON SALES !"."\n";
                echo '<br />';
                echo '<div class="product-img-box"><img class="product-img" src='.$file[$i][$j]['picture'].' /></div>'."\n";
                echo '<br />';
                echo "<p class='product-content'>".$file[$i][$j]['carac']."\n"."</p>";
                echo '<br />';
                echo "Price: ".$file[$i][$j]['price']."€\n";
                echo '<br />';
                echo '<form action="add_bag.php" method="POST">
                <input type="hidden" name="id" value="'.$file[$i][$j]['id'].'">
                <input type="hidden" name="price" value="'.$file[$i][$j]['price'].'">
                <input type="hidden" name="item" value="'.$file[$i][$j]['item'].'">
                <input type="number" name="qty" step="1" value="1" max="99" min="1">
                ';
                if (isinbag($file[$i][$j]['id']))
                {
                    echo('You have already <b>'.count_qty($file[$i][$j]['id']).'</b> of <b>'.$file[$i][$j]['item'].'</b> in your bag.<br />'); //Find nb of nunchaku
                    echo('<input type="submit" name="add" value="Add more"/>');
                    echo('</form>');
                    echo('<form action="del_item.php" method="POST">');
                    echo('<input type="hidden" name="id" value="'.$file[$i][$j]['id'].'">');
                    echo('<input type="submit" name="remove" value="Remove"/>');
                    echo '</form><br />';
                }
                else
                {
                    echo('<br /><input type="submit" name="add" value="Add"/>');
                    echo('</form>');
                }
                echo '<br />';
                ?>
                </div>
            <?php
            }
            $j++;
        }
        $i++;
    }
}
?>
<br />
<a href="./index.php?link=cat&cat=shuriken">SHURIKENS</a>
<br />
<?php
if ($_GET['cat'] == 'shuriken')
{
    $i = 0;
    while ($file[$i] != NULL)
    {
        $j = 0;
        while ($file[$i][$j] != NULL)
        {
            if ($file[$i][$j]['type1'] == $_GET['cat'])
            {
                ?>
                <div class="product">
                    <?php 
                echo "<p class='product-title'>".$file[$i][$j]['item']."</p>";
                if ($file[$i][$j]['type2'] == 'sales')
                    echo "- NOW ON SALES !"."\n";
                echo '<br />';
                echo '<div class="product-img-box"><img class="product-img" src='.$file[$i][$j]['picture'].' /></div>'."\n";
                echo '<br />';
                echo "<p class='product-content'>".$file[$i][$j]['carac']."\n"."</p>";
                echo '<br />';
                echo "Price: ".$file[$i][$j]['price']."€\n";
                echo '<br />';
                echo '<form action="add_bag.php" method="POST">
                <input type="hidden" name="id" value="'.$file[$i][$j]['id'].'">
                <input type="hidden" name="price" value="'.$file[$i][$j]['price'].'">
                <input type="hidden" name="item" value="'.$file[$i][$j]['item'].'">
                <input type="number" name="qty" step="1" value="1" max="99" min="1">
                ';
                if (isinbag($file[$i][$j]['id']))
                {
                    echo('You have already <b>'.count_qty($file[$i][$j]['id']).'</b> of <b>'.$file[$i][$j]['item'].'</b> in your bag.<br />'); //Find nb of nunchaku
                    echo('<input type="submit" name="add" value="Add more"/>');
                    echo('</form>');
                    echo('<form action="del_item.php" method="POST">');
                    echo('<input type="hidden" name="id" value="'.$file[$i][$j]['id'].'">');
                    echo('<input type="submit" name="remove" value="Remove"/>');
                    echo '</form><br />';
                }
                else
                {
                    echo('<br /><input type="submit" name="add" value="Add"/>');
                    echo('</form>');
                }
                echo '<br />';
                ?>
                </div>
            <?php
            }
            $j++;
        }
        $i++;
    }
}
?>
<br />
<a href="./index.php?link=cat&cat=nunchuk">NUNCHUKS</a>
<br />
<?php
if ($_GET['cat'] == 'nunchuk')
{
    $i = 0;
    while ($file[$i] != NULL)
    {
        $j = 0;
        while ($file[$i][$j] != NULL)
        {
            if ($file[$i][$j]['type1'] == $_GET['cat'])
            {
                ?>
                <div class="product">
                    <?php 
                echo "<p class='product-title'>".$file[$i][$j]['item']."</p>";
                if ($file[$i][$j]['type2'] == 'sales')
                    echo "- NOW ON SALES !"."\n";
                echo '<br />';
                echo '<div class="product-img-box"><img class="product-img" src='.$file[$i][$j]['picture'].' /></div>'."\n";
                echo '<br />';
                echo "<p class='product-content'>".$file[$i][$j]['carac']."\n"."</p>";
                echo '<br />';
                echo "Price: ".$file[$i][$j]['price']."€\n";
                echo '<br />';
                echo '<form action="add_bag.php" method="POST">
                <input type="hidden" name="id" value="'.$file[$i][$j]['id'].'">
                <input type="hidden" name="price" value="'.$file[$i][$j]['price'].'">
                <input type="hidden" name="item" value="'.$file[$i][$j]['item'].'">
                <input type="number" name="qty" step="1" value="1" max="99" min="1">
                ';
                if (isinbag($file[$i][$j]['id']))
                {
                    echo('You have already <b>'.count_qty($file[$i][$j]['id']).'</b> of <b>'.$file[$i][$j]['item'].'</b> in your bag.<br />'); //Find nb of nunchaku
                    echo('<input type="submit" name="add" value="Add more"/>');
                    echo('</form>');
                    echo('<form action="del_item.php" method="POST">');
                    echo('<input type="hidden" name="id" value="'.$file[$i][$j]['id'].'">');
                    echo('<input type="submit" name="remove" value="Remove"/>');
                    echo '</form><br />';
                }
                else
                {
                    echo('<br /><input type="submit" name="add" value="Add"/>');
                    echo('</form>');
                }
                echo '<br />';
                ?>
                </div>
            <?php
            }
            $j++;
        }
        $i++;
    }
}
?>
<br />
<a href="./index.php?link=cat&cat=sales">SALES</a>
<br />
<?php
if ($_GET['cat'] == 'sales')
{
    $i = 0;
    while ($file[$i] != NULL)
    {
        $j = 0;
        while ($file[$i][$j] != NULL)
        {
            if ($file[$i][$j]['type2'] == $_GET['cat'])
            {
                ?>
                <div class="product">
                    <?php 
                echo "<p class='product-title'>".$file[$i][$j]['item']."</p>";
                if ($file[$i][$j]['type2'] == 'sales')
                    echo "- NOW ON SALES !"."\n";
                echo '<br />';
                echo '<div class="product-img-box"><img class="product-img" src='.$file[$i][$j]['picture'].' /></div>'."\n";
                echo '<br />';
                echo "<p class='product-content'>".$file[$i][$j]['carac']."\n"."</p>";
                echo '<br />';
                echo "Price: ".$file[$i][$j]['price']."€\n";
                echo '<br />';
                echo '<form action="add_bag.php" method="POST">
                <input type="hidden" name="id" value="'.$file[$i][$j]['id'].'">
                <input type="hidden" name="price" value="'.$file[$i][$j]['price'].'">
                <input type="hidden" name="item" value="'.$file[$i][$j]['item'].'">
                <input type="number" name="qty" step="1" value="1" max="99" min="1">
                ';
                if (isinbag($file[$i][$j]['id']))
                {
                    echo('You have already <b>'.count_qty($file[$i][$j]['id']).'</b> of <b>'.$file[$i][$j]['item'].'</b> in your bag.<br />'); //Find nb of nunchaku
                    echo('<input type="submit" name="add" value="Add more"/>');
                    echo('</form>');
                    echo('<form action="del_item.php" method="POST">');
                    echo('<input type="hidden" name="id" value="'.$file[$i][$j]['id'].'">');
                    echo('<input type="submit" name="remove" value="Remove"/>');
                    echo '</form><br />';
                }
                else
                {
                    echo('<br /><input type="submit" name="add" value="Add"/>');
                    echo('</form>');
                }
                echo '<br />';
                ?>
                </div>
            <?php
            }
            $j++;
        }
        $i++;
    }
}
?>
<br />
</body></html>
