<template>
  <v-card>
    <v-tabs v-model="tab" bg-color="grey-lighten-3" slider-color="orange">
      <v-tab value="movie-tab">映画登録</v-tab>
      <v-tab value="actor-tab">俳優登録</v-tab>
    </v-tabs>

    <v-card-text>
      <v-window v-model="tab">
        <v-window-item value="movie-tab">
          <v-form v-model="valid">
            <v-container>
              <v-row>
                <v-col cols="12" md="4">
                  <v-text-field v-model="actor_name" :rules="nameRules" :counter="10" label="映画名" required></v-text-field>
                </v-col>

                <v-col cols="12" md="4">
                  <v-text-field v-model="release_year" :rules="nameRules" :counter="10" label="公開年" suffix="年"
                    required></v-text-field>
                </v-col>

                <v-col cols="12" md="4">
                  <v-text-field v-model="air_time" :rules="emailRules" label="上映時間" suffix="分" required></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-btn class="register-btn" outlined>
                  登録
                </v-btn>
              </v-row>
            </v-container>
          </v-form>
        </v-window-item>

        <v-window-item value="actor-tab">
          Two
        </v-window-item>
      </v-window>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  data: () => ({
    tab: null,
    valid: false,
    actor_name: '',
    release_year: '',
    nameRules: [
      value => {
        if (value) return true

        return 'Name is requred.'
      },
      value => {
        if (value?.length <= 10) return true

        return 'Name must be less than 10 characters.'
      },
    ],
    air_time: '',
    emailRules: [
      value => {
        if (value) return true

        return 'E-mail is requred.'
      },
      value => {
        if (/.+@.+\..+/.test(value)) return true

        return 'E-mail must be valid.'
      },
    ],
  }),
}
</script>

<style>
.register-btn {
  font-weight: bold;
  border: solid black;
}
</style>