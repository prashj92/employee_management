<template>

<form style="border: 1px solid #ccc; margin-left:250px; width: 50%; margin-top: 50px;">
    <div class="container">
        <span v-if="Object.keys(errors).length !== 0">{{ errors }}</span>
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
    name: 'Login',
    data() {
        return {
            email: '',
            password: '',
            errors: {},
        }
    },
    methods: {
        login() {
            const loginData = {
                email: this.email,
                password: this.password,
            };
            axios.post('http://127.0.0.1:8080/api/login', loginData)
                .then(response => {
                    if (response.status == 200) {
                        localStorage.setItem("userInfo", JSON.stringify(response.data));
                        this.$router.push({ name: 'Profile' });
                    }
                })
                .catch(err => {
                    if (err.response) {
                        console.warn("Response",err.response)
                        this.errors = "Error occurred while logging into the application, error code: "+err.response.status+" error message: "+err.response.data.error;
                    } else  if (err.request) {
                        // console.warn("Request",err.request)
                        this.errors = "Error occurred while logging into the application, error code: "+err.request.status+" error message: "+err.request.data.error;
                    }
                    
                });
        }
    },
    mounted() {
        let user_exists = localStorage.getItem("userInfo");
        if (user_exists) {
            this.$router.push({ name: 'Profile' });
        }
    }
}
</script>

<style>

</style>
