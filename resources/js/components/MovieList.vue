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
			<tr v-for="movie in movies" :key="movie.name">
				<td>{{ movie.name }}</td>
				<td>{{ movie.releaseYear }}年</td>
				<td>{{ movie.airTime }}分</td>
				<td><v-btn color="light-blue">詳細</v-btn></td>
				<td><v-btn color="red">削除</v-btn></td>
			</tr>
		</tbody>
	</v-table>
</template>

<script setup>
import { ref } from "vue";

const movies = [
	{
		name: 'アポロ13',
		releaseYear: 1995,
		airTime: 120
	},
	{
		name: '孤高のメス',
		releaseYear: 2010,
		airTime: 110
	},
	{
		name: 'スラムダンク',
		releaseYear: 2022,
		airTime: 130
	},
]
</script>
