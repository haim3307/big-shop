/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Datetime from 'vue-datetime-2';
import moment from 'moment';
import StarRating from 'vue-star-rating'
//changes
/*
require('./bootstrap');
*/


/*
window.Vue = require('vue');
*/
/*
window.Popper = require('popper.js').default;
*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
String.prototype.seoFriendly = function () {return this.replace(/\s+/g, ' ').trim().replace(/\s/g, '-').toLowerCase()};


window.VueComponents = function () {
	Vue.filter('formatDate', function(value) {
		if (value) {
			return moment(String(value)).format('MM/DD/YYYY hh:mm')
		}
	});
	Vue.filter('fixed', num => num.toFixed(2));
	Vue.filter('capitalize', value => value?value.charAt(0).toUpperCase() + value.slice(1):value);
	Vue.filter('seoUnFriendly', value => value?value.replace('_',' '):value);
	Vue.filter('striphtml', value => {
		if(!value) return '';
		let div = document.createElement("div");
		div.innerHTML = value;
		return div.textContent || div.innerText || "";
	});
	Vue.component('star-rating', StarRating);

	Vue.component('cate-item', require('./components/CateItem'));
	Vue.component('cate-item-r', require('./components/CategoryItemR'));
	Vue.component('cate-items', require('./components/CateItemsCont'));
	Vue.component('category-page-items', require('./components/CategoryPageItems'));
	Vue.component('categories-display', require('./components/CategoriesDisplay'));
	Vue.component('category-display', require('./components/CategoryDisplay'));
	Vue.component('cart-item', require('./components/CartItem'));
	Vue.component('cart-list', require('./components/CartList'));
	Vue.component('shop-cart-item', require('./components/ShopCartItem'));
	Vue.component('added-to-cart-modal', require('./components/AddedToCartModal'));
	Vue.component('quick-product-view-modal', require('./components/QuickProductViewModal'));
	Vue.component('auto-complete-menu', require('./components/AutoCompleteMenu'));

	//cms components
	Vue.use(Datetime);
	Vue.component('manage-page-lists', require('./components/cms/ManagePageLists'));
	Vue.component('manage-page-list', require('./components/cms/ManagePageList'));
	Vue.component('deal-table', require('./components/cms/DealsTable'));
	Vue.component('thumbnail-list', require('./components/cms/ThumbnailList'));
	Vue.component('thumb-item', require('./components/cms/ThumbItem'));
	Vue.component('nav-item', {
		name: 'nav-item',
		mounted() {

		},
		props: ['selectedItem'],
		data: function () {
			return {
				url: window.url,
				loadedItem: false,
				editMode: false,
			}
		},
		methods: {
			loadItem() {
				this.loadedItem = true;
			},
			deleteItem: function (id) {
				$.ajax({
					method: 'DELETE',
					url: BASE_URL + '/cms/menus/' + id,
					data: {
						menuItem: id
					}
				}).then(res => {
					if (res == '1') {
						var appData = CMSAppOBJ.data;
						var menu = appData.menus.filter(menu => menu.id == appData.selectedMenuId)[0];
						menu.items = menu.items.filter( (item) => item.id != id);
						appData.selectedMenu = menu;
						toastr.success('Navigation item deleted');
					} else toastr.error('Navigation item delete failed');
				});
			},
			editItem: function (item, mode) {
				if (mode == -1) this.editMode = false;
				else if (item.oldTitle && item.title !== item.oldTitle) {
					$.ajax({
						method: 'PUT',
						url: BASE_URL + '/cms/menus/' + item.id + '?menuItemTitle=' + item.title,
					})
						.then((res) => {
							if (res == '1') {
								this.editMode = false;
								toastr.success('Navigation item edited');
							} else toastr.error('Navigation item edit failed');
						});
				} else {
					this.editMode = false;
				}

			},
			toggleEdit: function () {
				this.selectedItem.oldTitle = this.selectedItem.title;
				this.editMode = !this.editMode;
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
				!this.it['c_name'] && (this.it['c_name'] = selectedCategory);
				!this.it['sc_name'] && (this.it['sc_name'] = selectedSubCategory);
				return `${this.url}/shop/${this.it['c_name']}/${this.it['sc_name']}/${this.it['url']}`;
			},
		},
		template: `
                <a v-cloak
                       class="list-group-item list-group-item-action text-center f-row justify-content-around align-items-center"
                       :id="selectedItem.id" data-toggle="list" :href="selectedItem.calc_calc_url"
                       role="tab"
                       aria-controls="profile">
                        <div class="col-3" v-cloak>
                            <div class="btn btn-info" v-on:click="toggleEdit()" v-if="!editMode">
                                <i class="fa fa-edit"></i>
                            </div>
                            <div class="btn btn-info" v-else v-on:click="editItem(selectedItem,1)">
                                <i class="fa fa-check"></i>
                            </div>
                        </div>
                        <span class="col my-text-overflow" v-cloak style="text-transform: uppercase"
                              v-text="selectedItem.title" :title="selectedItem.title" v-if="!editMode"></span>
                        <div class="col" v-else>
                        <input type="text" class="form-control text-center " v-model="selectedItem.title">
                        </div>
                        <div class="col-3" v-if="!editMode" >
                            <div class="btn btn-danger" v-on:click="deleteItem(selectedItem.id)"><i class="fa fa-trash"></i></div>
                        </div>
                        <div class="col-3" v-else>
                            <div class="btn btn-danger" v-on:click="editItem(selectedItem,-1)">
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                    </a>
            `
	});
};
