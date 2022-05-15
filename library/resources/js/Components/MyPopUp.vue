<template>
  <div class="py-12">
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
        <div class="flex items-center mt-4 block-align-center">
          <button
            class="px-6 py-2 text-white bg-green-500 rounded" @click="if(form.whom !== null) {$emit('chancel')};"
          >
            Выдать
          </button>

          <button
            class="px-6 py-2 text-white bg-green-500 rounded margin-left-15"
            @click.prevent="$emit('chancel')"
          >
            Отмена
          </button>
        </div>
      </form>
    </div>
  </div>
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
    isActive: Boolean,
    number: Number,
  },
  setup() {
    const form = useForm({
      whom: null,
    });
    const texterr = ref(null);
    return {
      form,
      texterr,

      checkBook(id) {
        if (form.whom !== null) {
          form.post(route("books.chek", id));
          Inertia.get(route('books.mybook'));
        } else {
          texterr.value = "Требуется указать Кому";
        }
      },
    };
    /*   const form = useForm({
      whom: null,
    });
   const isActive =  ref(false);
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
      },*/
    /*ppvisible(id) {
        number.value = id;
        isActive.value = !isActive.value;
      },*/
    /*
      chancel() {
       isActive.value = !isActive.value;
      },*/
    // };
  },
};
</script>
