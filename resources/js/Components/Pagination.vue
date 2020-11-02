<template>
    <div class="overflow-auto">
        <b-pagination-nav :link-gen="linkGen" :number-of-pages="number_of_pages" use-router align="center" ></b-pagination-nav>
    </div>
</template>

<script>
export default {
    props:{
        number_of_pages:{
            type: Number,
            default: 1,
        }
    },
    methods: {
        linkGen(pageNum) {
            return pageNum === 1 ? '?' : `?page=${pageNum}`
        }
    }
}
</script>