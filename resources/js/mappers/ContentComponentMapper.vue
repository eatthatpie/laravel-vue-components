<template>
    <content-component :body="data.body" />
</template>

<script>
import ContentComponent from './../components/ContentComponent'

export default {
    components: {
        ContentComponent
    },
    props: {
        data: {
            type: Object,
            required: true
        }
    }
}
</script>
