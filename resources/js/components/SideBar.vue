<template>
	<v-card>
		<v-layout>
			<v-navigation-drawer color="red-darken-4" permanent>
				<v-list nav class="font-italic">
					<v-list-item prepend-icon="mdi-filmstrip" class="text-h5">
						<router-link class="router_link text-white" to="/">映画一覧</router-link>
					</v-list-item>
					<v-list-item prepend-icon="mdi-account-details" class="text-h5">
						<router-link class="router_link text-white" to="#">俳優一覧</router-link>
					</v-list-item>
					<v-list-item prepend-icon="mdi-plus-box" class="text-h5">
						<router-link class="router_link text-white" to="/registration">登録</router-link>
					</v-list-item>
				</v-list>
			</v-navigation-drawer>
			<v-main style="height: 250px"></v-main>
		</v-layout>
	</v-card>
</template>

<style>
.router_link{
	text-decoration: none;
}

a:hover{
	text-decoration: underline;
}
</style>