<template>
    <div class="container py-8">
        <div class="row ">
<!--            <div class="col-12 mb-5 d-flex justify-content-center">-->
<!--                <button class="button">-->
<!--                    <div class="button__content">-->
<!--                        <div class="button__icon">-->
<!--                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="80px" height="80px" viewBox="0 0 80 80" style="enable-background:new 0 0 80 80;" xml:space="preserve">-->
<!--        <g>-->
<!--          <path d="M64,48L64,48h-8V32h8c8.836,0,16-7.164,16-16S72.836,0,64,0c-8.837,0-16,7.164-16,16v8H32v-8c0-8.836-7.164-16-16-16-->
<!--          S0,7.164,0,16s7.164,16,16,16h8v16h-8l0,0l0,0C7.164,48,0,55.164,0,64s7.164,16,16,16c8.837,0,16-7.164,16-16l0,0v-8h16v7.98-->
<!--          c0,0.008-0.001,0.014-0.001,0.02c0,8.836,7.164,16,16,16s16-7.164,16-16S72.836,48.002,64,48z M64,8c4.418,0,8,3.582,8,8-->
<!--          s-3.582,8-8,8h-8v-8C56,11.582,59.582,8,64,8z M8,16c0-4.418,3.582-8,8-8s8,3.582,8,8v8h-8C11.582,24,8,20.417,8,16z M16,72-->
<!--          c-4.418,0-8-3.582-8-8s3.582-8,8-8l0,0h8v8C24,68.418,20.418,72,16,72z M32,48V32h16v16H32z M64,72c-4.418,0-8-3.582-8-8l0,0v-8-->
<!--          h7.999c4.418,0,8,3.582,8,8S68.418,72,64,72z" />-->
<!--        </g>-->
<!--      </svg>-->
<!--                        </div>-->
<!--                        <p class="button__text">Play Game</p>-->
<!--                    </div>-->
<!--                </button>-->

<!--            </div>-->
            <div class="col-12 mt-4" v-if="!isQuoteLoading">
                <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                    <!--                    <div class="alert-icon">-->
                    <!--										<span class="svg-icon svg-icon-primary svg-icon-xl">-->
                    <!--											&lt;!&ndash;begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Tools/Compass.svg&ndash;&gt;-->
                    <!--											<svg xmlns="http://www.w3.org/2000/svg"-->
                    <!--                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"-->
                    <!--                                                 viewBox="0 0 24 24" version="1.1">-->
                    <!--											  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                    <!--        <rect x="0" y="0" width="24" height="24"/>-->
                    <!--        <path-->
                    <!--            d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M3,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,19 C14,19.5522847 13.5522847,20 13,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,11 C2,10.4477153 2.44771525,10 3,10 Z"-->
                    <!--            fill="#000000"/>-->
                    <!--        <rect fill="#000000" opacity="0.3" x="16" y="10" width="5" height="10" rx="1"/>-->
                    <!--    </g>-->
                    <!--											</svg>-->
                    <!--                                            &lt;!&ndash;end::Svg Icon&ndash;&gt;-->
                    <!--										</span>-->
                    <!--                    </div>-->
                    <div class="alert-text h6 text-center">
                        {{ quote.quote }}
                        <br>
                        <a class="font-weight-bold mt-3" href="javascript:void(0)"><span>- {{ quote.author }}</span></a>.
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!--begin::Callout-->
                <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <div class="mr-6">
													<span class="svg-icon svg-icon-primary svg-icon-4x">
														<!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Home/Mirror.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"></rect>
																<path
                                                                    d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z"
                                                                    fill="#000000" fill-rule="nonzero"></path>
																<path
                                                                    d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z"
                                                                    fill="#000000" opacity="0.3"></path>
															</g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Content-->
                            <div class="d-flex flex-column">
                                <h2 class="text-dark-75"><strong>{{ lastSevenDaysCustomers }}</strong></h2>
                                <div class="text-dark-75">New Leads in Last 7 Days</div>

                            </div>
                            <!--end::Content-->
                        </div>
                    </div>
                </div>
                <!--end::Callout-->
            </div>
            <div class="col-lg-4">
                <!--begin::Callout-->
                <div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <div class="mr-6">
													<span class="svg-icon svg-icon-danger svg-icon-4x">
														<!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/General/Thunder-move.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"></rect>
																<path
                                                                    d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z"
                                                                    fill="#000000"></path>
																<path
                                                                    d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z"
                                                                    fill="#000000" opacity="0.3"></path>
															</g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Content-->
                            <div class="d-flex flex-column">
                                <h2 class="text-dark-75"><strong>{{ lastMonthCustomers }}</strong></h2>
                                <div class="text-dark-75">New Leads in Last 30 Days</div>
                            </div>
                            <!--end::Content-->
                        </div>
                    </div>
                </div>
                <!--end::Callout-->
            </div>
            <div class="col-lg-4">
                <!--begin::Callout-->
                <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <div class="mr-6">
													<span class="svg-icon svg-icon-success svg-icon-4x">
														<!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Design/Sketch.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"></rect>
																<polygon fill="#000000" opacity="0.3"
                                                                         points="5 3 19 3 23 8 1 8"></polygon>
																<polygon fill="#000000"
                                                                         points="23 8 12 20 1 8"></polygon>
															</g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Content-->
                            <div class="d-flex flex-column">
                                <h2 class="text-dark-75"><strong>{{ totalCustomers }}</strong></h2>
                                <div class="text-dark-75">Total Leads</div>
                            </div>
                            <!--end::Content-->
                        </div>
                    </div>
                </div>
                <!--end::Callout-->
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <RandomChart></RandomChart>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <PieChart></PieChart>
                    </div>
                </div>
            </div>


        </div>
    </div>

