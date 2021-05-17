<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'
import axios from 'axios';

export default {
  name: 'Home',
  components: {
    HelloWorld
  },
  data() {
    return {
      itemList: [],
    };
  },
  methods: {
    GetAllData() {
      let params = {
        request: 1,
        data: {}
      };

      axios.post('http://localhost/crud-agile-server/services/AgileService.php', params)
        .then((res) => {
          this.itemList = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
  created() {
    this.GetAllData();
  }
}
</script>
