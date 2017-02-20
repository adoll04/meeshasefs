@extends('app')
@section('content')
    <h1>Customer </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <!--tr class="bg-info"-->
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Customer ID</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
        </table>
    </div>


    <?php
    $stockprice=null;
    $stotal = 0;
    $svalue=0;
    $itotal = 0;
    $ivalue=0;
    $investmentinvportfolio=0;
    $investmentcustportfolio=0;
    $invportfolio = 0;
    $custportfolio = 0;
    $price =0;
    $mutualPortfolioValue=0;
    $total_stock_purchase_value=0;
    $total_stock_current_value=0;
    ?>
    <br>
    <h2>Stocks </h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th> Symbol </th>
                <th>Stock Name</th>
                <th>No. of Shares</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
                <th>Original Value</th>
                <th>Current Price</th>
                <th>Current Value</th>
            </tr>
            </thead>

            <tbody>


            @foreach($customer->stocks as $stock)
                <tr>
                    <td>{{ $stock->symbol }}</td>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->shares }}</td>
                    <td>{{ $stock->purchase_price }}</td>
                    <td>{{ $stock->purchased }}</td>
                    <td>{{($stock->shares) *($stock->purchase_price )}}</td>

                    <?php $total_stock_purchase_value = $total_stock_purchase_value + ($stock['purchase_price'] * $stock['shares'] )?>
                    <td>
                        <?php
                        $ssymbol= $stock->symbol;
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
                        $cstockprice=$price;
                        ?>
                        {{ $cstockprice }}
                    </td>
                    <td>{{($cstockprice * $stock['shares'])}}</td>
                    <?php $total_stock_current_value = $total_stock_current_value + ($cstockprice * $stock['shares'] )?>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p> Total of Initial Stock  Portfolio  <?php echo printf("$%01.2f", $total_stock_purchase_value)  ?></p>

        <p> Total of  Current Stock  Portfolio    <?php  printf("$%01.2f", $total_stock_current_value) ?></p>

    </div>
<br/>

    <h2>Investments</h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th> Category </th>
                <th>Description</th>
                <th>Acquired Value</th>
                <th>Acquired Date</th>
                <th>Recent Value </th>
                <th>Recent Date</th>
            </tr>
            </thead>

            <tbody>
                @foreach($customer->investments as $investments)
                    <tr>
                        <td>{{ $investments->category }}</td>
                        <td>{{ $investments->description }}</td>
                        <td>{{$investments->acquired_value }}</td>
                        <td>{{$investments->acquired_date }}</td>
                        <td>{{ $investments->recent_value }}</td>
                        <td>{{$investments ->recent_date}}</td>

                        <?php
                        $investmentinvportfolio+=$investments->acquired_value;
                        ?>

                        <?php
                        $investmentcustportfolio+=$investments->recent_value;
                        ?>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p> Total of Initial Investment Portfolio  <?php echo number_format( $investmentinvportfolio,2) ?></p>

        <p> Total of  Current Investment Portfolio    <?php  echo number_format($investmentcustportfolio,2) ?></p>

    </div>
    <br>
    <br>
    <h2>Summary of Portfolio  </h2>
    <p> Total Value of Initial Portfolio value  <?php printf("$%01.2f",$investmentinvportfolio +$total_stock_purchase_value ) ?></p>
    <p> Total Value of Current Portfolio value    <?php printf("$%01.2f",$total_stock_current_value+$investmentcustportfolio) ?></p>
    </div>
@stop
