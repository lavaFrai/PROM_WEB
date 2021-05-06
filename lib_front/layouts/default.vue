<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" fixed app>
      <v-list>
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title class="title">Библиотека</v-list-item-title>
            <v-list-item-subtitle>Версия 1.0.0</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
        <v-list-item v-for="(item, i) in items" :key="i" :to="item.to" router exact>
          <v-list-item-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title v-text="item.title" />
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar fixed app>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title v-text="title" />
    </v-app-bar>
    <v-content class="blue-grey lighten-5">
      <v-container>
        <nuxt />
      </v-container>
    </v-content>

    <v-footer fixed app>
      <span>&copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      items: [
        {
          icon: "mdi-home",
          title: "Главная",
          to: "/"
        },
        {
          icon: "mdi-database-edit",
          title: "Управление",
          to: "/admin"
        }
      ],

      right: true,
      rightDrawer: false,
      title: "Онлайн библиотека"
    };
  }
};
</script>
