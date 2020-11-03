<template>
    <component :is="layout">
    </component>
</template>


<script>
import DefaultLayout from '../Layouts/DefaultLayout'
export default {
    computed: {
        layout () {
            return this.$route.meta.layout || 'default-layout'
        }
    },
    components: {
        DefaultLayout
    }
}
</script>