<template>
  <form style="border: 1px solid #ccc; margin-left:250px; width: 50%; margin-top: 50px;">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr />

      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" v-model="name" required />

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" v-model="email" required />

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" v-model="password" required />

      <p>
        Already have an account?
        <router-link to="login">Login Here</router-link>
      </p>

      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="button" class="signupbtn" v-on:click="register">Sign Up</button>
      </div>
    </div>
  </form>
</template>

<script>
import axios from 'axios';
export default {
    name: "SignUp",
    data() {
        return {
            name: '',
            email: '',
            password: '',
        }
    },
    methods: {
        async register() 
        {
            // console.warn("Testing Purpose and:",this.name,this.email,this.password);
            // let result = await axios.post('http://127.0.0.1:8080/api/register',{
            let result = await axios.post('http://192.168.42.34:24/api/register',{
              name:this.name,
              email:this.email,
              password:this.password
            });
            // console.warn(result);
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
};
</script>

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}
* {
  box-sizing: border-box;
}

/* Full-width input fields */
input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type="text"]:focus,
input[type="password"]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04aa6d;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity: 1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,
.signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn,
  .signupbtn {
    width: 100%;
  }
}
</style>
