<?php
include 'header.php';
?>

    <q-btn type="a" href="index.php" no-caps target="_self" class="" push color="primary" glossy unelevated icon="home" label="Acceuil"></q-btn>
    <q-btn type="a" href="tableauDeBord.php" no-caps target="_self" class="" push color="primary" glossy unelevated icon="dashboard" label="Tableau De Bord"></q-btn>
    <q-btn type="a" href="index.php" no-caps target="_self" class="btnDecon" push glossy unelevated icon="logout" label="Déconnexion"></q-btn><!-- Btn de deconnexion -->

  <!-- Titre Formulaire -->
    <q-toolbar-title class="text-center" id="titreModifEngin">Modifier un Engin</q-toolbar-title>
    <q-select 
      v-model="chariot" 
      transition-show="scale"
      transition-hide="scale"
      :options="optionsChariot"
      label="Type de Chariot">
      <template v-slot:option="scope">
      <q-item v-bind="scope.itemProps">
        <q-item-section avatar>
          <q-img :src="scope.opt.imageChariot"></q-img>
        </q-item-section>
        <q-item-section>
          <q-item-label>{{ scope.opt.label }}</q-item-label>
        </q-item-section>
      </q-item>
    </template>

    </q-select>
    <!-- Input en Majuscule -->
    <q-input v-model="numero" oninput="this.value = this.value.toUpperCase()"  label="Numéro"></q-input>
  <!-- DropDown de champ Equipements -->
      <q-select
      v-model="equipements"
      :options="optionsEquipements"
      label="Equipements"
      transition-show="scale"
      transition-hide="scale"
      multiple
      emit-value
      map-options>
    <template v-slot:option="{ itemProps, opt, selected, toggleOption }">
      <q-item v-bind="itemProps">
        <q-item-section>
          <q-item-label v-html="opt.label" ></q-item-label>
        </q-item-section>
      <q-item-section side>
        <q-toggle :model-value="selected" @update:model-value="toggleOption(opt)"></q-toggle>
      </q-item-section>
      </q-item>
    </template>
    </q-select>
  <!-- DropDown de champ Disponibilité des Chariots -->
  <q-select v-model="statut" :options="optionsStatut" label="Statut" transition-show="scale" transition-hide="scale">
    <template v-slot:option="scope">
      <q-item v-bind="scope.itemProps">
        <q-item-section avatar>
          <q-img :src="scope.opt.imgStatut"></q-img>
        </q-item-section>
        <q-item-section>
          <q-item-label>{{ scope.opt.label }}</q-item-label>
        </q-item-section>
      </q-item>
    </template>
    </q-select>
      <q-input v-model="kmJour" type="number" label="Km/Jour"></q-input>
      <q-input v-model="km" type="number" label="Km Réel"></q-input>
      <q-input v-model="horametre" type="number" label="Horamétre"></q-input>
      <q-select v-model="client" :options="clients" label="Client" /></q-select>
      <q-btn push color="primary" label="Valider" id="btnValider" glossy unelevated icon="check_circle"></q-btn>
</div>

<!-- Affichage de Footer -->
<?php
  include 'footer.php'
?>
