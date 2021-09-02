<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <line-chart :chart-data="data"
    :height="100"
    :options="{responsive: true, maintainAspectRatio: true}"
                />
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
        "data": [],
    }),
    mounted() {
        this.update()
    },
    methods: {
        update: function () {
            this.is_refresh = true;
            axios.get(`/ajax/get-data-chart`)
                .then((response) => {
                    this.data = response.data

                    throw 'sfdgs';
                })
            console.log('ajax Component mounted.', this.data)
        }
    }
}
</script>
