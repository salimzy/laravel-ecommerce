
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const product = ref({
  name: '',
  description: '',
  price: '',
  category: '',
  stock: '',
  images: []
})

const categories = [
  { value: 'electronics', label: 'Electronics' },
  { value: 'clothing', label: 'Clothing' },
  { value: 'home', label: 'Home & Kitchen' }
]

const handleImageUpload = (event) => {
  const files = event.target.files
  for (let i = 0; i < files.length; i++) {
    const reader = new FileReader()
    reader.onload = (e) => {
      product.value.images.push(e.target.result)
    }
    reader.readAsDataURL(files[i])
  }
}

const removeImage = (index) => {
  product.value.images.splice(index, 1)
}

const submitForm = () => {
  // Submit logic here
  console.log('Product added:', product.value)
  router.push('/products')
}
</script>

<template>
  <AuthenticatedLayout>

 
  <div class="space-y-6">
    <div class="flex items-center justify-between">
      <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Add New Product</h2>
      <router-link 
        to="/products"
        class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
      >
        Back to Products
      </router-link>
    </div>
    
    <div class="bg-white dark:bg-dark-800 rounded-lg shadow overflow-hidden">
      <form @submit.prevent="submitForm" class="p-6 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Product Name</label>
            <input 
              v-model="product.name"
              type="text" 
              required
              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-700 dark:text-white"
            >
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
            <select 
              v-model="product.category"
              required
              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-700 dark:text-white"
            >
              <option value="" disabled>Select a category</option>
              <option v-for="category in categories" :key="category.value" :value="category.value">
                {{ category.label }}
              </option>
            </select>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price</label>
            <div class="relative">
              <span class="absolute left-3 top-2.5 text-gray-500">$</span>
              <input 
                v-model="product.price"
                type="number" 
                min="0" 
                step="0.01" 
                required
                class="w-full pl-8 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-700 dark:text-white"
              >
            </div>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Stock Quantity</label>
            <input 
              v-model="product.stock"
              type="number" 
              min="0" 
              required
              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-700 dark:text-white"
            >
          </div>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
          <textarea 
            v-model="product.description"
            rows="4"
            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-dark-700 dark:text-white"
          ></textarea>
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Product Images</label>
          <div class="mt-1 flex items-center">
            <label 
              for="file-upload"
              class="cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-dark-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors"
            >
              <i data-feather="upload" class="mr-2 w-4 h-4"></i>
              Upload Images
            </label>
            <input id="file-upload" type="file" multiple class="sr-only" @change="handleImageUpload">
          </div>
          
          <div v-if="product.images.length > 0" class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <div v-for="(image, index) in product.images" :key="index" class="relative group">
              <img :src="image" class="w-full h-32 object-cover rounded-lg">
              <button 
                @click="removeImage(index)"
                class="absolute top-2 right-2 p-1 bg-red-500 text-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity"
              >
                <i data-feather="x" class="w-3 h-3"></i>
              </button>
            </div>
          </div>
        </div>
        
        <div class="flex justify-end space-x-3 pt-4">
          <router-link 
            to="/products"
            class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
          >
            Cancel
          </router-link>
          <button 
            type="submit"
            class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors"
          >
            Save Product
          </button>
        </div>
      </form>
    </div>
  </div>
   </AuthenticatedLayout>
</template>