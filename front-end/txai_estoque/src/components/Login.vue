<template>
  <div class="container">
      <div class="col-md-12">
          <form v-on:submit.prevent="logar">
                <label for="">Email: </label>
                <input type="text" name="" id="" class="form-control" v-model="dados.email">
                <label for="">Senha</label>
                <input type="text" class="form-control"  v-model="dados.senha">
                <button class="btn btn-success" type="submit">Logar</button>
          </form>
          
      </div>
  </div>
</template>

<script>

import axios from 'axios'
import { mapMutations } from 'vuex'
import router from '../router'
export default {
    name: 'login',
    data(){
        return{
            dados: {
                email: '',
                senha: ''
            }
        }
    },
    methods: {
        ...mapMutations([
            'setUsuario',
            'setToken',
            'logout'
        ]),
        logar(){
            axios.post('usuario/login',{...this.dados}).then(res => {
                
                this.setUsuario(res.data)
               // this.setToken(res.data.token)
                router.push('/')
            }).catch(error => console.log(error))
        }
    }
}
</script>

<style>

</style>