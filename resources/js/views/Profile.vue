<template>
<Home ></Home>
<form style="border: 1px solid #ccc; margin-left:250px; width: 50%; margin-top: 50px;">
    <div class="container" >
        <h1>Update Profile</h1>
        <hr />

        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name" v-model="name" required />

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" v-model="email" required />

        <label for="password"><b>Change Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" v-model="password" required />

        <div class="clearfix">
            <button type="button" class="signupbtn" v-on:click="updateProfile">Save</button>
        </div>
    </div>
</form>
</template>

<script>
import axios from "axios";
import Home from "./Home";
export default {
    name: "Profile",
    components: {
        Home
    },
    data() {
        return {
            name: '',
            email: '',
        }
    },
    methods: {
    },
    created() {
        let storage_data = localStorage.getItem("userInfo");
        let decode_data = JSON.parse(storage_data);
        let user_id = decode_data.user_id;
        axios.get(`http://127.0.0.1:8080/api/getProfile/${user_id}`)
            .then((response) => {
                let userData = response.data;
                this.name = userData.name;
                this.email = userData.email;
            });
    },
    mounted() {
        // let storage_data = localStorage.getItem("userInfo");
        // let decode_data = JSON.parse(storage_data);
        // let user_id = decode_data.user_id;
        // axios.get(`http://127.0.0.1:8080/api/getProfile/${user_id}`)
        //     .then((response) => {
        //         let userData = response.data;
        //         this.name = userData.name;
        //         this.email = userData.email;
        //     });
    }
};
</script>

<style scoped>
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

/* Float cancel and signup buttons and add an equal width */
.signupbtn {
    float: left;
    width: 100%;
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
