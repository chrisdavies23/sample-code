<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Date Search Results</title>
<link href="twitter-bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
<!-- override some twitter-bootstrap styles -->
<style>
     select {width:150px;}
     input  {width: 150px;}
     table  {border: 1px solid #c0c0c0;}
</style>

</head>
<body>
<div class="container">
<div  style="width: 800px;text-align: justify;padding: 40px;">
<?php
$mydate = stripslashes($_POST['mydate']);

//convert from british date to american for database using explode command
//and switching the year, month and date positions

$splitDate = preg_split('~[-:/|.]~', $mydate);

list($day, $month, $year) = $splitDate;


$switchDate = $year."-".$month."-".$day;


//connect to server and select database
  include 'connect.php';

//bring back the dates
$get_Date = "select ID, date_format(date,'%d %m %Y')as fmt_time, date as dateSet from dateTest where date='$switchDate' order by date desc";
$get_date_result = mysql_query($get_Date) or die(mysql_error());
if (mysql_num_rows($get_date_result) < 1) {
   //there are no dates maching your query, so say so
   echo "<table class=\"table\">
            <tr>
               <th>
                   SORRY, No recorded dates for your search string
               </th>
            </tr>
            <tr>
               <td>
                   <a href=\"dateForm.php\">go back and try another date</a>
               </td>
            </tr>
         </table> ";
         exit;
} else {
   //create the display string
   $bangItOutOnThePage = "<table class=\"table\">
                             <tr>
                                 <th>
                                     Query Successful - here is the date you searched for
                                 </th>
                             </tr>
                             <tr>
                             <td>
                                 ID
                             </td>
                             <td/>
                                  Retrieved as English date
                             </td>
                             <td>
                                 Recorded date in MySQL format
                             </td>
                         </tr> ";

   // search the returned array
   while ($pulledDates = mysql_fetch_array($get_date_result)) {
      $ID = $pulledDates['ID'];
      $recordedDate = $pulledDates['fmt_time'];
      $time = $pulledDates['dateSet'];
      //add to display
      $bangItOutOnThePage .= "<tr><td>$ID</td><td>$recordedDate</td><td>$time</td></tr>";
   }

   //close up the table
   $bangItOutOnThePage .= "</table>";
}
 print $bangItOutOnThePage;
 echo"  <a class=\"other\" href=\"dateForm.php\">go back and try another date</a>";


 ?>
 </div>
</div>
</body>
</html>