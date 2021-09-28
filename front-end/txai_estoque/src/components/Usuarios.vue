<template>
  <div>
    <div class="container">
      <div class="card">
        <div class="card-header">
             <h3>Listagem de Usuários</h3>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Cargo</th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(usuario,i) in usuarios" :key="i">
                  <td>{{usuario.NOME}}</td>
                  <td>{{usuario.EMAIL}}</td>
                  <td>{{usuario.CARGO}}</td>
                  <td><button class="btn btn-danger" @click="excluir">Excluir</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { mapState } from 'vuex';
export default {
  name: 'estoque',
  components: {},
  data(){
    return{
      usuarios: null
    }
  },
  methods: {
    listar(){
      axios.get('usuario').then(res => {
          console.log(res)
        this.usuarios= res.data;
      }).catch(error => console.log(error))
    },
    excluir(){
        axios.delete('usuario/'+this.usuario.ID,{...this.dados}).then(res => {
            console.log(res)
           this.listar();
        }).catch(error => console.log(error))
    }
  },
  mounted: function(){
    this.listar();
  },
  computed: {
    ...mapState([
      'usuario'
    ])
  }
}
</script>

<style>

</style>