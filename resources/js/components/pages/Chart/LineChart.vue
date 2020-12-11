<template>
    <div class="small">
        <LineChartData :chartData="datacollection" v-if="datacollection != null"></LineChartData>
    </div>
</template>

<script>
import LineChartData from "./LineChartData.js";

export default {
    components: {
        LineChartData
    },
    data() {
        return {
            datacollection: null,
            dataArray: [],
            dateArray: []
        }
    },
    created() {
        this.getRandomInt();
    },
    methods: {
        fillData() {
            this.datacollection = {
                labels: this.dataArray,
                datasets: [
                    {
                        label: 'Last 7 Days Data',
                        backgroundColor: '#F64E60',
                        data: this.dataArray
                    },
                ]
            }
        },
        getRandomInt() {
            axios.get('/dashboard/chart/data/2')
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
                    this.fillData()
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
