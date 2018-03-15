<template>
    <div>
        <h1 class="mt-4">
            The Admin Panel
        </h1>
        <hr>
        <ul class="nav nav-pills">
            <li class="nav-item"  v-for="app in apps">
                <router-link class="flex-sm-fill text-sm-center nav-link" :to="app.path">
                    {{ app.label}}
                </router-link>
            </li>
        </ul>
        <hr>
        <div class="card mb-4">
            <div class="card-body">
                <router-view></router-view>
            </div>
        </div>
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