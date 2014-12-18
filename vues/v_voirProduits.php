<html>
     
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<table width='70%' border='1px' height='90' align='center'>
  <tr>
    <td>Numero</td>
	
    <td>Marque</td>
    <td>Type</td>
    <td>Annee</td>
    <td>Couleur</td>
    <td>Puissance</td>
    <td>Photo</td>
    <td>Modifier</td>
    <td>Supprimer</td>
    
    
  </tr>
<li><a href=index.php?uc=ajouter>Ajouter une voiture</a></li>
 <?php
 $_POST['ListeV']=$pdo->getLesVoitures();
 foreach($_POST['ListeV'] as $val => $leProduit)
 {
    echo"<tr>";
        echo "<td>$leProduit[0]</td>";
	echo "<td>$leProduit[1]</td>";
        echo "<td>$leProduit[2]</td>";
        echo "<td>$leProduit[3]</td>";
        echo "<td>$leProduit[4]</td>";
        echo "<td>$leProduit[5]</td>";
        echo "<td><img src=images/$leProduit[6] alt=$leProduit[6] title=images/$leProduit[6] width='200' height='150'/></td>";
        echo "<td> <a href=index.php?uc=modifier&cleP=$leProduit[0]>Modifier</a></td>";
        echo "<td> <a href=index.php?uc=suppression&cleP=$leProduit[0]>Supprimer</a></td>";
    echo "</tr>";  
}
?>
 


</table> 

</body>

</html>

