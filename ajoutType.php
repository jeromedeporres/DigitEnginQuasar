<?php
include 'header.php';
include './Models/types.php';
include './Controllers/ctrlAjoutType.php';

?>
    <q-btn type="a" href="index.php" no-caps target="_self" push color="primary" glossy unelevated icon="home" label="Accueil"></q-btn>
    <q-btn type="a" href="tableauDeBord.php" no-caps target="_self" push color="primary" glossy unelevated icon="dashboard" label="Tableau De Bord"></q-btn>
    <q-btn type="a" href="index.php" no-caps target="_self" class="btnDecon" push glossy unelevated icon="logout" label="Déconnexion"></q-btn><!-- Btn de deconnexion -->


<!-- Début Formulaire -->
<!-- Titre Formulaire -->
 <q-toolbar-title class="text-center" id="titreAjoutType">Ajouter un Type</q-toolbar-title>

 <q-form action="ajoutType.php" method="POST" >
	<!-- Nom des Types -->
	<q-input oninput="this.value = this.value.toUpperCase()" v-model="nomType"  id="nomTypes" <?= count($formErrors) > 0 ? (isset($formErrors['nomTypes']) ? 'is-invalid' : 'is-valid') : '' ?> label="Nom de Type" value="<?= isset($_POST['nomTypes']) ? $_POST['nomTypes'] : '' ?>" type="text" name="nomTypes" /></q-input>
	<!--message de succés ou d'erreur-->
	<p class="formMessage"><?= isset($addTypeMessage) ? $addTypeMessage : '' ?></p>
 <!-- Btn validation -->
 <q-btn push color="primary" name="addType" type="submit" label="Valider" id="btnValider" glossy unelevated icon="check_circle"></q-btn>

</q-form>
<!-- Affichage de Footer -->
<?php
  include 'footer.php'
?>