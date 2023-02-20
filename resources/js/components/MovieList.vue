<template>
	<h1>映画一覧</h1>

	<v-table>
		<thead>
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
				<td><v-btn color="red" @click="deleteMovie(movie.id)">削除</v-btn></td>
			</tr>
		</tbody>
	</v-table>
</template>

<script setup>
import { onMounted, ref } from "vue";

// 映画レコード用定数を初期化
const movies = ref([]);

// 映画テーブルの全レコードをAPI経由で取得する
const getAllMoviesList = () => {
	axios.get('/api/movies')
		.then(response => movies.value = response.data.movies)
}

// 該当の映画レコードを削除する
const deleteMovie = (movie_id) => {
	axios.delete('/api/' + movie_id + '/delete')
		.then(() => {
			getAllMoviesList();
		});
}

onMounted(() => {
	getAllMoviesList();
})
</script>
