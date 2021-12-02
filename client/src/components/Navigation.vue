<template>
    <div>
        <div class="flex w-full justify-around items-center bg-gray-700 p-3">
            <div>
                <h1 class="text-5xl font-light text-white">BIBLIO</h1>
            </div>
            <div class="flex flex-col font-light text-white">
                <button @click="goToHome()" class="bg-purple-800 px-3 py-2 rounded-md transform hover:scale-105 transition duration-500">Home</button>
            </div>
            <div class="flex flex-col font-light text-white">
                <button @click="goToCreate()" class="bg-purple-800 px-3 py-2 rounded-md transform hover:scale-105 transition duration-500">Nuovo Libro</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pathForHome: "/",
            pathForNewBook: "/create",
        }
    },
    methods: {
        goToHome() {
            this.$router.push({
                name: "books_list"
            })
        },
        goToCreate() {
            this.$router.push({
                name: "create_book"
            })
        },
    }
}
</script>