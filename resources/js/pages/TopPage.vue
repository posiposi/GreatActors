<template>
	<p>Top Page</p>
	<h1>{{ count }}</h1>
	<v-btn color="blue" @click="incrementCount()">Increment</v-btn>
</template>

<script setup>
import { ref } from "vue";
const count = ref(0);
const incrementCount = () => {
	count.value++
};
</script>
