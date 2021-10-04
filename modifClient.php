<?php
include 'header.php';
?>

  <q-btn type="a" href="index.php" no-caps target="_self" class="" push color="primary" glossy unelevated icon="home" label="Accueil"></q-btn>
  <q-btn type="a" href="tableauDeBord.php" no-caps target="_self" class="" push color="primary" glossy unelevated icon="dashboard" label="Tableau De Bord"></q-btn>
	<q-btn type="a" href="clients.php" no-caps target="_self" class="" push color="primary" glossy unelevated icon="dashboard" label="Les Clients"></q-btn>
	<q-btn type="a" href="index.php" no-caps target="_self" class="btnDecon" push glossy unelevated icon="logout" label="Déconnexion"></q-btn><!-- Btn de deconnexion -->

  <!-- Titre Formulaire -->
    <q-toolbar-title class="text-center" id="titreModifEngin">Modifier un Client</q-toolbar-title>
    
	<q-input v-model="nomClient" oninput="this.value = this.value.toUpperCase()" label="Nom de Client" /></q-input>
    <q-btn push color="primary" label="Valider" id="btnValider" glossy unelevated icon="check_circle"></q-btn>
</div>

<!-- Affichage de Footer -->
<?php
  include 'footer.php'
?>