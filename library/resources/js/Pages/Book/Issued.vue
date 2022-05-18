<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="show_books" v-for="book in books.data" :key="book.id">
              <div class="image">
                <div class="margin-bottom-20">
                  <img :src="showImage() + book.image" />
                </div>
                <Link
                  class="px-4 px-6 py-2 mb-2 text-green-100 bg-green-500 rounded font-extrabold margin-bottom-20 text-align-center"
                  v-if="book.give == 'true'"
                  @click="checkBook(book.id)"
                >
                  Возврат
                </Link>
              </div>
              <div class="info">
                <div class="px-4 py-2">
                  <Link
                    class="py-2 mb-2 font-extrabold margin-bottom-20"
                    :href="route('books.show', book.id)"
                  >
                    {{ book.title }}
                  </Link>
                </div>
                <div class="px-4 py-2 font">{{ book.author }}</div>
                <div class="px-4 py-2 font">
                  {{ book.annotation.substring(0, 200) + ".." }}
                </div>
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
import Pagination from "@/Components/Pagination.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    BreezeNavLink,
    Link,
    Pagination,
  },
  props: {
    books: Object,
  },
  setup() {
    return {
      showImage() {
        return "/storage/";
      },
      checkBook(id) {
        Inertia.post(route("books.chek", id));
      },
      destroy(id) {
        Inertia.delete(route("books.destroy", { id }));
      },
    };
  },
};
</script>
