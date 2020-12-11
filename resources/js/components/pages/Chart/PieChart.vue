<template>
    <div class="small">
        <loading :active.sync="isLoading"
                 :can-cancel="true"
                 :loader="'dots'"
                 :is-full-page="false"></loading>
        <PieChartData :chartData="datacollection" v-if="datacollection != null"></PieChartData>
    </div>
</template>

<script>
import LineChartData from "./LineChartData.js";
import PieChartData from "./PieChartData";

export default {
    components: {
        PieChartData
    },
    data() {
        return {
            isLoading: false,
            datacollection: null,
            feedbackArray: [],
            colorkArray: [],
            dateArray: []
        }
    },
    created() {
        this.isLoading = true;
        this.getRandomInt();
    },
    methods: {
        fillData() {
            this.datacollection = {
                hoverBackgroundColor: "red",
                hoverBorderWidth: 10,
                labels: this.feedbackArray,
                datasets: [
                    {
                        label: "Leads Response",
                        backgroundColor: this.colorkArray,
                        data: this.dataArray
                    }
                ]
            }
        },
        getRandomInt() {
            axios.get('/dashboard/chart/data/2')
                .then(res => {
                    let result = res.data;
                    let vm = this;
                    let feedback = new Array();
                    let newData = new Array();
                    let colorData = new Array();
                    result.forEach(item => {
                        colorData.push(item.color)
                        feedback.push(item.feedback)
                        newData.push(item.total)
                    })
                    this.colorkArray = colorData;
                    this.feedbackArray = feedback;
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
