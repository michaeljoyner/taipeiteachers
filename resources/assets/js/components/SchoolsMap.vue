<template>
    <div class="flex">
        <div class="relative flex-auto">
            <div class="selected-school-box absolute pin-t pin-r w-full p-8 h-32 bg-white z-40"
                 :class="{'show': selected_school.name}">
                <div class="absolute pin-t pin-r text-5xl text-red-dark m-4"
                     @click="resetMap">&times;
                </div>
                <p class="text-grey-darker my-3 font-bold text-lg">{{ selected_school.name }}</p>
                <p class="text-grey-darker my-3 ">{{ selected_school.address }}</p>
            </div>
            <div ref="map"
                 class="map"></div>
        </div>
        <div class="w-64">
            <p class="pl-4 text-green my-3 font-bold text-xl">The Burroughs</p>
            <div v-for="area in areas" :key="area.name" @click="showMapArea(area.center)" class="p-4">
                <p class="text-grey-darker my-3 font-bold text-lg">{{ area.name}}</p>
                <p class="text-grey-darker my-3 border-b border-grey">{{ area.description}}</p>
            </div>
        </div>
    </div>

</template>

<script type="text/babel">

    import "js-marker-clusterer";
    import map_styles from "../map_assets/main_style";

    export default {

        props: ['schools-list'],

        data() {
            return {
                schools: this.schoolsList,
                default_center: {lat: 25.046198, lng: 121.517500},
                default_zoom: 13,
                map: null,
                markers: [],
                selected_school: {
                    name: false,
                    address: false
                },
                areas: [
                    {name: 'Luzhou', description: 'A special sort of hole', center: {lat: 25.0755, lng: 121.4809}},
                    {name: 'Xinyi', description: 'Hot, hip and pricey.', center: {lat: 25.0375, lng: 121.5592}},
                    {name: 'Zhongshan', description: 'Cultural and stuff', center: {lat: 25.0663, lng: 121.5306}},
                    {
                        name: 'Shilin',
                        description: 'Nightmarkets and other things.',
                        center: {lat: 25.0911, lng: 121.5202}
                    },
                    {name: 'Da\'an', description: 'One hell of a park', center: {lat: 25.0307, lng: 121.5358}},
                    {name: 'Neihu', description: 'Uppercrust but beautiful', center: {lat: 25.0641, lng: 121.5828}}
                ]
            };
        },

        mounted() {
            eventHub.$on('maps-loaded', this.init);
            eventHub.$on('KEY_ESC', this.resetMap);
        },

        methods: {
            init() {
                this.schools = this.schools.map(school => {
                    school.marker = null;
                    return school;
                });

                this.map = new google.maps.Map(this.$refs.map, {
                    center: this.default_center,
                    zoom: this.default_zoom,
                    styles: map_styles
                });

                this.schools.forEach(school => {
                    const marker = new google.maps.Marker({
                        map: this.map,
                        position: school.latLng,
                        animation: google.maps.Animation.DROP,
                        icon: 'images/pencil_icon.svg'
                    });
                    school.marker = marker;
                });

                let clusterer = new MarkerClusterer(this.map, this.schools.map( s => s.marker), {
                    imagePath: '/images/map_cluster',
                    imageExtension: 'svg',
                    gridSize: 10
                });

                this.schools.forEach(school => {
                    school.marker.addListener("click", () => {
                        this.setMapOnSchool(school);
                    });
                })
            },

            setMapOnSchool(school) {
                this.map.setZoom(15);
                this.map.panTo(school.latLng);
                this.selected_school = school;
            },

            showMapArea(location) {
                this.map.setZoom(14);
                this.map.panTo(location);
            },


            resetMap() {
                this.map.setZoom(this.default_zoom);
                this.map.panTo(this.default_center);
                this.selected_school = {name: false, address: false};
            }


        }
    }
</script>

<style scoped
       lang="scss"
       type="text/scss">
    .map {
        min-height: 100vh;
    }

    .selected-school-box {
        transition: .4s ease-in-out;
        transform: scale(0);
        transform-origin: right top;

        &.show {
            transform: scale(1);
        }
    }
</style>