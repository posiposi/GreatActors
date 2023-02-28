import MovieList from './components/MovieList.vue';
import RegistrationForm from './components/RegistrationForm.vue';
import ActorList from './components/ActorList.vue';
import { createRouter, createWebHistory } from 'vue-router';

const routes = [
	// 映画一覧ページ
	{
		path: '/',
		name: 'MovieList',
		component: MovieList,
	},
	// 登録フォームページ
	{
		path: '/registration',
		name: 'RegistrationForm',
		component: RegistrationForm,
	},
	// 俳優一覧ページ
	{
		path: '/actors',
		name: 'ActorList',
		component: ActorList,
	},
];
const router = createRouter({
	routes,
	history: createWebHistory(),
})
export default router;