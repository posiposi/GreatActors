<template>
	<v-table>
		<thead class="bg-grey-lighten-3">
			<tr>
				<th class="text-left">
					俳優名
				</th>
				<th class="text-left"></th>
				<th class="text-left"></th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="actor in actors" :key="actor.id">
				<td>{{ actor.actor_name }}</td>
				<td><v-btn color="light-blue">詳細</v-btn></td>
				<td>
					<v-btn icon size="small" color="red-darken-4">
						<v-icon>mdi-Delete</v-icon>
					</v-btn>
				</td>
			</tr>
		</tbody>
	</v-table>

	<v-dialog v-model="isDialog" persistent max-width="290">
		<v-card>
			<v-card-title class="headline">削除確認</v-card-title>
			<v-card-text>{{ actorName }}を削除してもよろしいですか？</v-card-text>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="green darken-1" text @click="isDialog = false">キャンセル</v-btn>
				<v-btn color="green darken-1" text>削除</v-btn>
			</v-card-actions>
		</v-card>
	</v-dialog>
</template>

<script setup>
import { onMounted, ref } from "vue";

// 俳優レコード用定数を初期化
const actors = ref([]);
// ダイアログ初期値は非表示
const isDialog = ref(false);
// // 映画ID
// const movieId = ref();
// // 映画名
// const movieName = ref();

// 俳優テーブルの全レコードをAPI経由で取得する
const getAllActorsList = () => {
	axios.get('/api/actors')
		.then(response => actors.value = response.data.actors)
}

// // 映画削除確認ダイアログを表示する
// const confirmDeleteDialog = (movie_id, movie_name) => {
// 	// ダイアログを表示
// 	isDialog.value = true;
// 	movieId.value = movie_id;
// 	movieName.value = movie_name;
// }

// 該当の映画レコードを削除する
// const deleteActor = (movie_id) => {
// 	axios.delete('/api/' + movie_id + '/delete')
// 		.then(() => {
// 			getAllMoviesList();
// 			isDialog.value = false;
// 		});
// }

onMounted(() => {
	getAllActorsList();
})
</script>
