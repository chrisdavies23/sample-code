<!DOCTYPE html>
<html lang="en">
<head>
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
<div  style="width:800px;text-align:justify;padding:40px;">
<?php
$mydate=$_POST['mydate'];

/*****************************************************************************************************
   testing data is coming across

if($mydate==""){
        echo "yo dude, nothing came over your php or html ain't workin'";
        }
        else{
             echo $mydate." sweet, your date was successfully posted over in ENGLISH date format";
        }

*****************************************************************************************************/



//convert from british date to american for database using split command
//and switching the year, month and date positions
 $newdate=(list($day, $month, $year) = split('[/.-]', $mydate));
 $splitdate= $year."-".$month."-".$day;




/* follwing checkDateFormat function gleaned from http://roshanbh.com.np/2008/05/date-format-validation-php.html     */
function checkDateFormat($date)
{
  //match the format of the date
  if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts))
  {
    //check weather the date is valid of not
        if(checkdate($parts[2],$parts[3],$parts[1]))
          return true;
        else
         return false;
  }
  else
    return false;

}
 if(checkDateFormat($splitdate))
 {



//connect to server and select database
  include 'connect.php';

//bring back the dates
$get_Date = "select ID, date_format(date,'%d %m %Y')as fmt_time, date as dateSet from dateTest where date='$splitdate' order by date desc";
$get_date_result = mysql_query($get_Date) or die(mysql_error());
if (mysql_num_rows($get_date_result) < 1) {
   //there are no faults, so say so
   echo "<table class=\"table\">
            <tr>
               <th>SORRY, No recorded dates for your search string</th>
            </tr>
            <tr>
               <td> <a href=\"dateForm.php\">go back and try another date</a></td>
            </tr>
          </table> ";
         exit;
} else {
   //create the display string
   $bangItOutOnThePage = "<table class=\"table\"><tr><th>Query Successful - here is the date you searched for</th>
   </tr>
   <tr>
       <td>ID</td>
       <td/>Retrieved as English date</td>
       <td>Recorded date in MySQL format</td>
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

 }else{
         echo"<strong>you have to enter a valid date:  <a class=\"other\" href=\"dateForm.php\">now go back and enter a REAL date</a></strong>";}

 ?>
 </div>
</div>
</body>
</html>