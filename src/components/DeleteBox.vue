<template>
  <div class="popup-action add-box">
    <div class="popup-mask"></div>
    <div class="content">
      <img src="../assets/close-icon.png" alt="" width="25" height="25" @click="CloseAdd()">
      <div class="action-box">
        <h3>Are you sure you want to delete it?</h3>
        <button @click="CloseAdd()" class="delete-btn margin-right">Cancel</button>
        <button class="delete-btn" @click="DeleteData()">Yes</button>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios';
export default {
  name: 'EditBox',
  components: {},
  data() {
    return {};
  },
  props: {
    item: Object
  },
  methods: {
    CloseAdd() {
      this.$emit('close');
    },
    DeleteData() {
      let params = {
        request: 4,
        data: {
          id: this.item.ID
        }
      };

      let url = 'http://localhost/crud-agile-server/services/AgileService.php';

      axios.post(url, params)
        .then((res) => {
            this.CloseAdd();
            this.$emit('refresh');
        })
        .catch((error) => {
          console.log(error);
        });
      }
  },
  created() {}
}
</script>
