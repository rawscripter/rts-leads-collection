<template>
    <div class="d-flex flex-row flex-column-fluid page">
        <AsideBar></AsideBar>
        <div class="d-flex flex-column flex-row-fluid wrapper">
            <TopMenuBar>
            </TopMenuBar>
            <div id="noMargin" class="container-fluid p-0 mt-100">
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="container">
                        <vue-page-transition name="fade-in-left">
                            <router-view></router-view>
                        </vue-page-transition>
                    </div>
                </div>
            </div>
            <Footer></Footer>
        </div>
    </div>
</template>

<script>
import AsideBar from "./layouts/AsideBar";
import TopMenuBar from "./layouts/TopMenuBar";
import Footer from "./layouts/Footer";

export default {
    name: "App",
    components: {
        AsideBar, TopMenuBar, Footer
    }
}
</script>
