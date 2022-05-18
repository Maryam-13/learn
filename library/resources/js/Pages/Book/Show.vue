<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="show_books" v-for="book in books.data" :key="book.id">
              <div class="image-20">
                <div class="margin-bottom-20">
                  <img :src="showImage() + book.image" />
                </div>
              </div>
              <div class="info">
                <div class="px-4 py-2">{{ book.title }}</div>
                <div class="px-4 py-2 font">{{ book.author }}</div>
                <div class="px-4 py-2 font">{{ book.annotation }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    BreezeNavLink,
  },
  props: {
    books: Object,
    errors: Object,
  },
  setup() {
    return {
      showImage() {
        return "/storage/";
      },
    };
  },
};
</script>
