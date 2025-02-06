<template>
  <div class="home">
    <HelloWorld msg="Welcome to Your Vue.js App" />
    <EmployeesComp />
    
  </div>
</template>

<script>

import EmployeesComp from '@/components/EmployeesComp.vue';
import HelloWorld from '@/components/HelloWorld.vue';



export default {
  name: 'HomeView',
  components: {
    HelloWorld,
    EmployeesComp,
    
  },
};
</script>

