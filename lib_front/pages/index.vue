<template>
  <div>
    <h1 class="my-6">Наши книги</h1>

    <v-text-field label="Найти книгу" v-model="search"></v-text-field>
    <v-data-table
      :headers="headers"
      :items="books"
      :items-per-page="5"
      :search="search"
      class="elevation-1"
    >
      <template v-slot:item.availability="{item}">
        <v-chip
          :color="item.availability ? 'green' : 'orange'"
          dark
        >{{ item.availability ? 'В наличии' : 'Выдано' }}</v-chip>
      </template>
    </v-data-table>
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
        { text: "Наличие", value: "availability" }
      ],
      books: [],
      search: ""
    };
  },
  methods: {
    getBooks() {
      this.$axios.get("http://127.0.0.1:8000/api/book/all").then(result => {
        this.books = result.data;
      });
    }
  },
  mounted() {
    this.getBooks();
  }
};
</script>
