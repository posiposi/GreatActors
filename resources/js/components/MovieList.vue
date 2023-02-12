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
			</tr>
		</thead>
		<tbody>
			<tr v-for="movie in movies" :key="movie.name">
				<td>{{ movie.name }}</td>
				<td>{{ movie.releaseYear }}</td>
				<td>{{ movie.airTime }}</td>
			</tr>
		</tbody>
	</v-table>

	<!-- <h1>{{ count }}</h1>
	<v-btn color="blue" @click="incrementCount()">Increment</v-btn> -->
</template>

<script setup>
import { ref } from "vue";
const count = ref(0);
const incrementCount = () => {
	count.value++
};

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
