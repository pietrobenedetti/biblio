<template>
    <div class="bg-indigo-300">
        <div class="grid grid-cols-4 gap-3 p-5">
            <div v-for="book in books" :key="book.id" class="flex flex-col bg-white p-3 rounded-xl cursor-pointer" @click="goToView(book)">
                <div class="w-52 h-80 rounded-md flex mx-auto">
                    <img :src="book.img" alt="book_img" class="object-cover md:object-scale-down sm:object-scale-down rounded-md w-auto h-full">
                </div>
                <div class="col-span-7 flex flex-col p-4 justify-around">
                    <div class="flex border-b border-gray-200">
                        <h2 class="text-l font-light"><span class="font-bold">Titolo: </span>{{ book.title }}</h2>
                    </div>
                    <div class="flex border-b border-gray-200">
                        <h2 class="text-l font-light"><span class="font-bold">Autore: </span>{{book.author}}</h2>
                    </div>
                    <div class="flex border-b border-gray-200">
                        <h2 class="text-l font-light"><span class="font-bold">Genere: </span>{{book.genre}}</h2>
                    </div>
                    <div class="flex border-b border-gray-200">
                        <h2 class="text-l font-light"><span class="font-bold">Valutazione: </span>{{book.stars}}<span> / 5 ★</span></h2>
                    </div>
                    <div class="flex border-b border-gray-200">
                        <h2 class="text-l font-light"><span class="font-bold">ISBN: </span>{{book.ISBN}}</h2>
                    </div>
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
            books: []
        }
    },
    async mounted() {
        try {
            let response = await axios.get("http://localhost:8000/api/list");
            this.books = response.data;
        } catch (err) {
            console.log(err);
        }
    },
    methods: {
        goToView(book) {
            this.$router.push("/view/"+ book.id)
        },
    }
}
</script>