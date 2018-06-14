<template>


    <div v-if="listItem && listItem.id" class="card col-md-6 col-xl-4" :id="listItem.id">
        <div class="thumbnailActions">
            <a v-if="listItem.hasOptions" class="btn btn-primary" :href="url+'/cms/page/'+page.url+'/'+listItem.page_list_id+'/'+listItem.id+'/edit'"><i style="color: #ffffff" class="fa fa-edit"></i></a>
            <button class="btn btn-danger" @click="emitDeleteItem"><i class="fa fa-trash"></i></button>
        </div>
        <div class="card-body"><!--| capitalize-->
            <h3 class="card-title" v-if="listItem && listItem.title || (product && (product.title || product.name))">{{!listItem.title?product.title?product.title:product.name:listItem.title | striphtml | capitalize}}</h3>
            <div style="overflow:hidden;min-height: 250px;" v-if="product && product.c_url">
                <img :src="main_img"
                     class="card-img-top img-fluid dealImg" alt="">
            </div>
            <p class="card-text" v-if="product && product.description">
                {{product.description | striphtml}}
            </p>
            <div class="productExtraAttrs">
                <div v-if="listItem.options" v-for="(extraAttr,extraAttrTitle) in listItem.options">
                    <strong>{{extraAttrTitle | jsonTitleToHuman | capitalize}} : </strong>

                    <span>
                        <span v-if="extraAttr.type == 'd'">{{extraAttr.value | formatDate}}</span>
                        <span v-else-if="extraAttr.value">{{extraAttr.value | striphtml}}</span>
                        <span v-else-if="extraAttr.value == null"> </span>
                        <span v-else>{{extraAttr | striphtml}}</span>
                    </span>

                </div>
<!--                <div v-if="editMode">
                    <div class="btn btn-info" @click="editItem(1)">
                        <i class="fa fa-check"></i>
                    </div>
                    <div class="btn btn-danger" @click="editItem(-1)">
                        <i class="fa fa-times"></i>
                    </div>
                </div>-->
            </div>

        </div>
    </div>


</template>

<script>
	export default {
		name: "thumb-item",
		props: ['product', 'listObj','listItem'],
		data() {
            return {

            }
		},
		filters: {
			jsonTitleToHuman(val) {
				return val.replace('_',' ');
			}
		},
		mounted() {
			console.log(this.product,'item:');
			console.log(this.listItem,'list-item:');
		},
        computed:{
			main_img(){
				return this.url+'/_img'+(this.product.c_url?'/products/'+this.product.c_url:this.product.img_path)+'/'+(this.product.main_img || this.product.img);
            }
        },
		methods: {
			emitDeleteItem() {
				this.$emit('deleteItem');
			},
			emitEditItem() {
				this.$emit('editItem', this.listItem);

			},
			editItem(mode) {
				let _self = this;
				console.log(_self.url);
				if (mode == -1) this.editMode = false;
				$.ajax({
					method: 'PATCH',
					url: `${_self.url}/cms/page/${_self.page.url}/${_self.product.list_item_id}`,
					data: {
						options: _self.product.options,
					}
				})
					.then(function (res) {
						if (res == '1') {
							_self.editMode = false;
							toastr.success('item edited!');
						} else toastr.error('item edit failed');
					});

			},
			toggleEdit() {
				this.selectedItem.oldTitle = this.selectedItem.title;
				this.editMode = !this.editMode;
			}
		}
	}
</script>

<style scoped>

</style>