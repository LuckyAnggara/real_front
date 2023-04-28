import { createRouter, createWebHashHistory } from 'vue-router'

import HelloWorld from '../components/HelloWorld.vue'
import Dashboard from '../views/Dashboard.vue'
import DaftarAkun from '../views/account/DaftarAccount.vue'

const routes = [
  {
    path: '/',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      requiresAuth: false,
      title: 'Dashboard',
      layout: 'layout-content',
    },
  },
  {
    path: '/daftar-akun',
    name: 'daftar-akun',
    component: DaftarAkun,
    meta: {
      requiresAuth: false,
      title: 'Daftar Akun',
      layout: 'layout-content',
    },
  },
]

const router = createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: createWebHashHistory(),
  linkExactActiveClass: 'active',
  scrollBehavior(to, from, savedPosition) {
    // always scroll to top
    return { top: 0 }
  },
  routes, // short for `routes: routes`
})

router.beforeResolve(async (to, _, next) => {
  // const auth = useAuthStore()
  // if (to.meta.requiresAuth && !auth.isLoggedIn()) return next('/login')
  // if (to.name == 'login' && auth.isLoggedIn()) return next('/')
  return next()
})

export default router
