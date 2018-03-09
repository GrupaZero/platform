<style lang="scss" scoped>
    .youtube-player {
        position: relative;
        padding-bottom: 56.23%;
        /* Use 75% for 4:3 videos */
        height: 0;
        overflow: hidden;
        max-width: 100%;
        background: #000;
        margin: 5px;
        iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            background: transparent;
        }
        img {
            bottom: 0;
            display: block;
            left: 0;
            margin: auto;
            max-width: 100%;
            width: 100%;
            position: absolute;
            right: 0;
            top: 0;
            border: none;
            height: auto;
            cursor: pointer;
            -webkit-transition: .4s all;
            -moz-transition: .4s all;
            transition: .4s all;
            &:hover {
                -webkit-filter: brightness(75%);
            }
        }
        .play {
            height: 72px;
            width: 72px;
            left: 50%;
            top: 50%;
            margin-left: -36px;
            margin-top: -36px;
            position: absolute;
            background: url("//i.imgur.com/TxzC70f.png") no-repeat;
            cursor: pointer;
        }
    }
</style>

<template>
    <div class="youtube-player">
        <template v-if="isPlaying">
            <iframe :src="videoSource" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </template>
        <template v-else>
            <img :src="thumbSource">
            <div class="play" @click="play"></div>
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            videoId: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                isPlaying: false
            }
        },
        methods: {
            play: function() {
                this.isPlaying = true;
            }
        },
        computed: {
            videoSource: function() {
                return `https://www.youtube.com/embed/${this.videoId}?autoplay=1&amp;rel=0`;
            },
            thumbSource: function() {
                return `https://i.ytimg.com/vi/${this.videoId}/hqdefault.jpg`
            }
        }
    }
</script>
