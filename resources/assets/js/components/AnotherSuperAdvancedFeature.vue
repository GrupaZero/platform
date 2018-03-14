<template>
    <div>
        <h1>This is another super advanced feature screen</h1>
        <p>This a le paragraph of another super advanced feature</p>
    </div>
</template>
<script>
    import * as R from 'ramda'
    module.exports.created = () => {
        let quadruppled = R.map(x => 4 * x, [3, 234, -2])
        console.log('quadruppled', quadruppled)
    }
</script>
