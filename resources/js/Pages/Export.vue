<script setup>
import { reactive } from "vue";
import axios from 'axios';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

</script>
<script>
export default {
  methods: {
    exportCSV() {
      axios
        .get('export', {
          responseType: 'blob',
        })
        .then((res) => {
          const url = window.URL.createObjectURL(new Blob([res.data]));
          const link = document.createElement('a');
          link.href = url;
          link.setAttribute('download', `export.csv`);
          document.body.appendChild(link);
          link.click();
          window.URL.revokeObjectURL(url);
        });
    }
  }
}
</script>



<template>
    <Head title="CSV出力" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                CSV出力
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font">
                          <div class="container px-5 py-8 mx-auto">
                              <div>
                                <button @click="exportCSV">CSVエクスポート</button>
                              </div> 
                          </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>