<template>
    <div>
        <h1>
            The Admin Panelik
        </h1>
        <div v-for="app in apps">
            <router-link :to="app.path">{{ app.label }}</router-link>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'admin-panel',
        props: ['apps']
    }
</script>

<style scoped>

</style>