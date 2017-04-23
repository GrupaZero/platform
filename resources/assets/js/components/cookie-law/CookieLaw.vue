<style lang="scss">
  .cookies-info {
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
</style>

<template>
  <transition appear name="slideFromBottom">
    <div class="cookies-info container" v-if="isOpen">
      <div class="cookies-info-message">
        {{ $t('cookie_law.message') }}
        <a :href="policyUrl">{{ $t('cookie_law.link_text') }}</a>
      </div>
      <button class="btn btn-success btn-sm" @click="accept">{{ $t('cookie_law.button_text') }}</button>
    </div>
  </transition>
</template>

<script>
    import Cookies from 'js-cookie'

    const Component = {
        props: {
            policyUrl: {
                type: String,
                required: true
            }
        },
        _getCookiesInstance(){
            return Cookies
        },
        data () {
            return {
                isOpen: false
            }
        },
        created () {
            if (!this.getVisited() === true) {
                this.isOpen = true
            }
        },
        methods: {
            setVisited () {
                Component._getCookiesInstance().set('cookies_policy', 'accepted', {expires: 365})
            },
            getVisited () {
                return Component._getCookiesInstance().get('cookies_policy')
            },
            accept () {
                this.setVisited()
                this.isOpen = false
            }
        }
    }

    export default Component
</script>