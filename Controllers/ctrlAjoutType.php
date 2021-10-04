<?php
$formErrors = array();
$types = new types();
 /*  if (isset($_POST['addType'])) {  */
    if (!empty($_POST['nomTypes'])) {
        $types->nomTypes = htmlspecialchars($_POST['nomTypes']);
    } else {
        $formErrors['nomTypes'] = 'L\'information n\'est pas renseigné';
    }
    // Validation//
    if (empty($formErrors['nomType'])) {  
        if (!$types->checkTypeExist()) { 
            if ($types->nomTypes != ""){
                if($types->addType()){
                 $addTypeMessage = '<q-btn class="full-width btnErrCode" push color="green" glossy unelevated icon="check" label="Le Type d\'Engin a bien été ajouté."></q-btn>';
            } else {
                $addTypeMessage = '<q-btn class="full-width btnErrCode" push color="red" glossy unelevated icon="error" label="Une erreur est survenue."></q-btn>';
                } 
            }else {
                $addTypeMessage = '<q-btn class="full-width btnErrCode" push color="red" glossy unelevated icon="error" label="Veuillez renseigner ce champ"></q-btn>';
                }
            } else {
                $addTypeMessage = '<q-btn class="full-width btnErrCode" push color="red" glossy unelevated icon="error" label="Le type d\'Engin existe."></q-btn>';
            }  
  }  
/*    }    */