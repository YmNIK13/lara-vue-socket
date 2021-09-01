<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button @click="update"
                        class="btn btn-default text mb-1"
                        v-if="!is_refresh">Обновить - {{ id }}...
                </button>
                <span class="badge badge-primary mb-1" v-if="is_refresh">Обновление...</span>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Наименование</th>
                        <th>URL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="url in urlData" :key="url.url">
                        <td>{{ url.title }}</td>
                        <td>{{ url.url }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: (vm) => ({
        "id": 0,
        "is_refresh": false,
        "urlData": [],
    }),
    mounted() {
    },
    methods: {
        update: function () {
            this.is_refresh = true;
            axios.get(`/ajax/get-urls`)
                .then( (response) => {
                    console.log(response.data)
                    this.urlData = response.data
                    this.id++
                    this.is_refresh = false
                })
            console.log('ajax Component mounted.', this.urlData)
        }
    }
}
</script>
