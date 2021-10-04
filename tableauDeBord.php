<?php
include 'header.php';
?>
    <q-btn type="a" href="index.php" no-caps target="_self" class="" push color="primary" glossy unelevated icon="home" label="Accueil"></q-btn>
    <!-- Btn CRUD -->
    <q-btn type="a" href="ajoutEngin.php" no-caps target="_self" label="Ajouter un Engin" push glossy unelevated icon="add_circle_outline" color="primary" /></q-btn>
    <q-btn type="a" href="ajoutClient.php" no-caps target="_self" label="Ajouter un Client" push glossy unelevated icon="add_circle_outline" color="primary" /></q-btn>
    <q-btn type="a" href="ajoutType.php" no-caps target="_self" label="Ajouter un Type d'Engin" push glossy unelevated icon="add_circle_outline" color="primary" /></q-btn>
    <q-btn type="a" href="ajoutEquipement.php" no-caps target="_self" label="Ajouter un Equipement" push glossy unelevated icon="add_circle_outline" color="primary" /></q-btn>
    <q-btn type="a" href="listeClients.php" no-caps target="_self" label="Modifier/Supprimer un Client" push glossy unelevated icon="settings" color="warning" /></q-btn>
    <q-btn type="a" href="index.php" no-caps target="_self" class="btnDecon" push glossy unelevated icon="logout" label="Déconnexion"></q-btn><!-- Btn de deconnexion -->
  
  </div>
  <div class="q-pa-md">
    <q-toolbar-title class="text-center" id="titreTdb">Tableau de Bord-Chef d'Équipe</q-toolbar-title>
  </div>

  <div>
  <q-select class="tri" v-model="modelTri" :options="optionsTri" label="Trier Par" />
  </div>
  <div>
  <q-select class="tri" v-model="modelFiltre" :options="optionsFiltre" label="Filtrer Par" />
  </div>
  <!-- Preperation des components de Tableau d'bord -->
  <div class="q-pa-md">
     <q-table class="text-center"
        title=""
        :rows="rowsTdb"
        :columns="columnsTdb"
        row-key="name"
        virtual-scroll
        :pagination.sync="pagination"
        :filter="filter"
        :filters="filters"
        > 

        <!-- Btn de CRUD dans chaque ligne de tableau -->
        <template v-slot:body-cell-action="props">
            <q-td :props="props">
              <q-btn dense round flat @click="editRow(props)" type="a" href="modifEngin.php" icon="edit" id="btnModif"></q-btn>
              <q-btn dense round flat @click="deleteRow(props)" icon="delete" id="btnSupp"></q-btn>
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
        <q-btn push glossy unelevated color="primary" icon="archive" label="Exporter vers excel" no-caps @click="exportTableTdb"/> </q-btn>       
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


      