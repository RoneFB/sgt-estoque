import Vue from 'vue'
import App from './App.vue'
import axios from 'axios'
import store from './store'
import 'bootstrap/dist/css/bootstrap.min.css'
import router from './router'
import jquery from 'jquery';

Vue.config.productionTip = false


axios.defaults.baseURL = 'http://127.0.0.1/txai/index.php/api/';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

axios.interceptors.request.use(config => {
  //config.headers = { "Content-Type": "multipart/form-data" }
  if(store.state.token){
    config.headers.Authorization = 'Bearer ' + store.state.token;
  }
  return config;
})


import { mapState } from 'vuex'
import { mapMutations } from 'vuex'
new Vue({
  router,
  store,
  jquery,
  ...mapMutations([
    'logout'
  ]),
  computed: {
    ...mapState([
      'usuario'
    ])
  },
  render: h => h(App),
}).$mount('#app')


