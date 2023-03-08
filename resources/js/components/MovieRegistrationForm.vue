<template>
  <v-form ref="valid">
    <v-container>
      <v-row>
        <v-col cols="12" md="4">
          <v-text-field v-model="movie_name" :rules="[requiredMoveiName]" label="映画名"></v-text-field>
        </v-col>

        <v-col cols="12" md="4">
          <v-text-field v-model="release_year" :rules="[limitReleaseYearLength]" :counter="4" label="公開年"
            suffix="年"></v-text-field>
        </v-col>

        <v-col cols="12" md="4">
          <v-text-field v-model="air_time" :rules="[limitAitTimeLength]" :counter="3" label="上映時間"
            suffix="分"></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-btn class="register-btn" outlined @click="submit">
          登録
        </v-btn>
      </v-row>
    </v-container>
  </v-form>

  <v-dialog v-model="isConfirmRegisterDialog" persistent max-width="290">
    <v-card>
      <v-card-title class="headline">登録確認</v-card-title>
      <v-card-text>登録してもよろしいですか？</v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="green darken-1" text @click="isConfirmRegisterDialog = false">キャンセル</v-btn>
        <v-btn color="green darken-1" text @click="registerMovie">OK</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>

  <v-dialog v-model="isCompletedDialog" width="auto">
    <v-card>
      <v-card-text>
        映画登録が完了しました!
      </v-card-text>
      <v-card-actions>
        <v-btn color="primary" block @click="isCompletedDialog = false">閉じる</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

/** 入力フォームバリデーション用定数 */
const valid = ref(false);
/** 映画名フォーム入力値 */
const movie_name = ref();
/** 公開年フォーム入力値 */
const release_year = ref();
/** 上映時間フォーム入力値 */
const air_time = ref();
/** 登録確認ダイアログ表示用定数(初期値は非表示) */
const isConfirmRegisterDialog = ref(false);
/** 登録完了ダイアログ(初期値は非表示) */
const isCompletedDialog = ref(false);

/**
 * 映画名入力必須バリデーション
 * @param {string} value 映画名フォーム入力値
 */
const requiredMoveiName = (value) => {
  if (value) {
    return true;
  }
  return '映画名を入力してください。';
}

/**
 * 公開年半角4桁入力バリデーション
 * @param {int} value 公開年フォームの入力値
 */
const limitReleaseYearLength = (value) => {
  if (value.length == 4 && value.match(/^[0-9]+$/)) {
    return true;
  }
  return '公開年は半角数字4桁で入力してください。';
}

/**
 * 上映時間3桁入力バリデーション
 * @param {int} value 上映時間フォームの入力値
 */
const limitAitTimeLength = (value) => {
  if (value.length == 3 && value.match(/^[0-9]+$/)) {
    return true;
  }
  return '上映時間は半角数字3桁で入力してください。';
}

/**
 * 送信時に全バリデーションが通過しているかを確認
 */
const submit = async () => {
  // 各フォームのバリデーション通過確認
  const validResult = await valid.value.validate();
  // 通過時は登録確認ダイアログを表示する
  if (validResult.valid) {
    confirmRegisterDialog();
  }
}

/**
 * 登録確認ダイアログを表示する
 */
const confirmRegisterDialog = () => {
  // 登録確認ダイアログを表示
  isConfirmRegisterDialog.value = true;
}

/**
 * 映画登録API呼び出し
 */
const registerMovie = () => {
  axios.post('/api/movie/store', {
    movie_name: movie_name.value,
    release_year: release_year.value,
    air_time: air_time.value,
  }).then(isConfirmRegisterDialog.value = false, isCompletedDialog.value = true)
}
</script>