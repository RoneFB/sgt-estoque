<template>
  <div v-if="usuario">
    
    <div class="container" v-if="!criando">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-primary" @click="criar()">
              Cadastrar
          </button>
          <h3>Listagem de Estoque</h3>
        </div>
        <div class="card-body">
          <table class="table" v-if="produtos">
            <thead>
              <tr>
                  <th>Nome</th>
                  <th>Descricao</th>
                  <th>Quantidade</th>
                  <th>Valor</th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(produto, i) in produtos" :key="i">
                <td>{{produto.NOME}}</td>
                <td>{{produto.DESCRICAO}}</td>
                <td>{{produto.QUANTIDADE}}</td>
                <td>R$ {{produto.VALOR}}</td>
                <td>
                  <button class="btn btn-primary" @click="criar(produto)">Editar</button>
                  <button class="btn btn-danger ml-3" @click="excluir(produto)">Excluir</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <EstoqueDetalhe  ref="detail"></EstoqueDetalhe>
  </div>
   <div v-else class="container">
     <div class="alert alert-secondary" role="alert">
      É necessário fazer login <router-link to="/login" class="navitem">Logar</router-link>
    </div>
   </div>
</template>

<script>
import axios from 'axios'
import EstoqueDetalhe from './EstoqueDetalhe';
import { mapState } from 'vuex';
export default {
  name: 'estoque',
  components: {EstoqueDetalhe},
  data(){
    return{
      novo: {},
      criando: false,
      produtos: null
    }
  },
  methods: {
    criar(produto = null){
      
      if(produto != null){
        this.$refs.detail.add(produto);
      }
      this.$refs.detail.editando = true;
      this.criando = true;
    },
    excluir(produto){
        axios.delete('produto/'+produto.ID).then(res => {
            console.log(res)
           this.listar();
        }).catch(error => console.log(error))
    },
    adicionar(produto){
      this.$refs.detail.set(produto)
    },
    listar(){
      axios.get('produto/'+this.usuario.ID).then(res => {
        this.produtos= res.data;
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