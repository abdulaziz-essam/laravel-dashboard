<template>
    <div class="container">
      <div class="form-container">
        <form @submit="login">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input v-model="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input v-model="password" type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </template>

  <style>
  .container {
    display: flex;
    justify-content: center;
    margin-top: 10%;
    height: 100vh;
  }

  .form-container {
    width: 400px;
  }
  </style>

  <script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    login(event) {
      event.preventDefault();

      const credentials = {
        email: this.email,
        password: this.password,
      };

      axios.post('/login', credentials)
        .then(response => {
          // Authentication successful
          const user = response.data;
          console.log('User is authenticated:', user);
        })
        .catch(error => {
          // Authentication failed
          console.error('Authentication failed:', error);
        });
    },
  },
};
  </script>
