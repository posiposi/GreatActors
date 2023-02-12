<template>
	<sidebar class="sidebar"></sidebar>
	<v-container class="counter">
		<router-view></router-view>
	</v-container>
</template>

<script>
import Sidebar from './components/layouts/sidebar.vue'

export default {
	components: {
		Sidebar,
	},
}
</script>

<style scoped>
	.sidebar {
		float: left;
	}
</style>