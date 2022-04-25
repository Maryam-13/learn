<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <!-- <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Book</h2>
    </template>-->

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="menu margin-bottom-20">
              <Link :href="route('books.index')" class="link"> Все книги </Link>
              <Link :href="route('books.show')" class="link"> Мои книги </Link>
              <Link :href="route('books.issued')" class="link"> Выдано </Link>
            </div>

            <div class="show_books" v-for="book in books.data" :key="book.id">
              <div class="image">
                <div class="margin-bottom-20">
                  <img :src="showImage() + book.image" />
                </div>
                <!-- <div class="px-4 py-2">
                  <form>
                    <input
                      type="checkbox"
                      v-model="book.give"
                      @click="checkBook(book.id)"
                      name="give"
                      value="book.give"
                    />
                  </form>
                </div>-->
                <Link
                  class="px-4 px-6 py-2 mb-2 text-green-100 bg-green-500 rounded font-extrabold margin-bottom-20 text-align-center"
                  v-if="book.give=='true'" @click="checkBook(book.id)"
                >
                  Возврат
                </Link>
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
