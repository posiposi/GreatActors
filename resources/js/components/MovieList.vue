<template>
	<v-row class="mt-1">
		<v-col cols="8">
			<h1 class="font-italic">映画一覧</h1>
		</v-col>
		<v-col cols="4">
			<v-text-field v-model="search" append-icon="mdi-magnify" label="検索" single-line></v-text-field>
		</v-col>
	</v-row>

	<v-data-table :items-per-page="itemsPerPage" :headers="headers" :items="movies" :sort-by="sortBy" :search="search"
		:custom-filter="customFilter">
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

	<v-dialog v-model="isDeleteDialog" max-width="500">
		<v-card>
			<v-card-title class="headline">{{ movieName }}を削除しました</v-card-title>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="green darken-1" text @click="isDeleteDialog = false">OK</v-btn>
			</v-card-actions>
		</v-card>
	</v-dialog>
</template>

<script setup>
import { onMounted, ref } from "vue";

// 映画レコード用定数を初期化
const movies = ref([]);
// 削除確認ダイアログ
const isDialog = ref(false);
// 削除完了ダイアログ
const isDeleteDialog = ref(false);
// 映画ID
const movieId = ref();
// 映画名
const movieName = ref();
// ページネーション表示数
const itemsPerPage = ref(10);
// ページ初期表示時のソート(映画名昇順)
const sortBy = [{ key: 'movie_name', order: 'asc' }];
// 検索フォーム入力値
const search = ref('');

// ヘッダー部タイトル表示
const headers = ref([
	{ title: '映画名', align: 'start', key: 'movie_name', width: '35%' },
	{ title: '公開年', align: 'start', key: 'release_year', width: '10%' },
	{ title: '上映時間', align: 'start', key: 'air_time', width: '10%' },
	{ title: '配給会社', align: 'start', key: 'distributor.distributor_name', width: '10%' },
	{ title: 'ジャンル', align: 'start', key: 'genre.genre_theme', width: '15%' },
	{ title: '', key: 'actions', sortable: false, width: '20%' },
]);

/**
 * 映画テーブルの全レコードをAPI経由で取得する
 */
const getAllMoviesList = () => {
	axios.get('/api/movies')
		.then(response => movies.value = response.data.movies)
}

/**
 * 映画削除確認ダイアログを表示する
 * @param {any} targetRaw 削除対象映画の行
 */
const confirmDeleteDialog = (targetRaw) => {
	// ダイアログを表示
	isDialog.value = true;
	movieId.value = targetRaw.id;
	movieName.value = targetRaw.movie_name;
}

/**
 * 該当の映画レコードを削除する
 * @param {int} movie_id 削除対象映画ID
 */
const deleteMovie = (movie_id) => {
	axios.delete('/api/' + movie_id + '/delete')
		.then(() => {
			getAllMoviesList();
			isDialog.value = false;
			isDeleteDialog.value = true;
		});
}

/**
 * リレーション項目検索用のカスタムフィルター
 * @param {any} value 検索対象列
 * @param {string} search 検索単語
 */
const customFilter = (value, search) => {
	return value != null &&
		search != null &&
		typeof value !== 'boolean' &&
		// 該当列オブジェクトの値を配列にした後に、検索のために文字列結合を行い、真偽値確認
		// 配給会社列
		(typeof value === 'object' ? Object.values(value.raw.distributor.distributor_name).join('') : value.toString()).includes(search) === true ||
		// ジャンル列
		(typeof value === 'object' ? Object.values(value.raw.genre.genre_theme).join('') : value.toString()).includes(search) === true;
}

onMounted(() => {
	getAllMoviesList();
})
</script>
