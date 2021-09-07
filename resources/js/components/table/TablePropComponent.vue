<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Наименование</th>
                        <th>URL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(url, inx) in urlData" :key="inx">
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
    props: [
        'urlData'
    ],
    mounted() {
    },
    methods: {
        update: function () {
            console.log('Prop Component mounted.', this.urlData)
        }
    }
}
</script>
