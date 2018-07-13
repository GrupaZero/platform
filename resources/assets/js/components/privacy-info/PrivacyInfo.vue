<template>
    <privacy-info-logic>
        <div class="block" v-if="toShow" slot-scope="{ toShow, accept }">
            <div class="message">
                Dostosowaliśmy naszą Politykę Prywatności do nowych wymogów rozporządzenia Unii Europejskiej o ochronie
                danych osobowych.
                <br>
                Dalsze korzystanie z witryny zakłada, że akceptujesz naszą

                <a v-if="privacyPolicyUrl" :href="privacyPolicyUrl">
                    Politykę prywatności
                </a>
            </div>
            <button class="btn btn-success" @click="accept">
                Akceptuję Politykę Prywatności
            </button>
        </div>
    </privacy-info-logic>

</template>

<script>
    export default {
        props: {
            privacyPolicyUrl: String
        },
        components: {
            'privacy-info-logic': require('./PrivacyInfoLogic')
        }
    }
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
