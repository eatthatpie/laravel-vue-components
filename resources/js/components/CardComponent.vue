<template>
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img :src="image" :alt="alt" />
            </figure>
        </div>
        <div class="card-content">
            <div class="content" v-html="body" />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        image: {
            type: String,
            required: true
        },
        alt: {
            type: String,
            required: true
        },
        body: {
            type: String,
            required: true
        }
    }
}
</script>
