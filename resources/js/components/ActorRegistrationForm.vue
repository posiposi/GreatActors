<template>
  <v-form ref="valid">
    <v-container>
      <v-row>
        <v-col cols="12" md="4">
          <v-text-field v-model="actor_name" :rules="[requiredActorName]" label="俳優名"></v-text-field>
        </v-col>
      </v-row>
      <v-row>
        <v-btn class="register-btn" outlined @click="submitActor">
          登録
        </v-btn>
      </v-row>
    </v-container>
  </v-form>

  <!-- 登録確認ダイアログ -->
  <v-dialog v-model="isConfirmRegisterDialog" persistent max-width="290">
    <v-card>
      <v-card-title class="headline">登録確認</v-card-title>
      <v-card-text>登録してもよろしいですか？</v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="green darken-1" text @click="isConfirmRegisterDialog = false">キャンセル</v-btn>
        <v-btn color="green darken-1" text @click="registerActor">OK</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>

  <!-- 登録完了ダイアログ -->
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
/** 俳優名フォーム */
const actor_name = ref();
/** 登録確認ダイアログ表示用定数(初期値は非表示) */
const isConfirmRegisterDialog = ref(false);
/** 登録完了ダイアログ(初期値は非表示) */
const isCompletedDialog = ref(false);

/**
 * 俳優名入力必須バリデーション
 * @param {string} value 俳優名フォームの入力値
 */
const requiredActorName = (value) => {
  if (value) {
    return true;
  }
  return '俳優名を入力してください。';
}

/**
 * 送信時に全バリデーションが通過しているかを確認
 */
const submitActor = async () => {
  // フォームのバリデーション通過確認
  const validResult = await valid.value.validate();
  // 通過時は登録確認ダイアログを表示する
  if (validResult.valid) {
    showConfirmDialog();
  }
}

/**
 * 俳優登録API呼び出し
 */
const registerActor = () => {
  axios.post('/api/actor/store', {
    actor_name: actor_name.value,
  }).then(isConfirmRegisterDialog.value = false, isCompletedDialog.value = true)
}

/**
 * 登録確認ダイアログを表示する
 */
const showConfirmDialog = () => {
  // 登録確認ダイアログを表示
  isConfirmRegisterDialog.value = true;
}
</script>