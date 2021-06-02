<template>
<Home></Home>
<form style="border: 1px solid #ccc; margin-left:250px; width: 50%; margin-top: 50px;">
    <div class="container">
        <h1>Add Company</h1>
        <hr />

        <label for="company_name"><b>Company Name</b></label>
        <input type="text" placeholder="Enter Company Name" name="company_name" v-model="company_name" required />

        <label for="company_email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="company_email" v-model="company_email" required />

        <label for="contact_person"><b>Contact Person</b></label>
        <input type="text" placeholder="Enter Contact Person" name="contact_person" v-model="contact_person" required />

        <label for="mobile"><b>Mobile</b></label>
        <input type="text" placeholder="Enter Mobile" name="mobile" v-model="mobile" required />

        <label for="profile"><b>Profile</b></label>
        <input type="text" placeholder="Enter Profiles" name="profile" v-model="profile" required />

        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address" v-model="address" required />

        <label for="city"><b>City</b></label>
        <input type="text" placeholder="Enter City" name="city" v-model="city" required />

        <div class="clearfix">
            <button type="button" class="signupbtn" v-on:click="addCompany">Save</button>
        </div>
    </div>
</form>
</template>

<script>
import axios from "axios";
import Home from "./Home";

export default {
    name: "AddCompany",
    components: {
        Home
    },
    data() {
        return {
            company_name: '',
            company_email: '',
            contact_person: '',
            mobile: '',
            profile: '',
            address: '', 
            city: ''
        }
    },
    methods:{
        async addCompany() {
            let response = await axios.post("http://127.0.0.1:8080/api/addCompany", {
                company_name: this.company_name,
                company_email: this.company_email,
                contact_person: this.contact_person,
                mobile: this.mobile,
                profile: this.profile,
                address: this.address,
                city: this.city,
            });
            if (response.status == 200) {
                this.$router.push({name:'ListCompanies'});
            }
        }
    }
}
</script>

<style scoped>
body {
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

input[type="textarea"] {
    width: 100%;
    padding: 35px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
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
