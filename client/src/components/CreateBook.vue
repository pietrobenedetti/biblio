<template>
    <div class="w-full h-screen bg-indigo-900 justify-item-center">
        <div class="flex flex-col items-center justify-center text-center">
            <div class="flex p-5">
                <p class="font-bold text-xl border-b border-gray-800">Aggiungi un nuovo libro</p>
            </div>
            <div>
                <div v-for="(field, index) in formFields" :key="index">
                    <label for="">
                        {{ field.label }}
                    </label>
                    <div class="flex flex-grow">
                        <div v-if="field.type == 'text'">
                            <input type="text" :placeholder="field.placeholder" v-model="newBook[field.code]" class="rounded-md p-2"/>
                        </div>
                        <div v-if="field.type == 'number'">
                            <input type="textfield" :placeholder="field.placeholder" v-model="newBook[field.code]" class="rounded-md p-2"/>
                        </div>
                        <div v-if="field.type == 'select'">
                            <select :name="field.code" class="p-2 rounded-md border-gray-300 w-60" type="select" v-model="newBook[field.code]" :id="field.code">
                                <option v-for="option in field.options" :key="option.value" :value="option.value">{{ option.label }}</option>
                            </select>
                        </div>
                    </div>
                    <div v-if="field.required" class="mb-2">
                        <span v-if="!newBook[field.code]">
                            Questo campo è obbligatorio!
                        </span>
                    </div>
                </div>
                <div>
                    <button class="bg-green-700 p-4 rounded-xl mt-5" :disabled="!isFormValid" :class="{'': isFormValid, '': !isFormValid}" @click="createBook()">
                        Aggiungi Nuovo Libro
                    </button>
                    <div v-if="created" class="mt-3">
                        <h1 class="text-green-400 text-xl font-light text-center">Nuovo film aggiunto con successo!</h1>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return{
            newBook:
            {
                title: '',
                author: '',
                img: '',
                stars: '',
                genre: '',
                ISBN: ''
            },
            formFields: [
                {
                    code: "author",
                    label: "Autore",
                    type: "text",
                    placeholder: "Inserisci l'autore del libro",
                    required: true
                },
                {
                    code: "title",
                    label: "Titolo",
                    type: "text",
                    placeholder: "Inserisci il titolo del libro",
                    required: true
                },
                {
                    code: "ISBN",
                    label: "ISBN",
                    type: "text",
                    placeholder: "Inserisci ISBN del libro",
                    required: true
                },
                {
                    code: "img",
                    label: "Immagine",
                    type: "text",
                    placeholder: "Inserisci il link dell'immagine di copertina",
                    required: true
                },
                {
                    code: "stars",
                    label: "Valutazione",
                    type: "number",
                    placeholder: "Inserisci la valutazione del libro",
                    required: true
                },
                {
                    code: "genre",
                    label: "Genere",
                    type: "select",
                    required: true,
                    options: [
                        {
                        value: "Horror",
                        label: "Horror"
                        },
                        {
                        value: "Gialli",
                        label: "Gialli"
                        },
                        {
                        value: "Rosa",
                        label: "Rosa"
                        },
                        {
                        value: "Romanzi italiani",
                        label: "Romanzi italiani"
                        },
                        {
                        value: "Romanzi stranieri",
                        label: "Romanzi stranieri"
                        }
                    ]
                },
            ],
            created: false
        }
    },
    async mounted() {
        try {
            let responseBook = await axios.get('http://localhost:8000/api/list');
            this.rooms = responseBook.data;
        } catch (err) {
            console.log(err);
        }
    },
    methods:{
        async createBook(){
            let request = await axios.post('http://localhost:8000/api/create', this.newBook);
            console.log(request.data)
            this.created = true;
        }
    },
    computed: {
        isFormValid() {
            let formIsValid = true;

            formIsValid = formIsValid && !!this.newBook.author;
            formIsValid = formIsValid && !!this.newBook.title;
            formIsValid = formIsValid && !!this.newBook.stars;
            formIsValid = formIsValid && !!this.newBook.img;
            formIsValid = formIsValid && !!this.newBook.genre;
            formIsValid = formIsValid && !!this.newBook.ISBN;

            return formIsValid
        }
    }
}
</script>