<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <!-- <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Edit</h2>
    </template>-->

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
              <div>
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
                <img
                  v-if="book.image == url"
                  :src="'/storage/' + book.image"
                  class="mt-4 h-80"
                />
                <img v-else :src="url" class="mt-4 h-80" />
                <div v-if="form.errors.image" class="font-bold text-red-600">
                  {{ form.errors.image }}
                </div>
                <div>
                  <input
                    type="file"
                    @change="previewImage"
                    ref="photo"
                    class="px-4 py-2 mt-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                  />
                </div>
              </div>
              <!-- submit -->
              <div class="flex items-center mt-4">
                <button class="px-6 py-2 text-white bg-green-500 rounded">
                  Сохранить изменения
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
import { Head } from "@inertiajs/inertia-vue3";
import BreezeNavLink from "@/Components/NavLink.vue";
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
    book: Object,
    errors: Object,
  },

  setup(props) {
    const form = useForm({
      title: props.book.title,
      author: props.book.author,
      image: props.book.image,
      annotation: props.book.annotation,
    });
    const photo = ref(null);
    const url = ref(props.book.image);

    function previewImage() {
      const file = photo.value.files[0];
      url.value = URL.createObjectURL(file);
    }

    function submit() {
      if (url.value == props.book.image) {
        form.image = url.value;
      } else {
        form.image = photo.value.files[0];
      }
      form.post(route("books.update", props.book.id));
    }
    return {
      form,
      photo,
      url,
      previewImage,
      submit,
    };
  },
};
</script>
