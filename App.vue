<template>
  <HeaderButtons />
  <LoginUser />
  <FormumairUtilisateur />
</template>

<script>
import HeaderButtons from './components/HeaderButtons.vue';

export default {
  name: 'App',
  components: {
    HeaderButtons,
    
  },
};
</script>

<style>
body {
  background-image: url("./assets/logo.PNG");
  background-size: cover;
  background-position: center;
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 400px;
}
</style>