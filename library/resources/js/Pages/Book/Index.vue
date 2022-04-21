<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <!-- <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Библиотека</h2>
    </template>-->

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="menu">
              <Link :href="route('books.index')" class="link"> Все книги </Link>
              <Link :href="route('books.show')" class="link"> Мои книги </Link>
              <Link :href="route('books.issued')" class="link"> Выдано </Link>
            </div>

            <div class="show_books" v-for="book in books.data" :key="book.id">
              <div class="image">
                <img :src="showImage() + book.image" />
              </div>

              <div class="info">
                <div class="px-4 py-2">{{ book.title }}</div>
                <div class="px-4 py-2">{{ book.author }}</div>
                <div class="px-4 py-2">{{ book.annotation }}</div>
              </div>
            </div>
            <pagination :links="books.links" />
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
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    BreezeNavLink,
    Link,
  },
  props: {
    books: Object,
  },
  setup() {
    return {
      showImage() {
        return "/storage/";
      },
      destroy(id) {
        Inertia.delete(route("books.destroy", id));
      },
    };
  },
};
</script>
