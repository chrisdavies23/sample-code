<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="cache-control" content="no-cache">
<title>Date Search Page</title>
<link href="twitter-bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
<!-- override some twitter-bootstrap styles -->
<style>
     select {width:150px;}
     input  {width: 150px;}
     table  {border: 1px solid black;
             border-collapse: collapse;
             padding: 10px;}
     tr  {border: 1px solid black;
     padding: 10px;}
     td  {border: 1px solid black;
     padding: 10px;}
     th {border: 1px none black;
     padding: 10px;}
</style>

</head>
<body>
<div class="container">
<div>
<?php  //$mydate=Date("d/m/Y");
 echo"         <fieldset>";
 echo"         <legend>Using British Formatted Dates in MySQL</legend>";
 echo"         <form class=\"well\" name=\"dateTest\" id=\"dateTest\" method=\"post\" action=\"dateSearch.php\">";
 echo"         <label> Date Search </label> ";
 echo"         <label> Enter Date: dd-mm-yyyy OR dd/mm/yyyy OR dd.mm.yyyy</label>";
 echo"         <p><input class=\"input-medium search-query\" type=\"text\" name=\"mydate\" placeholder=\"Type an English Date...\"></p>";
 echo"         Click Search:";
 echo"         <input type=\"submit\" class=\"btn\" name=\"submit\" value=\"Search\"></p>";
 echo"         </td></tr></table>";
 echo"         </form>";
 echo"         </fieldset>";
?>
</div>
</div>
</body>

</html>