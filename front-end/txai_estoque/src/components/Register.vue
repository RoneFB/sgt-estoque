<template>
  <div class="container">
      <div class="col-md-12">
          <h3>Formulário de Cadastro de Usuários</h3>
          <form v-on:submit.prevent="registrar">
                <label for="">Nome: </label>
                <input type="text" name="" id="" class="form-control" v-model="dados.nome" required>
                <label for="">Login: </label>
                <input type="text" name="" id="" class="form-control" v-model="dados.email" required>
                <label for="">Cargo: </label>
                <input type="text" name="" id="" class="form-control" v-model="dados.cargo" required>
                <label for="">Senha</label>
                <input type="text" class="form-control"  v-model="dados.senha" required>
                <button class="btn btn-success" type="submit">Salvar</button>
          </form>
      </div>
  </div>
</template>

<script>
import Swal from 'sweetalert2';
import axios from 'axios'
export default {
    name: 'register',
    data(){
        return{
            dados: {}
        }
    },
    methods: {
       
        registrar(){
            axios.post('usuario',{...this.dados}).then(res => {
                console.log(res)
                Swal.fire('Salvo com sucesso!');
            }).catch(error => console.log(error))
        }
    }
}
</script>

<style>

</style>