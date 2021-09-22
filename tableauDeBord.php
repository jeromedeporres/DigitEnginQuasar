<?php
include 'header.php';
?>
<div id="q-app" style="min-height: 100vh;">
  <div class="q-pa-md">
    <h4 class="text-right">Bonjour Jerome</h4><!-- Affichage de userName de utilisateur -->
    <q-btn class="float-right btnDecon" icon="logout" label="Déconnexion"></q-btn><!-- Btn de deconnexion -->
  </div>
  <div class="q-pa-md">
    <q-toolbar-title class="text-center" id="titreTdb">Tableau de Bord-Chef d'Équipe</q-toolbar-title>
  </div>
  <!-- Preperation des components de Tableau d'bord -->
  <div class="q-pa-md">
      <q-table class="text-center"
        title=""
        :rows="rows"
        :columns="columns"
        row-key="name"
        virtual-scroll
        :pagination.sync="pagination"
        :filter="filter"
        >
        <!-- Btn de CRUD dans chaque ligne de tableau -->
        <template v-slot:body-cell-action="props">
            <q-td :props="props">
              <q-btn dense round flat color="" @click="editRow(props)" icon="edit" id="btnModif"></q-btn>
              <q-btn dense round flat color="" @click="deleteRow(props)" icon="delete" id="btnSupp"></q-btn>
            </q-td>
          </template>
        <!-- Champ de rechereche -->
        <template v-slot:top-right>
        <q-input borderless dense debounce="300" v-model="filter" placeholder="Chercher">
          <template v-slot:append>
            <q-icon name="search"></q-icon>
          </template>
        </q-input>
      </template>

      <!-- Btn pour telecharger le tableau en format CSV -->
      <template v-slot:top-left>
        <q-btn color="primary" icon-right="archive" label="Exporter vers excel" no-caps @click="exportTable"/> </q-btn>       
        <!-- Btn CRUD -->
        <q-btn type="a" href="ajoutEngin.php" target="_self" label="Ajouter un Engin" color="primary" style="margin:5px"/>
      </template> 
      </q-table>
      <!-- Affichage de Footer -->
      <q-layout view="hHh lpR fFf">
        <q-page-container>
          <router-view />
        </q-page-container>
        <?php
        include 'footer.php'
        ?>
    </q-footer>
    </q-layout>
    </div>
</div>


      