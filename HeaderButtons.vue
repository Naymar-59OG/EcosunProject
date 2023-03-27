<template>
  <div id="app">
    <header>
      <nav>
        <div class="header-buttons">
          <button class="header-button" @click="showUserLogin = true">Login</button>
        </div>
      </nav>
    </header>
    <login-user v-if="showUserLogin"></login-user>
  </div>
</template>

<script>
import LoginUser from './LoginUser.vue';

export default {
  name: "App",
  data() {
    return {
      showUserLogin: false
    };
  },
  components: {
    LoginUser
  }
};
</script>

<style>
  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px;
    background-color: #ab42b9;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1;
  }

  nav h1 {
    color: #250420;
    font-size: 24px;
    margin: 0;
  }

  .header-buttons {
    display: flex;
  }

  .header-button {
    background-color: #ecedeb;
    color: #2c1390;
    border: none;
    border-radius: 100px;
    padding: 10px 30px;
    margin-left: 10px;
    cursor: pointer;
    font-size: 16px;
  }
</style>
