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
        <v-col cols="12" md="4">
          <v-select v-model="distributor" :items="distributors_list" item-title="distributor_name"
            item-value="distributor_id" label="配給会社" :rules="[requiredDistributor]" return-object single-line
            clearable></v-select>
        </v-col>

        <v-col cols="12" md="4">
          <v-select v-model="genre" :items="genres_list" item-title="genre_theme" item-value="genre_id" label="ジャンル"
            :rules="[requiredGenre]" return-object single-line clearable></v-select>
        </v-col>
      </v-row>
      <v-row>
        <v-btn class="register-btn" outlined @click="submit">
          登録
        </v-btn>
      </v-row>
    </v-container>
  </v-form>

  <v-dialog v-model="isConfirmRegisterDialog" max-width="290">
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
/** 配給会社ドロップダウンリスト */
const distributor = ref();
/** 配給会社ドロップダウンリスト内容 */
const distributors_list = ref([
  { distributor_name: '日活', distributor_id: 0 },
  { distributor_name: '東宝', distributor_id: 1 },
]);
/** ジャンルドロップダウンリスト */
const genre = ref();
/** ジャンルドロップダウンリスト内容 */
const genres_list = ref([
  { genre_theme: 'アクション', genre_id: 0 },
  { genre_theme: 'ラブストーリー', genre_id: 1 },
  { genre_theme: '青春', genre_id: 2 },
  { genre_theme: '時代劇', genre_id: 3 },
]);

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
  if (value.length <= 3 && value.match(/^[0-9]+$/)) {
    return true;
  }
  return '上映時間は半角数字3桁以内で入力してください。';
}

/**
 * 配給会社選択必須バリデーション
 * @param {string} value 配給会社
 */
const requiredDistributor = (value) => {
  if (value) {
    return true;
  }
  return '配給会社を選択してください。'
}

/**
 * ジャンル選択必須バリデーション
 * @param {string} value ジャンル
 */
const requiredGenre = (value) => {
  if (value) {
    return true;
  }
  return 'ジャンルを選択してください。'
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
    air_time: air_time.value + '分',
    distributor_id: distributor.value.distributor_id,
    genre_id: genre.value.genre_id,
  }).then(isConfirmRegisterDialog.value = false, isCompletedDialog.value = true)
}
</script>