<template>
  <form style="border: 1px solid #ccc; margin-left:250px; width: 50%; margin-top: 50px;">
    <div class="container">
      <h1>Login</h1>
      <hr />

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" v-model="email" required />

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" v-model="password" required />

      <p>
        <router-link to="/">Sign up</router-link>
      </p>

      <div class="clearfix">
        <button type="button" class="loginbtn" v-on:click="login">Login</button>
      </div>
    </div>
  </form>
</template>

<script>
import axios from 'axios';
export default {
    name:'Login',
    data() {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        async login() {
            let result = await axios.post('http://127.0.0.1:8080/api/login',{
                email: this.email,
                password: this.password
            });
            if (result.status == 200) {
                localStorage.setItem("userInfo",JSON.stringify(result.data));
                this.$router.push({name:'Profile'});
            }
        }
    },
    mounted() {
        let user_exists = localStorage.getItem("userInfo");
        if (user_exists) {
            this.$router.push({name:'Profile'});
        }
    }
}
</script>

<style>

</style>