@extends('cms.cms')
@section('content')

    <div id="CMSApp" style="position: relative;">
        <nav id="switchManageMode" style="position: fixed; top: 0; bottom: 0; right: 0; padding: 50px 0; margin: auto; height: 60vh; background-color: rgba(246,246,246,0.7); width: 80px; z-index: 9999;" class="row flex-column justify-content-around">
            <button @click="togglePageManageMode('manage')" class="btn btn-white" :class="{'btn-primary':pageManageMode == 'manage'}" style="height: 80px">Manage</button>
            <button @click="togglePageManageMode('watch')" class="btn btn-white" :class="{'btn-primary':pageManageMode == 'watch'}" style="height: 80px">Watch</button>
            <button @click="togglePageManageMode('both')" class="btn btn-white" :class="{'btn-primary':pageManageMode == 'both'}" style="height: 80px">Both</button>
        </nav>
        <iframe v-if="pageManageMode == 'watch' || pageManageMode == 'both'" src="{{url($page->url)}}?iframe_mode=1" width="100%"
                :class="{splitMode:pageManageMode == 'both'}" frameborder="0"></iframe>
        <main  v-show="pageManageMode == 'manage' || pageManageMode == 'both'" :class="{splitMode:pageManageMode == 'both'}">
            @yield('page-master-content')
            <manage-page-lists v-if="lists && lists.length" :lists="lists" :selected-list="selectedList" :page-manage-mode="pageManageMode"></manage-page-lists>
        </main>

    </div>
@endsection
@section('scripts')
    <style>
        iframe{
            height: 90vh;
        }
        .splitMode{
            height: 50vh;
            overflow: scroll;

        }
    </style>
    @stack('vue-scripts')
    @include('inc.pages-vue-script')
@endsection