<template>
  <div class="popup-action add-box">
    <div class="popup-mask"></div>
    <div class="content">
        <img src="../assets/close-icon.png" alt="" width="25" height="25" @click="CloseAdd()">
        <div class="action-box">
            <h3>New Item</h3>
            <input type="text" v-model="item" placeholder="Enter value">
            <button @click="SetData()">Save</button>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'EditBox',
  components: {},
  data() {
    return {
      item: '',
    };
  },
  methods: {
    CloseAdd() {
      this.$emit('close');
    },
    SetData() {
      if (this.item) {
          let params = {
            request: 2,
            data: {
              item: this.item
            }
          };

        this.http.post(this.api.AgileService, params)
          .then((res) => {
              this.CloseAdd();
              this.$emit('refresh');
              this.item = '';

          })
          .catch((error) => {
            console.log(error);
          });
      } else {
        alert("Please enter value")
      }
    }
  },
  created() {}
}
</script>
