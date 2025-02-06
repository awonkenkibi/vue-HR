<template>
    <div>
      <!-- Styled Header -->
      <h1>Team Members</h1>
  
      <!-- Theme Selector -->
      <select id="themeSelector" v-model="selectedTheme" @change="changeTheme">
        <option value="light">Light</option>
        <option value="dark">Dark</option>
        <option value="colorful">Colorful</option>
      </select>
  
      <!-- Team Container -->
      <div class="team-container">
        <div v-for="member in teamMembers" :key="member.name" class="member-card">
          <!-- Member Image -->
          <img :src="member.imgSrc || placeholderImg" :alt="member.name" />
  
          <!-- Member Name -->
          <h3>{{ member.name }}</h3>
  
          <!-- Member Bio -->
          <p v-if="member.showBio">{{ member.bio }}</p>
  
          <!-- Learn More Button -->
          <button @click="showMoreInfo(member)">Learn More</button>
  
          <!-- Toggle Bio Button -->
          <button @click="toggleBio(member)">Toggle Bio</button>
        </div>
      </div>
  
      <!-- Team Photo Section -->
      <button id="show-team-photo" @click="toggleTeamPhoto">
        {{ teamPhotoVisible ? "Fade Out" : "Fade In" }}
      </button>
      <div id="team-photo">
        <img v-if="teamPhotoVisible" :src="teamPhotoSrc" alt="Team Photo" class="team-photo" />
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        teamMembers: [
          {
            name: "Anele Mbombiya",
            designation: "FullStack Developer",
            bio: "Anele Mbombiya is a creative and driven professional...",
            moreInfo: "Anele loves listening to music and his favorite programming language is Vue.",
            imgSrc: "https://files.slack.com/files-pri/T02LW4RMXJQ-F083BPTT2PK",
            showBio: false,
          },
          {
            name: "Awonke Nkibi",
            designation: "Backend Developer",
            bio: "Awonke Nkibi is a web designer who builds websites and web applications...",
            moreInfo: "Awonke enjoys playing chess and her favorite programming language is HTML.",
            imgSrc: "",
            showBio: false,
          },
          {
            name: "Luthando Dake",
            designation: "Backend Developer",
            bio: "Luthando Dake is a student in Life Choices doing Software Development...",
            moreInfo: "Luthando loves being in touch with nature and loves working with JavaScript.",
            imgSrc: "https://ca.slack-edge.com/T02LW4RMXJQ-U07PRUT46UX-115d9c8e2f37-512",
            showBio: false,
          },
        ],
        selectedTheme: "light",
        teamPhotoVisible: false,
        teamPhotoSrc: "https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg",
        placeholderImg: "https://via.placeholder.com/150", // Fallback image
      };
    },
    methods: {
      toggleBio(member) {
        member.showBio = !member.showBio;
      },
      showMoreInfo(member) {
        alert(`He is a ${member.designation}: ${member.moreInfo}`);
      },
      changeTheme() {
        const themes = {
          light: { backgroundColor: "#FFFFFF", color: "#000000" },
          dark: { backgroundColor: "#121212", color: "#FFFFFF" },
          colorful: { backgroundColor: "#FFDDC1", color: "#005F73" },
        };
  
        const theme = themes[this.selectedTheme];
        document.body.style.backgroundColor = theme.backgroundColor;
        document.body.style.color = theme.color;
      },
      toggleTeamPhoto() {
        this.teamPhotoVisible = !this.teamPhotoVisible;
      },
    },
  };
  </script>
  
  <style scoped>
  h1 {
    background-color: black;
    color: white;
    position: fixed;
    top: 0;
    width: 100%;
    padding: 10px;
    text-align: center;
    margin-top: 0;
  }
  
  .team-container {
    display: flex;
    flex-wrap: wrap;
    margin-top: 100px;
    gap: 20px;
    justify-content: center;
  }
  
  .member-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    width: 300px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  .member-card img {
    width: 100%;
    height: auto;
    border-radius: 50%;
    margin-bottom: 10px;
  }
  
  button {
    margin-top: 10px;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background-color: #007bff;
    color: white;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  
  .team-photo {
    width: 80%;
    height: auto;
    border-radius: 40px;
    transition: opacity 1s;
  }
  </style>
  