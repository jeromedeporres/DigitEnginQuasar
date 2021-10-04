<?php
$formErrors = array();
$equipements = new equipements();
 /*  if (isset($_POST['addType'])) {  */
    if (!empty($_POST['nomEquipements'])) {
        $equipements->nomEquipements = htmlspecialchars($_POST['nomEquipements']);
    } else {
        $formErrors['nomEquipements'] = 'L\'information n\'est pas renseigné';
    }
    // Validation//
    if (empty($formErrors['nomEquipements'])) {  
        if (!$equipements->checkEquipementsExist()) { 
            if ($equipements->nomEquipements != ""){
                if($equipements->addEquipements()){
                 $addEquipementsMessage = '<q-btn class="full-width btnErrCode" push color="green" glossy unelevated icon="check" label="L\'equipement a bien été ajouté."></q-btn>';
            } else {
                $addEquipementsMessage = '<q-btn class="full-width btnErrCode" push color="red" glossy unelevated icon="error" label="Une erreur est survenue."></q-btn>';
                } 
            }else {
                $addEquipementsMessage = '<q-btn class="full-width btnErrCode" push color="red" glossy unelevated icon="error" label="Veuillez renseigner ce champ"></q-btn>';
                }
            } else {
                $addEquipementsMessage = '<q-btn class="full-width btnErrCode" push color="red" glossy unelevated icon="error" label="L\'equipement d\'Engin existe."></q-btn>';
            }  
  }  
/*    }   */	