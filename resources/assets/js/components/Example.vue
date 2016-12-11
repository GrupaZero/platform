<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component ready.');

            this.$http.get('http://api.dev.gzero.pl:8000/v1/admin/contents')
                .then(response => {
                    console.log(response);
                })
        }
    }
</script>
