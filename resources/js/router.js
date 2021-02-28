import Router from 'vue-router'
import Home from './views/Home.vue'
import About from './views/About.vue'
import Shop from './views/Shop.vue'
import NotFound from './views/NotFound.vue'
import ShopDetail from './views/ShopDetail.vue'
import ShopEdit from './views/ShopEdit.vue'

export default new Router({
  mode: 'history',
  routes: [
    {
      path: 'user/*',
      component: NotFound
    },    
    {
      path: '/user/home',
      name: 'home',
      component: Home
    },
    {
      path: '/user/about',
      name: 'about',
      component: About
    },
    {
      path: '/user/shops',
      name: 'shops',
      component: Shop
    },
    {
      path: '/user/shops/:id',
      name: 'shop_detail',
      component: ShopDetail
    },
    {
      path: '/user/shops/:id/edit',
      name: 'shop_edit',
      component: ShopEdit
    },
  ]
});