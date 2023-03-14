<template>
	<v-data-table v-model:items-per-page="itemsPerPage" :headers="headers" :items="movies" item-value="id"
		class="movie-data-table" @click:row="clickTest">
		<template v-slot:item.actions="{ item }">
			<v-icon size="small" class="me-2" @click="editItem(item.raw)">
				mdi-pencil
			</v-icon>
			<v-icon size="small" @click="deleteItem(item.raw)">
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

	<!-- <v-table>
		<thead class="bg-grey-lighten-3">
			<tr>
				<th class="text-left">
					映画名
				</th>
				<th class="text-left">
					公開年
				</th>
				<th class="text-left">
					上映時間
				</th>
				<th class="text-left"></th>
				<th class="text-left"></th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="movie in movies" :key="movie.id">
				<td>{{ movie.movie_name }}</td>
				<td>{{ movie.release_year }}年</td>
				<td>{{ movie.air_time }}分</td>
				<td><v-btn color="light-blue">詳細</v-btn></td>
				<td>
					<v-btn icon size="small" color="red-darken-4" @click="confirmDeleteDialog(movie.id, movie.movie_name)">
						<v-icon>mdi-Delete</v-icon>
					</v-btn>
				</td>
			</tr>
		</tbody>
	</v-table> -->

	<!-- <v-dialog v-model="isDialog" persistent max-width="290">
		<v-card>
			<v-card-title class="headline">削除確認</v-card-title>
			<v-card-text>{{ movieName }}を削除してもよろしいですか？</v-card-text>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn color="green darken-1" text @click="isDialog = false">キャンセル</v-btn>
				<v-btn color="green darken-1" text @click="deleteMovie(movieId)">削除</v-btn>
			</v-card-actions>
		</v-card>
	</v-dialog> -->
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

// ページネーション表示数定数
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
const confirmDeleteDialog = (movie_id, movie_name) => {
	// ダイアログを表示
	isDialog.value = true;
	movieId.value = movie_id;
	movieName.value = movie_name;
}

// 該当の映画レコードを削除する
const deleteMovie = (movie_id) => {
	axios.delete('/api/' + movie_id + '/delete')
		.then(() => {
			getAllMoviesList();
			isDialog.value = false;
		});
}

// 行クリックテスト
const clickTest = (e, movies) => {
	// ダイアログを表示
	isDialog.value = true;
	console.log(movies.item.raw);
	movieName.value = movies.item.raw.movie_name;
	movieId.value = movies.item.raw.movie_id;
}

onMounted(() => {
	getAllMoviesList();
})
</script>
