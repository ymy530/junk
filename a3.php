
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Company Inventory</title>
</head>
<body>
<script src = "a3.js"></script>
<?php
include 'connectdb.php';
?>
<h1>Welcome to Inventory</h1>

<!-- -->
<!-- Check what products that customer purchased -->
<h2>Our Customers</h2>
<!-- Get customer list in radio buttom -->
<form action="getcustomer.php" method="post">
<?php
   echo "Who are you looking up? </br>";
   include 'getdata.php';
?>
<input type="submit" value="Get Customer's Purchased">
</form>

<hr>
<!-- View all the products information by different orders(price and description) -->
<h2> View All The Products  </h2>
<!-- After user click on slidedown bar, the product information show on the same page -->
<form action="" method="post">
      <select name="pickaorder" id = "pickaorder">     
      <option value="1"> Select Here </option>
      <option value="AP"> Ascending Price </option>
      <option value="DP"> Descending Price </option>
      <option value="AD"> Ascending Description </option>
      <option value="DD"> Descending Description </option>     	
      </select>
</form>
<hr>
<!-- Return the products list with correspond order that user selected -->
 <?php
    if (isset($_POST['pickaorder'])) { 
      include "connectdb.php"; 
      include "getorders.php";
    } 
?>

<p>
<hr>
<p>
<!-- Insert new purchase information with existing customer and prosucts, just increase the quantity number -->
<h2> Insert New Purchase </h2>
<form action="addnewpurchase.php" method="post">
<!-- Select products that customer purchased -->
Products: <br>
<?php
   include 'getdescription.php';
?>
<!-- Select which customer purcahsed -->
For which customer: <br>
<?php
include 'getdata.php';
?>
<!-- Insert purchase quantity -->
Purchase Quantity: <input type="text" name="quantity"><br>
<input type="submit" value="Add New Purchase">
</form>

<p>
<hr>
<p>
<h2> Add A New Customer </h2>
<form action="addcustomer.php" method="post" >
    What is the firstname of the customer: <input type="text"  name="customerfirstname"><br>
    What is the lastname of the customer: <input type="text" name="customerlastname"><br>
    Customer City: <input type="text" name="customercity"><br>
    Customer Phone Number: <input type="number" max="9999999999" name = "customerphone"><br>
    Agent: <select name="customeragent" id = "customeragent"><br>
    <option value="1"> Select Here </option>
<?php
      include "getagentid.php";
?>

        </select>
        <br><br>
  <input type="submit" value="Click here to add New Customer">
  <hr>
</form>


<?php
mysqli_close($connection);
?> 
</body>
</html> 