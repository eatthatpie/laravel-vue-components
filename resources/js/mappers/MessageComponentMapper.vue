<template>
    <message-component :header="data.header" :body="data.body" />
</template>

<script>
import MessageComponent from './../components/MessageComponent'

export default {
    components: {
        MessageComponent
    },
    props: {
        data: {
            type: Object,
            required: true
        }
    }
}
</script>
