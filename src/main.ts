import { createApp, h, DefineComponent } from 'vue'
import './style.css'
// import App from './App.vue'

// createApp(App).mount('#app')

import { createInertiaApp } from '@inertiajs/vue3'



createInertiaApp({
  resolve: (name: string): DefineComponent => {
    const pages = import.meta.glob<DefineComponent>('./pages/**/*.vue', { eager: true });
    return pages[`./pages/${name}.vue`];

  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
