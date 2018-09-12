<template>
    <article class="message" :class="{ 'is-open': isOpen }">
        <div class="message-header">
            <p v-html="header" />
            <button class="delete" aria-label="delete" @click="isOpen = false"></button>
        </div>
        <div class="message-body" v-html="body" />
    </article>
</template>

<script>
export default {
    props: {
        header: {
            type: String,
            required: true
        },
        body: {
            type: String,
            required: true
        }
    },
    data () {
        return {
            isOpen: true
        }
    }
}
</script>
