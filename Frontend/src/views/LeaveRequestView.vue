<template>
    <div class="leave-request-form">
      <h2>Leave Request Form</h2>
      <form @submit.prevent="submitForm">
        <div>
          <label for="name">Name:</label>
          <input type="text" id="name" v-model="form.name" required />
        </div>
        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="form.email" required />
        </div>
        <div>
          <label for="startDate">Start Date:</label>
          <input type="date" id="startDate" v-model="form.startDate" required />
        </div>
        <div>
          <label for="endDate">End Date:</label>
          <input type="date" id="endDate" v-model="form.endDate" required />
        </div>
        <div>
          <label for="reason">Reason:</label>
          <textarea id="reason" v-model="form.reason" required></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
  
      <!-- Validation Error -->
      <div v-if="error" class="error-message">
        <p>{{ error }}</p>
      </div>
  
      <!-- Display submitted information -->
      <div v-if="submitted" class="submitted-info">
        <h3>Request Submitted</h3>
        <p><strong>Name:</strong> {{ submittedData.name }}</p>
        <p><strong>Email:</strong> {{ submittedData.email }}</p>
        <p><strong>Start Date:</strong> {{ submittedData.startDate }}</p>
        <p><strong>End Date:</strong> {{ submittedData.endDate }}</p>
        <p><strong>Reason:</strong> {{ submittedData.reason }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        form: {
          name: "",
          email: "",
          startDate: "",
          endDate: "",
          reason: "",
        },
        submitted: false,
        submittedData: {}, // Stores the submitted data for display
        error: "", // Error message for validation
        employeeInformation: [
          {
            employeeId: 1,
            name: "Sibongile Nkosi",
            contact: "sibongile.nkosi@moderntech.com",
          },
          {
            employeeId: 2,
            name: "Lungile Moyo",
            contact: "lungile.moyo@moderntech.com",
          },
          // Add all the other employee objects here
        ],
      };
    },
    methods: {
      submitForm() {
        // Basic validation for date range
        if (new Date(this.form.startDate) > new Date(this.form.endDate)) {
          this.error = "End date cannot be earlier than start date.";
          return;
        }
  
        // Validate against employee data
        const isValidEmployee = this.employeeInformation.some(
          (employee) =>
            employee.name === this.form.name &&
            employee.contact === this.form.email
        );
  
        if (!isValidEmployee) {
          this.error = "Only Emplloyees are allowed to request";
          return;
        }
  
        // If validation passes, clear the error
        this.error = "";
  
        // Mark the form as submitted and store the form data
        this.submitted = true;
        this.submittedData = { ...this.form }; // Copy the form data for display
  
        // Placeholder: Logic to send data to backend or HR system
        console.log("Form data submitted:", this.form);
  
        // Reset form after submission (optional)
        this.resetForm();
      },
      resetForm() {
        this.form = {
          name: "",
          email: "",
          startDate: "",
          endDate: "",
          reason: "",
        };
      },
    },
  };
  </script>
  
  <style scoped>
  .leave-request-form {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
  }
  
  .leave-request-form h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
  }
  
  .leave-request-form div {
    margin-bottom: 15px;
  }
  
  .leave-request-form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }
  
  .leave-request-form input,
  .leave-request-form textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  
  .leave-request-form button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  
  .leave-request-form button:hover {
    background-color: #0056b3;
  }
  
  .error-message {
    margin-top: 10px;
    padding: 10px;
    border: 1px solid #ff4d4d;
    border-radius: 4px;
    background-color: #ffe6e6;
    color: #cc0000;
  }
  
  .submitted-info {
    margin-top: 20px;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #e6ffe6;
  }
  
  .submitted-info h3 {
    margin-bottom: 15px;
    color: #4caf50;
  }
  </style>
  