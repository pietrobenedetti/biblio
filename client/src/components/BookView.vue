<template>
    <div class="bg-indigo-300 h-screen">
        <div class="flex flex-col">
          <div class="flex justify-around items-center my-3">
            <div class="flex flex-col p-3">
              <router-link to="/" class="font-bold">Indietro</router-link>
            </div>
            <div class="flex flex-col">
              <button class="font-bold" @click="clickModify()">Modifica</button>
            </div>
          </div>
          <div class="flex justify-around">
            <div class="flex flex-col justify-around">
              <div class="flex flex-col">
                <label for="title" class="font-bold">Titolo:</label>
                <span v-if="!isModified">
                  {{book.title}}
                </span>
                <input v-else type="text" v-model="book.title" :class="{'bg-indigo-300': !isModified, 'text-left pl-2 rounded-full bg-gray-100': isModified}">
              </div>
              <div class="flex flex-col">
                <label for="title" class="font-bold">Autore:</label>
                <span v-if="!isModified">
                  {{book.author}}
                </span>
                <input v-else type="text" v-model="book.author" :class="{'bg-indigo-300': !isModified, 'text-left pl-2 rounded-full bg-gray-100': isModified}">
              </div>
              <div class="flex flex-col">
                <div>
                  <label for="stars" class="font-bold">Valutazione:</label>
                </div>
                <div class="flex">
                  <span v-if="!isModified">
                  {{ book.stars }}
                  </span>
                  <input v-else type="text" v-model="book.stars" :class="{'bg-indigo-300': !isModified, 'text-left pl-2 rounded-full bg-gray-100': isModified}">
                  <span>/ 5 ★</span>
                </div>
              </div>
              <div class="flex flex-col">
                <label for="title" class="font-bold">Codice ISBN:</label>
                <span v-if="!isModified">
                  {{book.ISBN}}
                </span>
                <input v-else type="text" v-model="book.ISBN" :class="{'bg-indigo-300': !isModified, 'text-left pl-2 rounded-full bg-gray-100': isModified}">
              </div>
              <div class="flex flex-col">
                <label for="title" class="font-bold">Genere:</label>
                <span v-if="!isModified">
                  {{book.genre}}
                </span>
                <input v-else type="text" v-model="book.genre" :class="{'bg-indigo-300': !isModified, 'text-left pl-2 rounded-full bg-gray-100': isModified}">
              </div>
            </div>
            <div>
              <img :src="book.img" alt="">
            </div>
          </div>
          <div v-if="!isModified"></div>
          <div v-else class="flex mx-auto mt-2">
            <button @click="bookModified()" class="mr-2">Salva modifiche</button>
            <button @click="isModified = false" class="ml-2">Annulla</button>
          </div>
        </div>
        <div class="flex flex-row justify-between my-3">
          <button class="ml-auto font-bold mr-2"  @click="showModalDelete=true">
              Cancella
          </button>
        </div>
        <div class="flex justify-end">
          <div v-if="!showModalDelete"></div>
          <div v-else>
            <div>
              <span>{{ book.title }} verrà cancellato definitivamente.</span>
            </div>
            <div>
              <button @click="confirmDelete()" class="bg-white p-2 rounded-xl">Conferma</button>
              <button @click="showModalDelete = false" class="bg-white p-2 rounded-xl ml-10">Annulla</button>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            book: [],
            isModified: false,
            showModalDelete: false,
            isLoading: true
        }
    },
    async mounted() {
    let bookId = this.$route.params.id;

    console.log(bookId);
    let response_book = await axios.get("http://localhost:8000/api/view/" + bookId);
    
    this.book = response_book.data;
  },
  methods: {
    clickModify() {
      this.isModified = true;
    },
    bookModified() {
      let bookId = this.$route.params.id;

      let response = axios.put("http://127.0.0.1:8000/api/edit/" + bookId, this.book);
      console.log(response.data);

      this.isModified = false;
      },
    async confirmDelete() {
      let bookId = this.$route.params.id;
      console.log(bookId);

      await axios.delete("http://127.0.0.1:8000/api/delete/" + bookId),

      this.showModalDelete = false;
      this.$router.push({
        name: "books_list"
      })
    },
  }
}
</script>