import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import http from "./lib/http-common";
import { api } from "./utils/api";
Vue.prototype.http = http;
Vue.prototype.api = api;
Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
