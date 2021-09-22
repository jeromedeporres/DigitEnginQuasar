<?php
include 'header.php';
?>
<div id="q-app">
<div class="q-gutter-md formAjoutEng" style="max-width: 100%">
    <h4 class="text-right">Bonjour Jérôme</h4><!-- Affichage de userName de utilisateur -->
    <q-btn type="a" href="index.php" target="_self" class="" push color="primary" glossy unelevated icon="keyboard_return" label="Acceuil"></q-btn>
    <q-btn type="a" href="tableauDeBord.php" target="_self" class="" push color="primary" glossy unelevated icon="keyboard_return" label="Tableau De Bord"></q-btn>
    <q-btn type="a" href="index.php" target="_self" class="btnDecon" push glossy unelevated icon="logout" label="Déconnexion"></q-btn><!-- Btn de deconnexion -->

<!-- Début Formulaire -->
<!-- Titre Formulaire -->
 <q-toolbar-title class="text-center" id="titreAjoutEngin">Ajouter un Engin</q-toolbar-title>
<!-- DropDown de champ Chariot -->
</q-select> 
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
    <q-select v-model="statut" :options="optionsStatut" label="Statut (Selectionner)" transition-show="scale" transition-hide="scale">
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
      <q-input v-model="km" type="number" label="Km Réel"></q-input>
      <q-btn push color="primary" label="Valider" id="btnValider" glossy unelevated icon="check_circle"></q-btn>
</div>
      <!-- Footer -->
  <q-layout view="hHh lpR fFf">
    <q-page-container>
      <router-view />
    </q-page-container>
      <?php
        include 'footer.php'
      ?>
  </q-layout>
</div>









