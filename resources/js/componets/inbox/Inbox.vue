<template>
    <div class="card text-center">
      <div class="card-body d-flex flex-column align-items-center justify-content-center">
        <h5 class="card-title">{{ email.title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Sender: {{ employee }}</h6>
        <p class="card-text">{{ email.message }}</p>
        <div>
          <button type="button" @click="acceptMessage" class="btn btn-success">Accept</button>
          <button type="button" @click="denyMessage" class="btn btn-danger">Refuse</button>
        </div>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios'
  import './style.css'
import { alert_message } from '../../scripts/alert';
  export default {
    data() {
      return {
        email: {
          title: '',
          employee_id: '',
          message: '',
        },
        employee: null
      };
    },
    mounted() {
      this.getMessage();
    },
    methods: {
      getMessage() {
        let id = this.$route.params.id;
        axios
          .get("/message/" + id)
          .then((response) => {
            this.email = response.data;
            this.employee = response.data.name;
          })
          .catch((error) => {
            console.error("Error retrieving email:", error);
          });
      },
      acceptMessage() {
        // Perform logic for accepting the message, e.g., send a request to the server
        console.log("Message accepted");
        alert_message(this.employee+ "   request was approved", "success");
        this.$router.push('/admin');
      },
      denyMessage() {
        // Perform logic for denying the message, e.g., send a request to the server
        alert_message(this.employee+ "   request was refused", "success");
        this.$router.push('/admin');
      },
    },
  };
  </script>
