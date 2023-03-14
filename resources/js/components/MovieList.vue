<template>
	<v-data-table v-model:items-per-page="itemsPerPage" :headers="headers" :items="movies" item-value="id">
		<template v-slot:item.actions="{ item }">
			<v-icon size="small" class="me-2" @click="editItem(item.raw)">
				mdi-pencil
			</v-icon>
			<v-icon size="small" @click="confirmDeleteDialog(item.raw)">
				mdi-delete
			</v-icon>
		</template>
	</v-data-table>


	<v-dialog v-model="isDialog" max-width="400">
		<v-card>
			<v-card-title class="headline">{{ movieName }}</v-card-title>
			<v-card-text>{{ movieName }}を削除してもよろしいですか？</v-card-text>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="green darken-1" text @click="isDialog = false">キャンセル</v-btn>
				<v-btn color="green darken-1" text @click="deleteMovie(movieId)">削除</v-btn>
			</v-card-actions>
		</v-card>
	</v-dialog>
</template>

<script setup>
import { onMounted, ref } from "vue";

// 映画レコード用定数を初期化
const movies = ref([]);
// ダイアログ初期値は非表示
const isDialog = ref(false);
// 映画ID
const movieId = ref();
// 映画名
const movieName = ref();
// ページネーション表示数
const itemsPerPage = ref(10);

// ヘッダー部タイトル表示
const headers = ref([
	{ title: '映画名', align: 'start', key: 'movie_name', width: '40%' },
	{ title: '公開年', align: 'start', key: 'release_year', width: '20%' },
	{ title: '上映時間', align: 'start', key: 'air_time', width: '20%' },
	{ title: '', key: 'actions', sortable: false, width: '20%' },
]);

// 映画テーブルの全レコードをAPI経由で取得する
const getAllMoviesList = () => {
	axios.get('/api/movies')
		.then(response => movies.value = response.data.movies)
}

// 映画削除確認ダイアログを表示する
const confirmDeleteDialog = (targetRaw) => {
	// ダイアログを表示
	isDialog.value = true;
	movieId.value = targetRaw.id;
	movieName.value = targetRaw.movie_name;
}

// 該当の映画レコードを削除する
const deleteMovie = (movie_id) => {
	axios.delete('/api/' + movie_id + '/delete')
		.then(() => {
			getAllMoviesList();
			isDialog.value = false;
		});
}

onMounted(() => {
	getAllMoviesList();
})
</script>
