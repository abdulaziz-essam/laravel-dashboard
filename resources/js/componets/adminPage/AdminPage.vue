<template>
    <div class="chart-container">
      <Bar :data="data" :options="options" />
    </div>
    <div>
      <h2>Employees List</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>iqama</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td :style="{ color: isIqamaExpiringSoon(user.iqama) ? 'red' : '' }">{{ user.iqama }}</td>
            <td>
              <button type="button" class="btn">Details </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </template>

  <script lang="ts">
  import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';
  import { Bar } from 'vue-chartjs';
import axios from 'axios'
  ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend);

  export default {
    name: 'App',
    components: {
      Bar
    },
    data() {
      return {
        users: null,
        data: {
  labels: ['January', 'February', 'March'],
  datasets: [{
    data: [20, 20, 12],
    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)'],
    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
    borderWidth: 1
  }]
},
        options: {
          responsive: true,
          maintainAspectRatio: false,
          width: 700,
          height: 300
        }
      };
    },
    mounted(){
this.getEmployees()
    },
    methods: {
      isIqamaExpiringSoon(iqama) {
        const threeMonthsFromNow = new Date();
        threeMonthsFromNow.setMonth(threeMonthsFromNow.getMonth() + 3);

        const [day, month, year] = iqama.split('/');
        const iqamaDate = new Date(`${month}/${day}/${year}`);

        return iqamaDate < threeMonthsFromNow;
      },
      editUser(userId) {
        console.log('Edit user with ID:', userId);
      },
      deleteUser(userId) {
        console.log('Delete user with ID:', userId);
      },
      getEmployees(){
        axios.get('/get/employees')
  .then(response => {
    // Authentication successful
     this.users = response.data;

  })
          .catch(error => {
            // Authentication failed
            console.error('Authentication failed:', error);
          });
      },
    },
  };
  </script>

  <style>
  .chart-container {
    width: 900px; /* Increase the width value to give the chart more width */
    height: 500px;
    align-content: center;
    margin-left: 25%;
  }
  </style>
