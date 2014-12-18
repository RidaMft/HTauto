
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<table width="50%" border="1%" height="50%" align="center">
  <tr><!-- ligne 1 -->
    <td>Numero</td>
    <td>Marque</td>
    <td>Type</td>
    <td>Annee</td>
    <td>Couleur</td>
    <td>Puissance</td>
    <td>Photo</td>
    
  </tr>

 <?php
 
 
 foreach ($lesVoitures as $cle => $val ) 
    {
   
  
    echo"<tr>";
        echo "<td>$val[0]</td>";
	echo "<td>$val[1]</td>";
        echo "<td>$val[2]</td>";
        echo "<td>$val[3]</td>";
        echo "<td>$val[4]</td>";
        echo "<td>$val[5]</td>";
       echo "<td><img src=images/$val[6] alt=images/$val[6] title=images/$val[6] width='200' height='150' /></td>";
    echo "</tr>";
  
}
?>

</table>
</body>

</html>
