<template>
    <li class="catesItem" v-show="loadedItem">
        <a :href="url_item">
            <img :src="url_main_img" v-on:load="loadItem()" class="img-fluid" alt="">
            <div class="innerCatesItem">
                <div class="partA">
                    <h3>{{it['title']}}</h3>
                    <p class="desc">{{it['description']}}</p>
                    <div class="frameItemPrices">
                        <span style="color: #d70a0a">${{it['price']}}</span>
                        <span style="text-decoration: line-through;">${{it['prev_price']}}</span>
                    </div>
                    <div class="allCentered buyNowWideButton" :data-id="it['id']">
                        <div class="allCentered buyIconFrame "><img
                                alt="" :src="url_shopping_cart"></div>
                        <span>Add to cart</span>
                    </div>
                </div>
            </div>
        </a>
    </li>
</template>

<script>
	// asset('_img/Shopping%20Cart%203.png') src="{{}}"
	export default {
		mounted() {
			console.log('Component mounted124.');
		},
		props: ['it'],
		data: function () {
			return {
                loadedItem:false
			}
		},
        methods: {
		    loadItem(){
		    	this.loadedItem = true;
            }
        },
		computed: {
			// a computed getter
			url_main_img: function () {
				return `${this.url}/${!window.categoryImgRoute ? '_img/main-items-by-cates/' : window.categoryImgRoute}${this.it['main_img']}`;
			},
			url_shopping_cart: function () {
				return `${this.url}/_img/Shopping%20Cart%203.png`;
			},
			url_item: function () {
/*				!this.it['c_name'] && (this.it['c_name'] = selectedCategory);
				!this.it['sc_name'] && (this.it['sc_name'] = selectedSubCategory);*/
				return `${this.url}/shop/${this.it['c_name']}/${this.it['sc_name']}/${this.it['url']}`;
			},
		}
	}
</script>
