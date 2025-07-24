
<script setup>
defineProps({
  title: String,
  value: String,
  change: String,
  icon: String
})

const isPositive = computed(() => {
  return props.change.startsWith('+')
})
</script>

<template>
  <div class="bg-white dark:bg-dark-800 rounded-lg shadow p-6">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ title }}</p>
        <p class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">{{ value }}</p>
      </div>
      <div 
        class="p-3 rounded-lg"
        :class="isPositive ? 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400' : 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-400'"
      >
        <i :data-feather="icon" class="w-6 h-6"></i>
      </div>
    </div>
    <p 
      class="mt-2 text-sm"
      :class="isPositive ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'"
    >
      {{ change }} from last month
    </p>
  </div>
</template>