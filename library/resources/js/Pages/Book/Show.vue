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
              <Link :href="route('books.index')" class="margin-left-15"> Все книги </Link>
              <Link :href="route('books.show')" class="margin-left-15"> Мои книги </Link>
              <Link :href="route('books.issued')" class="margin-left-15"> Выдано </Link>
            </div>

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
                <!-- <Link
                  class="px-4 px-6 py-2 mb-2 text-green-100 bg-green-500 rounded font-extrabold margin-bottom-20 text-align-center"
                  v-if="book.give == 'false'"
                  @click="checkBook(book.id)"
                >
                  Выдать
                </Link>-->
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
                <div class="px-4 py-2">{{ book.title }}</div>
                <div class="px-4 py-2 font">{{ book.author }}</div>
                <div class="px-4 py-2 font">{{ book.annotation }}</div>
              </div>
            </div>

            <div class="black" v-bind:class="{ visible: isActive }"></div>
            <div class="Pop-Up" v-bind:class="{ visible: isActive }">
              <form @submit.prevent="checkBook(number)">
                <h2 class="margin-bottom-20">Выдать книгу</h2>
                <label for="title" class="margin-bottom-20">Кому:</label>
                <div>
                  <input
                    type="text"
                    v-model="form.whom"
                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                  />
                  <!--<div v-if="form.errors.whom" class="font-bold text-red-600">
                    Поле Кому должно быть заполнено
                  </div>-->
                  <label class="font-bold text-red-600">{{ texterr }}</label>
                </div>
                <div class="flex items-center mt-4">
                  <button
                    class="px-6 py-2 text-white bg-green-500 rounded margin-bottom-20"
                  >
                    Выдать
                  </button>
                </div>
              </form>
              <button class="px-6 py-2 text-white bg-green-500 rounded" @click="chancel">
                Отмена
              </button>
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
import { useForm } from "@inertiajs/inertia-vue3";
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
  },
  props: {
    books: Object,
    errors: Object,
  },
  setup() {
    const form = useForm({
      whom: null,
    });
    const isActive = ref(false);
    const number = ref(0);
    const texterr = ref(null);
    return {
      form,
      isActive,
      number,
      texterr,
      showImage() {
        return "/storage/";
      },
      checkBook(id) {
        if (form.whom !== null) {
          form.post(route("books.chek", id));
          isActive.value = !isActive.value;
        } else {
          texterr.value = "Требуется указать Кому";
        }
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
      },
    };
  },
};
</script>
