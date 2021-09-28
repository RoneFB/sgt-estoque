import Vue from 'vue'
import Vuex from 'vuex'
import VuexPersist from 'vuex-persist'
import router from './router'
Vue.use(Vuex)

const vuexPersist = new VuexPersist({
  key: 'txai',
  storage: localStorage
})

export default new Vuex.Store({
  plugins: [
    vuexPersist.plugin
  ],
  state: {
    usuario: null,
    token: null
  },
  mutations: {
    setUsuario (state, usuario) {
        console.log(usuario)
        state.usuario = usuario
    },
    setToken (state, token)  {
        state.token = token
    },
    logout (state) {
        //state.token = null
        state.usuario = null
        router.push('/login')
    }
  },
  actions: {

  }
})