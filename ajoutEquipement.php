<?php
include 'header.php';
include './Models/equipements.php';
include './Controllers/ctrlAjoutEquipement.php';

?>
    <q-btn type="a" href="index.php" no-caps target="_self" push color="primary" glossy unelevated icon="home" label="Acceuil"></q-btn>
    <q-btn type="a" href="tableauDeBord.php" no-caps target="_self" push color="primary" glossy unelevated icon="dashboard" label="Tableau De Bord"></q-btn>
    <q-btn type="a" href="index.php" no-caps target="_self" class="btnDecon" push glossy unelevated icon="logout" label="Déconnexion"></q-btn><!-- Btn de deconnexion -->

<!-- Début Formulaire -->
<!-- Titre Formulaire -->
 <q-toolbar-title class="text-center" id="titreAjoutEquipement">Ajouter un Equipement</q-toolbar-title>

 <q-form action="ajoutEquipement.php" method="POST" >
	<!-- Nom des Equips -->
	<q-input oninput="this.value = this.value.toUpperCase()" v-model="nomEquipement"  id="nomEquipements" <?= count($formErrors) > 0 ? (isset($formErrors['nomEquipements']) ? 'is-invalid' : 'is-valid') : '' ?> label="Nom de Equipement" value="<?= isset($_POST['nomEquipements']) ? $_POST['nomEquipements'] : '' ?>" type="text" name="nomEquipements" /></q-input>
	<!--message de succés ou d'erreur-->
	<p class="formMessage"><?= isset($addEquipementsMessage) ? $addEquipementsMessage : '' ?></p>
 <!-- Btn validation -->
 <q-btn push color="primary" name="addEquipement" type="submit" label="Valider" id="btnValider" glossy unelevated icon="check_circle"></q-btn>

</q-form>
<!-- Affichage de Footer -->
<?php
  include 'footer.php'
?>