<template>
    <div class="content" v-html="body" />
</template>

<script>
export default {
    props: {
        body: {
            type: String,
            required: true
        }
    }
}
</script>
