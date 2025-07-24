
<script setup>
// import { RouterView } from 'vue-router'
import Sidebar from '@/Layouts/Sidebar.vue'
import Navbar from '@/Layouts/Navbar.vue'
import Footer from '@/Layouts/Footer.vue'
import { ref } from 'vue'

const sidebarOpen = ref(true)
const toggleSidebar = () => {
  sidebarOpen.value = !sidebarOpen.value
}
</script>

<template>
  <div class="flex h-screen bg-gray-50 dark:bg-dark-900">
    <!-- Sidebar -->
    <Sidebar :isOpen="sidebarOpen" />
    
    <div class="flex flex-col flex-1 overflow-hidden">
      <!-- Navbar -->
      <Navbar @toggle-sidebar="toggleSidebar" />
      
      <!-- Main content -->
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 dark:bg-dark-900 p-4">
        <!-- <RouterView /> -->
      </main>
      
      <!-- Footer -->
      <Footer />
    </div>
  </div>
</template>