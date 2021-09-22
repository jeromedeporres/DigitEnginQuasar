<?php
include 'header.php';
?>

<div id="q-app">
  <!-- Début Formulaire -->
  <div class="q-gutter-md formModifEng" style="max-width: 100%">
  <!-- Titre Formulaire -->
    <q-toolbar-title class="text-center" id="titreModifEngin">Modifier un Engin</q-toolbar-title>
      <q-input v-model="text" label="Type"></q-input>
      <q-input v-model="text" label="Numéro"></q-input>
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
      <q-select v-model="statut" :options="optionsStatut" label="Statut (Selectionner)"  transition-show="flip-up" transition-hide="flip-down">
        <template v-slot:option="scope">
          <q-item v-bind="scope.itemProps">
            <q-item-section avatar>
              <q-icon :name="scope.opt.icon"></q-icon>
            </q-item-section>
            <q-item-section>
              <q-item-label>{{ scope.opt.label }}</q-item-label>
            </q-item-section>
          </q-item>
        </template>
      </q-select>
      <q-input v-model="text" label="Km/Jour"></q-input>
      <q-input v-model="text" label="Km Réel"></q-input>
      <q-input v-model="text" label="Horamétre"></q-input>
      <q-btn push color="primary" label="Valider" id="btnValider" glossy unelevated icon="check_circle"></q-btn>

</div>

  <q-layout view="hHh lpR fFf">
    <q-page-container>
      <router-view />
    </q-page-container>
      <?php
        include 'footer.php'
      ?>
  </q-layout>
</div>