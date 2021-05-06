<template>
  <div>
    <h1 class="my-6">Наши книги</h1>

    <v-text-field label="Найти книгу" v-model="search"></v-text-field>
    <v-data-table :headers="headers" :items="books" :items-per-page="5" :search="search" class="elevation-1">
      <template v-slot:item.availability="{item}">
        <v-chip
          :color="item.availability ? 'green' : 'orange'"
          dark
        >{{ item.availability ? 'В наличии' : 'Выдано' }}</v-chip>
      </template>

      <template v-slot:item.actions="{item}">
        <v-btn outlined color="primary" @click="changeStatus(item)">{{ item.status ? 'Выдать' : 'Вернуть' }}</v-btn>
        <v-btn outlined color="red" @click="delBook(item.id)">Удалить</v-btn>
      </template>
    </v-data-table>

    <v-card class="mt-6 pa-3 elevation-1">
      <v-card-text>
        <h3 class="mb-6">Добавить книгу</h3>
        <v-text-field label="Название книги" v-model="newBook.title"></v-text-field>
        <v-text-field label="Автор" v-model="newBook.author"></v-text-field>
        <v-btn outlined color="primary" @click="addBook">Добавить</v-btn>
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
import Logo from "~/components/Logo.vue";
import VuetifyLogo from "~/components/VuetifyLogo.vue";

export default {
  data() {
    return {
      headers: [
        { text: "#", value: "id" },
        { text: "Название", value: "title" },
        { text: "Автор", value: "author" },
        { text: "Наличие", value: "availability" },
        { text: "Действия", value: "actions" }
      ],
      books: [],
      newBook: {
        title: '',
        author: ''
      },
      search: ''
    };
  },
  methods: {
    getBooks() {
      this.$axios.get("http://127.0.0.1:8000/api/book/all").then(result => {
        this.books = result.data;
      });
    },
    addBook(){
      this.$axios.post('http://127.0.0.1:8000/api/book/add', this.newBook).then(this.getBooks);
    },
    changeStatus(book){
      book.status = !book.status;
      this.$axios.get('http://127.0.0.1:8000/api/book/change_availabilty/' + book.id, book).then(this.getBooks);
    },
    delBook(id){
      this.$axios.get('http://127.0.0.1:8000/api/book/delete/' + id).then(this.getBooks);
    }
  },
  mounted() {
    this.getBooks();
  }
};
</script>
