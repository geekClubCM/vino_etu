<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

class Controler 
{
		/**
		 * Traite la requête
		 * @return void
		 */
		public function gerer()
		{
			// ID utilisateur et ID de cellier en attendant de recevoir les vraies informations dynamiquement
			$userId = 2;
			$cellierId = 1;

			switch ($_GET['requete']) {
				case 'listeBouteille':
					$this->listeBouteille($userId, $cellierId);
					break;
				case 'autocompleteBouteille':
					$this->autocompleteBouteille();
					break;
				case 'ajouterNouvelleBouteilleCellier':
					$this->ajouterNouvelleBouteilleCellier();
					break;
				case 'modifierBouteilleCellier':
					$this->modifierBouteilleCellier();
					break;
				case 'ajouterBouteilleCellier':
					$this->ajouterBouteilleCellier();
					break;
				case 'boireBouteilleCellier':
					$this->boireBouteilleCellier();
					break;
				case 'cellier':
					$this->cellier($userId, $cellierId);
					break;
				default:
					$this->accueil();
					break;
			}
		}

		private function accueil()
		{
			include("vues/entete.php");
			include("vues/homePage.php");      
		}

		private function cellier($userId, $cellierId)
		{
			$bte = new Bouteille();
            $data = $bte->getListeBouteilleCellier($userId, $cellierId);
			include("vues/entete.php");
			include("vues/navigation.php");
			include("vues/cellier.php");
			include("vues/pied.php");
                  
		}
		

		private function listeBouteille($userId, $cellierId)
		{
			$bte = new Bouteille();
            $cellier = $bte->getListeBouteilleCellier($userId, $cellierId);
            
            echo json_encode($cellier);
                  
		}
		
		private function autocompleteBouteille()
		{
			$bte = new Bouteille();
			//var_dump(file_get_contents('php://input'));
			$body = json_decode(file_get_contents('php://input'));
			//var_dump($body);
            $listeBouteille = $bte->autocomplete($body->nom);
            
            echo json_encode($listeBouteille);
                  
		}
		private function ajouterNouvelleBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			//var_dump($body);
			if(!empty($body)){
				$bte = new Bouteille();
				//var_dump($_POST['data']);
				
				//var_dump($data);
				$ajouter = $bte->ajouterBouteilleCellier($body);
				echo json_encode($resultat);
			}
			else{
				include("vues/entete.php");
				include("vues/navigation.php");
				include("vues/ajouter.php");
				include("vues/pied.php");
			}
			
            
		}

		private function modifierBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			//var_dump($body);
			if(!empty($body)){
				$bte = new Bouteille();
				//var_dump($_POST['data']);
				
				//var_dump($data);
				$modifier = $bte->modifierBouteilleCellier($body);
				echo json_encode($modifier);
			}
			else{
				include("vues/entete.php");
				include("vues/navigation.php");
				include("vues/modifier.php");
				include("vues/pied.php");
			}
			
            
		}
		
		private function boireBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
			echo json_encode($resultat);
		}

		private function ajouterBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
			//var_dump($resultat);
			echo json_encode($resultat);
		}
		
}
?>















