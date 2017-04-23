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
        {{ $t('cookieLaw.message') }}
        <a :href="policyUrl">{{ $t('cookieLaw.link_text') }}</a>
      </div>
      <button class="btn btn-success btn-sm" @click="accept">{{ $t('cookieLaw.button_text') }}</button>
    </div>
  </transition>
</template>

<script>
    import Cookies from 'js-cookie'
    export default {
        props: {
            policyUrl: {
                type: String,
                required: true
            }
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
            _getCookiesInstance () {
                return Cookies
            },
            setVisited () {
                this._getCookiesInstance().set('cookies_policy', 'accepted', {expires: 365})
            },
            getVisited () {
                console.log(this);
                return this._getCookiesInstance().get('cookies_policy')
            },
            accept () {
                this.setVisited()
                this.isOpen = false
            }
        }
    }
</script>