<template>
    <li class="catesItemR" v-show="loadedItem">
        <a :href="url_item" style="text-decoration: none; color: black;">
            <div class="innerCatesItemR" :style="{backgroundImage:make_bgi}" style="    background-size: cover;">
                <div class="quickViewWrap" style="position: absolute; top: 10px; left: 10px;">
                    <button class="btn btn-light quickViewB" :id="'quickView'+it.id" :data-product="jsonProduct">
                        <i class="fa fa-eye" title="Quick View"></i>
                    </button>
                </div>
                <div class="partB">
                    <img :src="url_main_img" @load="loadItem()" class="img-fluid" alt="">
                </div>
                <div class="partA">
                    <h4 class="h5">{{it['title'] | capitalize}}</h4>
                    <p class="desc" v-html="it['description']"></p>
                    <div class="frameItemPrices">
                        <span style="text-decoration: line-through; margin-right: 20px;" v-if="it['prev_price']">${{it['prev_price']}}</span>
                        <span style="color: #d70a0a">${{it['price']}}</span>
                    </div>
                    <button class="buyNowWideButton addToCartB" v-on:click="addToCartEvent($event)"
                            :data-product="jsonProduct" data-toggle="modal" data-target="#product_view"
                            :data-id="it['id']">
                        <span class="allCentered buyIconFrame "><img alt="" :src="url_shopping_cart">
                        </span>
                        <span class="btnTitle">Add to cart</span>
                    </button>
                </div>

            </div>
        </a>
    </li>
</template>
<script>
	// asset('_img/Shopping%20Cart%203.png') src="{{}}"
	export default {
		mounted() {
			/*			$('.addToCartB').on('click', updateCartedButtons);
                        console.log('options:',this.it['options']);*/
		},
		props: ['it'],
		data: function () {
			return {
				loadedItem: false
			}
		},
		methods: {
			loadItem() {
				this.loadedItem = true;
			},
			addToCartEvent($event) {
              window.addToCartEvent($event);
			}
		},
		computed: {
			// a computed getter
			url_main_img() {
				return `${this.url}/_img/products/${this.it['c_url']}/${this.it['main_img']}`;
			},
			url_shopping_cart() {
				return `${this.url}/_img/Shopping%20Cart%203.png`;
			},
			url_item() {
				!this.it['c_url'] && (this.it['c_url'] = selectedCategory);
				return `${this.url}/shop/${this.it['c_url']}/${this.it['url']}`;
			},
			make_bgi() {
				let url = this.url;

				function bg_white() {
					return `${url}/_img/bg_items_white.png`;
				}

				return `url('${bg_white()}')`;
			},
			jsonProduct() {
				return JSON.stringify(this.it);
			}
		},
		filters: {}
	}
</script>
<style>
    .catesItemR {
        position: relative;
        overflow-y: hidden;
    }

    .catesItemR .innerCatesItemR {

        height: 100%;
        display: grid;
    }

    .catesItemR > img {
        height: 100%;
        width: 100%;

    }

    .catesItemR .partA {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        padding: 30px 0;
    }

    @media (max-width: 1112px) {
        .catesItemR .partA {
            align-items: center;
        }
    }

    .catesItemR .partB {
        display: grid;
        align-items: center;
        justify-items: center;
        overflow: hidden;
        margin: 0 20px 0 0;
    }

    @media (min-width: 1127px) {
        .catesItemR .innerCatesItemR {
            grid-template-columns: 1.4fr 1fr;
            grid-template-areas: 'partB partA';
        }

        .catesItemR .partA {
            grid-area: partA;
        }

        .catesItemR .partB {
            grid-area: partB;
        }
    }

    @media (min-width: 1034px) and (max-width: 1127px) {
        .catesItem > a {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .catesItemR .innerCatesItemR {
            justify-content: center;
            background-color: ivory;
        }
    }

    @media (max-width: 1034px) {
        .catesItem > a {
            display: grid;
        }

        .catesItemR .innerCatesItemR {
            justify-content: center;
            background-color: ivory;
            min-height: 285px;
            /*
            background: linear-gradient(to bottom, #f9f9f9 0%,#e6e6e6 100%);
            */
        }

        .catesItem > a > img {
            width: 100%;
        }

        section.trending {
            background-color: #fff;
            height: auto;
        }
    }

    .catesItemR .desc {
        font-family: Arial;
        color: #646464;
        font-size: 12px;
        font-weight: 400;
        line-height: 20px;
        text-align: left;
    }

    @media (max-width: 800px) {

    }

    @media (max-width: 410px) {
        .catesItemR img {
            height: auto;
            width: auto;
        }

        .catesItemR .partA {
            display: grid;
            justify-items: center;
            grid-row-gap: 15px;
            height: auto;
        }

        .catesItemR .partA .desc {
            text-align: center;

        }

        .catesItemR .partA .addToCartB span {
            text-align: center;
            min-width: 82px;
            padding-left: 0;
            flex: 1;

        }

    }
</style>
