<?php
//session_start();
//include ("vues/v_entete.php");
//include ("vues/v_bandeau.php");

    ?>
        <form method="POST" action="index.php?uc=voirProduitsMarque">
            Liste des marques
        <select name="marque">
        
            
            <?php
            foreach($lesProduits as $laMarque)
            {
                ?>            
                <option value="<?php echo $laMarque['MARQUE']; ?>"><?php echo $laMarque['MARQUE']; ?></option>
                   
                        
                      <?php  }  ?>  
</select>
        <p> <input type="submit" name="envoyer"/> </p>
            

        </form>
        <form method="POST" action="index.php?uc=voirProduitsType">
            Liste des Types
        <select name="type">
        
            
            <?php                      
            foreach($lesVoitures as $leType)
            {
                ?>            
                <option value="<?php echo $leType['TYPE']; ?>"><?php echo $leType['TYPE']; ?></option>
                   
                        
                      <?php  }  ?>  
</select>
        <p> <input type="submit" name="envoyer"/> </p>
        </form>
            