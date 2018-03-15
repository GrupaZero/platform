<template>
    <div>
        <h1>
            The Admin Panelik
        </h1>
        <div>
            <router-link to="/bartero/home">Home</router-link>
        </div>
        <div v-for="app in apps">
            <router-link :to="app.path">{{ app.label }}</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'admin-panel',
        data: () => ({}),
        created: () => {
            console.log('created......')
        },
        props: ['register', 'apps'],
        mounted: function() {
            this.register(
                    {
                        path: 'another-super-advanced-feature',
                        label: 'Another Super-Duper Advanced Feature'
                    }, resolve => require(['./AnotherSuperAdvancedFeature.vue'], resolve))

            this.register(
                    {
                        path: 'super-advanced-feature',
                        label: 'Super-Duper Advanced Feature'
                    }, resolve => require(['./SuperAdvancedFeature.vue'], resolve))
            // this.register(require('./AnotherSuperAdvancedFeature'))
            // this.register(require('./SuperAdvancedFeature'))
        }
    }
</script>

<style scoped>

</style>