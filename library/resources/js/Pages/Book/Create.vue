<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Создать</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form @submit.prevent="submit">
              <div>
                <label for="title">Название</label>
                <input
                  type="text"
                  v-model="form.title"
                  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                />
                <div v-if="form.errors.title" class="font-bold text-red-600">Поле Название должно быть заполнено</div>
              </div>
              <div>
                <label for="title">Автор</label>
                <input
                  type="text"
                  v-model="form.author"
                  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                />
                <div v-if="form.errors.author" class="font-bold text-red-600">Поле Автор должно быть заполнено</div>
              </div>

              <div>
                <label for="File">File Upload</label>
                <input
                  type="file"
                  @change="previewImage"
                  ref="photo"
                  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                />
                <img v-if="url" :src="url" class="w-full mt-4 h-80" />
                <div v-if="errors.image" class="font-bold text-red-600">
                  {{ errors.image }}
                </div>
              </div>

              <div class="mt-4">
                <label for="title">Аннотация</label>
                <textarea
                  name="annotation"
                  type="text"
                  v-model="form.annotation"
                  class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                >
                </textarea>
                <div v-if="form.errors.annotation" class="font-bold text-red-600">Поле Аннотация должно быть заполнено</div>
              </div>

              <!-- submit -->
              <div class="flex items-center mt-4">
                <button class="px-6 py-2 text-white bg-gray-900 rounded">
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
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      url: null,
    };
  },
  setup() {
    const form = useForm({
      title: null,
      author: null,
      image: null,
      annotation: null,
    });

    return {
      form,
      submit(photo) {
        if (ref.photo) {
          form.image = ref.photo.files[0];
        }
        form.post(route("books.store"));
      },
      previewImage(e) {
            const file = e.target.files[0];
            url = URL.createObjectURL(file);
        },
    };
  },
  methods: {},
};
</script>
