import MovieList from './components/MovieList.vue';
import { createRouter, createWebHistory } from 'vue-router';

const routes = [
	{
		path: '/',
		name: 'MovieList',
		component: MovieList,
	},
];
const router = createRouter({
	routes,
	history: createWebHistory(),
})
export default router;