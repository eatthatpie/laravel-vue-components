<template>
    <card-component :image="data.image" :alt="data.alt" :body="data.body" />
</template>

<script>
import CardComponent from './../components/CardComponent'

export default {
    components: {
        CardComponent
    },
    props: {
        data: {
            type: Object,
            required: true
        }
    }
}
</script>
