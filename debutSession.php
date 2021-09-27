<?php
include 'header.php'
?>
<q-btn type="a" href="index.php" no-caps target="_self" color="primary" push glossy unelevated icon="home" label="Acceuil"></q-btn>
<q-btn type="a" href="tableauDeBord.php" no-caps target="_self" class="" push color="primary" glossy unelevated icon="dashboard" label="Tableau De Bord"></q-btn>
<q-btn type="a" href="index.php" no-caps target="_self" class="btnDecon" push glossy unelevated icon="logout" label="Déconnexion"></q-btn><!-- Btn de deconnexion -->

<!-- Affichage de date et l'heure -->
<p class="dateHeure">Nous sommes le : <strong><?php setlocale(LC_TIME, "fr_FR","French"); 
	echo(strftime("%A %d %B %G </strong>et il est <strong>%H h %M</strong>")); ?></p>
<!-- Début Formulaire -->
<!-- Titre Formulaire -->
<q-toolbar-title class="text-center" id="titreDebutSession">Demarrez la session.<br> Veuillez saisir les information.</q-toolbar-title>
<!-- DropDown de champ chariot -->
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
	<q-input v-model="km" type="number" label="Relevé Compteur"></q-input>
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
	<q-input
		v-model="observations"
		clearable
		autogrow
		color="primary"
		label="Observations"
		:shadow-text="inputShadowText"
		@keydown="processInputFill"
		@focus="processInputFill"/>
      </q-input>
	  <q-uploader id="uploader"
        style="width:300px"
        url=""
		label="Télécharger les images d'incidents (Max 4 Images et 4 GB)"
        multiple
        accept=".jpg,.jpeg,.png image/*"
		max-total-size="4096"
		max-files="4"
        @rejected="onRejected"/>
	</q-uploader>
	<q-btn push color="primary" label="Valider" id="btnValider" glossy unelevated icon="check_circle"></q-btn>
</div>
<?php
include 'footer.php'
?>