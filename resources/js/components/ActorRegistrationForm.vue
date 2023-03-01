<template>
  <v-form ref="valid">
    <v-container>
      <v-row>
        <v-col cols="12" md="4">
          <v-text-field v-model="actor_name" :rules="[requiredActorName]" label="俳優名"></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-btn class="register-btn" outlined>
          登録
        </v-btn>
      </v-row>
    </v-container>
  </v-form>
</template>

<script setup>
import { ref } from 'vue';

/** 俳優名フォーム */
const actor_name = ref();

// // 送信成否ステータス
// const submitStatus = ref(false);

// // 登録確認ダイアログ初期値は非表示
// const isDialog = ref(false);

// 登録完了ダイアログ初期値は非表示
// const completedDialogStatus = ref(false);
// const completedDialog = ref(false);

/**
 * 俳優名入力必須バリデーション
 * @param {string} input_actor_name 映画名フォームの入力値
 */
const requiredActorName = (input_actor_name) => {
  if (input_actor_name) {
    return true;
  }
  return '俳優名を入力してください。';
}

/**
 * 送信時に全バリデーションが通過しているかを確認
 */
const submit = async () => {
  // 各フォームのバリデーション通過確認
  const validResult = await valid.value.validate();
  // 通過時は登録確認ダイアログを表示する
  if (validResult.valid) {
    submitStatus.value = true;
    confirmRegisterDialog();
  } else {
    submitStatus.value = false;
  }
}

/**
 * 登録確認ダイアログを表示する
 */
const confirmRegisterDialog = () => {
  // 登録確認ダイアログを表示
  isDialog.value = true;
}

// /**
//  * 映画登録API呼び出し
//  */
// const registerMovie = () => {
//   axios.post('/api/movie/store', {
//     movie_name: movie_name.value,
//     release_year: release_year.value,
//     air_time: air_time.value,
//   }).then(isDialog.value = false, completedDialog.value = true)
// }
</script>