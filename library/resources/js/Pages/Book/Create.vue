<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <!--<template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Создать</h2>
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
            <form @submit.prevent="submit">
              <div>
                <label for="title">Название</label>
                <input
                  type="text"
                  v-model="form.title"
                  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                />
                <div v-if="form.errors.title" class="font-bold text-red-600">
                  Поле Название должно быть заполнено
                </div>
              </div>
              <div>
                <label for="title">Автор</label>
                <input
                  type="text"
                  v-model="form.author"
                  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                />
                <div v-if="form.errors.author" class="font-bold text-red-600">
                  Поле Автор должно быть заполнено
                </div>
              </div>

              <div class="mt-4">
                <label for="title">Описание</label>
                <textarea
                  name="annotation"
                  type="text"
                  v-model="form.annotation"
                  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                >
                </textarea>
                <div v-if="form.errors.annotation" class="font-bold text-red-600">
                  Поле Аннотация должно быть заполнено
                </div>
              </div>
              <label for="title">Обложка</label>
              <div class="preview">
                <img v-if="url" :src="url" class="mt-4 h-80" />
                <div v-if="errors.image" class="font-bold text-red-600">
                  {{ errors.image }}
                </div>

                <input
                  type="file"
                  @change="previewImage"
                  ref="photo"
                  class="px-4 py-2 mt-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                />
              </div>

              <!-- submit -->
              <div class="flex items-center mt-4">
                <button class="px-6 py-2 text-white bg-green-500 rounded">
                  Сохранить
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeLabel from "@/Components/Label";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    BreezeNavLink,
    Link,
  },
  props: {
    errors: Object,
  },

  setup() {
    const form = useForm({
      title: null,
      author: null,
      image: null,
      annotation: null,
    });
    const photo = ref(null);
    const url = ref(null);

    function previewImage() {
      const file = photo.value.files[0];
      url.value = URL.createObjectURL(file);
    }
    return {
      form,
      photo,
      url,
      previewImage,
      submit() {
        if (photo) {
          form.image = photo.value.files[0];
        }
        form.post(route("books.store"));
      },
    };
  },
};
</script>
