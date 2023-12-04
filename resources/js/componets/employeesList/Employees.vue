<template>
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
            <td>{{ user.nationality }}</td>
            <td :style="{ color: isIqamaExpiringSoon(user.start_of_work) ? 'red' : '' }">{{ user.iqama_number }}</td>
            <td>

            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script>
      import axios from "axios"
  export default {

    data() {
      return {
        users:null,
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
      }

  </script>
