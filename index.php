<!DOCTYPE html>
<html>
<head>
  <title>Received Values</title>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
    }
  </style>
</head>
<body>

<?php

// Check if all the required parameters are present
if(isset($_GET['ID_stock']) && isset($_GET['date_stock']) && isset($_GET['amountTotal']) && isset($_GET['totalPrice']) && isset($_GET['employee']) && isset($_GET['detail'])) {

  // Get the values of the parameters
  $ID_stock = $_GET['ID_stock'];
  $date_stock = $_GET['date_stock'];
  $amountTotal = $_GET['amountTotal'];
  $totalPrice = $_GET['totalPrice'];
  $employee = $_GET['employee'];
  $detail = $_GET['detail'];

  // Decode the detail parameter value
  $decoded_detail = urldecode($detail);

  // Split the decoded detail parameter value into an array of key-value pairs
  $detail_array = explode("&", $decoded_detail);
  $detail_values = array();
  foreach ($detail_array as $detail_pair) {
    $pair_parts = explode("=", $detail_pair);
    $detail_values[$pair_parts[0]] = urldecode($pair_parts[1]);
  }

  // Get the values from the detail array
  $detell_stock_ID = $detail_values['detell_stock_ID'];
  $choose = $detail_values['choose'];
  $p_name = $detail_values['p_name'];
  $p_price = $detail_values['p_price'];
  $p_amount = $detail_values['p_amount'];
  $unit = $detail_values['unit'];
  $money = $detail_values['money'];
  $timestant = $detail_values['timestant'];

  // Display the received values in a table
  echo "<h1>Received Values</h1>";
  echo "<table>";
  echo "<tr><th>ID_stock</th><td>" . $ID_stock . "</td></tr>";
  echo "<tr><th>date_stock</th><td>" . $date_stock . "</td></tr>";
  echo "<tr><th>amountTotal</th><td>" . $amountTotal . "</td></tr>";
  echo "<tr><th>totalPrice</th><td>" . $totalPrice . "</td></tr>";
  echo "<tr><th>employee</th><td>" . $employee . "</td></tr>";
  echo "</table>";
  echo "<br>";
  echo "<h2>Details</h2>";
  echo "<table>";
  echo "<tr><th>detell_stock_ID</th></tr>";
  $detell_stock_ID_array = explode(",", $detell_stock_ID);
  foreach ($detell_stock_ID_array as $value) {
    echo "<tr><td>" . $value . "</td></tr>";
  }
  echo "<table>";
  echo "<tr><th>ID_stock</th><td>" . $ID_stock . "</td></tr>";
  echo "<tr><th>date_stock</th><td>" . $date_stock . "</td></tr>";
  echo "<tr><th>amountTotal</th><td>" . $amountTotal . "</td></tr>";
  echo "<tr><th>totalPrice</th><td>" . $totalPrice . "</td></tr>";
  echo "<tr><th>employee</th><td>" . $employee . "</td></tr>";
  echo "<tr><th>detell_stock_ID</th><td colspan='7'>" . $detell_stock_ID . "</td></tr>";
  echo "</table>";
  echo "<br>";
//   the second table----------------
  echo "<table>";
  echo "<tr><th>choose</th><th>p_name</th><th>p_price</th><th>p_amount</th><th>unit</th><th>money</th><th>timestant</th></tr>";
  $choose_array = explode(",", $choose);
  $p_name_array = explode(",", $p_name);
  $p_price_array = explode(",", $p_price);
  $p_amount_array = explode(",", $p_amount);
  $unit_array = explode(",", $unit);
  $money_array = explode(",", $money);
  $timestant_array = explode(",", $timestant);
  
  for ($i = 0; $i < count($choose_array); $i++) {
      echo "<tr><td>" . $choose_array[$i] . "</td><td>" . $p_name_array[$i] . "</td><td>" . $p_price_array[$i] . "</td><td>" . $p_amount_array[$i] . "</td><td>" . $unit_array[$i] . "</td><td>" . $money_array[$i] . "</td><td>" . $timestant_array[$i] . "</td></tr>";
  }
  
  echo "</table>";
} else {
    echo "One or more required parameters are missing!";
  }

  