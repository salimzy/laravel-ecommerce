
<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
  isOpen: {
    type: Boolean,
    default: true
  }
})

const navItems = [
  { name: 'Dashboard', icon: 'grid', path: 'dashboard' },
  { name: 'Products', icon: 'package', path: 'products', children: [
    { name: 'All Products', path: 'products' },
    { name: 'Add New', path: 'product.add' }
  ]},
  { name: 'Orders', icon: 'shopping-cart', path: 'orders' },
  { name: 'Customers', icon: 'users', path: 'customers' },
  { name: 'Analytics', icon: 'bar-chart-2', path: 'analytics' },
  { name: 'Settings', icon: 'settings', path: 'profile.edit' },
]
</script>

<template>
  <aside 
    class="w-64 bg-white dark:bg-dark-800 shadow-md fixed h-full transition-all duration-300 z-50"
    :class="isOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
  >
    <div class="p-4 border-b border-gray-200 dark:border-gray-700">
      <h1 class="text-xl font-semibold text-gray-800 dark:text-white">E-Commerce Admin</h1>
    </div>
    
    <nav class="p-4">
      <ul class="space-y-2">
        <li v-for="item in navItems" :key="item.name">
          <Link 
            :href="route(item.path)"
            class="flex items-center p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors"
            active-class="bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-400"
          >
            <span class="mr-3">
              <i :data-feather="item.icon" class="w-5 h-5"></i>
            </span>
            <span>{{ item.name }}</span>
          </Link>
          
          <ul v-if="item.children" class="ml-8 mt-1 space-y-1">
            <li v-for="child in item.children" :key="child.name">
              <Link 
                :href="route(child.path)"
                class="flex items-center p-2 text-sm text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors"
                active-class="bg-primary-50 dark:bg-primary-800/50 text-primary-600 dark:text-primary-400"
              >
                {{ child.name }}
              </Link>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </aside>
</template>