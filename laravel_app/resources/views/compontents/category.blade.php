<li class="categoryModelItem">
    <a href="{{url("/shop/$category->url")}}" class="categoryFrame allCentered">
        <?php
            $path = "/_img/";
            if ($category->img) {
                $path .= "categories/$category->img";
            } else if ($category->product_img) {
                $path .= "products/$category->url/$category->product_img";
            } else {
                $path = 'http://via.placeholder.com/600x600?text=' . $category->name;
            }
        ?>
        <img src="{{asset($path)}}" alt="">
    </a>
    <a href="{{url("/shop/$category->url")}}" class="categoryInfo">
        <span class="linkToCategory">
            &gt;
        </span>
        <h3>{{$category->name}}</h3>
    </a>
</li>
@push('styles')

    <style>
        .selectedCategory {
            background-color: #CD1121;
            border-color: #CD1123;
        }

        .selectedCategory h3 {
            color: white !important;
        }

        .categoryFrame img {
            transition: 0.7s all;
        }

        .categoryModelItem:hover .categoryFrame img {
            transform: scale(1.2);
        }
    </style>
@endpush
