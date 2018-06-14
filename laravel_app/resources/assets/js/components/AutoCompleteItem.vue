<!--suppress ALL -->
<template>
    <li>
        <a :href="item_link" class="f-row" style="margin-bottom: 20px; cursor: pointer;text-decoration: none; color: white;" @click.prevent="checkCMS()">
            <div class="col-2 allCentered">
                <img style="position: absolute;" class="img-fluid" :src="main_img" alt="">
            </div>
            <div class="col">
                <h6>{{item.title | capitalize}}</h6>
                <small>{{item.e_name | capitalize}}</small>
            </div>
        </a>
    </li>
</template>

<script>
	export default {
		name: "auto-complete-item",
		props: ['item','cmsMode'],
		computed: {
			main_img() {
				if (/{(.*?)}/.test(this.item.img_path)) this.item.img_path = this.item.img_path.replace('{category-url}', this.item.base_url_var_val);
				return this.url + '/_img' + this.item.img_path + '/' + this.item.img;
			},
			item_link() {
				if (/{(.*?)}/.test(this.item.base_url)) this.item.base_url = this.item.base_url.replace('{category-url}', this.item.base_url_var_val);
				return this.url  + this.item.base_url  + this.item.url;
			}
		},
        methods:{
			checkCMS(){
				if(!this.cmsMode) window.location = this.item_link;
				else this.$emit('addToEntitesList',this.item);
            }
        }
	}
</script>

<style>


</style>