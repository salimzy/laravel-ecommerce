<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-green-600 dark:text-green-400">
            {{ message }}
        </p>
    </div>
</template>
