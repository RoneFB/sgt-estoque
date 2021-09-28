<template>
  <div id="app">
    <Menu></Menu>
    <router-view></router-view>
  </div>
</template>

<script>

import Menu from './components/Menu.vue';
export default {
  name: 'App',
  components: {Menu},
  data(){
      return{
        base_url:'http://localhost:3001/'
      }
  }
}
</script>

<style>

</style>