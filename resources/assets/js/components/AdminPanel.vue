<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="navbar-brand">The Admin Panel</div>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item" v-for="app in apps">
                    <router-link class="flex-sm-fill text-sm-center nav-link" :to="app.path">
                        {{ app.label}}
                    </router-link>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <select v-model="locale" class="form-control">
                    <option>en</option>
                    <option>pl</option>
                </select>
            </form>
        </nav>
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
        props: ['apps'],
        data () { return { locale: 'en' } },
        watch: {
            locale (val) {
                this.$i18n.locale = val
            }
        }
    }
</script>

<style scoped>

</style>