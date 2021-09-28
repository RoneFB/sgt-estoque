<template>
    <div class="container" v-if="editando">
        <form action="">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" @click="criar()">
                            Listar
                        </button>
                        <h3>Cadastro de Estoque</h3>
                    </div>
                    <form v-on:submit.prevent="salvar">
                        <div class="card-body" >
                            <div class="row">
                                <div class="col-4">
                                    <label for="nome">Nome: </label>
                                    <input id="nome" type="text" class="form-control" v-model="produto.nome">
                                </div>
                                <div class="col-4">
                                    <label for="nome">Descricao: </label>
                                    <input id="nome" type="text" class="form-control" v-model="produto.descricao">
                                </div>
                                <div class="col-4">
                                    <label for="nome">Valor: </label>
                                    <input id="nome" type="text" class="form-control" v-model="produto.valor">
                                </div>
                                <div class="col-4">
                                    <label for="nome">Quantidade: </label>
                                    <input id="nome" type="text" class="form-control" v-model="produto.quantidade">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'
import Swal from 'sweetalert2';
export default {
    name: "estoqueDetalhe",
    data(){
        return{
            produto: {},
            editando: false
        }
    },
    methods: {
        criar(){
            this.$parent.criando = false;
            this.editando = false;
        },
        add(produto = null){
            var prod = {
                id: produto.ID,
                nome : produto.NOME,
                descricao: produto.DESCRICAO,
                quantidade: produto.QUANTIDADE,
                valor: produto.VALOR
            }
            this.produto = prod;
            this.editando = true;
        },
        salvar(){
             this.produto.usuario_id = this.$parent.usuario.ID;
             console.log(this.produto);
             axios.post('produto',{produto: this.produto}).then(res => {
                 console.log(res)
                 Swal.fire('Salvo com sucesso!');
                 this.criar();
                 this.$parent.listar();
            }).catch(error => console.log(error))
        }
    }
}
</script>

<style>

</style>