<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Book</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-4">
              <Link
                class="px-6 py-2 mb-2 text-green-100 bg-green-500 rounded"
                :href="route('books.create')"
              >
                Добавить книгу
              </Link>

              <Link
                class="px-6 py-2 mb-2 text-green-100 bg-green-500 rounded"
                :href="route('books.show')"
              >
                Мои книги
              </Link>
            </div>
            <table>
              <thead class="font-bold bg-gray-300 border-b-2">
                <td class="px-4 py-2">ID</td>
                <td class="px-4 py-2">Название книги</td>
                <td class="px-4 py-2">Автор</td>
                <td class="px-4 py-2">Изображение</td>
                <td class="px-4 py-2">Аннотация</td>
                <td class="px-4 py-2">Действие</td>
              </thead>
              <tbody>
                <tr v-for="book in books.data" :key="book.id">
                  <td class="px-4 py-2">{{ book.id }}</td>
                  <td class="px-4 py-2">{{ book.title }}</td>
                  <td class="px-4 py-2">{{ book.author }}</td>
                  <td class="px-4 py-2">
                    <img :src="showImage() + book.image" class="object-cover h-70 w-40" />
                  </td>
                  <td class="px-4 py-2">{{ book.annotation }}</td>
                  <td class="px-4 py-2 font-extrabold">
                    <Link class="text-green-700" :href="route('books.edit', book.id)">
                      Edit
                    </Link>
                    <Link @click="destroy(book.id)" class="text-red-700">>Delete</Link>
                  </td>
                </tr>
              </tbody>
            </table>

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
