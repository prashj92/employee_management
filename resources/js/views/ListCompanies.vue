<template>
<Home></Home>

<div>
    <h3 class="text-center">Companies</h3><br />
    <hr />
    <table class="table table-bordered">
        <tr>
            <th>Company Name</th>
            <th>Email</th>
            <th>Contact Person</th>
            <th>Mobile</th>
            <th>Profile</th>
            <th>Current Vacancies</th>
            <th>Address</th>
            <th>City</th>
            <th>Date Of Registration</th>
            <th>Actions</th>
        </tr>
        <tr v-for="company in companies" :key="company.id">
            <td>{{ company.company_name }}</td>
            <td>{{ company.company_email }}</td>
            <td>{{ company.contact_person }}</td>
            <td>{{ company.mobile }}</td>
            <td>{{ company.profiles }}</td>
            <td>{{ company.current_openings }}</td>
            <td>{{ company.address }}</td>
            <td>{{ company.city }}</td>
            <td>{{ currentDateTime(company.created_at) }}</td>
            <td>
                <div class="btn-group" role="group">
                    <router-link :to="{name: 'EditCompany', params: { id: company.id }}" class="btn btn-primary">Edit
                    </router-link>
                    <button class="btn btn-danger" v-on:click="deleteCompany(company.id)">Delete</button>
                </div>
            </td>
        </tr>
    </table>
    <!-- <pagination v-model="page" :records="500" :per-page="2" @paginate="myCallback"/> -->
</div>
</template>

<script>
import axios from "axios";
import moment from 'moment';
import Home from "./Home";
// import Pagination from 'v-pagination-3';

export default {
    name: 'ListCompanies',
    components: {
        Home,
        // Pagination
    },
    methods: {
        currentDateTime(company_created_time) {
            return moment(company_created_time).format('MMMM Do YYYY, h:mm:ss a')
        },
        deleteCompany(id) {

            //let response = axios.delete(`http://127.0.0.1:8080/api/deleteCompany/${id}`)
            let response = axios.delete(`http://192.168.42.34:24/api/deleteCompany/${id}`)
                .then((response) => {
                    if (response.status == 200) {
                        let i = this.companies.map(item => item.id).indexOf(id); // find index of your object
                        this.companies.splice(i, 1)
                    }
                });
        }
    },
    data() {
        return {
            companies: [],
            page: 1
        }
    },
    created() {
        axios.get("http://192.168.42.34:24/api/getAllCompanies")
            .then((response) => {

                if (response.status == 200) {
                    let companiesData = response.data;
                    this.companies = companiesData;
                }
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
