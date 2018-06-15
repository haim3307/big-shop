@extends('cms.cms')
@section('content')

    <div class="container-fluid" style="margin-top: 20px;" id="CMSApp">

        <div class="g-row">
            <div class="g-col-md-5">
                <div class="card p-3" style="margin: 0 15px;">
                    <div class="col-md-5 container"><h2 class="h4 text-center">Options</h2></div>
                    <div class="actions">
                        <form id="menuOrderForm" class="container row justify-content-around p-2" action=""
                              method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="apply" id="applyMenu" value="0">
                            <input type="submit" class="btn btn-primary" value="Save Order" name="save" id="saveMenu">
                            <input type="button" class="btn btn-alert" value="Cancel" name="cancel" id="cancelMenu">
                        </form>
                    </div>
                </div>
                <div class="accordion container" id="accordion">
                    @foreach(\App\Entity::all() as $entity)
                        <div class="card">
                            <div class="card-header" id="heading{{$entity->name}}">
                                <h5 class="mb-0">

                                    <button style="width: 100%; text-decoration: none;"
                                            class="btn btn-link collapsed f-row justify-content-between align-items-center"
                                            type="button" data-toggle="collapse"
                                            data-target="#collapse{{$entity->name}}" aria-expanded="true"
                                            aria-controls="collapse{{$entity->name}}">

                                        <span>{{ucwords($entity->table)}}</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </button>

                                </h5>

                            </div>

                            <div id="collapse{{$entity->name}}"
                                 class="collapse @if($entity->name == 'page') show @endif"
                                 aria-labelledby="heading{{$entity->name}}" data-parent="#accordion">
                                <div class="card-body">

                                    <div class="list-group">
                                        @foreach(\App\Entity::getCustomTable($entity->table) as $entityItem)
                                            <a class="list-group-item clearfix addToNav"
                                               data-entity-item-id="{{$entityItem->id}}"
                                               data-entity-id="{{$entity->id}}">
                                                {{ucwords(isset($entityItem->title)?$entityItem->title:$entityItem->name)}}
                                                <span class="pull-right">
                                                    <span class="btn btn-xs btn-default">
                                                        <span class="fa fa-plus" aria-hidden="true"></span>
                                                    </span>
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="g-col-md-7">
                <select class="form-control" v-on:change="changeMenu()" v-model="selectedMenuId">
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach
                </select>
                {{--                            @php($item->calc_url = $item->calc_url??$item->customUrl())--}}
                <div class="list-group" id="list-tab-nav" role="tablist">
                    <nav-item v-for="selectedItem in selectedMenu.items" :key="selectedItem.id"
                              :selected-item="selectedItem"></nav-item>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <style>
        .hide {
            display: none !important;
        }

        [v-cloak] {
            display: none !important;
        }

        [v-cloak] .v-cloak--hidden {
            display: none !important;
        }
    </style>

    <script>
			$(function () {
				var selectedMenu = CMSAppOBJ.data.selectedMenu, selectedItems = selectedMenu.items
				$("#list-tab-nav").sortable({
					tolerance: 'pointer',
					revert: 'invalid',
					placeholder: 'span2 well placeholder tile',
					forceHelperSize: true,
					/*
                                        items: 'a:not(:first)'
                    */
				});
				$('#saveMenu').on('click', function () {
					$('#applyMenu').val(1);
				});
				$('#cancelMenu').on('click', function () {
					$("#list-tab-nav").sortable('cancel');
				});
				$('#menuOrderForm').on('submit', function () {
					$(this).append('<input name="nav_order" style="display: none;" value="' + $("#list-tab-nav").sortable("toArray").join() + '">');
				});
				$('.addToNav').on('click', function () {
					var exist = false, entityId = $(this).data('entity-id'),
						entityItemId = $(this).data('entity-item-id');
					var menu = CMSAppOBJ.data.menus.filter(function (menu) {
						return menu.id == CMSAppOBJ.data.selectedMenuId;
					})[0];
					for (var item in menu.items) {
						if (menu.items[item].entity_item_id == entityItemId && menu.items[item].entity_id == entityId) {
							exist = true;
						}
					}
					if (exist) return;
					$.ajax({
						method: 'POST',
						url: '{{url('')}}' + '/cms/menus/' + CMSAppOBJ.data.selectedMenuId + '/add-item',
						data: {
							entityId: entityId,
							entityItemId: entityItemId
						}
					}).then(function (res) {
						menu.items.unshift(res);
						CMSAppOBJ.data.selectedMenu = menu;
					});
				});
			});
			CMSAppOBJ.data.selectedMenu = {!! $selected_menu !!};
			CMSAppOBJ.data.selectedMenuId = CMSAppOBJ.data.selectedMenu.id;
			CMSAppOBJ.data.menus = {!! $menus !!};
			CMSAppOBJ.data.BASEURL = '{{url('')}}';
			CMSAppOBJ.data.editMode = false;
			CMSAppOBJ.computed.calc_calc_url = function () {
				return CMSAppOBJ.data.BASEURL + '/' + this.calc_url;
			};
			CMSAppOBJ.methods.changeMenu = function () {
				var _self = this;
				this.selectedMenu = this.menus.filter(function (menu) {
					return menu.id == _self.selectedMenuId;
				})[0];
			};

			const CMSApp = new Vue(CMSAppOBJ);


    </script>

@endsection