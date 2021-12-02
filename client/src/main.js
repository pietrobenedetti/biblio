import Vue from 'vue'
import App from './App.vue'

import './assets/style.css';

import VueRouter from 'vue-router';

import BooksList from './components/BooksList.vue';
import CreateBook from './components/CreateBook.vue';
import EditBook from './components/EditBook.vue';
import BookView from './components/BookView.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: "",
    redirect: "/list"
  },
  {
    path: "/list",
    name: "books_list",
    component: BooksList
  },
  {
    path: "/view/:id",
    name: "book_view",
    component: BookView
  },
  {
    path: "/create",
    name: "create_book",
    component: CreateBook
  },
  {
    path: "/edit",
    name: "edit_book",
    component: EditBook
  }

];

const router = new VueRouter ({
  mode: "history",
  routes
});

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router,
}).$mount('#app')
