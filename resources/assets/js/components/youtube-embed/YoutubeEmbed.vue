<style lang="scss" scoped>
    .youtube-player {
        position: relative;
        padding-bottom: 56%;
        /* Use 75% for 4:3 videos */
        height: 0;
        overflow: hidden;
        max-width: 100%;
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
        .yt-play-button {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 500 350' alt='Play video'%3E%3Cg%3E%3Cpath d='M3.255,68.255C5.916,35.288,35.067,6.435,68.037,4.137c0,0,59.375-4.137,178.973-4.137c119.599,0,184.852,4.333,184.852,4.333c32.977,2.189,62.275,30.943,65.108,63.896c0,0,2.947,34.287,2.947,103.593s-3.255,109.636-3.255,109.636c-2.661,32.969-31.812,61.824-64.781,64.125c0,0-59.382,4.143-178.979,4.143c-119.598,0-184.852-4.339-184.852-4.339c-32.977-2.192-62.273-30.948-65.104-63.902c0,0-2.945-34.286-2.945-103.593C0,108.586,3.255,68.255,3.255,68.255z'/%3E%3Cpolygon fill='%23FFFFFF' points='195.751,105.307 328.892,174.857 195.751,244.419'/%3E%3C/g%3E%3C/svg%3E");
            background-repeat: no-repeat;
            height: 72px;
            width: 72px;
            left: 50%;
            top: 50%;
            margin-left: -36px;
            margin-top: -36px;
            position: absolute;
            cursor: pointer;
        }
    }
</style>

<template>
    <div class="youtube-player">
        <template v-if="queuedToPlay">
            <iframe :id="playerId" :src="videoSource" ref="ytiframe" frameborder="0" allow="autoplay; encrypted-media"
                    allowfullscreen></iframe>
        </template>
        <template v-else>
            <img :src="thumbSource">
            <div class="yt-play-button" @click="play"></div>
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
                queuedToPlay: false,
                player: null,
                playerId: `ytplayer-${this.videoId}`,
                videoSource: `https://www.youtube.com/embed/${this.videoId}?autoplay=1&amp;enablejsapi=1`,
                thumbSource: `https://i.ytimg.com/vi/${this.videoId}/hqdefault.jpg`
            }
        },
        methods: {
            play: function() {
                this.queuedToPlay = true;

                this.getIframeApi();

                let makeYtPlayerInterval = setInterval(() => {
                    if (typeof YT !== 'undefined') {
                        this.player = new YT.Player(this.playerId);
                        // Without setTimeout, playVideo() is not a function, but why?
                        setTimeout(() => {
                            this.player.playVideo();
                        }, 1000);
                        clearInterval(makeYtPlayerInterval);
                    }
                }, 100)
            },
            getIframeApi: function() {
                // We need to change template to show iframe.
                // Tried to use axios.get but get:
                // Failed to load https://www.youtube.com/iframe_api: Response to preflight request doesn't pass access control
                // check: No 'Access-Control-Allow-Origin' header is present on the requested resource.
                // Origin 'https://dev.gzero.pl' is therefore not allowed access. The response had HTTP status code 405.
                if (typeof YT === 'undefined') {
                    this.$nextTick(function() {
                        let tag = document.createElement('script');
                        tag.src = 'https://www.youtube.com/iframe_api';

                        this.$refs.ytiframe.insertAdjacentElement('beforebegin', tag);
                    })
                }
            }
        },
    }
</script>
