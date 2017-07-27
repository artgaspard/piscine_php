<html>
    <head>
    </head>
    <body>
        <img src="https://media.cdnws.com/_i/7819/cs200-3577/1337/77/katana-urban-camo-102cm-socle-bois-deco.jpeg" />
        <br />
        <form method="POST" action="add_bag.php">
            <input type="number" name="qty" step="1" value="1" max="99" min="1">
            <input type="submit" name="addbag" value="Add to my bag">
            <input type="hidden" name="id" value="1">
            <input type="hidden" name="price" value="129.99">
            <input type="hidden" name="name" value="Katana 102cm">
        </form>
        <form method="POST" action="del_item.php">
            <input type="submit" name="del_item" value="Delete">
            <input type="hidden" name="id" value="1">
        </form>
        <img src="https://media.cdnws.com/_i/7819/cs200-7259/2186/61/petit-katana-45cm-socle-bois-deco-samourai.jpeg" />
        <br />
        <form method="POST" action="add_bag.php">
            <input type="number" name="qty" step="1" value="1" max="99" min="1">
            <input type="submit" name="addbag" value="Add to my bag">
            <input type="hidden" name="id" value="2">
            <input type="hidden" name="price" value="49.99">
            <input type="hidden" name="name" value="Katana 45cm">
        </form>
        <form method="POST" action="del_item.php">
            <input type="submit" name="del_item" value="Delete">
            <input type="hidden" name="id" value="2">
        </form>
        <img src="https://swordsandarmor.files.wordpress.com/2010/12/hanwei-sh2439-lion-dog-katana.jpg" />
        <br />
        <form method="POST" action="add_bag.php">
            <input type="number" name="qty" step="1" value="1" max="99" min="1">
            <input type="submit" name="addbag" value="Add to my bag">
            <input type="hidden" name="id" value="3">
            <input type="hidden" name="price" value="394.49">
            <input type="hidden" name="name" value="Hanwei SH2439-Lion Dog Katana">
        </form>
        <form method="POST" action="del_item.php">
            <input type="submit" name="del_item" value="Delete">
            <input type="hidden" name="id" value="3">
        </form>
        <br /><br />
        <form method="POST" action="empty_bag.php">
            <input type="submit" name="emptybag" value="Empty my bag">
        </form>
        <a href="bag.php">My Bag</a>
    </body>
</html>