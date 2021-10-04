<?php
include 'header.php';
include './Models/clients.php';
include './Controllers/ctrlAjoutClient.php';

?>
    <q-btn type="a" href="index.php" no-caps target="_self" push color="primary" glossy unelevated icon="home" label="Acceuil"></q-btn>
    <q-btn type="a" href="tableauDeBord.php" no-caps target="_self" push color="primary" glossy unelevated icon="dashboard" label="Tableau De Bord"></q-btn>
    <q-btn type="a" href="index.php" no-caps target="_self" class="btnDecon" push glossy unelevated icon="logout" label="Déconnexion"></q-btn><!-- Btn de deconnexion -->


<!-- Début Formulaire -->
<!-- Titre Formulaire -->
 <q-toolbar-title class="text-center" id="titreAjoutEngin">Ajouter un Client</q-toolbar-title>

 <q-form action="ajoutClient.php" method="POST" >
	<!-- Nom des Clients -->
	<q-input oninput="this.value = this.value.toUpperCase()" v-model="nomClient"  id="nomClients" <?= count($formErrors) > 0 ? (isset($formErrors['nomClients']) ? 'is-invalid' : 'is-valid') : '' ?> label="Nom de Client" value="<?= isset($_POST['nomClients']) ? $_POST['nomClients'] : '' ?>" type="text" name="nomClients" /></q-input>
	<!--message de succés ou d'erreur-->
	<p class="formMessage"><?= isset($addClientMessage) ? $addClientMessage : '' ?></p>
 <!-- Btn validation -->
 <!-- <q-btn label="Submit" type="submit"  id="btnValider" color="primary"></q-btn > -->
<q-btn push color="primary" name="addClient" type="submit" label="Valider" id="btnValider" glossy unelevated icon="check_circle"></q-btn>

</q-form>
<!-- Affichage de Footer -->
<?php
  include 'footer.php'
?>