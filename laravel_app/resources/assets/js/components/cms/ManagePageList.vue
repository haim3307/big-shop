<template>
    <div class="pageList">
        <h2>{{listTitle | seoUnFriendly | capitalize}}</h2>
        <form id="changesOrderForm" @submit="onSubmitForm($event)"
              :action="url + '/cms/page/'+page.url+'/'+listTitle+'/order?manage_mode='+pageManageMode"
              class="f-row justify-content-center p-2"
              method="POST"
              style="background-color: cornflowerblue;">
            <input type="hidden" name="_token" :value="token">
            <input type="hidden" name="_method" value="PATCH">
            <input type="submit" value="Save Changes" class="btn btn-primary">
            <div class="col-3"><input type="hidden" name="order" id="order" :value="order"></div>
            <input type="button" value="Cancel" id="cancel" class="btn btn-danger">
        </form>
        <div class="tabs ui-tabs ui-corner-all ui-widget ui-widget-content">
            <ul class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header" v-if="list.items && list.items.length">
                <li :class="{'ui-state-active':displayMode === 'thumbnail'}" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active" @click="displayMode = 'thumbnail'"><a class="tabLink ui-tabs-anchor" href="#thumbnails">Thumbnails</a></li>
                <li :class="{'ui-state-active':displayMode === 'table'}" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active" @click="displayMode = 'table'"><a class="tabLink ui-tabs-anchor" href="#tableTab">Table</a></li>
            </ul>
            <div id="quickProductSearch" class="f-row p-md-2 justify-content-center">
                <div class="autoCompleteWrap" v-if="list.searchable">
                    <input type="text" class="form-control" id="autoCompleteInput" placeholder="search products.."
                           v-model="autoCompleteInput"
                           @keyup="getAutoComplete()">
                    <auto-complete-menu @addToEntitesList="addToEntitesListTrigger($event)" :cms-mode="true"
                                        v-if="this.autoCompleteInput.length"
                                        :list="autoCompleteEntitiesList" :list-title="listTitle"></auto-complete-menu>
                </div>
                <div class="addToList" v-else>
                    <a :href="url+'/cms/page/'+page.url+'/'+list.id+'/create'"><button class="btn btn-success">Add New Item</button></a>
                </div>
            </div>
            <div v-if="!list.items || !list.items.length" style="min-height: 300px;">
                <h3 class="text-center">This List Is Empty</h3>
            </div>
            <div v-else>
                <section class="ui-tabs-panel ui-corner-bottom ui-widget-content" id="thumbnails" v-show="displayMode === 'thumbnail'">

                    <thumbnail-list :list-obj="list" @deleteItem="deleteItem($event)"></thumbnail-list>
                </section>

                <section class="ui-tabs-panel ui-corner-bottom ui-widget-content" id="tableTab" v-show="displayMode === 'table'">
                    <deal-table :list-obj="list"></deal-table>
                </section>
            </div>


        </div>
    </div>
</template>

<script>
	export default {
		name: "manage-page-list",
		props: ['list', 'listTitle', 'list_id', 'pageManageMode'],
		data() {
			return {
				token: window.token,
				order: false,
				autoCompleteEntitiesList: [],
				autoCompleteInput: '',
                displayMode: 'thumbnail'
			}
		},
		mounted() {
			console.log(this.list, 'list:');
			Vue.nextTick(function () {
				$('#cancel').on('click', function (e) {
					CMSAppOBJ.data.items = items;
				});
			});
		},
		methods: {
			addToEntitesListTrigger(item) {
				console.log('new item',item);
				$.ajax({
					url: `${this.url}/cms/page/${this.page.url}/${this.listTitle}/${item.id}/${item.entity_id}`,
					method: "POST",
				}).then(res => {
					console.log('toAdd',res);
                  this.list.items.push(res);
                });
			},
			deleteItem(item) {
				console.log(item, 'to DELETE');
				$.ajax({
					method: 'DELETE',
					url: this.url + '/cms/page/list/' + item.id
				}).then((res) => {
					console.log(res);
					if (res == '1') {
						this.list.items = this.list.items.filter(listitem => listitem.id != item.id);
						toastr.success('List item deleted');
					} else toastr.error('List item delete failed');

				});
			},
			onSubmitForm(e) {
				e.preventDefault();
				this.order = this.list.items.map(product => product.list_item_id).join();
				Vue.nextTick(() => $(e.target).unbind('submit').submit());
			},
			getAutoComplete() {
				let url = !this.listTitle?`api/entities`:`cms/api/entities/${this.listTitle}`;
				$.ajax({
					url: `${this.url}/${url}/${this.autoCompleteInput}`,
					method: "GET",
				}).then(res => this.autoCompleteEntitiesList = res);
			}
		}
	}
</script>

<style>
    .tabs li a,.tabs li{
        cursor: pointer !important;
    }
    .ui-helper-clearfix:before, .ui-helper-clearfix:after {
        content: "";
        display: table;
        border-collapse: collapse;
    }
    .pageList .autoCompleteWrap {
        position: relative;
    }

    .pageList #autoCompleteInput {

    }

    .pageList .autoCompleteMenuUl {
        width: 100%;
    }
</style>