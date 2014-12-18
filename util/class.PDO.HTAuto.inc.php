<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application HtAuto (adaptation du cas lafleur)
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */


class PdoHtAuto
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=sakhoa';   		
      	private static $user='sakhoa' ;    		
      	private static $mdp='sakhoa' ;	
		private static $monPdo;
		private static $monPdoHtAuto = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoHtAuto::$monPdo = new PDO(PdoHtAuto::$serveur.';'.PdoHtAuto::$bdd, PdoHtAuto::$user, PdoHtAuto::$mdp); 
			PdoHtAuto::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoHtAuto::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoHtAuto = PdoHtAuto::getPdoHtAuto();
 * @return l'unique objet de la classe PdoHtAuto
 */
	public  static function getPdoHtAuto()
	{
		if(PdoHtAuto::$monPdoHtAuto == null)
		{
			PdoHtAuto::$monPdoHtAuto=new PdoHtAuto();
		}
		return PdoHtAuto::$monPdoHtAuto;  
	}
/**
 * Retourne toutes les catégories sous forme d'un tableau associatif
 *
 * @return le tableau associatif des catégories 
*/
	public function getLesVoitures()
	{
		$req = "select * from VOITURE";
                $res=  PdoHtAuto::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

/**
 * Retourne sous forme d'un tableau associatif tous les produits de la
 * catégorie passée en argument
 * 
 * @param $idCategorie 
 * @return un tableau associatif  
*/

	public function getLesVoituresParMarque($marque)
	{
	    $req="SELECT * FROM VOITURE WHERE MARQUE='$marque'";
		$res=  PdoHtAuto::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}
        public function getLesVoituresTypes($type)
	{
	    $req="SELECT * FROM VOITURE WHERE TYPE='$type'";
		$res=  PdoHtAuto::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}
        public function getLesVoituresParType()
	{
	    $req="SELECT DISTINCT TYPE FROM VOITURE";

		$res=  PdoHtAuto::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}
/**
 * Retourne les produits concernés par le tableau des idProduits passée en argument
 *
 * @param $desIdProduit tableau d'idProduits
 * @return un tableau associatif 
*/
	public function getLesProduitsDuTableau($lesnumimm)
	{
		$nbProduits = count($lesnumimm);
		$lesProduits=array();
		if($nbProduits != 0)
		{
			foreach($lesnumimm as $numimm)
			{
				$req = "select * from VOITURE where NUMIMM = '$numimm'";
				$res=  PdoHtAuto::$monPdo->query($req);
				$unProduit = $res->fetch();
				$lesProduits[] = $unProduit;
			}
		}
		return $lesProduits;
	}
        
       
        public function ajoutProduit($NUMIMM, $MARQUE, $TYPE, $ANNEE , $COUL , $PUISS, $PHOTO)
        {
              $sql = "INSERT  INTO VOITURE (NUMIMM, MARQUE, TYPE, ANNEE, COUL, PUISS, PHOTO)
                        VALUES ( '$NUMIMM', '$MARQUE', '$TYPE', $ANNEE, '$COUL',$PUISS,'$PHOTO') " ;

              //exÃ©cution de la requÃªte SQL:
              $res = PdoHtAuto::$monPdo->query($sql);

              //affichage des rÃ©sultats, pour savoir si l'insertion a marchÃ©e:
              if($res)
              {
                echo("L'insertion a Ã©tÃ© correctement effectuÃ©e") ;
              }
              else
              {
                echo("L'insertion Ã  Ã©chouÃ©e") ;
              }
              return $res;

        }
        public function modifProduit($NUMIMM,$MARQUE, $TYPE, $ANNEE , $COUL , $PUISS, $PHOTO)
        {
            $req = "UPDATE VOITURE SET 
                    MARQUE = '$MARQUE',
                    TYPE = '$TYPE',
                    ANNEE = $ANNEE,
                    COUL = '$COUL',
                    PUISS = $PUISS,
                    PHOTO = '$PHOTO'
                    WHERE NUMIMM = '$NUMIMM'" ;
            $res=PdoHtAuto::$monPdo->query($req);
            return $res;
        }
        public function afficheProduit($NUMIMM)
        {
            $req = "select * from VOITURE where NUMIMM = '$NUMIMM'";
            $res=  PdoHtAuto::$monPdo->query($req);
            $leProd = $res->fetch();
            return $leProd;
            
        }
        
        public function suppProduit($NUMIMM)
        {
            $req = "delete from VOITURE where NUMIMM ='$NUMIMM'";
            $res=  PdoHtAuto::$monPdo->query($req);
            return $res;
            
        }

 public function log($login,$passwd)
        {
            $req = "select count(*) as nb from CONNECT where LOGIN = '$login' and MDP = '$passwd'";
            //var_dump($req);
            $res =  PdoHtAuto::$monPdo->query($req);
            $ligne = $res->fetch();
            $nb=$ligne['nb'];
            return $nb;    
        }

}
?>
