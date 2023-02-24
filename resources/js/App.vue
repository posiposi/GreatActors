<template>
	<sidebar class="sidebar"></sidebar>
	<router-view></router-view>
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