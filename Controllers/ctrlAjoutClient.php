<?php
/* include_once './Models/clients.php'; */

$formErrors = array();
$clients = new clients();
 /*  if (isset($_POST['addClient'])) {  */
  if (!empty($_POST['nomClients'])) {
            $clients->nomClients = htmlspecialchars($_POST['nomClients']);
    } else {
        $formErrors['nomClients'] = 'L\'information n\'est pas renseigné';
    }
    // Validation//
  if (empty($formErrors['nomClient'])) { 
         if (!$clients->checkClientExist()){ 
            if($clients->addClient()){
                $addClientMessage = 
                '<q-btn class="full-width btnErrCode" push color="green" glossy unelevated icon="check" label="Le client a bien été ajouté."></q-btn>';

            } else {
                $addClientMessage = 
                '<q-btn class="full-width btnErrCode" push color="red" glossy unelevated icon="error" label="Une erreur est survenue."></q-btn>';
            }
        } else {
            $addClientMessage = 
                '<q-btn class="full-width btnErrCode" push color="red" glossy unelevated icon="error" label="Le client existe."></q-btn>';
        } 
     }   
/*    }    */