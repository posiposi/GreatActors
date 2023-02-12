<template>
	<v-card>
		<v-layout>
			<v-navigation-drawer image="https://cdn.vuetifyjs.com/images/backgrounds/bg-2.jpg" permanent theme="dark">
				<v-list nav>
					<v-list-item prepend-icon="mdi-filmstrip" title="映画一覧" value="inbox" class="text-h4"></v-list-item>
					<v-list-item prepend-icon="mdi-account-details" title="俳優一覧" value="supervisors"
						class="text-h4"></v-list-item>
					<v-list-item prepend-icon="mdi-plus-box" title="登録" value="clockin" class="text-h4"></v-list-item>
				</v-list>
			</v-navigation-drawer>
			<v-main style="height: 250px"></v-main>
		</v-layout>
	</v-card>
</template>