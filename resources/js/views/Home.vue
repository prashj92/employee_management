<template>
<div class="navbar">
    <router-link to="/profile" v-slot="{ href, route, navigate, isActive, isExactActive }">
        <NavLink @click="getUserProfile">Profile</NavLink>
    </router-link>

    <div class="dropdown">
        <button class="dropbtn">
            Candidates Section
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            
            <router-link to="/listCandidates">All Candidate</router-link>
            <router-link to="/addCandidate">Add Candidate</router-link>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">
            Companies Corner
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <router-link to="/listCompanies" v-slot="{ href, route, navigate, isActive, isExactActive }">
                <NavLink @click="getAllCompanies">All Companies</NavLink>
            </router-link>
            <router-link to="/addCompany">Add Company</router-link>
        </div>
    </div>

    <router-link to="/login" v-slot="{ href, route, navigate, isActive, isExactActive }">
        <NavLink @click="logout">Logout</NavLink>
    </router-link>
</div>
</template>

<script>
import axios from "axios";

export default {
    name: "Home",
    methods: {
        async logout() {
            let result = await axios.post("http://192.168.42.34:24/api/logout");
            if (result.status == 200) {
                localStorage.setItem("userInfo", "");
                this.$router.push({ name: "Login" });
            }
        },
        async getUserProfile() {
            let storage_data = localStorage.getItem("userInfo");
            let decode_data = JSON.parse(storage_data);
            let user_id = decode_data.user_id;
            await axios.get(`http://192.168.42.34:24/api/getProfile/${user_id}`)
                .then((response) => {
                    localStorage.setItem("userDetails", response.data);
                });
        }
    },
    mounted() {
        let user_exists = localStorage.getItem("userInfo");
        if (!user_exists) {
            this.$router.push({ name: "Login" });
        }
    },
};
</script>

<style scoped>
.navbar {
    overflow: hidden;
    background-color: #333;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.navbar a:hover,
.dropdown:hover .dropbtn {
    background-color: red;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
