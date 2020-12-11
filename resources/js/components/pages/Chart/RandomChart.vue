<template>
    <div class="small">
        <loading :active.sync="isLoading"
                 :can-cancel="true"
                 :loader="'dots'"
                 :is-full-page="false"></loading>
        <bar-chart :chartData="datacollection" v-if="datacollection != null"></bar-chart>
    </div>
</template>

<script>
import BarChart from "./BarChart.js";

export default {
    components: {
        BarChart
    },
    data() {
        return {
            isLoading: false,
            datacollection: null,
            dataArray: [],
            dateArray: []
        }
    },
    mounted() {
        this.isLoading = true;
        this.getRandomInt();
    },
    methods: {
        fillData() {
            this.datacollection = {
                labels: this.dataArray,
                datasets: [
                    {
                        label: 'Last 7 Days Data',
                        backgroundColor: '#1BC5BD',
                        data: this.dataArray
                    },
                ]
            }
        },
        getRandomInt() {
            axios.get('/dashboard/chart/data/1')
                .then(res => {
                    let result = res.data;
                    let vm = this;
                    let newDates = new Array();
                    let newData = new Array();
                    result.forEach(item => {
                        newDates.push(item.date)
                        newData.push(item.total)
                    })
                    this.dateArray = newDates;
                    this.dataArray = newData;
                    this.fillData();
                    this.isLoading = false;
                })
        }
    }
}
</script>

<style>
.small {
    width: 100%;
    margin: 50px auto;
}
</style>
