<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> REST Web Service Demo</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header>
    <a href="soap.html"id="logo">
        <h1>Web Service Demonstration</h1>
        <h1>REST Web Service</h1>
    </a>

</header>



<div id="wrapper">
    <section>
        <H3> The link to the REST web service for AAPL is here: <a
                href="http://www.google.com/finance/info?q=NSE:AAPL"><font face="Arial, Helvetica, sans-serif">http://www.google.com/finance/info?q=NSE:AAPL</font></a>
        </H3>


        <?php
       $ssymbol = $_POST['stquote'];
        echo "<br><br>";

        print "Stock Symbol is:  $ssymbol";

        $URL = "http://www.google.com/finance/info?q=NSE:" . $ssymbol;
        $file = fopen("$URL", "r");
        $r = "";
        do {
            $data = fread($file, 500);
            $r .= $data;
        } while (strlen($data) != 0);
        //Remove CR's from ouput - make it one line
        $json = str_replace("\n", "", $r);

        //Remove //, [ and ] to build qualified string
        $data = substr($json, 4, strlen($json) - 5);

        //decode JSON data
        $json_output = json_decode($data, true);
        //echo $sstring, "<br>   ";
        $price = "\n" . $json_output['l'];
var_dump(json_decode($data));
var_dump($price);
        //echo "<br><br>";
       echo "Price in dollars delayed by 20 minutes $ ";
       echo $price;


        ?>

    </section>











</div>
</body>

</html>

