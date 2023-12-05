<template>
    <Navbar />
    <router-view></router-view>
  </template>

  <script>
  import Navbar from './navbar/Navbar.vue';

  export default {
    components: {
      Navbar
    },
    data() {
      return {};
    },
  };
  </script>
