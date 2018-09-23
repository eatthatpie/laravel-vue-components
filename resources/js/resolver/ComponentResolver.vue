<template>
    <div id="component-resolver">
        <div class="content">
            <h1>
                Page: {{ page.name }}
            </h1>
        </div>

        <component 
            v-for="(item, index) in pageStructure" 
            :key="index" 
            :is="getComponentByCodename(item.codename)"
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
    metaInfo () {
        return {
            title: this.page.name + ' @ Laravel Vue Components'
        }
    },
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
            pageId: 0,
            page: {},
            pageStructure: []
        }
    },
    mounted () {
        this.pageId = Math.ceil(Math.random() * 10)

        axios.get('/api/pages/' + this.pageId).then(response => {
            this.page = response.data.data
        })

        axios.get('/api/pages/' + this.pageId + '/components').then(response => {
            this.pageStructure = response.data.data
        })
    },
    methods: {
        getComponentByCodename (codename) {
            if (this.components.hasOwnProperty(codename)) {
                return this.components[codename]
            }

            return null
        }
    }
}
</script>