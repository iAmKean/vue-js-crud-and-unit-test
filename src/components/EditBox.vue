<template>
  <div class="popup-action add-box">
    <div class="popup-mask"></div>
    <div class="content">
      <img src="../assets/close-icon.png" alt="" width="25" height="25" @click="CloseAdd()">
      <div class="action-box">
        <h3>Modify Item</h3>
        <input type="text" v-model="text" placeholder="Enter value">
        <button @click="UpdateData()">Update</button>
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
    return {
      text: '',
    };
  },
  props: {
    item: Object
  },
  methods: {
    CloseAdd() {
      this.$emit('close');
    },
    UpdateData() {
      if (this.text) {
        let params = {
          request: 3,
          data: {
            id:  this.item.ID,
            item: this.text,
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
      } else {
        alert("Please enter value")
      }
    }
  },
  created() {
    this.text = this.item.Item;
  }
}
</script>