<!DOCTYPE html>
<html>
<head>
<title>JukePi</title>
<!-- If I need it
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
  var searchTerms;
  $(document).ready(function(){
  $('#submit').click(function(){
    var search = $("#search").val();
    searchTerms = search;
       $.ajax({
             type: "GET",
             url: "ajaxsubmit.php",
             data: "search="+search,
             success: function(msg){
             // alert(msg);
              document.getElementById('reply').innerHTML = "<pre>"+msg+"</pre>"; }
           });
      });
});
</script>
-->
</head>
<body>
  <form action="searchadd.php" method="get">
    <input name="search" type="text" size="50"><br><br>
    <input type="submit" name="grooveshark" value="Grooveshark Search">
    <input type="submit" name="youtube" value="YouTube ID"><br>
    --------------------------------------------
  </form>
<br>
<?php
if(isset($_POST['playnum'])){
  $result = shell_exec("echo ".$_POST['playnum']." > /usr/share/nginx/www/juke/sel");
  $result = shell_exec("sh /usr/share/nginx/www/juke/add.sh " . $_GET['search']);
  echo $result;
} else if (isset($_GET['search']) && isset($_GET['grooveshark']) && (strlen($_GET['search']) >= 2)){
  echo "
  <p><form action='searchadd.php?search=".$_GET['search']."' method='post'>
    <input type='submit' name='playnum' value='1' class="btn btn-default">
    <input type='submit' name='playnum' value='2'>
    <input type='submit' name='playnum' value='3'>
    <input type='submit' name='playnum' value='4'>
    <input type='submit' name='playnum' value='5'>
    <input type='submit' name='playnum' value='6'>
    <input type='submit' name='playnum' value='7'>
    <input type='submit' name='playnum' value='8'>
    <input type='submit' name='playnum' value='9'>
    <input type='submit' name='playnum' value='10'>
  </form></p><pre>";

shell_exec("sh /usr/share/nginx/www/juke/search.sh " . $_GET['search']);
$result = shell_exec("cat /usr/share/nginx/www/juke/searchOut");
echo $result;
echo "</pre>";
} else if (isset($_GET['search']) && isset($_GET['youtube']) && (strlen($_GET['search']) == 11)){
  echo "youtube search";
  $result = shell_exec("echo youtube > /usr/share/nginx/www/juke/sel");
  $result = shell_exec("sh /usr/share/nginx/www/juke/add.sh " . $_GET['search']);
  echo "<pre>".$result."</pre>";
}
?>
</pre>
</td>
</tr>
</table>
</body>
</html>