</template>

<script>
import RandomChart from "./Chart/RandomChart";
import LineChart from "./Chart/LineChart";
import PieChart from "./Chart/PieChart";

export default {
    name: "AdminDashboard",
    components: {
        RandomChart, LineChart, PieChart
    },
    data() {
        return {
            quote: [],
            isQuoteLoading: false,
            isLoading: false,
            totalCustomers: 0,
            lastSevenDaysCustomers: 0,
            lastMonthCustomers: 0,
        }
    },
    methods: {
        getRandomQuotes() {
            this.isQuoteLoading = true;
            axios.get(`/motivational/quote`)
                .then(res => {
                    this.isQuoteLoading = false;
                    console.log(res.data)
                    this.quote = res.data;
                })
                .catch(err => {
                    console.log(err)
                })
        },
        getDashboardData() {
            axios.get(`/get/dashboard/data`)
                .then(res => {
                    this.totalCustomers = res.data.totalCustomers;
                    this.lastSevenDaysCustomers = res.data.lastSevenDaysCustomers;
                    this.lastMonthCustomers = res.data.lastMonthCustomers;
                    this.isLoading = false;
                })
                .catch(err => {
                    console.log(err)
                })
        }
    }
    ,
    created() {
        this.isLoading = true;
        this.getDashboardData();
        this.getRandomQuotes();
    }
}
</script>
<style scoped>

.button {
    position: relative;
    padding: 0;
    width: 200px;
    height: 200px;
    border: 4px solid #888888;
    outline: none;
    background-color: #f4f5f6;
    border-radius: 40px;
    box-shadow: -6px -20px 35px #ffffff, -6px -10px 15px #ffffff, -20px 0px 30px #ffffff, 6px 20px 25px rgba(0, 0, 0, 0.2);
    transition: 0.13s ease-in-out;
    cursor: pointer;
}
.button:active {
    box-shadow: none;
}
.button:active .button__content {
    box-shadow: none;
}
.button:active .button__content .button__text, .button:active .button__content .button__icon {
    transform: translate3d(0px, 0px, 0px);
}
.button__content {
    position: relative;
    display: grid;
    padding: 20px;
    width: 100%;
    height: 100%;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    box-shadow: inset 0px -8px 0px #dddddd, 0px -8px 0px #f4f5f6;
    border-radius: 40px;
    transition: 0.13s ease-in-out;
    z-index: 1;
}
.button__icon {
    position: relative;
    display: flex;
    transform: translate3d(0px, -4px, 0px);
    grid-column: 4;
    align-self: start;
    justify-self: end;
    width: 32px;
    height: 32px;
    transition: 0.13s ease-in-out;
}
.button__icon svg {
    width: 32px;
    height: 32px;
    fill: #aaaaaa;
}
.button__text {
    position: relative;
    transform: translate3d(0px, -4px, 0px);
    margin: 0;
    align-self: end;
    grid-column: 1/5;
    grid-row: 2;
    text-align: center;
    font-size: 32px;
    background-color: #888888;
    color: transparent;
    text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.5);
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;
    transition: 0.13s ease-in-out;
}

.credits {
    margin-top: 24px;
}
.credits__reference {
    display: inline-block;
    border-bottom: 1px solid transparent;
    color: #0099ff;
    text-decoration: none;
    transition: ease-in 0.13s;
}
.credits__reference:hover {
    border-bottom-color: #0099ff;
}
</style>

