<template>
    <div class="card text-center">
      <div class="card-body d-flex flex-column align-items-center justify-content-center">
        <h5 class="card-title">{{ email.subject }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Sender: {{ email.sender }}</h6>
        <h6 class="card-subtitle mb-2 text-muted">Recipient: {{ email.recipient }}</h6>
        <p class="card-text">{{ email.message }}</p>
      </div>
    </div>
  </template>

  <style>
  .card {
    margin: 0 auto; /* Center the card horizontally */
    max-width: 1000px; /* Set a maximum width for the card */
height: 700;
}

  .card-body {
    padding: 20px; /* Add some padding to the card body */

  }
  </style>

  <script>
  export default {
    data() {
      return {
        email: {
          subject: 'Email Subject',
          sender: 'sender@example.com',
          recipient: 'recipient@example.com',
          message: 'i want vacition from 20 april to 29 ',
        },
      };
    },
  };
  </script>
