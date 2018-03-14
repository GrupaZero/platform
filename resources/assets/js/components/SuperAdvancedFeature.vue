<template>
    <div>
        <h1>This is super advanced feature screen</h1>
        <p>This is a paragraph of super advanced feature</p>
    </div>
</template>
<script>
    import * as R from 'ramda'
    module.exports.created = () => {
        let tripled = R.map(x => 3   * x, [3, 234, -2])
        console.log('tripled', tripled)
    }
</script>

