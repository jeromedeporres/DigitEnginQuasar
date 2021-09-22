<?php
include 'header.php';
?>
<div id="q-app">
  <div class="q-pa-md q-gutter-sm">
  <q-btn type="a" href="tableauDeBord.php" target="_self" label="Tableau De Bord" color="purple" />
  </div>

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