<html>
<form name="modification" action="index.php?uc=modification" method="POST">
  <table border="0" align="center" cellspacing="5" cellpadding="5">
    <tr align="center">
      <td>Num Imm</td>
      <td><input type="text" name="NUMIMM" value="<?php echo $leProd['NUMIMM'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>MARQUE</td>
      <td><input type="text" name="MARQUE" value="<?php echo $leProd['MARQUE'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>TYPE</td>
      <td><input type="text" name="TYPE" value="<?php echo $leProd['TYPE'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>ANNEE</td>
      <td><input type="text" name="ANNEE" value="<?php echo $leProd['ANNEE'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>COULEUR</td>
      <td><input type="text" name="COUL" value="<?php echo $leProd['COUL'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>PUISSANCE</td>
      <td><input type="text" name="PUISS" value="<?php echo $leProd['PUISS'] ;?>"></td>
    </tr>
    <tr align="center">
      <td>PHOTO</td>
      <td><input type="file" name="PHOTO" /></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="modifier"></td>
    </tr>
  </table>
</form>
</html>

