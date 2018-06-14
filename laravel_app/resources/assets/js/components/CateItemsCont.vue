<template>
    <ul class="grid-items-4" v-if="items && items.length && itemsAvail">
        <cate-item-r v-for="item in items" :key="item.id" :it="item"></cate-item-r>
    </ul>
    <h2 style="text-align: center; color: grey; text-transform: uppercase; padding: 30px 10px;" v-else> no products available</h2>
</template>

<script>
	// asset('_img/Shopping%20Cart%203.png') src="{{}}"
	export default {
		data: function () {
			return {
				items: window.items, itemsAvail: true
			}
		},
		props: {},

		mounted() {
			console.log(this.items);
			console.log('Component mounted.');
			let _self = this, $tags = $('.trending ul li');
			$tags.on('click', function (e) {
				//, e => _self.items = window.items
				$.ajax({url: _self.url+'/home/tags/' + $(e.target).data('tag')}).then((res) => {
					_self.items = res;
					_self.itemsAvail = true;
				}, e => _self.itemsAvail = false);
				$tags.removeClass('trendActive');
				$(this).addClass('trendActive');
			});
		}
	}
</script>
