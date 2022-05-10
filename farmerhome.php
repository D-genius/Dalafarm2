<?php
session_start();
include_once("config.php");

//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dalafarm | Home</title>
    <link rel="icon" type="text/css" href="images/pic.ico">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        .topnav {
            overflow: hidden;
            background-color: #333;
        }
        
        .topnav a {
            float: right;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 18px 17px;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;
        }
        
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
        
        .topnav a.active {
            background-color: #04aa8e;
            color: white;
            float: left;
        }
        
        .topnav .icon {
            display: none;
        }
        
        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {
                display: none;
            }
            .topnav a.icon {
                float: right;
                display: block;
            }
        }
        
        @media screen and (max-width: 600px) {
            .topnav.responsive {
                position: relative;
            }
            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
        
        header img {
            width: 100%;
            height: 350px;
        }
        
        #first h2 {
            color: goldenrod;
            text-align: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        
        #first {
            font-size: 20px;
            padding: 20px;
            text-align: center;
        }
        
        #footercontainer {
            display: flex;
            text-align: center;
            background-color: rgb(173, 163, 163);
            height: auto;
            padding: 30px;
        }
        
        #footercontainer div {
            flex: 1;
        }
        
        #footercontainer div h4 {
            font-weight: bold;
        }
        
        .fa-google {
            color: black;
            background-color: white;
            width: 40px;
            height: 40px;
            padding-top: 7px;
            border-radius: 50%;
        }
        
        .fa-instagram {
            color: black;
            background-color: white;
            width: 40px;
            height: 40px;
            padding-top: 7px;
            border-radius: 50%;
        }
        
        .fa-pinterest {
            color: black;
            background-color: white;
            width: 40px;
            height: 40px;
            padding-top: 7px;
            border-radius: 50%;
        }
        
        .fa {
            font-size: 30px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
        }
        
        #footercontainer h2 {
            color: black;
        }
        
        #footercontainer div li {
            list-style: none;
        }
    </style>
</head>

<body>
    <section id="header">
        <div class="topnav" id="myTopnav">
            <a href="farmerhome.php" class="active">HOME</a>
            <a href="logout.php">LOGOUT</a>
            <a href="sell.php">SELL</a>
            <a href= # >ORDERS</a>
            <a href="mysellings.php">MY SALES</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </section>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    <header>
        <img src="images/bg1.jpg">
    </header>
    <section id="first">
        <h2> OUR MISSION</h2>
        <p>This is an agriculture website. The website is to sell and buy the agriculture products and monitor the details.<br>There will not be any third party mediator. All the offers will be cheap and fixed by the farmer only</br>This
            website helfull for all customers and farmers.Farmers can earn and the consumers can get the quality product At cheap cost</p>
            <br>     </br>
            <h3> <u>Your products</u> </h3>  
    </section>
    <?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
    echo '<div class="cart-view-table-front" id="view-cart">';
    echo '<h3>Your Shopping Cart</h3>';
    echo '<form method="post" action="cartupdate.php">';
    echo '<table width="100%"  cellpadding="6" cellspacing="0">';
    echo '<tbody>';

    $total =0;
    $b = 0;
    foreach ($_SESSION["cart_products"] as $cart_itm)
    {
        $product_name = $cart_itm["product_name"];
        $product_qty = $cart_itm["product_qty"];
        $product_price = $cart_itm["product_price"];
        $product_code = $cart_itm["product_code"];
        $product_color = $cart_itm["product_color"];
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
        echo '<tr class="'.$bg_color.'">';
        echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
        echo '<td>'.$product_name.'</td>';
        echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
        echo '</tr>';
        $subtotal = ($product_price * $product_qty);
        $total = ($total + $subtotal);
    }
    echo '<td colspan="4">';
    echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
    echo '</td>';
    echo '</tbody>';
    echo '</table>';
    
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
    echo '</div>';

}
?>
<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT productname, descriptions, price,product_code,image FROM insertproducts LEFT JOIN images ON insertproducts.id=images.id");
if($results){ 
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
    <li class="product">
    <form method="post" action="cart_update.php">
    <div class="product-content"><h3>{$obj->productname}</h3>
    <div class="product-thumb"><img src="sell_images/{$obj->image}"></div>
    <div class="product-desc">{$obj->descriptions}</div>
    <div class="product-info">
    Price: Ksh {$obj->price} 
    
    <input type="hidden" name="product_code" value="{$obj->product_code}" />
    <input type="hidden" name="type" value="add" />
    <input type="hidden" name="return_url" value="{$current_url}" />
    <a href="mysellings.php" type="submit" class="button">View</a>
    </div>
    </div></div>
    </form>
    </li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>    


    <section id="footercontainer">
        <div style="padding-top: 20px;">
            <img src="pic.ico" style="height: 80px; width: 80px;">
            <div style="padding-top: 20px;">
                <h6>2021 Dalafarm | Best quality farm products.</h6>
                <h6>All rights reserved.</h6>
            </div>

        </div>
        <div style="padding-top: 10px; ">
            <ul>
                <h4>OUR SITES</h4>
                <br> </br>
                <li>
                    <a href="customersignup.html " class="btn " ">signup as customer!</a>
                </li>
                <li>
                    <a href="farmersignup.html " class="btn " ">signup as farmer</a>
                </li>
                <li>
                   <form method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>">
                              <br/> Send us your feedback! <br/>      
                      Name: <input type="text" name="name" > <br />
                      email: <input type="email" name="email" > <br />
                      Subject: <input type="text" name="subject" > <br />
                      Message: <textarea name="msg"></textarea>
                      <button type="submit" name="send_message_btn">Send</button>  
                </li>
            </ul>
        </div>
        <div style="padding-top: 20px;">
            <div>
                <h4>Social Media</h4>
                <a href="#" class="fa fa-google"></a>&nbsp;&nbsp;
                <a href="#" class="fa fa-instagram"></a>&nbsp;&nbsp;
                <a href="#" class="fa fa-pinterest"></a>
            </div>
        </div>

    </section>
</body>

</html>
