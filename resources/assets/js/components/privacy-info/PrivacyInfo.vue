<template>
    <div class="block" v-if="toShow">
        <div class="message">
            {{ $t('privacy_policy.it_conforms_to_eu_regulations') }}
            <br>
            {{ $t('privacy_policy.by_using_the_site_you_accept') }}

            <a v-if="privacyPolicyUrl" :href="privacyPolicyUrl">
                {{ $t('privacy_policy.our_privacy_policy') }}
            </a>
            <span v-else>
                {{ $t('privacy_policy.our_privacy_policy') }}
            </span>
        </div>
        <button class="btn btn-success" @click="accept">
            {{ $t('privacy_policy.i_accept_privacy_policy') }}
        </button>
    </div>

</template>

<script>
    import Cookies from 'js-cookie'

    const Component = {
        props: {
            privacyPolicyUrl: String
        },
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

<style scoped>
    .block {
        position        : fixed;
        overflow        : hidden;
        box-sizing      : border-box;
        z-index         : 9999;
        width           : 100%;
        display         : flex;
        justify-content : space-between;
        align-items     : baseline;
        bottom          : 0;
        background      : rgba(255, 255, 255, 0.9);
        padding         : 10px;
        box-shadow      : -1px 3px 8px #000;
    }

    @media (max-width : 768px) {
        .message {
            width : 75%;
        }
    }
</style>
