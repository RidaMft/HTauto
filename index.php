<?php
session_start();
include("vues/v_entete.php") ;

if(isset($_SESSION['login'])&& (isset($_SESSION['passwd'])))
             {
                    include("vues/v_bandeauAdmin.php") ;
             }
             else
             {
                 include("vues/v_bandeau.php") ;
             }
require_once("util/class.PDO.HTAuto.inc.php");

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];
//Utile lors de l'utilisation de la base de données
$pdo = PdoHTauto::getPdoHTauto();	 	 


switch($uc)
{
	case 'accueil':
		{
                    include("vues/v_accueil.php");
                    break;            
                }
	case 'voirProduits' :
                $lesProduits = $pdo->getLesVoitures();
                $lesVoitures=$pdo->getLesVoituresParType();
		include("vues/v_choix.php");
                
            break;
        case 'voirProduitsType' :
          
            $lesVoitures=$pdo->getLesVoituresTypes($_POST['type']);
             include("vues/v_afficheParMarque.php");
             //include("vues/v_choix.php");
            break;   
            
        case 'voirProduitsMarque' :
             
            $lesVoitures=$pdo->getLesVoituresParMarque($_POST['marque']);
            include("vues/v_afficheParMarque.php");
            break;    
        
	case 'administrer' :
            if(!isset($_SESSION['login'])&& (!isset($_SESSION['passwd'])))
             {
            
              include("vues/v_connexion.php");  
             }
             else
             {
                 include("vues/v_voirProduits.php");  
             }
          break;

      case  'deconnexion':
          
          session_unset();
          break;
          
           case 'modifier':
         
             $NUMIMM=$_GET['cleP'];
             $leProd=$pdo->afficheProduit($NUMIMM); 
             include 'vues/v_modif.php';
         
         break;
          case 'modification':
          
              $NUMIMM=$_REQUEST['NUMIMM'];
              $MARQUE=$_POST['MARQUE'];
              $TYPE=$_POST['TYPE'];
              $ANNEE=$_POST['ANNEE'];
              $COUL=$_POST['COUL'];
              $PUISS=$_POST['PUISS'];
              $PHOTO=$_POST['PHOTO'];
              
              $res=$pdo->modifProduit($NUMIMM,$MARQUE, $TYPE, $ANNEE , $COUL , $PUISS, $PHOTO);
              if($res)
              {
                  echo'Modification pris en compte';
                  echo "<a href='vues/v_acceuil.php'>Retour a l acceuil</a>";
                  
                  
              }
              else
              {
                  echo 'Erreur ';
                  
              }
          break;
          
          case 'suppression':
              $NUMIMM=$_REQUEST['cleP'];
              $res=$pdo->suppProduit($NUMIMM);
              if($res)
              {
                  echo 'Suppression effectué';
              }
              else 
              {
                  echo 'Erreur';
              }
              break;
          case 'ajouter':
                                include 'vues/v_ajout.php';
              break;
          case 'insertion':
               if(!isset($_REQUEST['ajouter']))
               {
                  $NUMIMM = $_POST["NUMIMM"] ;
                  $MARQUE = $_POST["MARQUE"];
                  $TYPE = $_POST["TYPE"];
                  $ANNEE = $_POST["ANNEE"];
                  $COUL = $_POST["COUL"];
                  $PUISS = $_POST["PUISS"];
                  $PHOTO = $_POST["PHOTO"];

                  $res=$pdo->ajoutProduit($NUMIMM, $MARQUE, $TYPE, $ANNEE , $COUL , $PUISS, $PHOTO);

               }
              break;
              
          case 'connexion' :

              
                $login=$_POST['login'];
                $passwd=$_POST['passwd'];

                $res=$pdo->log($login,$passwd);
                if ($res == 0)
                {
                      include("vues/v_erreur.php");                   
                }
                else
                {
                    
                    $_SESSION['login']=$login;
                    $_SESSION['passwd']=$passwd;
                      include("vues/v_voirProduits.php");                 
                      header("location:vues/v_bandeauAdmin.php");                         
                }
              
              break;

          
}

include("vues/v_pied.php") ;


?>


