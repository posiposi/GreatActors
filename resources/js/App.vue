<template>
	<sidebar class="sidebar"></sidebar>
	<v-container class="counter">
		<router-view></router-view>
	</v-container>
</template>

<script>
import Sidebar from './components/SideBar.vue'
import '@mdi/font/css/materialdesignicons.css'

export default {
	components: {
		Sidebar,
	},
	icons: {
		iconfont: 'mdi',
	}
}
</script>

<style scoped>
.sidebar {
	float: left;
}
</style>