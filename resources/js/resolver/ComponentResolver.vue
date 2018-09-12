<template>
    <div id="component-resolver">
        <component 
            v-for="(item, index) in page" 
            :key="index" 
            :is="components[item.component]" 
            :data="item.props" 
        />
    </div>
</template>

<script>
import CardComponentMapper from './../mappers/CardComponentMapper'
import ContentComponentMapper from './../mappers/ContentComponentMapper'
import MessageComponentMapper from './../mappers/MessageComponentMapper'
import axios from 'axios'

export default {
    components: {
        CardComponentMapper, ContentComponentMapper, MessageComponentMapper
    },
    data () {
        return {
            components: {
                'card': CardComponentMapper,
                'content': ContentComponentMapper,
                'message': MessageComponentMapper
            },
            page: []
        }
    },
    mounted () {
        axios.get('/data/page.json').then(response => {
            this.page = response.data
        })
    }
}
</script>