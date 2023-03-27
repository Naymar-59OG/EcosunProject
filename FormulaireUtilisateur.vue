<template>
  <div>
    <form>
      <label for="nom">Nom :</label>
      <input type="text" id="nom" v-model="nom"><br>

      <label for="email">Email :</label>
      <input type="email" id="email" v-model="email"><br>

      <label for="pays">Pays :</label>
      <select id="pays" v-model="pays">
        <option value="Sénégal">Sénégal</option>
        <option value="Mali">Mali</option>
        <option value="Autre">Autre</option>
      </select><br>
      
      <label>Pour les questions suivantes, veuillez nous fournir la puissance en watts (W) :</label><br>

      <label for="Refrigerateur">Réfrigérateur :</label>
      <textarea id="Refrigerateur" v-model="refrigerateur"></textarea><br>

      <label for="Ordinateur portable">Ordinateur portable :</label>
      <textarea id="Ordinateur portable" v-model="ordinateurPortable"></textarea><br>

      <label for="Téléviseur">Téléviseur :</label>
      <textarea id="Téléviseur" v-model="televiseur"></textarea><br>

      <label for="ampoules">Ampoules :</label>
      <textarea id="ampoules" v-model="ampoules"></textarea><br>

      <label for="Smartphone">Smartphone :</label>
      <textarea id="Smartphone" v-model="smartphone"></textarea><br>

      <label for="Box internet">Box internet :</label>
      <textarea id="Box internet" v-model="boxInternet"></textarea><br>

      <label for="Climatiseur">Climatiseur :</label>
      <textarea id="Climatiseur" v-model="climatiseur"></textarea><br>

      <label for="Four">Four :</label>
      <textarea id="Four" v-model="four"></textarea><br>

      <button type="submit" @click.prevent="submitForm">Envoyer</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      nom: "",
      email: "",
      pays: "",
      refrigerateur: "",
      ordinateurPortable: "",
      televiseur: "",
      ampoules: "",
      smartphone: "",
      boxInternet: "",
      climatiseur: "",
      four: ""
    };
  },
  methods: {
    submitForm() {
      // Ajouter ici la logique de traitement des données du formulaire
    }
  }
};
</script>
