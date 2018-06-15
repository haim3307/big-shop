<template>
    <div class="f-row">
        <nav id="chooseList" class="col-lg-3">
            <h4>Choose A List To Manage</h4>
            <ul class="list-group">
                <li class="list-group-item list-group-item-action" :class="{active:selectedList==list.url}"
                    v-for="list in lists" @click="toTab(url+'/cms/page/'+page.url+'/'+list.url)">
                    {{list.title | capitalize}}
                </li>
            </ul>

        </nav>
        <main class="col-lg-9">
            <manage-page-list v-for="list in lists" :list="list" :list-title="list.url" :key="list.id"
                              v-show="selectedList == list.url" :page-manage-mode="pageManageMode"></manage-page-list>
        </main>
    </div>
</template>

<script>
	export default {
		name: "manage-page-lists",
		props: ['lists', 'pageManageMode', 'selectedList'],
		mounted() {
			console.log(this.lists);
			//this.selectedList = this.lists[0].url;
		},
		methods: {
			toTab(title) {
				window.location = title;
			}
		}
	}
</script>

<style>
    @media (max-width: 1000px) {
        #chooseList {
            margin-bottom: 20px;
        }
    }
</style>