<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRatio: true}"/>
                <input type="checkbox" v-model="is_realtime"> Realtime
                <input type="text" v-model="label">
                <input type="text" v-model="sale">
                <button @click="sandData">Отправить</button>
            </div>
        </div>
    </div>
</template>

<script>
import LineChart from "./LineChart";

export default {
    components: {
        LineChart
    },
    data: (vm) => ({
        data: [],

        is_realtime: false,
        label: "",
        sale: 500,
    }),
    mounted() {
        const socket = io('/')

        socket.on('news-action.:App\\Events\\PrivateMessage', (dataEvent) => {
            console.log('dataEvent', dataEvent)
            // публичное поле из события laravel
            this.data = dataEvent.data.result
        })

        this.update()
    },
    methods: {
        update: function () {
            axios.get(`/ajax/socket-chart`)
                .then(response => this.data = response.data)
        },
        sandData: function () {

            axios({
                method: 'get',
                url: `/ajax/socket-chart`,
                params: {
                    is_realtime: this.is_realtime,
                    label: this.label,
                    sale: this.sale,
                }
            })
                .then(response => this.data = response.data)
        }
    }
}
</script>
