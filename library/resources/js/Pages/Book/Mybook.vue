<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="menu">
              <Link
                class="px-6 py-2 text-green-100 bg-green-500 rounded margin-right-20 margin-bottom-20"
                :href="route('books.create')"
              >
                Добавить книгу
              </Link>
            </div>

            <div class="show_books" v-for="book in books.data" :key="book.id">
              <div class="image">
                <div class="margin-bottom-20">
                  <img :src="showImage() + book.image" />
                </div>

                <button
                  class="px-4 px-6 py-2 mb-2 text-green-100 bg-green-500 rounded font-extrabold margin-bottom-20 text-align-center"
                  v-if="book.give == 'false'"
                  @click="ppvisible(book.id)"
                >
                  Выдать
                </button>
                <label
                  v-else
                  class="px-4 px-6 py-2 mb-2 font-extrabold margin-bottom-20 text-align-center"
                  >{{ book.whom }}</label
                >
                <Link
                  class="px-4 px-6 py-2 mb-2 text-green-100 bg-green-500 rounded font-extrabold margin-bottom-20 text-align-center"
                  :href="route('books.edit', book.id)"
                >
                  Изменить
                </Link>
                <Link
                  class="px-4 px-6 py-2 mb-2 text-green-100 bg-green-500 rounded font-extrabold margin-bottom-20 text-align-center"
                  @click="destroy(book.id)"
                >
                  Удалить
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

            <MyPopUp :isActive="isActive" :number="number" @chancel="chancel"> </MyPopUp>

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
import MyPopUp from "@/Components/MyPopUp.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    BreezeNavLink,
    Link,
    Pagination,
    MyPopUp,
  },
  props: {
    books: Object,
    errors: Object,
  },
  setup() {
    const isActive = ref(false);
    const number = ref(0);
    return {
      isActive,
      number,
      showImage() {
        return "/storage/";
      },
      destroy(id) {
        Inertia.delete(route("books.destroy", { id }));
      },
      ppvisible(id) {
        number.value = id;
        isActive.value = !isActive.value;
      },
      chancel() {
        isActive.value = !isActive.value;
        Inertia.get(route("books.mybook"));
      },
    };
  },
};
</script>
