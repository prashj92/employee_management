<template>
<Home></Home>

<div>
    <h3 class="text-center">Candidates</h3><br />
    <hr />
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Profile</th>
            <th>Experience</th>
            <th>Address</th>
            <th>City</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <tr v-for="candidate in candidates" :key="candidate.id">
            <td>{{ candidate.first_name }} {{ candidate.last_name }}</td>
            <td>{{ candidate.email }}</td>
            <td>{{ candidate.mobile }}</td>
            <td>{{ candidate.profile }}</td>
            <td>{{ candidate.experience }}</td>
            <td>{{ candidate.address }}</td>
            <td>{{ candidate.city }}</td>
            <td>{{ currentDateTime(candidate.created_at) }}</td>
            <td>
                <div class="btn-group" role="group">
                    <router-link :to="{name: 'EditCompany', params: { id: candidate.id }}" class="btn btn-primary">Edit
                    </router-link>
                    <button class="btn btn-danger" v-on:click="deleteCompany(candidate.id)">Delete</button>
                </div>
            </td>
        </tr>
    </table>
    <!-- <pagination v-model="page" :records="500" :per-page="2" @paginate="myCallback"/> -->
</div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';
import Home from './Home.vue';

export default {
    name: 'ListCandidates',
    components: {
        Home
    },
    data() {
        return {
            candidates: []
        }
    },
    methods: {
        currentDateTime(candidate_created_time) {
            return moment(candidate_created_time).format('MMMM Do YYYY, h:mm:ss a')
        },
    },
    created() {
        axios.get("http://192.168.42.34:24/api/getAllCandidates")
            .then(response => {

                if (response.status == 200) {
                    console.warn("DATA: ",response);
                    let candidatesData = response.data;
                    this.candidates = candidatesData;
                }
            })
            .catch(error => {

            });
    }
}
</script>

<style scoped>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td,
th {
    border: 1px solid #ce9b9b;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
