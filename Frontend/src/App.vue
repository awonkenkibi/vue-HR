<template>
  <!-- Conditionally render the Navbar based on login status -->
  <div v-if="isLoggedIn">
    <nav class="navbar">
      <a class="navbar-logo" href="#">
        <img :src="require('@/assets/ModernTech.png')" alt="Company Logo" class="logo" />
      </a>
      <ul class="nav-list">
        <li><router-link to="/home" class="nav-link">Home</router-link></li>
        <li><router-link to="/attendance" class="nav-link">Employee Attendance</router-link></li>
        <li><router-link to="/payroll" class="nav-link">Payroll</router-link></li>
        <li><router-link to="/leaveRequest" class="nav-link">Leave Request</router-link></li>
        <button class="btn btn-dark">
          <li @click="logout()"><router-link to="login"></router-link>Log Out</li>
        </button>
      </ul>
    </nav>
  </div>

  <!-- Fullscreen Login Form (only visible if not logged in) -->
  <section v-if="!isLoggedIn" class="hero">
    <div class="hero-content">
      <!-- <h1>Welcome to Modern Tech Solution Portal</h1> -->
      
    </div>

    <div class="login-container">
      <div class="form-box login">
        <form @submit.prevent="handleSubmit" id="loginForm">
          <h1>LOGIN</h1>
          <p>Please log in to continue.</p>
          <div class="input-box">
            <input type="text" v-model="username" placeholder="Username" required />
            <i class="bx bx-user"></i>
          </div>
          <div class="input-box">
            <input type="password" v-model="password" placeholder="Password" required />
            <i class="bx bxs-lock"></i>
          </div>
          <button type="submit" class="button">Login</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Main Content (visible only after login) -->
  <div v-if="isLoggedIn" class="content">
    <router-view />
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: "",
      password: "",
      isLoggedIn: false, // Track login status
    };
  },
  methods: {
    handleSubmit() {
      // Example credentials validation
      if (this.username === "admin101" && this.password === "password123") {
        this.isLoggedIn = true; // Set to true when login is successful
        this.$router.push("/home"); // Redirect to home page after login
      } else {
        alert("Invalid username or password");
      }
    },
    logout(){
      this.isLoggedIn = false;
      this.$router.push("/login")
      // alert("logout")
    }
  },
};
</script>

<style scoped>
/* Global Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}



/* Navbar Styles */
.navbar {
  background-color: #343A40;
  padding: 10px 20px;
  position: relative;
  width: 100%;
  z-index: 1000;
}

.nav-list {
  list-style-type: none;
  padding: 0;
  margin: 0;
  display: flex;
}

.nav-list li {
  margin: 0 15px;
}

.nav-link {
  color: #fff;
  padding: 10px 15px;
  text-decoration: none;
  transition: background 0.3s, color 0.3s;
  border-radius: 4px;
}

.nav-link:hover {
  background-color: #495057;
}

.navbar-logo {
  display: flex;
  align-items: center;
}

.logo {
  width: 60px;
  height: 60px;
  object-fit: contain;
}

/* Hero Section - Fullscreen Login */
.hero {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Full screen height */
  background: #333;
  color: white;
  text-align: center;
  padding: 20px;
}

.hero h1 {
  font-size: 48px;
  margin-bottom: 20px;
}

.p {
  font-size: 20px;
  margin-bottom: 40px;
  color: #0056b3;
}
/* Hero Section with Background Image */
.hero {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: url('/src/assets/ModernTech.png') no-repeat center center/cover;
  color: white;
  text-align: center;
  padding: 20px;
  position: relative;
}

/* Login Form */
.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}

.form-box {
  background-color: #fff;
  padding: 35px;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  width: 400px;
}

h1 {
  font-size: 32px;
  margin-bottom: 20px;
  color: #333;
}


.input-box {
  position: relative;
  margin: 20px 0;
}

.input-box input {
  width: 100%;
  padding: 10px;
  background-color: #f5f5f5;
  border: 1px solid #ddd;
  border-radius: 8px;
  outline: none;
  font-size: 16px;
  color: #333;
}

.input-box input::placeholder {
  color: #aaa;
}

.button {
  width: 100%;
  height: 45px;
  background-color: #333;
  border-radius: 5px;
  border: none;
  cursor: pointer;
  font-size: 18px;
  color: white;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.button:hover {
  background-color: #0e0f11;
}

/* Main Content (Only visible after login) */
.content {
  margin-top: 60px;
  padding: 20px;
}
</style>
