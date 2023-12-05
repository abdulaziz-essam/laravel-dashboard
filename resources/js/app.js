import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import routes from "./routes";
import App from "./componets/App.vue";


// Create the router instance
const router = createRouter({
  history: createWebHistory(),
  routes
});

// Create the Vue app instance
const app = createApp(App);

// Register components
app.component("my-app", App);


// Mount the app to the DOM
app.use(router);
app.mount("#app");
