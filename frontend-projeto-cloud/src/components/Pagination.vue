<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            <li class="page-item" :class="{ disabled: source.current_page == 1 }">  
                <a class="page-link" href="#" @click="navigate($event, source.current_page-1)" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li v-for="page in pages" :class="{ active: source.current_page == page}">
                <a class="page-link" href="#" @click="navigate($event, page)">{{ page }}</a>
            </li>
            <li class="page-item" :class="{ disabled: source.current_page == source.last_page }">
                <a class="page-link" href="#" @click="navigate($event, source.current_page+1)" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            
        </ul>
    </nav>
</template>

<script scoped>
import { range } from 'lodash'

export default{
    props: ['source'],
    data(){
        return {
            pages: []
        }
    },
    watch: {
        source(){
            this.pages = range(1, this.source.last_page+1)
            console.log(this.pages);
        }
    },
    methods:{
        navigate(ev, page){
            ev.preventDefault();
            this.$emit('navigate', page);
        }
    }
}

</script>