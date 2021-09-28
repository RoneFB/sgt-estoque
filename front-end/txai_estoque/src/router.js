import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)


import LoginComponent from './components/Login'
import RegisterComponent from './components/Register'
import EstoqueComponent from './components/Estoque'
import UsuariosComponent from './components/Usuarios'
export default new Router({

    base: process.env.BASE_URL,
    routes : [
        { path: '/',name: 'estoque', component: EstoqueComponent },
        { path: '/login',name: 'login', component: LoginComponent },
        { path: '/usuarios',name: 'usuarios', component: UsuariosComponent },
        { path: '/register',name: 'register', component: RegisterComponent }
      ]
  })