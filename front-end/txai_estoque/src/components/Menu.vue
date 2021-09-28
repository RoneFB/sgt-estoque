<template>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">Controle de Estoque</a>
        <ul class="nav justify-content-center">
            <router-link to="/register" class="nav-item nav-link">Cadastro de Usuários</router-link>
            <router-link to="/usuarios" class="nav-item nav-link">Usuarios</router-link>
            <router-link to="/" class="nav-item nav-link">Estoque</router-link>
            <router-link to="/login" class="nav-item nav-link" v-if="!this.usuario">Login</router-link>
            <button v-else @click="logout" class="btn btn-default">Deslogar</button>
        </ul>
    </nav>
</template>

<script>
import { mapState } from 'vuex';
import { mapMutations } from 'vuex';
export default {
    name: 'MenuInicial',
     methods: {
        ...mapMutations([
            'logout'
        ]),
     },
    computed: {
        ...mapState(['usuario'])
    }
}
</script>

<style>

</style>