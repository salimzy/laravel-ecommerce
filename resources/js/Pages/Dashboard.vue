<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

// import StatCard from '@/Components/widgets/StatCard.vue'
// import RecentOrders from '@/Components/tables/RecentOrders.vue'
// import SalesChart from '@/Components/charts/SalesChart.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue';

const stats = [
  { title: 'Total Revenue', value: '$45,231', change: '+12%', icon: 'dollar-sign' },
  { title: 'Total Orders', value: '1,234', change: '+5%', icon: 'shopping-cart' },
  { title: 'New Customers', value: '89', change: '+3%', icon: 'users' },
  { title: 'Conversion Rate', value: '3.2%', change: '-0.5%', icon: 'trending-up' }
]
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

     <div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Dashboard Overview</h2>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- <StatCard 
        v-for="stat in stats" 
        :key="stat.title"
        :title="stat.title"
        :value="stat.value"
        :change="stat.change"
        :icon="stat.icon"
      /> -->
    </div>
    
    <!-- Charts and Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <div class="lg:col-span-2 bg-white dark:bg-dark-800 rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-4">Sales Overview</h3>
        <!-- <SalesChart /> -->
      </div>
      
      <div class="bg-white dark:bg-dark-800 rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-4">Recent Orders</h3>
        <!-- <RecentOrders /> -->
      </div>
    </div>
  </div>
    </AuthenticatedLayout>
</template>
