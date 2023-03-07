<template>
  <v-card>
    <v-tabs v-model="tab" bg-color="grey-lighten-3" slider-color="orange">
      <v-tab value="movie-tab">映画登録</v-tab>
      <v-tab value="actor-tab">俳優登録</v-tab>
    </v-tabs>

    <v-card-text>
      <v-window v-model="tab">
        <!-- 映画登録フォームコンポーネント -->
        <v-window-item value="movie-tab">
          <MovieRegistrationForm></MovieRegistrationForm>
        </v-window-item>

        <!-- 俳優登録フォームコンポーネント -->
        <v-window-item value="actor-tab">
          <ActorRegistrationForm></ActorRegistrationForm>
        </v-window-item>
      </v-window>
    </v-card-text>
  </v-card>
</template>

<script setup>
import { ref } from 'vue';
import MovieRegistrationForm from './MovieRegistrationForm.vue';
import ActorRegistrationForm from './ActorRegistrationForm.vue';

const tab = ref(null);
</script>

<style>
.register-btn {
  font-weight: bold;
  border: solid black;
}
</style>