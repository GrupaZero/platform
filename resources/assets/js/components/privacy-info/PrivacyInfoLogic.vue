<script>
    import Cookies from 'js-cookie'

    const Component = {
        props: {},
        data() {
            return {
                toShow: false
            }
        },
        created() {
            this.toShow = !this.isAccepted()
        },
        methods: {
            isAccepted() {
                return Cookies.get('cookies_policy') === 'accepted'
            },
            accept() {
                Cookies.set('cookies_policy', 'accepted', {expires: 365})
                this.toShow = false
            }
        },
        render() {
            return this.$scopedSlots.default({
                toShow: this.toShow,
                accept: this.accept
            })
        }
    }

    export default Component
</script>
