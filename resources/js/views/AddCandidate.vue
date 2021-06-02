<template>
<Home></Home>
<form style="border: 1px solid #ccc; margin-left:250px; width: 50%; margin-top: 50px;">
    <div class="container">
        <h1>Add Candidate</h1>
        <hr />

        <label for="first_name"><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name" name="first_name" v-model="first_name" required />

        <label for="last_name"><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="last_name" v-model="last_name" required />

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" v-model="email" required />

        <label for="mobile"><b>Mobile</b></label>
        <input type="text" placeholder="Enter Mobile" name="mobile" v-model="mobile" required />

        <label for="profile"><b>Profile</b></label>
        <input type="text" placeholder="Enter Profile" name="profile" v-model="profile" required />

        <label for="experience"><b>Experience</b></label>
        <input type="text" placeholder="Enter Experience" name="experience" v-model="experience" required />

        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address" v-model="address" required />

        <label for="city"><b>City</b></label>
        <input type="text" placeholder="Enter City" name="city" v-model="city" required />

        <div class="clearfix">
            <button type="button" class="signupbtn" v-on:click="addCandidate">Save</button>
        </div>
    </div>
</form>
</template>

<script>
import Home from './Home.vue';
import axios from 'axios';

export default {
    name: 'AddCandidate',
    components: {
        Home
    },
    data() {
        return {
            first_name: '',
            last_name: '',
            email: '',
            mobile: '',
            profile: '',
            experience: '',
            address: '',
            city: '',
            testData: '',
        }
    },
    methods: {
        async addCandidate() {
            const candidateData = {
                first_name: this.first_name,
                last_name: this.last_name,
                email: this.email,
                mobile: this.mobile,
                profile: this.profile,
                experience: this.experience,
                address: this.address,
                city: this.city,
            };
            await axios.post("http://127.0.0.1:8080/api/addCandidate", candidateData)
                .then(response => {
                    if (response.status == 200) {
                        this.$router.push({name:'ListCandidates'});
                    }
                })
                .catch(error => {
                    console.warn("Request",error.request)
                    console.warn("Response",error.response)
                })
        }
    }
}
</script>

<style>

</style>
