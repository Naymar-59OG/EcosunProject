<template>
  <div class="login-user">
    <form>
      <h3>Login</h3>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" v-model="username">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="password">
      </div>
      <button class="btn-submit" @click.prevent="submitUserLogin">Login</button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'LoginUser',
  data() {
    return {
      username: '',
      password: ''
    }
  },
  methods: {
    submitUserLogin() {
      // Code pour soumettre les informations de connexion de l'utilisateur
    }
  }
}
</script>

<style>
.login-user {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100%;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  max-width: 400px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.form-group {
  width: 100%;
  margin-bottom: 20px;
}

label {
  display: block;
  font-size: 16px;
  margin-bottom: 10px;
  font-weight: bold;
  color: #333;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
  font-size: 16px;
}

button.btn-submit {
  width: 100%;
  padding: 10px 20px;
  background-color: #42b983;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
  font-size: 16px;
  transition: background-color 0.3s ease;
}

button.btn-submit:hover {
  background-color: #36a974;
}
</style>