<template>
    <ul class="autoCompleteMenuUl" v-show="list.length" style="">
        <auto-complete-item v-for="item in list" :item="item" :key="item.id" @addToEntitesList="$emit('addToEntitesList',$event)" :cms-mode="cmsMode"></auto-complete-item>

    </ul>
</template>

<script>
    import AutoCompleteItem from './AutoCompleteItem';
	export default {
		components:{AutoCompleteItem},
		mounted(){
			console.log(this.list,'autoCompleteMenu:');
        },
		props:['list','cmsMode'],
		name: "auto-complete-menu",
        methods:{
			clickItem(item){
				alert(item);
            }
        }

	}
</script>

<style>
    .autoCompleteMenuUl {
        position: absolute;
        z-index: 1111;
        margin: 10px auto;
        left: -3px;
        right: 0;
        padding: 10px;
        top: 26px;
        background-color: rgba(125, 125, 125, 0.7);
        width: 90%;
        border-bottom: 1px solid lightgrey
    }

    @media (max-width: 1112px) {
        .autoCompleteMenuUl {
            height: 80vh;
            overflow-y: scroll;
        }

        .autoCompleteMenuUl li {
            min-height: 100px;
            padding: 20px;
        }
    }
</style>