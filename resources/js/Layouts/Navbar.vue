
<script setup>
import { Link } from '@inertiajs/vue3';
defineEmits(['toggle-sidebar'])

const user = {
  name: $page.props.auth.user.name,
  email: $page.props.auth.user.email,
  avatar: 'https://randomuser.me/api/portraits/men/1.jpg'
}

const dropdownOpen = ref(false)
</script>

<template>
  <header class="bg-white dark:bg-dark-800 shadow-sm z-40">
    <div class="flex items-center justify-between h-16 px-4">
      <div class="flex items-center">
        <button 
          @click="$emit('toggle-sidebar')"
          class="p-2 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700"
        >
          <i data-feather="menu" class="w-5 h-5"></i>
        </button>
        
        <div class="ml-4 relative">
          <input 
            type="text" 
            placeholder="Search..." 
            class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-700 dark:text-white"
          >
          <i data-feather="search" class="absolute left-3 top-2.5 text-gray-400"></i>
        </div>
      </div>
      
      <div class="flex items-center space-x-4">
        <button class="p-2 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full">
          <i data-feather="bell" class="w-5 h-5"></i>
        </button>
        
        <div class="relative">
          <button 
            @click="dropdownOpen = !dropdownOpen"
            class="flex items-center space-x-2 focus:outline-none"
          >
            <img :src="user.avatar" class="w-8 h-8 rounded-full" alt="User">
            <span class="hidden md:block text-sm font-medium dark:text-white">{{ user.name }}</span>
            <i data-feather="chevron-down" class="w-4 h-4 text-gray-400"></i>
          </button>
          
          <div 
            v-show="dropdownOpen"
            @click="dropdownOpen = false"
            class="fixed inset-0 z-10"
          ></div>
          
          <div 
            v-show="dropdownOpen"
            class="absolute right-0 mt-2 w-48 bg-white dark:bg-dark-700 rounded-md shadow-lg py-1 z-20"
          >
            <Link 
            :href="route('profile')"
             
              class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600"
            >
              Profile
            </Link>
            <Link  :href="route('settings')"
           
              class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600"
            >
              Settings
            </Link>
            <Link :href="route('profile.edit')"> Profile </Link>
                           
            <a 
              :href="route('logout')" 
              class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600"
            >
              Logout
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>