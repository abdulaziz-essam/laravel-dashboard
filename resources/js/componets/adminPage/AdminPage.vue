<template>
    <div>
      <div class="offcanvas-overlay" v-if="showOffcanvas"></div>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel" :class="{ 'show': showOffcanvas }">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkLabel">Offcanvas</h5>
          <button type="button" class="btn-close" @click="toggleOffcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <p>Place offcanvas content here.</p>
        </div>
      </div>

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
          <tr v-for="(user, index)  in users"   :key="user.id">
            <td>{{ user.name }}</td>
            <td>{{ user.nationality }}</td>
            <td :style="{ color: isIqamaExpiringSoon(user.iqama) ? 'red' : '' }">{{ user.iqama_number }}</td>
            <td>
              <button type="button" class="btn btn-light" @click="navigate(user.id)">
                Process
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script>
  import axios from "axios";
  export default {
    beforeRouteEnter(to, from, next) {
        axios
            .get("/status")
            .then((response) => {
                // Handle the response from the server
console.log(response.data)

                let status = response.data.loggedIn;
                if (!status) {

                    // If the phone key is not present in sessionStorage, redirect to the Sign In route

                    next({ name: "login" });
                }
                else if(response.data.session.is_admin===1) {
                    next();
                }else{
                    next({name:"dashboard"})
                }
            })
            .catch((error) => {
                console.log(error);
            });
    },
    data() {
      return {
        users: [],
        showOffcanvas: false,
      };
    },
    mounted() {
      this.getEmployees();
    },
    methods: {
      isIqamaExpiringSoon(iqama) {
        const threeMonthsFromNow = new Date();
        threeMonthsFromNow.setMonth(threeMonthsFromNow.getMonth() + 3);

        const iqamaDate = new Date(iqama);

        return iqamaDate < threeMonthsFromNow;
      },
      getEmployees() {
        axios
          .get("/get/employees")
          .then((response) => {
            this.users = response.data;
          })
          .catch((error) => {
            console.error("Error retrieving employees:", error);
          });
      },
      toggleOffcanvas() {
        this.showOffcanvas = !this.showOffcanvas;
      },
      navigate(index) {

      this.$router.push('inbox'+'/'+index);
    },
    },
  };
  </script>

