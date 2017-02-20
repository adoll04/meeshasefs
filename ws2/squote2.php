<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> SOAP Web Service Demo</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header>
    <a href="soap.html"id="logo">
        <h1>Web Service Demonstration</h1>
        <h1>SOAP Web Service</h1>
    </a>

</header>



<div id="wrapper">
    <section>

        <h3> The web services desciption language link (WSDL) is here: </h3>
        <H3><a href="http://loki.ist.unomaha.edu/~groyce/ws/stockquoteservice.php?wsdl" class="bigRedLink">http://loki.ist.unomaha.edu/~groyce/ws/stockquoteservice.php?wsdl</></a></H3>
        <h2>&nbsp;</h2>

        <?php
       $quote = $_POST['stquote'];
        print "<br><br>";

        print "Stock Symbol is:  $quote";
        require_once('nusoap.php');

        $c = new nusoap_client('http://loki.ist.unomaha.edu/~groyce/ws/stockquoteservice.php');

        $stockprice = $c->call('getStockQuote',
            array('symbol' => $quote));

        echo "<br><br><h2> Price in dollars delayed by 20 minutes     $</h2>";
        echo "Stock Price is : ";

        print "<font size=6pt>$stockprice <br><br>";
        ?>


    </section>











</div>
</body>

</html>

