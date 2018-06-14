@extends('layouts.master')
@section('head')
    <link rel='stylesheet' id='kc-general-css' href={{asset('css/specialGeneral.css')}} type='text/css' media='all'/>

    <style type="text/css" id="kc-css-general">
        .kc-off-notice {
            display: inline-block !important;
        }

        .kc-container {
            max-width: 1200px;
        }
    </style>
    <link rel='stylesheet' id="kc-css-render" href={{asset('css/specialRender.css')}} type='text/css' media='all'/>
    <style>
        .blog-post, article.post {
            margin-top: 0;
        }

        .blog-post .owl-controls, article.post .owl-controls {
            display: none !important;
        }

        .blog-post article.post .entry-content, .blog-post article.post .entry-header, article.post article.post .entry-content, article.post article.post .entry-header {
            padding: 0;
        }

        .blog-post .post-thumbnail, article.post .post-thumbnail {
            padding: 0;
            margin: 0;
        }

        .blog-post.blog-post-grid .entry-meta, article.blog-post-grid.post .entry-meta {
            margin-top: 41px;
        }

        @media (max-width: 992px) and (min-width: 768px) {
            .blog-post.blog-post-grid .entry-meta, article.blog-post-grid.post .entry-meta {
                margin-top: 3px;
                margin-bottom: 0;
            }
        }

        @media (max-width: 480px) {
            .blog-post.blog-post-grid .entry-meta, article.blog-post-grid.post .entry-meta {
                margin-top: 30px;
                margin-bottom: 0;
            }
        }

        .blog-post.blog-post-grid article h3.entry-title, article.blog-post-grid.post article h3.entry-title {
            min-height: 48px;
        }

        .blog-post.blog-post-grid .post .post-thumbnail, article.blog-post-grid.post .post .post-thumbnail {
            margin: 0;
            padding: 0;
        }

        .blog-post.blog-post-grid .content-full, article.blog-post-grid.post .content-full {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        @media (max-width: 992px) and (min-width: 768px) {
            .blog-post.blog-post-grid .content-full .content .bottom, article.blog-post-grid.post .content-full .content .bottom {
                padding: 8px;
            }
        }

        @media (max-width: 768px) {
            .blog-post.blog-post-grid .content-full .content .bottom, article.blog-post-grid.post .content-full .content .bottom {
                height: 100%;
            }
        }

        .blog-post.blog-post-grid .item-blog, article.blog-post-grid.post .item-blog {
            position: relative;
            z-index: 0;
        }

        .blog-post.blog-post-grid .item-blog:after, article.blog-post-grid.post .item-blog:after {
            position: absolute;
            z-index: 1;
            left: 0;
            right: auto;
            width: 1px;
            height: 100%;
            top: 0;
            content: "";
            background: #ececec;
        }

        @media (max-width: 992px) {
            .blog-post.blog-post-grid .item-blog:after, article.blog-post-grid.post .item-blog:after {
                background: hsla(0, 0%, 89%, .8);
            }
        }

        .blog-post.blog-post-grid .item-blog:last-child:before, article.blog-post-grid.post .item-blog:last-child:before {
            position: absolute;
            z-index: 1;
            right: 0;
            left: auto;
            width: 1px;
            height: 100%;
            top: 0;
            content: "";
            background: #ececec;
        }

        @media (max-width: 992px) {
            .blog-post.blog-post-grid .item-blog:last-child:before, article.blog-post-grid.post .item-blog:last-child:before {
                background: hsla(0, 0%, 89%, .8);
            }
        }

        .blog-post.blog-post-grid .items, article.blog-post-grid.post .items {
            position: relative;
            z-index: 0;
            display: inline-block;
            float: left;
        }

        .blog-post.blog-post-grid .items:first-child:before, article.blog-post-grid.post .items:first-child:before {
            position: absolute;
            z-index: 1;
            left: 0;
            right: auto;
            width: 100%;
            height: 1px;
            top: 0;
            content: "";
            background: #ececec;
        }

        @media (max-width: 992px) {
            .blog-post.blog-post-grid .items:first-child:before, article.blog-post-grid.post .items:first-child:before {
                background: hsla(0, 0%, 89%, .8);
            }
        }

        .blog-post.blog-post-grid .items:after, article.blog-post-grid.post .items:after {
            position: absolute;
            z-index: 1;
            left: 0;
            right: auto;
            width: 100%;
            height: 1px;
            bottom: 0;
            content: "";
            background: #ececec;
        }

        @media (max-width: 992px) {
            .blog-post.blog-post-grid .items:after, article.blog-post-grid.post .items:after {
                background: hsla(0, 0%, 89%, .8);
            }
        }

        .blog-post .item, article.post .item {
            padding: 0;
        }

        .blog-post article.post, article.post article.post {
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .blog-post .image-thumnail, article.post .image-thumnail {
            width: 90px;
        }

        .blog-post .bottom-blog .entry-content, article.post .bottom-blog .entry-content {
            margin-top: -5px;
            margin-bottom: 5px;
        }

        .blog-post .bottom-blog .entry-title, article.post .bottom-blog .entry-title {
            font-size: 16px;
            line-height: 20px;
            margin-top: 0;
        }

        .blog-post .bottom-blog .entry-title a, article.post .bottom-blog .entry-title a {
            color: #0f0f0f;
            font-size: 18px;
            line-height: 22px;
            font-weight: 400;
        }

        .blog-post .bottom-blog .entry-title a:focus, .blog-post .bottom-blog .entry-title a:hover, article.post .bottom-blog .entry-title a:focus, article.post .bottom-blog .entry-title a:hover {
            color: #bf0d0d;
        }

        .blog-post .content-full .content-image, article.post .content-full .content-image {
            position: relative;
            overflow: hidden;
        }

        .blog-post .content-full .content-image .top-time, article.post .content-full .content-image .top-time {
            background: #bf0d0d;
            font-size: 14px;
            color: #fff;
            text-transform: uppercase;
            font-family: Exo\ 2;
            text-align: center;
            font-weight: 600;
            height: 38px;
            line-height: 38px;
            padding: 0 20px;
            position: absolute;
            left: 0;
            bottom: 0;
            pointer-events: none;
        }

        .blog-post .content-full .content .bottom, article.post .content-full .content .bottom {
            padding-top: 33px;
            padding-bottom: 15px;
        }

        @media (max-width: 767px) {
            .blog-post .content-full .content .bottom, article.post .content-full .content .bottom {
                padding-top: 15px;
            }
        }

        .blog-post .content-full .content .bottom .entry-meta, article.post .content-full .content .bottom .entry-meta {
            text-align: left;
            margin-top: 0;
            margin-bottom: 15px;
        }

        .blog-post .content-full .entry-title a:hover, article.post .content-full .entry-title a:hover {
            text-decoration: none;
            color: #bf0d0d;
        }

        .blog-post .content-full .readmore a, article.post .content-full .readmore a {
            color: #bf0d0d;
            font-size: 14px;
            text-transform: capitalize;
            font-weight: 600;
            display: inline-block;
            -webkit-transition: all .3s ease;
            -o-transition: all .3s ease;
            transition: all .3s ease;
            letter-spacing: 0;
        }

        .blog-post .content-full .readmore a:hover, article.post .content-full .readmore a:hover {
            color: #bf0d0d;
            letter-spacing: 1px;
        }

        .blog-post .author a, .blog-post .comments-link a, .blog-post .edit-link a, .blog-post .entry-category a, .blog-post .entry-date a, .blog-post .meta-sep a, article.post .author a, article.post .comments-link a, article.post .edit-link a, article.post .entry-category a, article.post .entry-date a, article.post .meta-sep a {
            text-transform: capitalize;
            color: #b0b0b0;
        }

        .blog-post .author a:focus, .blog-post .author a:hover, .blog-post .comments-link a:focus, .blog-post .comments-link a:hover, .blog-post .edit-link a:focus, .blog-post .edit-link a:hover, .blog-post .entry-category a:focus, .blog-post .entry-category a:hover, .blog-post .entry-date a:focus, .blog-post .entry-date a:hover, .blog-post .meta-sep a:focus, .blog-post .meta-sep a:hover, article.post .author a:focus, article.post .author a:hover, article.post .comments-link a:focus, article.post .comments-link a:hover, article.post .edit-link a:focus, article.post .edit-link a:hover, article.post .entry-category a:focus, article.post .entry-category a:hover, article.post .entry-date a:focus, article.post .entry-date a:hover, article.post .meta-sep a:focus, article.post .meta-sep a:hover {
            color: #bf0d0d;
        }

    </style>
    <style>

        .single-post .opal-social-share {
            position: relative;
            padding-left: 60px;
            margin-top: -35px;
            margin-bottom: 15px;
        }

        .single-post .opal-social-share [class^=bo-social-] {
            font-size: 20px;
            background: transparent;
            color: #7b7b7b;
            margin: 0;
        }

        .single-post .opal-social-share [class^=bo-social-] a {
            line-height: 35px;
            width: 35px;
            height: 35px;
        }

        .single-post .opal-social-share [class^=bo-social-]:hover {
            background: transparent;
            color: #bf0d0d;
        }

        .single-post .opal-social-share:before {
            position: absolute;
            top: 0;
            left: 0;
            content: "Share:";
            line-height: 35px;
            color: #0f0f0f;
            font-size: 15px;
            font-weight: 600;
        }

        .single-post .content-detail .owl-carousel-play .owl-item {
            padding: 0;
        }

        @media (max-width: 992px) {
            .single-post .content-detail .kc-row-container.kc-container {
                padding: 0;
            }
        }

        .single-post article.post {
            border: none;
            display: inline-block;
            width: 100%;
        }

        .single-post article.post div.page-links, .single-post article.post footer.entry-meta {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .single-post article .content-image {
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            overflow: hidden;
        }

        .single-post article .post-thumbnail img {
            width: 100%;
        }

        .single-post article .entry-meta.meta-category {
            font-size: 14px;
            line-height: 26px;
            color: #0f0f0f;
            font-weight: 600;
        }

        .single-post article .entry-meta .entry-date.entry-date-singer {
            display: inline-block !important;
        }

        .single-post article h1.entry-title {
            font-size: 28px;
            line-height: 32px;
            margin-top: 33px;
        }

        @media (max-width: 992px) {
            .single-post article h1.entry-title {
                font-size: 18px;
                line-height: 24px;
                margin-top: 15px;
            }
        }

        .single-post .entry-content {
            margin-top: 15px !important;
        }

        @media (min-width: 992px) {
            .single-post .entry-content .kc_column {
                padding: 0;
            }
        }

        .single-post .entry-content .kc_column .kc_text_block {
            padding: 0;
        }

        .single-post .entry-content p {
            margin-bottom: 15px !important;
            line-height: 26px;
        }

        .single-post .entry-content p a {
            color: #bf0d0d;
        }

        .single-post .entry-content p a:hover {
            text-decoration: underline;
        }

        .single-post .entry-content p span {
            font-family: Arial !important;
            font-size: 14px !important;
        }

        .single-post .entry-content b, .single-post .entry-content strong {
            color: #0f0f0f;
            font-size: 15px;
        }

        .single-post .entry-content ul {
            margin: 0;
            padding-left: 15px;
        }

        .single-post .entry-content ul li {
            font-size: 14px;
            line-height: 26px;
            font-weight: 400;
        }

        .author article.post h3.entry-title {
            font-size: 28px;
            line-height: 32px;
        }

        .tag .input-group-addon {
            padding: 0;
            border: 0;
        }

        .tag .dropdown_product_cat {
            border: 0;
        }

        .tag .page-content .input-group .form-control {
            line-height: 42px;
            height: 42px;
        }

        .tag .search-category {
            margin-top: 20px;
        }

        .archive .blog-post, .archive article.post {
            margin-top: 0;
        }

        article {
            position: relative;
        }

        article .entry-title {
            font-size: 18px;
            line-height: 26px;
            overflow: hidden;
            font-family: Exo\ 2;
            margin-top: 0;
            margin-bottom: 15px;
            color: #000;
        }

        article .entry-title a {
            color: #000;
        }

        article .list-item h3 {
            font-size: 18px;
        }

        article.post {
            margin-bottom: 30px;
            padding: 0;
            background: transparent;
        }

        article.post.sticky .entry-meta {
            margin-top: 8px;
        }

        article.post:last-child {
            border-bottom: none;
        }

        article.post .entry-content {
            margin-top: 15px;
            margin-bottom: 15px;
            font-size: 14px;
            line-height: 24px;
        }

        article.post .entry-content p {
            margin: 0;
        }

        article .post-format a i {
            display: none;
        }

        article .post-content span a {
            display: inline-block;
            color: #bf0d0d;
            margin-top: 10px;
        }

        article .post-content span a:hover {
            color: #a70b0b;
        }

        article .post-content a {
            display: block;
            margin-top: 10px;
            color: #bf0d0d;
        }

        .related-posts {
            background: transparent;
            margin-top: 30px;
        }

        .related-posts:hover .carousel-controls_v1 {
            display: block;
        }

        .related-posts .carousel-controls_v1 {
            display: none;
        }

        .related-posts .related-posts-content {
            margin-left: -15px;
            margin-right: -15px;
        }

        .related-posts .related-posts-content article.post .content-full .content-image img {
            width: 100%;
        }

        .related-posts .widget {
            margin-bottom: 0;
        }

        .related-posts article.post .post-thumbnail {
            margin-top: 0;
            padding: 0;
        }

        .related-posts article h1.entry-title {
            font-size: 18px !important;
            line-height: 24px !important;
        }

        .related-posts .widget-title, .related-posts .widget-woof .woof_container h4, .widget-woof .woof_container .related-posts h4 {
            font-size: 24px;
        }

        .related-posts .bottom-blog {
            margin-top: 15px;
        }

        .related-posts .blog-post .content-full .content .bottom .entry-content p, .related-posts article.post .content-full .content .bottom .entry-content p {
            margin: 0 !important;
        }

        /*------------------------------------*    Comment List
        \*------------------------------------*/
        .comments {
            padding: 0;
            background: transparent;
            margin-top: 30px;
            clear: both;
        }

        .comments #reply-title {
            margin: 0;
        }

        .comments .comments-title {
            margin: 0;
            padding: 0;
            position: relative;
            color: #353535;
            font-size: 26px;
        }

        .comments .the-comment {
            padding-top: 25px;
            padding-bottom: 33px;
            border-top: 1px solid #ececec;
            border-bottom: 1px solid #ececec;
            margin-top: 22px;
            margin-bottom: 35px;
        }

        .comments .the-comment div.avatar {
            float: left;
            margin-right: 30px;
        }

        .comments .the-comment div.avatar img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
        }

        .comments .form-control {
            background: #fff;
            border: 1px solid #ececec;
            margin-top: 15px;
        }

        .comments textarea.form-control {
            height: 150px;
        }

        .comments .comment-author {
            font-size: 14px;
            line-height: 20px;
        }

        .comments .comment-author strong {
            font-weight: 400;
            color: #0f0f0f;
        }

        .comments .comment-author p {
            margin: 0;
        }

        .comments .comment-text {
            font-size: 14px;
            line-height: 20px;
        }

        .comments .comment-text p {
            margin: 0;
        }

        .comments .comment-meta {
            font-size: 12px;
            color: #aaa;
        }

        .comments a {
            font-weight: 400;
            text-transform: capitalize;
            font-size: 14px;
        }

        .comments ol, .comments ul {
            margin: 0;
        }

        .comments .children, .comments .commentlists {
            list-style: none;
        }

        .comments .commentlists {
            padding-left: 0;
            margin-bottom: 10px;
        }

        .comment-navigation .previous {
            float: left;
        }

        .comment-navigation .next {
            float: right;
        }

    </style>
    <style>

        .widget {
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
            font-size: 15px;
            /* block styles */
        }

        .widget-woof .woof_container .widget h4, .widget .widget-title, .widget .widget-woof .woof_container h4, .widget .widgettitle {
            font-size: 18px;
            line-height: 22px;
            font-weight: 700;
            padding: 0;
            padding-bottom: 21px;
            margin: 0;
            margin-bottom: 32px !important;
            color: #000;
            font-family: Exo\ 2;
            text-transform: uppercase;
            border-bottom: 1px solid #ececec;
            position: relative;
        }

        @media (max-width: 1199px) {
            .widget-woof .woof_container .widget h4, .widget .widget-title, .widget .widget-woof .woof_container h4, .widget .widgettitle {
                margin-bottom: 20px !important;
            }
        }

        .widget-woof .woof_container .widget h4:after, .widget .widget-title:after, .widget .widget-woof .woof_container h4:after, .widget .widgettitle:after {
            position: absolute;
            content: "";
            bottom: -1px;
            left: 0;
            width: 50px;
            height: 5px;
            background: #bf0d0d;
        }

        .widget-woof .woof_container .widget h4 span, .widget .widget-title span, .widget .widget-woof .woof_container h4 span, .widget .widgettitle span {
            position: relative;
            display: block;
        }

        .widget.nopadding .widget-content {
            padding: 0;
            margin: 0;
        }

        /**
         * Styling Css for widgets in Sidebar Left Static
         */
        .widget-static .widget-title, .widget-static .widget-woof .woof_container h4, .widget-static .widgettitle, .widget-woof .woof_container .widget-static h4 {
            color: #fff;
        }

        .widget-static ul li {
            border: none;
        }

        .sidebar .widget {
            padding: 0;
        }

        .sidebar .widget:not(.widget-woof) {
            margin-bottom: 52px;
        }

        @media (max-width: 1199px) {
            .sidebar .widget:not(.widget-woof) {
                margin-bottom: 30px;
            }
        }

        .sidebar .widget .widget-woof {
            margin-bottom: 0;
        }

        .sidebar .widget .textwidget li {
            padding: 15px 20px;
        }

        .sidebar .widget.widget_sp_image {
            margin-top: 57px;
        }

        @media (max-width: 1199px) {
            .sidebar .widget.widget_sp_image {
                margin-bottom: 35px;
            }
        }

    </style>
    <style>
        .wishlist_table .add_to_cart,
        a.add_to_wishlist.button.alt {
            border-radius: 16px;
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
        }
    </style>
    <style>

        /* 5. Widget */
        .widget ol, .widget ul {
            list-style: none;
            padding: 0;
            margin-bottom: 0;
        }

        /* List Style Widgets*/
        .widget_archive a:before, .widget_categories a:before, .widget_layered_nav a:before, .widget_recent_comments a:first-child:before, .widget_recent_entries a:before {
            margin-right: 10px;
            font-family: FontAwesome;
            color: #1a1a1a;
            display: inline-block;
            font-size: 11px;
            line-height: 22px;
            display: none;
        }

        .widget_archive a:before {
            content: "\f016";
        }

        .widget_recent_entries a:before {
            content: "\f0f6";
        }

        .widget_recent_comments a:first-child:before {
            content: "\f0e5";
        }

        .widget_layered_nav a:before {
            content: "\f0da";
        }

        .widget_categories a:before {
            content: "\f114";
        }

        .widget_categories li ul.children {
            border-top: none;
        }

        .widget_categories li li:last-child, .widget_pages li li:last-child {
            padding-bottom: 0;
        }

        .widget_recent_comments .comment-author-link {
            color: #1a1a1a;
        }

        .widget.widget_archive > ul > li, .widget.widget_categories > ul > li, .widget.widget_links > ul > li, .widget.widget_meta > ul > li, .widget.widget_pages > ul > li, .widget.widget_product_categories > ul > li, .widget.widget_recent_comments > ul > li, .widget.widget_recent_entries > ul > li {
            border-bottom: 1px solid #ececec;
            position: relative;
            margin-bottom: 23px;
            padding-left: 16px;
        }

        .widget.widget_archive > ul > li:last-child, .widget.widget_categories > ul > li:last-child, .widget.widget_links > ul > li:last-child, .widget.widget_meta > ul > li:last-child, .widget.widget_pages > ul > li:last-child, .widget.widget_product_categories > ul > li:last-child, .widget.widget_recent_comments > ul > li:last-child, .widget.widget_recent_entries > ul > li:last-child {
            margin-bottom: 0;
        }

        .widget.widget_archive > ul > li:after, .widget.widget_categories > ul > li:after, .widget.widget_links > ul > li:after, .widget.widget_meta > ul > li:after, .widget.widget_pages > ul > li:after, .widget.widget_product_categories > ul > li:after, .widget.widget_recent_comments > ul > li:after, .widget.widget_recent_entries > ul > li:after {
            position: absolute;
            top: 0;
            left: 0;
            font: normal normal normal 5px/26px FontAwesome;
            content: "\f111";
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
        }

        .widget.widget_archive > ul > li > ul.children, .widget.widget_categories > ul > li > ul.children, .widget.widget_links > ul > li > ul.children, .widget.widget_meta > ul > li > ul.children, .widget.widget_pages > ul > li > ul.children, .widget.widget_product_categories > ul > li > ul.children, .widget.widget_recent_comments > ul > li > ul.children, .widget.widget_recent_entries > ul > li > ul.children {
            margin-bottom: 10px;
        }

        .widget.widget_archive ul li a, .widget.widget_categories ul li a, .widget.widget_links ul li a, .widget.widget_meta ul li a, .widget.widget_pages ul li a, .widget.widget_product_categories ul li a, .widget.widget_recent_comments ul li a, .widget.widget_recent_entries ul li a {
            display: inline-block;
            color: #7b7b7b;
            font-size: 14px;
            line-height: 26px;
            padding: 0;
            text-transform: capitalize;
        }

        .widget.widget_archive ul li a:hover, .widget.widget_categories ul li a:hover, .widget.widget_links ul li a:hover, .widget.widget_meta ul li a:hover, .widget.widget_pages ul li a:hover, .widget.widget_product_categories ul li a:hover, .widget.widget_recent_comments ul li a:hover, .widget.widget_recent_entries ul li a:hover {
            color: #bf0d0d;
        }

        .widget.widget_archive ul li .closed, .widget.widget_archive ul li .opened, .widget.widget_categories ul li .closed, .widget.widget_categories ul li .opened, .widget.widget_links ul li .closed, .widget.widget_links ul li .opened, .widget.widget_meta ul li .closed, .widget.widget_meta ul li .opened, .widget.widget_pages ul li .closed, .widget.widget_pages ul li .opened, .widget.widget_product_categories ul li .closed, .widget.widget_product_categories ul li .opened, .widget.widget_recent_comments ul li .closed, .widget.widget_recent_comments ul li .opened, .widget.widget_recent_entries ul li .closed, .widget.widget_recent_entries ul li .opened {
            position: absolute;
            right: 5px;
            top: 8px;
            content: "";
            font-size: 0;
            color: #aaa;
            cursor: pointer;
            width: 11px;
            height: 10px;
            line-height: 13px;
            text-align: center;
        }

        .widget.widget_archive ul li .closed:hover, .widget.widget_archive ul li .opened:hover, .widget.widget_categories ul li .closed:hover, .widget.widget_categories ul li .opened:hover, .widget.widget_links ul li .closed:hover, .widget.widget_links ul li .opened:hover, .widget.widget_meta ul li .closed:hover, .widget.widget_meta ul li .opened:hover, .widget.widget_pages ul li .closed:hover, .widget.widget_pages ul li .opened:hover, .widget.widget_product_categories ul li .closed:hover, .widget.widget_product_categories ul li .opened:hover, .widget.widget_recent_comments ul li .closed:hover, .widget.widget_recent_comments ul li .opened:hover, .widget.widget_recent_entries ul li .closed:hover, .widget.widget_recent_entries ul li .opened:hover {
            color: #bf0d0d;
        }

        .widget.widget_archive ul li .closed, .widget.widget_categories ul li .closed, .widget.widget_links ul li .closed, .widget.widget_meta ul li .closed, .widget.widget_pages ul li .closed, .widget.widget_product_categories ul li .closed, .widget.widget_recent_comments ul li .closed, .widget.widget_recent_entries ul li .closed {
            background: url(../images/opened.png) no-repeat 50% 50%;
        }

        .widget.widget_archive ul li .opened, .widget.widget_categories ul li .opened, .widget.widget_links ul li .opened, .widget.widget_meta ul li .opened, .widget.widget_pages ul li .opened, .widget.widget_product_categories ul li .opened, .widget.widget_recent_comments ul li .opened, .widget.widget_recent_entries ul li .opened {
            background: url(../images/closed.png) no-repeat 50% 50%;
        }

        .widget.widget_archive ul li.current-cat-parent > a, .widget.widget_archive ul li.current-cat > a, .widget.widget_categories ul li.current-cat-parent > a, .widget.widget_categories ul li.current-cat > a, .widget.widget_links ul li.current-cat-parent > a, .widget.widget_links ul li.current-cat > a, .widget.widget_meta ul li.current-cat-parent > a, .widget.widget_meta ul li.current-cat > a, .widget.widget_pages ul li.current-cat-parent > a, .widget.widget_pages ul li.current-cat > a, .widget.widget_product_categories ul li.current-cat-parent > a, .widget.widget_product_categories ul li.current-cat > a, .widget.widget_recent_comments ul li.current-cat-parent > a, .widget.widget_recent_comments ul li.current-cat > a, .widget.widget_recent_entries ul li.current-cat-parent > a, .widget.widget_recent_entries ul li.current-cat > a {
            color: #bf0d0d;
        }

        .widget.widget_archive ul li.cat-parent i, .widget.widget_categories ul li.cat-parent i, .widget.widget_links ul li.cat-parent i, .widget.widget_meta ul li.cat-parent i, .widget.widget_pages ul li.cat-parent i, .widget.widget_product_categories ul li.cat-parent i, .widget.widget_recent_comments ul li.cat-parent i, .widget.widget_recent_entries ul li.cat-parent i {
            color: #7f7f7f;
        }

        .widget.widget_archive ul li.cat-parent i:before, .widget.widget_categories ul li.cat-parent i:before, .widget.widget_links ul li.cat-parent i:before, .widget.widget_meta ul li.cat-parent i:before, .widget.widget_pages ul li.cat-parent i:before, .widget.widget_product_categories ul li.cat-parent i:before, .widget.widget_recent_comments ul li.cat-parent i:before, .widget.widget_recent_entries ul li.cat-parent i:before {
            content: "\f107";
        }

        .widget.widget_archive ul li.cat-parent .children > li, .widget.widget_categories ul li.cat-parent .children > li, .widget.widget_links ul li.cat-parent .children > li, .widget.widget_meta ul li.cat-parent .children > li, .widget.widget_pages ul li.cat-parent .children > li, .widget.widget_product_categories ul li.cat-parent .children > li, .widget.widget_recent_comments ul li.cat-parent .children > li, .widget.widget_recent_entries ul li.cat-parent .children > li {
            padding-left: 12px;
            border: none;
        }

        .widget.widget_archive ul li.cat-parent .children > li a, .widget.widget_categories ul li.cat-parent .children > li a, .widget.widget_links ul li.cat-parent .children > li a, .widget.widget_meta ul li.cat-parent .children > li a, .widget.widget_pages ul li.cat-parent .children > li a, .widget.widget_product_categories ul li.cat-parent .children > li a, .widget.widget_recent_comments ul li.cat-parent .children > li a, .widget.widget_recent_entries ul li.cat-parent .children > li a {
            line-height: 32px;
        }

        .widget.widget_archive ul li ul.children > li, .widget.widget_categories ul li ul.children > li, .widget.widget_links ul li ul.children > li, .widget.widget_meta ul li ul.children > li, .widget.widget_pages ul li ul.children > li, .widget.widget_product_categories ul li ul.children > li, .widget.widget_recent_comments ul li ul.children > li, .widget.widget_recent_entries ul li ul.children > li {
            padding-left: 12px;
            border: none;
        }

        .widget.widget_archive ul li ul.children > li a, .widget.widget_categories ul li ul.children > li a, .widget.widget_links ul li ul.children > li a, .widget.widget_meta ul li ul.children > li a, .widget.widget_pages ul li ul.children > li a, .widget.widget_product_categories ul li ul.children > li a, .widget.widget_recent_comments ul li ul.children > li a, .widget.widget_recent_entries ul li ul.children > li a {
            line-height: 32px;
        }

        .widget.widget_meta abbr[data-original-title], .widget.widget_meta abbr[title] {
            cursor: pointer;
            border-bottom: none;
            text-decoration: none;
        }

        .widget-woof .woof_container .widget.widget_rss h4 a, .widget.widget_rss .widget-title a, .widget.widget_rss .widget-woof .woof_container h4 a {
            font-size: 18px;
            line-height: 22px;
            color: #000;
        }

        .widget-woof .woof_container .widget.widget_rss h4 img, .widget.widget_rss .widget-title img, .widget.widget_rss .widget-woof .woof_container h4 img {
            margin-top: -4px;
        }

        .widget.widget_rss ul li {
            margin-bottom: 25px;
        }

        .widget.widget_rss ul li .rss-date {
            display: block;
        }

        .widget.widget_rss ul li .rssSummary, .widget.widget_rss ul li .rsswidget, .widget.widget_rss ul li cite, .widget.widget_rss ul li span {
            font-size: 14px;
            line-height: 26px;
        }

        .widget.widget_rss ul li cite {
            font-style: normal;
            font-weight: 700;
            display: block;
            margin-top: 10px;
            color: #000;
            text-transform: capitalize;
        }

        .widget.widget_rss ul li:last-child {
            margin-bottom: 0;
        }

        .widget.widget_text .textwidget {
            font-size: 14px;
            line-height: 26px;
        }

        .widget.widget_text .wp-caption {
            padding-top: 0;
            border-left: 0;
            border-right: 0;
            border-bottom: 0;
            margin-bottom: 11px;
        }

        .widget.widget_text img {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .widget.widget_text p.wp-caption-text {
            padding: 0;
            font-weight: 600;
            color: #000;
            font-size: 14px;
            line-height: 34px;
        }

        .widget.widget_nav_menu > ul {
            padding: 0 10px;
        }

        .widget.widget_nav_menu > ul > li, .widget.widget_nav_menu > ul > li > a:first-child {
            padding: 0;
        }

        .widget.widget_nav_menu ul.sub-menu {
            padding-left: 12px;
        }

        .widget.widget_nav_menu ul li {
            line-height: 32px;
            font-size: 14px;
        }

        .widget.widget_tag_cloud .tagcloud {
            margin-top: -10px;
        }

        .widget.widget_tag_cloud .tagcloud a {
            font-size: 13px !important;
            height: 30px;
            line-height: 30px;
            padding: 0 15px;
            color: #7b7b7b;
            background: #fff;
            text-transform: capitalize;
            display: inline-block;
            border: 1px solid #ececec;
            margin-top: 10px;
            margin-right: 3px;
        }

        .widget.widget_tag_cloud .tagcloud a:hover {
            background: #bf0d0d;
            color: #fff;
            border-color: #bf0d0d;
        }

        /* Recent Posts Widget */
        .widget_recent_entries .post-date {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 700;
            margin-top: 5px;
            color: #bf0d0d;
        }

        .widget_wpopal_recent_post .post-widget {
            border: none;
        }

        .widget_wpopal_recent_post .item-post.media {
            border-top: 1px solid #ececec;
            padding-top: 20px;
            padding-bottom: 20px;
            margin: 0;
        }

        .widget_wpopal_recent_post .item-post.media:first-child {
            border-top: none;
        }

        .widget_wpopal_recent_post .item-post.media a.image {
            width: 100px;
            padding-left: 20px;
        }

        .widget_wpopal_recent_post .item-post.media .media-body .entry-title {
            padding-right: 15px;
        }

        .widget_wpopal_recent_post .item-post.media .media-body > p {
            display: none;
        }

        .widget_wpopal_recent_post .post-stick-layout .item-post.media.item-big {
            border-top: none;
        }

        .widget_wpopal_recent_post .post-stick-layout .item-post.media.item-big a.image {
            padding-right: 0;
            width: 100%;
            margin-bottom: 10px;
        }

        .widget_wpopal_recent_post .post-stick-layout .item-post.media.item-big .entry-title {
            margin: 0 0 10px;
            font-weight: 700;
            font-size: 14px;
            line-height: 20px;
        }

        .widget_wpopal_recent_post .post-stick-layout .item-post.media {
            padding-top: 15px;
        }

        .widget_wpopal_recent_post .post-stick-layout .item-post.media .media-body .entry-title {
            margin: 0 0 5px;
        }

        .widget_wpopal_recent_post .post-stick-layout .item-post.media .post-date {
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 700;
            color: #bf0d0d;
        }

        /* Search Widget */
        .widget_search .btn-search input {
            border: none;
        }

        /* Text Widget */
        .widget_text > div > :last-child {
            margin-bottom: 0;
        }

        /* widget image */
        .widget_sp_image {
            padding: 0 !important;
        }

        /* Calendar Widget*/
        .widget_calendar table {
            line-height: 2;
            margin: 0;
        }

        .widget_calendar caption {
            margin-bottom: 5px;
            font-size: 14px;
            padding: 0;
            text-transform: capitalize;
        }

        .widget_calendar thead th {
            background: #f5f5f5;
        }

        .widget_calendar tbody td, .widget_calendar thead th {
            text-align: center;
        }

        .widget_calendar tbody a {
            background-color: #bf0d0d;
            color: #fff !important;
            display: block;
        }

        .widget_calendar tbody a:hover {
            background-color: #0f0f0f;
        }

        .widget_calendar #prev {
            padding-left: 5px;
        }

        .widget_calendar #next {
            padding-right: 5px;
            text-align: right;
        }

        .widget_calendar #today {
            background-color: #bf0d0d;
            color: #fff;
        }

        .widget_calendar #today:hover {
            background-color: #a70b0b;
        }

    </style>
    <style>
        .sidebar .widget_wpopal_latest_posts {
            border-bottom: none;
        }

        .sidebar .blog-post, .sidebar article.post {
            margin-top: 18px;
        }

        .sidebar .blog-post .content-blog, .sidebar article.post .content-blog {
            background: #fff;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .sidebar .blog-post .image-thumnail, .sidebar article.post .image-thumnail {
            width: 115px;
            float: left;
        }

        .sidebar .blog-post .bottom-blog, .sidebar article.post .bottom-blog {
            width: calc(100% - 115px);
            float: left;
            padding-left: 10px;
        }

        .sidebar .blog-post .bottom-blog .title-post, .sidebar article.post .bottom-blog .title-post {
            font-size: 13px;
            line-height: 18px;
            margin: 0;
            font-family: Exo\ 2;
        }

        .sidebar .blog-post .bottom-blog .title-post a, .sidebar article.post .bottom-blog .title-post a {
            color: #000;
        }

        .sidebar .blog-post .bottom-blog .title-post a:hover, .sidebar article.post .bottom-blog .title-post a:hover {
            color: #bf0d0d;
        }

        .sidebar .blog-post .bottom-blog .author, .sidebar .blog-post .bottom-blog .date i, .sidebar article.post .bottom-blog .author, .sidebar article.post .bottom-blog .date i {
            display: none;
        }

        .sidebar .blog-post .bottom-blog .date .entry-date span, .sidebar article.post .bottom-blog .date .entry-date span {
            font-size: 12px;
            color: #7b7b7b;
        }
    </style>
    <style>
        .owl-carousel .owl-wrapper:after {
            content: ".";
            display: block;
            clear: both;
            visibility: hidden;
            line-height: 0;
            height: 0;
        }

        .owl-carousel-play:not(.image-additional) {
            position: relative;
            margin-right: -15px;
            margin-left: -15px;
        }

        /* display none until init */
        .owl-carousel {
            display: none;
            position: relative;
            width: 100%;
            -ms-touch-action: pan-y;
        }

        .owl-carousel .owl-wrapper {
            display: none;
            position: relative;
            -webkit-transform: translateZ(0);
        }

        .owl-carousel .owl-wrapper-outer {
            overflow: hidden;
            position: relative;
            width: 100%;
            height: auto !important;
            /*rtl:ignore*/
            direction: ltr !important;
            /*rtl:begin:ignore*/
            /*rtl:end:ignore*/
        }

        .owl-carousel .owl-wrapper-outer .item, .owl-carousel .owl-wrapper-outer .product-carousel-item {
            direction: ltr !important;
        }

        .owl-carousel .owl-wrapper-outer.autoHeight {
            -webkit-transition: height .5s ease-in-out;
            -moz-transition: height .5s ease-in-out;
            -ms-transition: height .5s ease-in-out;
            -o-transition: height .5s ease-in-out;
            transition: height .5s ease-in-out;
        }

        .owl-carousel .owl-item {
            /*rtl:ignore*/
            float: left;
            padding: 0 15px;
        }

        .owl-carousel.carousel-nopadding .owl-item {
            padding: 0;
        }

        .owl-controls .owl-buttons div, .owl-controls .owl-page {
            cursor: pointer;
        }

        .owl-controls .owl-buttons div {
            position: absolute;
        }

        .owl-controls .owl-buttons .owl-prev {
            left: 10px;
            top: 50%;
        }

        .owl-controls .owl-buttons .owl-next {
            right: 10px;
            top: 50%;
        }
    </style>
    <style>

        .single-post .opal-social-share {
            position: relative;
            padding-left: 60px;
            margin-top: -35px;
            margin-bottom: 15px;
        }

        .single-post .opal-social-share [class^=bo-social-] {
            font-size: 20px;
            background: transparent;
            color: #7b7b7b;
            margin: 0;
        }

        .single-post .opal-social-share [class^=bo-social-] a {
            line-height: 35px;
            width: 35px;
            height: 35px;
        }

        .single-post .opal-social-share [class^=bo-social-]:hover {
            background: transparent;
            color: #bf0d0d;
        }

        .single-post .opal-social-share:before {
            position: absolute;
            top: 0;
            left: 0;
            content: "Share:";
            line-height: 35px;
            color: #0f0f0f;
            font-size: 15px;
            font-weight: 600;
        }

        .single-post .content-detail .owl-carousel-play .owl-item {
            padding: 0;
        }

        @media (max-width: 992px) {
            .single-post .content-detail .kc-row-container.kc-container {
                padding: 0;
            }
        }

        .single-post article.post {
            border: none;
            display: inline-block;
            width: 100%;
        }

        .single-post article.post div.page-links, .single-post article.post footer.entry-meta {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .single-post article .content-image {
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            overflow: hidden;
        }

        .single-post article .post-thumbnail img {
            width: 100%;
        }

        .single-post article .entry-meta.meta-category {
            font-size: 14px;
            line-height: 26px;
            color: #0f0f0f;
            font-weight: 600;
        }

        .single-post article .entry-meta .entry-date.entry-date-singer {
            display: inline-block !important;
        }

        .single-post article h1.entry-title {
            font-size: 28px;
            line-height: 32px;
            margin-top: 33px;
        }

        @media (max-width: 992px) {
            .single-post article h1.entry-title {
                font-size: 18px;
                line-height: 24px;
                margin-top: 15px;
            }
        }

        .single-post .entry-content {
            margin-top: 15px !important;
        }

        @media (min-width: 992px) {
            .single-post .entry-content .kc_column {
                padding: 0;
            }
        }

        .single-post .entry-content .kc_column .kc_text_block {
            padding: 0;
        }

        .single-post .entry-content p {
            margin-bottom: 15px !important;
            line-height: 26px;
        }

        .single-post .entry-content p a {
            color: #bf0d0d;
        }

        .single-post .entry-content p a:hover {
            text-decoration: underline;
        }

        .single-post .entry-content p span {
            font-family: Arial !important;
            font-size: 14px !important;
        }

        .single-post .entry-content b, .single-post .entry-content strong {
            color: #0f0f0f;
            font-size: 15px;
        }

        .single-post .entry-content ul {
            margin: 0;
            padding-left: 15px;
        }

        .single-post .entry-content ul li {
            font-size: 14px;
            line-height: 26px;
            font-weight: 400;
        }

        .author article.post h3.entry-title {
            font-size: 28px;
            line-height: 32px;
        }

    </style>
    <style>
        .tag-links {
            margin-top: -10px;
        }

        .tag-links a {
            font-size: 13px !important;
            height: 30px;
            line-height: 30px;
            padding: 0 15px;
            color: #7b7b7b;
            background: #fff;
            text-transform: capitalize;
            display: inline-block;
            border: 1px solid #ececec;
            margin-top: 10px;
            margin-right: 7px;
        }

        .tag-links a:hover {
            background: #bf0d0d;
            color: #fff;
            border-color: #bf0d0d;
        }

    </style>

    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            max-width: 100%;
            vertical-align: middle;
        }

        body {
            font-family: Arial;
            font-size: 14px;
            line-height: 1.62857;
            font-weight: 400;
            color: #7b7b7b;
            background-color: #fff;
        }

        .entry-meta {
            clear: both;
            color: #b0b0b0;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 15px;
            margin-top: 15px;
            width: 100%;
            overflow: hidden;
        }
    </style>
    <style>
        .cat-links {
            /* 	font-weight: 900; */
            text-transform: capitalize;
        }

        .cat-links a {
            font-weight: 400;
            color: #7b7b7b;
        }

        .cat-links a:hover {
            color: #bf0d0d;
        }

        .byline {
            display: none;
        }

        #comments #respond {
            padding: 0;
        }

        #comments #respond h4.title {
            font-size: 24px;
            margin-top: 0;
            color: #0f0f0f;
            font-family: Exo\ 2;
        }

        .entry-meta {
            clear: both;
            color: #b0b0b0;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 15px;
            margin-top: 15px;
            width: 100%;
            overflow: hidden;
        }

        .entry-meta > div {
            display: inline-block;
            color: #b0b0b0;
            font-size: 14px;
            text-transform: capitalize;
            margin-right: 25px;
        }

        .entry-meta > div i {
            display: none;
        }

        .entry-meta > div:before {
            font-family: FontAwesome;
            font-size: 14px;
            margin-right: 7px;
        }

        .entry-meta > div.author:before {
            content: "\f007";
        }

        .entry-meta > div.comments-link:before {
            content: "\f075";
        }

        .entry-meta > div.entry-date-singer:before {
            content: "\f073";
        }

        .entry-meta > div:hover {
            color: #bf0d0d;
        }

        .entry-meta > div:hover a {
            color: #bf0d0d !important;
        }

        .entry-meta > div:not(.author):not(.comments-link):not(.entry-date) {
            display: none;
        }

        .entry-meta span {
            display: inline-block;
        }

        .entry-meta span.comments-link {
            padding: 14px 0 0;
        }

        .entry-meta span.edit-link {
            margin-top: 0;
        }

        .entry-meta .featured-post {
            padding-top: 17px;
            text-transform: capitalize;
            color: #b6b7b6;
            font-size: 10px;
            font-weight: 400;
            margin-left: 5px;
        }

        .entry-meta .featured-post i {
            font-size: 12px;
        }

        .entry-meta .fa {
            margin-right: 5px;
        }

        .entry-category ul {
            margin: 0;
            display: inline-block;
            padding: 0;
        }

        .entry-category ul li {
            margin-right: 12px;
            padding: 0;
            list-style: none;
            float: left;
            position: relative;
        }

        .entry-category ul li:after {
            position: absolute;
            top: 0;
            right: -9px;
            content: "/";
        }

        .entry-category ul li:last-child:after {
            display: none;
        }

        #commentform #submit {
            padding: 0 20px;
            height: 38px;
        }

    </style>
    <style>
        .navigation.post-navigation {
            background: #fff;
        }

        .nav-links {
            margin-bottom: 0;
            border: 1px solid #ececec;
            position: relative;
        }

        .nav-links:before {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            width: 1px;
            height: 100%;
            background: #ececec;
            content: "";
            display: block;
            margin: auto;
        }

        .nav-links a {
            display: block;
            float: left;
            width: 50%;
        }

        .nav-links a > div {
            padding-bottom: 20px;
            padding-top: 20px;
            font-size: 14px;
            line-height: 26px;
            float: none !important;
            position: relative;
        }

        @media (max-width: 767px) {
            .nav-links a > div {
                padding-bottom: 10px;
                padding-top: 10px;
                font-size: 12px;
            }
        }

        .nav-links a > div.pull-right {
            text-align: right;
            padding-right: 30px;
        }

        @media (max-width: 767px) {
            .nav-links a > div.pull-right {
                padding-right: 12px;
            }
        }

        .nav-links a > div.pull-right:after {
            font-family: FontAwesome;
            content: "\f105";
            margin-left: 7px;
            font-size: 16px;
        }

        .nav-links a > div.pull-right .meta-nav {
            display: none;
        }

        .nav-links a > div.pull-left {
            text-align: left;
            padding-left: 30px;
        }

        @media (max-width: 767px) {
            .nav-links a > div.pull-left {
                padding-left: 12px;
            }
        }

        .nav-links a > div.pull-left:before {
            font-family: FontAwesome;
            content: "\f104";
            margin-right: 5px;
            font-size: 16px;
        }

        .nav-links a > div.pull-left .meta-nav {
            display: none;
        }

        .nav-links .meta-nav {
            display: block;
            text-transform: uppercase;
            font-size: 14px;
            margin-bottom: 7px;
            position: relative;
        }

    </style>
    <style>

        /** SOCIAL ICONS ***/
        .bo-social-icons [class^=bo-social-] {
            color: #fff;
            display: inline-block;
            margin: 0 4px;
            overflow: hidden;
            text-decoration: none;
            text-align: center;
            vertical-align: top;
            line-height: 25px;
            width: 25px;
            height: 25px;
            -webkit-transition: all .35s ease-in-out;
            -o-transition: all .35s ease-in-out;
            transition: all .35s ease-in-out;
        }

        .bo-social-icons [class^=bo-social-]:hover {
            background: #bf0d0d;
            border-radius: 0;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -ms-border-radius: 0;
            -o-border-radius: 0;
        }

        .bo-social-icons [class^=bo-social-] > .fa {
            line-height: 25px;
        }

        .bo-social-icons .bo-social-white {
            background: #fff;
            color: #a0a0a0;
            border: 1px solid #a0a0a0;
        }

        .bo-social-icons .bo-social-outline {
            background: transparent;
            color: #000;
            border: 1px solid #000;
        }

        .bo-social-icons .bo-social-outline-light {
            background: transparent;
            color: #fff;
            border: 1px solid #fff;
        }

        .bo-social-icons .bo-social-outline-light:hover {
            background: #fff;
            color: #000;
            border-color: #000;
        }

        .bo-sicolor .bo-social-facebook {
            background: #3d75b9;
        }

        .bo-sicolor .bo-social-instagram {
            background: #4c799f;
        }

        .bo-sicolor .bo-social-pinterest {
            background: #e3c210;
        }

        .bo-sicolor .bo-social-twitter {
            background: #00bff3;
        }

        .bo-sicolor .bo-social-google {
            background: #ed1c24;
        }

        .bo-sicolor .bo-social-linkedin {
            background: #7da7d9;
        }

        .bo-sicolor .bo-social-dribbble {
            background: #ef5b92;
        }

        .bo-sicolor .bo-social-duckduckgo {
            background: #de3100;
        }

        .bo-sicolor .bo-social-aim {
            background: #158799;
        }

        .bo-sicolor .bo-social-delicious {
            background: #183864;
        }

        .bo-sicolor .bo-social-paypal {
            background: #32689a;
        }

        .bo-sicolor .bo-social-android {
            background: #8ab733;
        }

        .bo-sicolor .bo-social-gplus {
            background: #d94a39;
        }

        .bo-sicolor .bo-social-lanyrd {
            background: #3879ba;
        }

        .bo-sicolor .bo-social-stumbleupon {
            background: #ea4b24;
        }

        .bo-sicolor .bo-social-fivehundredpx {
            background: #00a6e1;
        }

        .bo-sicolor .bo-social-envelope {
            background: #0e0808;
        }

        .bo-sicolor .bo-social-bitcoin {
            background: #f7931a;
        }

        .bo-sicolor .bo-social-w3c {
            background: #005a9c;
        }

        .bo-sicolor .bo-social-foursquare {
            background: #3bb7e8;
        }

        .bo-sicolor .bo-social-html5 {
            background: #e44e26;
        }

        .bo-sicolor .bo-social-ie {
            background: #0cf;
        }

        .bo-sicolor .bo-social-grooveshark {
            background: #f66f00;
        }

        .bo-sicolor .bo-social-ninetyninedesigns {
            background: #ff5501;
        }

        .bo-sicolor .bo-social-forrst {
            background: #223f17;
        }

        .bo-sicolor .bo-social-spotify {
            background: #8fbd05;
        }

        .bo-sicolor .bo-social-reddit {
            background: #ff4500;
        }

        .bo-sicolor .bo-social-gowalla {
            background: #f6911d;
        }

        .bo-sicolor .bo-social-apple {
            background: #5f5f5f;
        }

        .bo-sicolor .bo-social-blogger {
            background: #fb9241;
        }

        .bo-sicolor .bo-social-cc {
            background: #5e7c00;
        }

        .bo-sicolor .bo-social-evernote {
            background: #61b239;
        }

        .bo-sicolor .bo-social-flickr {
            background: #ff0084;
        }

        .bo-sicolor .bo-social-viadeo {
            background: #f5a433;
        }

        .bo-sicolor .bo-social-instapaper {
            background: #eaec08;
        }

        .bo-sicolor .bo-social-klout {
            background: #e34600;
        }

        .bo-sicolor .bo-social-meetup {
            background: #e51938;
        }

        .bo-sicolor .bo-social-vk {
            background: #587da4;
        }

        .bo-sicolor .bo-social-disqus {
            background: #2e9fff;
        }

        .bo-sicolor .bo-social-rss {
            background: #ff7f00;
        }

        .bo-sicolor .bo-social-skype {
            background: #18b7f1;
        }

        .bo-sicolor .bo-social-youtube {
            background: #c4302b;
        }

        .bo-sicolor .bo-social-vimeo {
            background: #01557a;
        }

        .bo-sicolor .bo-social-windows {
            background: #0cf;
        }

        .bo-sicolor .bo-social-xing {
            background: #036567;
        }

        .bo-sicolor .bo-social-yahoo {
            background: #61399d;
        }

        .bo-sicolor .bo-social-chrome {
            background: #58b947;
        }

        .bo-sicolor .bo-social-macstore {
            background: #6e6e6e;
        }

        .bo-sicolor .bo-social-amazon {
            background: #f90;
        }

        .bo-sicolor .bo-social-steam {
            background: #a5a4a1;
        }

        .bo-sicolor .bo-social-dropbox {
            background: #7ab6ec;
        }

        .bo-sicolor .bo-social-cloudapp {
            background: #489dde;
        }

        .bo-sicolor .bo-social-ebay {
            background: #86b817;
        }

        .bo-sicolor .bo-social-github {
            background: #667f8e;
        }

        .bo-sicolor .bo-social-googleplay {
            background: #5befd0;
        }

        .bo-sicolor .bo-social-itunes {
            background: #177ac8;
        }

        .bo-sicolor .bo-social-plurk {
            background: #a73d07;
        }

        .bo-sicolor .bo-social-songkick {
            background: #f80046;
        }

        .bo-sicolor .bo-social-lastfm {
            background: #c60e16;
        }

        .bo-sicolor .bo-social-gmail {
            background: #e04a3f;
        }

        .bo-sicolor .bo-social-pinboard {
            background: #224cf4;
        }

        .bo-sicolor .bo-social-openid {
            background: #be661b;
        }

        .bo-sicolor .bo-social-quora {
            background: #c41a00;
        }

        .bo-sicolor .bo-social-soundcloud {
            background: #ff5c00;
        }

        .bo-sicolor .bo-social-tumblr {
            background: #395874;
        }

        .bo-sicolor .bo-social-eventasaurus {
            background: #b9f15e;
        }

        .bo-sicolor .bo-social-wordpress {
            background: #464646;
        }

        .bo-sicolor .bo-social-yelp {
            background: #c41200;
        }

        .bo-sicolor .bo-social-intensedebate {
            background: #00aeef;
        }

        .bo-sicolor .bo-social-eventbrite {
            background: #ff6c00;
        }

        .bo-sicolor .bo-social-scribd {
            background: #002939;
        }

        .bo-sicolor .bo-social-posterous {
            background: #f8d667;
        }

        .bo-sicolor .bo-social-stripe {
            background: #617ee8;
        }

        .bo-sicolor .bo-social-opentable {
            background: #900;
        }

        .bo-sicolor .bo-social-dwolla {
            background: #ff7404;
        }

        .bo-sicolor .bo-social-appnet {
            background: #1e0c29;
        }

        .bo-sicolor .bo-social-statusnet {
            background: #fb6104;
        }

        .bo-sicolor .bo-social-acrobat {
            background: red;
        }

        .bo-sicolor .bo-social-drupal {
            background: #007dc3;
        }

        .bo-sicolor .bo-social-pocket {
            background: #ee4056;
        }

        .bo-sicolor .bo-social-bitbucket {
            background: #205081;
        }

        .bo-sicolor .bo-social-flattr {
            background: #fbbc23;
        }

        .bo-sicolor .bo-social-eventful {
            background: #06c;
        }

        .bo-sicolor .bo-social-smashmag {
            background: #d6231c;
        }

        .bo-sicolor .bo-social-wordpress {
            background: #1e8cbe;
        }

        .bo-sicolor .bo-social-calendar {
            background: red;
        }

        .bo-sicolor .bo-social-call {
            background: #04be3d;
        }

        .bo-sicolor .bo-social-guest {
            background: #03a9d2;
        }

        .bo-sicolor .bo-social-weibo {
            background: #fd0000;
        }

        .bo-sicolor .bo-social-plancast {
            background: #e4b82c;
        }

        .bo-sicolor .bo-social-email {
            background: blue;
        }

        .bo-sicolor .bo-social-myspace {
            background: #2068b0;
        }

        .bo-sicolor .bo-social-podcast {
            background: #f38b36;
        }

        .bo-sicolor .bo-social-cart {
            background: #00a204;
        }

        .bo-sicolor.social {
            padding: 20px 0;
            list-style: none;
            margin: 0;
        }

        .bo-sicolor.social li {
            font-size: 16px;
            padding: 7px 0;
            text-align: center;
            display: table-cell;
            width: 25%;
            border-left: 1px solid #313131;
        }

        .bo-sicolor.social li:first-child {
            border-left: 0;
        }

        .bo-sicolor.social li a {
            padding: 0 !important;
        }

        .bo-sicolor.social li a i {
            background: transparent !important;
            margin-left: 3px;
        }

        .bo-sicolor.social li a i:hover {
            color: #bf0d0d;
        }

        /* --- SCSS For Typography --- */
        .dropcap {
            color: #000;
            float: left;
            font-weight: 800;
            line-height: 48px;
            width: 60px;
            height: 60px;
            margin-right: 10px;
            padding: 3px 10px 2px;
            text-transform: uppercase;
            text-align: center;
            font-size: 48px;
        }

        .dropcap.dropcap-v2 {
            color: #fff;
            background: #1a1a1a;
        }

        .dropcap.dropcap-info {
            background: #4384f6;
        }

        .dropcap.dropcap-danger {
            background: #e93434;
        }

        .dropcap.dropcap-success {
            background: #70ba28;
        }

        .dropcap.dropcap-warning {
            background: #f0c73b;
        }
    </style>


@endsection
@section('content')
    <div class="post-template-default single single-post postid-3272 single-format-image kingcomposer kc-css-system masthead-fixed singular">
        <div id="page" class="hfeed site page-home-1" style="background-color: #FFFFFF">
            <div class="opal-page-inner row-offcanvas row-offcanvas-left">
                <section id="main" class="site-main">
                    <section id="main-container" class="container mainright">
                        <div class="row">
                            @include('blog.side-bar')
                            <div id="main-content" class="main-content col-sm-12 col-lg-9 col-md-9">

                                <div id="primary" class="content-area">
                                    <div id="content" class="site-content" role="main">
                                        <article id="post-3272"
                                                 class="post-3272 post type-post status-publish format-image has-post-thumbnail hentry category-accessories category-actions category-business-use category-commercial-use category-fashion category-fly-high category-uncategorized tag-html tag-media tag-php tag-web-design post_format-post-format-image">

                                            <div class="content-detail">

                                                <div class="content-image">


                                                    <div class="post-thumbnail">
                                                        <img width="1665" height="1143"
                                                             src="{{asset("_img/posts/$post->main_img")}}"
                                                             sizes="(max-width: 1665px) 100vw, 1665px"></div>


                                                </div>

                                                <div class="content">
                                                    <div class="bottom blog">
                                                        <header class="entry-header">

                                                            <h1 class="entry-title">Understanding gym prices: what are
                                                                you really paying …</h1>
                                                            <div class="entry-meta">


                                                                <div class="comments-link"><a
                                                                            href="http://demo3.wpopal.com/exgym/2017/04/03/understanding-gym-prices-what-are-you-really-paying/#respond"
                                                                            class="comments-link">No comments</a></div>


                                                                <div class="author "><a
                                                                            href="http://demo3.wpopal.com/exgym/author/admin/"
                                                                            title="Posts by admin"
                                                                            rel="author">admin</a></div>


                                                                <div class="entry-date entry-date-singer">
                                                                    <span>03</span>&nbsp;Apr&nbsp;
                                                                </div>


                                                                <div class="entry-category pull-left">
                                                                    in
                                                                    <ul class="post-categories">
                                                                        <li>
                                                                            <a href="http://demo3.wpopal.com/exgym/category/accessories/"
                                                                               rel="category tag">Accessories</a></li>
                                                                        <li>
                                                                            <a href="http://demo3.wpopal.com/exgym/category/actions/"
                                                                               rel="category tag">Actions</a></li>
                                                                        <li>
                                                                            <a href="http://demo3.wpopal.com/exgym/category/business-use/"
                                                                               rel="category tag">Business Use</a></li>
                                                                        <li>
                                                                            <a href="http://demo3.wpopal.com/exgym/category/commercial-use/"
                                                                               rel="category tag">Commercial Use</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="http://demo3.wpopal.com/exgym/category/fashion/"
                                                                               rel="category tag">Fashion</a></li>
                                                                        <li>
                                                                            <a href="http://demo3.wpopal.com/exgym/category/fly-high/"
                                                                               rel="category tag">Fly High</a></li>
                                                                        <li>
                                                                            <a href="http://demo3.wpopal.com/exgym/category/uncategorized/"
                                                                               rel="category tag">Uncategorized</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="tag-link">
                                                                    <a href="http://demo3.wpopal.com/exgym/tag/html/"
                                                                       rel="tag">HTML</a>/<a
                                                                            href="http://demo3.wpopal.com/exgym/tag/media/"
                                                                            rel="tag">media</a>/<a
                                                                            href="http://demo3.wpopal.com/exgym/tag/php/"
                                                                            rel="tag">PHP</a>/<a
                                                                            href="http://demo3.wpopal.com/exgym/tag/web-design/"
                                                                            rel="tag">web design</a></div>

                                                            </div>
                                                            <!-- .entry-meta -->

                                                            <div class="entry-content">
                                                                <div class="kc_clfw"></div>
                                                                <section class="kc-elm kc-css-547646 kc_row">
                                                                    <div class="kc-row-container  kc-container">
                                                                        <div class="kc-wrap-columns">
                                                                            <div class="kc-elm kc-css-52896 kc_col-sm-12 kc_column kc_col-sm-12">
                                                                                <div class="kc-col-container">
                                                                                    <div class="kc-elm kc-css-352529 kc_text_block">
                                                                                        <p>{!! $post->article !!}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                            <!-- .entry-content -->


                                                        </header>
                                                        <!-- .entry-header -->

                                                        <div class="entry-meta meta-category">
                                                            <span class="cat-links">Category: <a
                                                                        href="http://demo3.wpopal.com/exgym/category/accessories/"
                                                                        rel="category tag">Accessories</a>, <a
                                                                        href="http://demo3.wpopal.com/exgym/category/actions/"
                                                                        rel="category tag">Actions</a>, <a
                                                                        href="http://demo3.wpopal.com/exgym/category/business-use/"
                                                                        rel="category tag">Business Use</a>, <a
                                                                        href="http://demo3.wpopal.com/exgym/category/commercial-use/"
                                                                        rel="category tag">Commercial Use</a>, <a
                                                                        href="http://demo3.wpopal.com/exgym/category/fashion/"
                                                                        rel="category tag">Fashion</a>, <a
                                                                        href="http://demo3.wpopal.com/exgym/category/fly-high/"
                                                                        rel="category tag">Fly High</a>, <a
                                                                        href="http://demo3.wpopal.com/exgym/category/uncategorized/"
                                                                        rel="category tag">Uncategorized</a></span>
                                                        </div>
                                                        <!-- .entry-meta -->

                                                        <footer class="entry-meta"><span class="tag-links"><a
                                                                        href="http://demo3.wpopal.com/exgym/tag/html/"
                                                                        rel="tag">HTML</a><a
                                                                        href="http://demo3.wpopal.com/exgym/tag/media/"
                                                                        rel="tag">media</a><a
                                                                        href="http://demo3.wpopal.com/exgym/tag/php/"
                                                                        rel="tag">PHP</a><a
                                                                        href="http://demo3.wpopal.com/exgym/tag/web-design/"
                                                                        rel="tag">web design</a></span></footer>


                                                    </div>
                                                </div>
                                            </div>

                                        </article>
                                        <!-- #post-## -->
                                        <div class="opal-social-share">
                                            <div class="bo-social-icons bo-sicolor social-radius-rounded">

                                                <a class="bo-social-facebook" data-toggle="tooltip" data-placement="top"
                                                   data-animation="true" data-original-title="Facebook"
                                                   href="http://www.facebook.com/sharer.php?s=100&p[url]={{url("blog/post/$post->url")}}&p[title]={{$post->title}}"
                                                   target="_blank" title="Share on facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>


                                                <a class="bo-social-twitter" data-toggle="tooltip" data-placement="top"
                                                   data-animation="true" data-original-title="Twitter"
                                                   href="http://twitter.com/home?status={{$post->title}} {{url("blog/post/$post->url")}}"
                                                   target="_blank" title="Share on Twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>


                                                <a class="bo-social-linkedin" data-toggle="tooltip" data-placement="top"
                                                   data-animation="true" data-original-title="LinkedIn"
                                                   href="http://linkedin.com/shareArticle?mini=true&amp;url={{url("blog/post/$post->url")}}&title={{$post->title}}"
                                                   target="_blank" title="Share on LinkedIn">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>


                                                <a class="bo-social-google" data-toggle="tooltip" data-placement="top"
                                                   data-animation="true" data-original-title="Google plus"
                                                   href="https://plus.google.com/share?url={{url("blog/post/$post->url")}}"
                                                   onclick="javascript:window.open(this.href,
	'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"
                                                   title="Share on Google plus">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>


                                                <a class="bo-social-pinterest" data-toggle="tooltip"
                                                   data-placement="top" data-animation="true"
                                                   data-original-title="Pinterest"
                                                   href="http://pinterest.com/pin/create/button/?url={{url("blog/post/$post->url")}}&amp;description={{$post->description}}&amp;media={{asset("_img/posts/$post->main_img")}}"
                                                   target="_blank" title="Share on Pinterest">
                                                    <i class="fa fa-pinterest"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <nav class="navigation post-navigation" role="navigation">
                                            <h3 class="screen-reader-text">Post navigation</h3>
                                            <div class="nav-links clearfix">
                                                @isset($previous)
                                                    <a href="{{url("blog/post/$previous->url")}}" rel="prev">
                                                        <div class="pull-left"><span
                                                                    class="meta-nav">Previous Post</span>{{$previous->title}}
                                                        </div>
                                                    </a>
                                                @endisset
                                                @isset($next)
                                                    <a href="{{url("blog/post/$next->url")}}"
                                                       rel="next">
                                                        <div class="pull-right"><span
                                                                    class="meta-nav">Next Post</span><span>{{$next->title}}</span>
                                                        </div>
                                                    </a>
                                                @endisset

                                            </div>
                                            <!-- .nav-links -->
                                        </nav>
                                        <!-- .navigation -->
                                        <div id="comments" class="comments">


                                            <div class="commentform row reset-button-default">
                                                <div class="col-sm-12">
                                                    <div id="respond" class="comment-respond">
                                                        <h3 id="reply-title" class="comment-reply-title"></h3>
                                                        <h4 class="title">Leave a Comment</h4>
                                                        <small><a rel="nofollow" id="cancel-comment-reply-link"
                                                                  href="/exgym/2017/04/03/understanding-gym-prices-what-are-you-really-paying/#respond"
                                                                  style="display:none;">Cancel reply</a></small>
                                                        <form action="http://demo3.wpopal.com/exgym/wp-comments-post.php"
                                                              method="post" id="commentform" class="comment-form"
                                                              novalidate="">
                                                            <div class="form-group h-info">Your email address will not
                                                                be published.
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="field-label"
                                                                       for="comment">Comment:</label>
                                                                <textarea rows="8" id="comment" class="form-control"
                                                                          name="comment"
                                                                          aria-required="true"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="author">Name:</label>
                                                                <input type="text" name="author" class="form-control"
                                                                       id="author" value="" aria-required="true">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email:</label>
                                                                <input id="email" name="email" class="form-control"
                                                                       type="text" value="" aria-required="true">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="url">Website:</label>
                                                                <input id="url" name="url" class="form-control"
                                                                       type="text" value="">
                                                            </div>
                                                            <p class="form-submit"><input name="submit" type="submit"
                                                                                          id="submit"
                                                                                          class="btn btn-primary submit"
                                                                                          value="Post Comment"> <input
                                                                        type="hidden" name="comment_post_ID"
                                                                        value="3272" id="comment_post_ID">
                                                                <input type="hidden" name="comment_parent"
                                                                       id="comment_parent" value="0">
                                                            </p>
                                                            <p style="display: none;"><input type="hidden"
                                                                                             id="akismet_comment_nonce"
                                                                                             name="akismet_comment_nonce"
                                                                                             value="14df4046ea"></p>
                                                            <p style="display: none;"></p> <input type="hidden"
                                                                                                  id="ak_js"
                                                                                                  name="ak_js"
                                                                                                  value="1528805445897">
                                                        </form>
                                                    </div>
                                                    <!-- #respond -->
                                                </div>
                                            </div>
                                            <!-- end commentform -->
                                        </div>
                                        <!-- end comments -->
                                        <div class="related-posts">
                                            <div class="widget widget-style">
                                                <h4 class="related-post-title widget-title">
                                                    <span>Related posts</span>
                                                </h4>

                                                <div class="related-posts-content widget-content  owl-carousel-play"
                                                     id="postcarousel-JNunA" data-ride="carousel">

                                                    <div class="carousel-controls_v1 carousel-hidden">
                                                        <a href="#postcarousel-JNunA" data-slide="prev"
                                                           class="left carousel-control carousel-xs">
                                                            <span class="fa fa-angle-left"></span>
                                                        </a>
                                                        <a href="#postcarousel-JNunA" data-slide="next"
                                                           class="right carousel-control carousel-xs">
                                                            <span class="fa fa-angle-right"></span>
                                                        </a>
                                                    </div>
                                                    <div class="owl-carousel owl-theme" data-slide="2"
                                                         data-singleitem="true" data-navigation="true"
                                                         data-pagination="true" style="opacity: 1; display: block;">
                                                        <div class="owl-wrapper-outer autoHeight"
                                                             style="height: 523px;">
                                                            <div class="owl-wrapper"
                                                                 style="width: 2976px; left: 0px; display: block;">
                                                                <div class="owl-item first" style="width: 248px;">
                                                                    <div class="carouse-item">
                                                                        <article id="post-2507"
                                                                                 class="post-2507 post type-post status-publish format-image has-post-thumbnail hentry category-fashion category-fly-high category-uncategorized post_format-post-format-image">

                                                                            <div class="content-full">

                                                                                <div class="content-image">

                                                                                    <img width="570" height="391"
                                                                                         src="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog1-570x391.jpg"
                                                                                         class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                         alt=""
                                                                                         srcset="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog1-570x391.jpg 570w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog1-870x597.jpg 870w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog1-768x527.jpg 768w"
                                                                                         sizes="(max-width: 570px) 100vw, 570px">
                                                                                    <div class="top-time">
                                                                                        <div class="entry-date"
                                                                                             data-time="Aug 13 2017">
                                                                                            <span class="date-month">Aug</span>,<span
                                                                                                    class="date-day">13</span>/<span
                                                                                                    class="date-border"></span><span
                                                                                                    class="date-year">2017</span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="content">
                                                                                    <div class="bottom blog">
                                                                                        <header class="entry-header">
                                                                                            <h3 class="entry-title"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/08/13/4-steps-to-an-even-better-upper-body-workout/"
                                                                                                        rel="bookmark">4
                                                                                                    Steps to An Even
                                                                                                    Better Upper Body
                                                                                                    Workout</a></h3>
                                                                                            <div class="entry-meta">


                                                                                                <div class="comments-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/2017/08/13/4-steps-to-an-even-better-upper-body-workout/#respond"
                                                                                                       class="comments-link">No
                                                                                                        comments</a>
                                                                                                </div>


                                                                                                <div class="author "><a
                                                                                                            href="http://demo3.wpopal.com/exgym/author/admin/"
                                                                                                            title="Posts by admin"
                                                                                                            rel="author">admin</a>
                                                                                                </div>


                                                                                                <div class="entry-date entry-date-singer">
                                                                                                    <span>13</span>&nbsp;Aug&nbsp;
                                                                                                </div>


                                                                                                <div class="entry-category pull-left">
                                                                                                    in
                                                                                                    <ul class="post-categories">
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fashion/"
                                                                                                               rel="category tag">Fashion</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fly-high/"
                                                                                                               rel="category tag">Fly
                                                                                                                High</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/uncategorized/"
                                                                                                               rel="category tag">Uncategorized</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div class="tag-link">
                                                                                                </div>

                                                                                            </div>
                                                                                            <!-- .entry-meta -->

                                                                                            <div class="entry-content">
                                                                                                <p>One common cause of
                                                                                                    acid reflux disease
                                                                                                    is a stomach
                                                                                                    abnormality called a
                                                                                                    hiatal hernia. This
                                                                                                    occurs when the
                                                                                                    upper part</p>
                                                                                            </div>

                                                                                            <div class="readmore"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/08/13/4-steps-to-an-even-better-upper-body-workout/">
                                                                                                    read more</a></div>

                                                                                        </header>
                                                                                        <!-- .entry-header -->

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </article>
                                                                        <!-- #post-## -->
                                                                    </div>
                                                                </div>
                                                                <div class="owl-item" style="width: 248px;">
                                                                    <div class="carouse-item">
                                                                        <article id="post-3265"
                                                                                 class="post-3265 post type-post status-publish format-image has-post-thumbnail hentry category-accessories category-actions category-air-base category-business-use category-commercial-use category-fashion category-fly-high category-uncategorized tag-html tag-media tag-photoshop tag-php tag-wordpress post_format-post-format-image">

                                                                            <div class="content-full">

                                                                                <div class="content-image">

                                                                                    <img width="570" height="391"
                                                                                         src="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog3-570x391.jpg"
                                                                                         class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                         alt=""
                                                                                         srcset="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog3-570x391.jpg 570w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog3-870x597.jpg 870w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog3-768x527.jpg 768w"
                                                                                         sizes="(max-width: 570px) 100vw, 570px">
                                                                                    <div class="top-time">
                                                                                        <div class="entry-date"
                                                                                             data-time="Mar 18 2017">
                                                                                            <span class="date-month">Mar</span>,<span
                                                                                                    class="date-day">18</span>/<span
                                                                                                    class="date-border"></span><span
                                                                                                    class="date-year">2017</span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="content">
                                                                                    <div class="bottom blog">
                                                                                        <header class="entry-header">
                                                                                            <h3 class="entry-title"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/03/18/4-benefits-of-seeing-trainer-that-you-wont-get-in-ann-app/"
                                                                                                        rel="bookmark">4
                                                                                                    benefits of seeing
                                                                                                    trainer (that you
                                                                                                    won’t get in ann
                                                                                                    app)</a></h3>
                                                                                            <div class="entry-meta">


                                                                                                <div class="comments-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/2017/03/18/4-benefits-of-seeing-trainer-that-you-wont-get-in-ann-app/#respond"
                                                                                                       class="comments-link">No
                                                                                                        comments</a>
                                                                                                </div>


                                                                                                <div class="author "><a
                                                                                                            href="http://demo3.wpopal.com/exgym/author/admin/"
                                                                                                            title="Posts by admin"
                                                                                                            rel="author">admin</a>
                                                                                                </div>


                                                                                                <div class="entry-date entry-date-singer">
                                                                                                    <span>18</span>&nbsp;Mar&nbsp;
                                                                                                </div>


                                                                                                <div class="entry-category pull-left">
                                                                                                    in
                                                                                                    <ul class="post-categories">
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/accessories/"
                                                                                                               rel="category tag">Accessories</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/actions/"
                                                                                                               rel="category tag">Actions</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/air-base/"
                                                                                                               rel="category tag">Air
                                                                                                                Base</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/business-use/"
                                                                                                               rel="category tag">Business
                                                                                                                Use</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/commercial-use/"
                                                                                                               rel="category tag">Commercial
                                                                                                                Use</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fashion/"
                                                                                                               rel="category tag">Fashion</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fly-high/"
                                                                                                               rel="category tag">Fly
                                                                                                                High</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/uncategorized/"
                                                                                                               rel="category tag">Uncategorized</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div class="tag-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/tag/html/"
                                                                                                       rel="tag">HTML</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/media/"
                                                                                                            rel="tag">media</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/photoshop/"
                                                                                                            rel="tag">Photoshop</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/php/"
                                                                                                            rel="tag">PHP</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/wordpress/"
                                                                                                            rel="tag">Wordpress</a>
                                                                                                </div>

                                                                                            </div>
                                                                                            <!-- .entry-meta -->

                                                                                            <div class="entry-content">
                                                                                                <p>One common cause of
                                                                                                    acid reflux disease
                                                                                                    is a stomach
                                                                                                    abnormality called a
                                                                                                    hiatal hernia. This
                                                                                                    occurs when the
                                                                                                    upper part</p>
                                                                                            </div>

                                                                                            <div class="readmore"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/03/18/4-benefits-of-seeing-trainer-that-you-wont-get-in-ann-app/">
                                                                                                    read more</a></div>

                                                                                        </header>
                                                                                        <!-- .entry-header -->

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </article>
                                                                        <!-- #post-## -->
                                                                    </div>
                                                                </div>
                                                                <div class="owl-item" style="width: 248px;">
                                                                    <div class="carouse-item">
                                                                        <article id="post-4384"
                                                                                 class="post-4384 post type-post status-publish format-video has-post-thumbnail hentry category-accessories category-actions category-air-base category-business-use category-commercial-use category-fashion category-fly-high category-uncategorized tag-html tag-media tag-php tag-wordpress post_format-post-format-video">

                                                                            <div class="content-full">

                                                                                <div class="content-image">

                                                                                    <img width="570" height="391"
                                                                                         src="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog4-570x391.jpg"
                                                                                         class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                         alt=""
                                                                                         srcset="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog4-570x391.jpg 570w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog4-870x597.jpg 870w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog4-768x527.jpg 768w"
                                                                                         sizes="(max-width: 570px) 100vw, 570px">
                                                                                    <div class="top-time">
                                                                                        <div class="entry-date"
                                                                                             data-time="Mar 06 2017">
                                                                                            <span class="date-month">Mar</span>,<span
                                                                                                    class="date-day">06</span>/<span
                                                                                                    class="date-border"></span><span
                                                                                                    class="date-year">2017</span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="content">
                                                                                    <div class="bottom blog">
                                                                                        <header class="entry-header">
                                                                                            <h3 class="entry-title"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/03/06/the-ladies-always-say-khaled-you-smell-good/"
                                                                                                        rel="bookmark">The
                                                                                                    ladies always say
                                                                                                    Khaled you smell
                                                                                                    good</a></h3>
                                                                                            <div class="entry-meta">


                                                                                                <div class="comments-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/2017/03/06/the-ladies-always-say-khaled-you-smell-good/#respond"
                                                                                                       class="comments-link">No
                                                                                                        comments</a>
                                                                                                </div>


                                                                                                <div class="author "><a
                                                                                                            href="http://demo3.wpopal.com/exgym/author/admin/"
                                                                                                            title="Posts by admin"
                                                                                                            rel="author">admin</a>
                                                                                                </div>


                                                                                                <div class="entry-date entry-date-singer">
                                                                                                    <span>06</span>&nbsp;Mar&nbsp;
                                                                                                </div>


                                                                                                <div class="entry-category pull-left">
                                                                                                    in
                                                                                                    <ul class="post-categories">
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/accessories/"
                                                                                                               rel="category tag">Accessories</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/actions/"
                                                                                                               rel="category tag">Actions</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/air-base/"
                                                                                                               rel="category tag">Air
                                                                                                                Base</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/business-use/"
                                                                                                               rel="category tag">Business
                                                                                                                Use</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/commercial-use/"
                                                                                                               rel="category tag">Commercial
                                                                                                                Use</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fashion/"
                                                                                                               rel="category tag">Fashion</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fly-high/"
                                                                                                               rel="category tag">Fly
                                                                                                                High</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/uncategorized/"
                                                                                                               rel="category tag">Uncategorized</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div class="tag-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/tag/html/"
                                                                                                       rel="tag">HTML</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/media/"
                                                                                                            rel="tag">media</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/php/"
                                                                                                            rel="tag">PHP</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/wordpress/"
                                                                                                            rel="tag">Wordpress</a>
                                                                                                </div>

                                                                                            </div>
                                                                                            <!-- .entry-meta -->

                                                                                            <div class="entry-content">
                                                                                                <p>One common cause of
                                                                                                    acid reflux disease
                                                                                                    is a stomach
                                                                                                    abnormality called a
                                                                                                    hiatal hernia. This
                                                                                                    occurs when the
                                                                                                    upper part</p>
                                                                                            </div>

                                                                                            <div class="readmore"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/03/06/the-ladies-always-say-khaled-you-smell-good/">
                                                                                                    read more</a></div>

                                                                                        </header>
                                                                                        <!-- .entry-header -->

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </article>
                                                                        <!-- #post-## -->
                                                                    </div>
                                                                </div>
                                                                <div class="owl-item" style="width: 248px;">
                                                                    <div class="carouse-item">
                                                                        <article id="post-2629"
                                                                                 class="post-2629 post type-post status-publish format-image has-post-thumbnail hentry category-accessories category-fashion category-fly-high tag-html tag-media tag-photoshop tag-php tag-wordpress post_format-post-format-image">

                                                                            <div class="content-full">

                                                                                <div class="content-image">

                                                                                    <img width="570" height="391"
                                                                                         src="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog9-570x391.jpg"
                                                                                         class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                         alt=""
                                                                                         srcset="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog9-570x391.jpg 570w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog9-870x597.jpg 870w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog9-768x527.jpg 768w"
                                                                                         sizes="(max-width: 570px) 100vw, 570px">
                                                                                    <div class="top-time">
                                                                                        <div class="entry-date"
                                                                                             data-time="Feb 13 2017">
                                                                                            <span class="date-month">Feb</span>,<span
                                                                                                    class="date-day">13</span>/<span
                                                                                                    class="date-border"></span><span
                                                                                                    class="date-year">2017</span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="content">
                                                                                    <div class="bottom blog">
                                                                                        <header class="entry-header">
                                                                                            <h3 class="entry-title"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/02/13/david-bowies-art-collection-at-sothebys/"
                                                                                                        rel="bookmark">David
                                                                                                    Bowie’s Art
                                                                                                    Collection at
                                                                                                    Sotheby’s</a></h3>
                                                                                            <div class="entry-meta">


                                                                                                <div class="comments-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/2017/02/13/david-bowies-art-collection-at-sothebys/#comments"
                                                                                                       class="comments-link">1
                                                                                                        comment</a>
                                                                                                </div>


                                                                                                <div class="author "><a
                                                                                                            href="http://demo3.wpopal.com/exgym/author/admin/"
                                                                                                            title="Posts by admin"
                                                                                                            rel="author">admin</a>
                                                                                                </div>


                                                                                                <div class="entry-date entry-date-singer">
                                                                                                    <span>13</span>&nbsp;Feb&nbsp;
                                                                                                </div>


                                                                                                <div class="entry-category pull-left">
                                                                                                    in
                                                                                                    <ul class="post-categories">
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/accessories/"
                                                                                                               rel="category tag">Accessories</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fashion/"
                                                                                                               rel="category tag">Fashion</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fly-high/"
                                                                                                               rel="category tag">Fly
                                                                                                                High</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div class="tag-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/tag/html/"
                                                                                                       rel="tag">HTML</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/media/"
                                                                                                            rel="tag">media</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/photoshop/"
                                                                                                            rel="tag">Photoshop</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/php/"
                                                                                                            rel="tag">PHP</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/wordpress/"
                                                                                                            rel="tag">Wordpress</a>
                                                                                                </div>

                                                                                            </div>
                                                                                            <!-- .entry-meta -->

                                                                                            <div class="entry-content">
                                                                                                <p>One common cause of
                                                                                                    acid reflux disease
                                                                                                    is a stomach
                                                                                                    abnormality called a
                                                                                                    hiatal hernia. This
                                                                                                    occurs when the
                                                                                                    upper part</p>
                                                                                            </div>

                                                                                            <div class="readmore"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/02/13/david-bowies-art-collection-at-sothebys/">
                                                                                                    read more</a></div>

                                                                                        </header>
                                                                                        <!-- .entry-header -->

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </article>
                                                                        <!-- #post-## -->
                                                                    </div>
                                                                </div>
                                                                <div class="owl-item" style="width: 248px;">
                                                                    <div class="carouse-item">
                                                                        <article id="post-2520"
                                                                                 class="post-2520 post type-post status-publish format-gallery has-post-thumbnail hentry category-accessories category-actions category-air-base category-business-use category-commercial-use category-fashion category-fly-high category-uncategorized tag-html tag-media tag-photoshop tag-php tag-wordpress post_format-post-format-gallery">

                                                                            <div class="content-full">

                                                                                <div class="content-image">

                                                                                    <img width="570" height="391"
                                                                                         src="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog5-570x391.jpg"
                                                                                         class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                         alt=""
                                                                                         srcset="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog5-570x391.jpg 570w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog5-870x597.jpg 870w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog5-768x527.jpg 768w"
                                                                                         sizes="(max-width: 570px) 100vw, 570px">
                                                                                    <div class="top-time">
                                                                                        <div class="entry-date"
                                                                                             data-time="Jan 29 2017">
                                                                                            <span class="date-month">Jan</span>,<span
                                                                                                    class="date-day">29</span>/<span
                                                                                                    class="date-border"></span><span
                                                                                                    class="date-year">2017</span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="content">
                                                                                    <div class="bottom blog">
                                                                                        <header class="entry-header">
                                                                                            <h3 class="entry-title"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/01/29/katrien-de-blauwer-photographer-without-a-camera/"
                                                                                                        rel="bookmark">Katrien
                                                                                                    de Blauwer,
                                                                                                    Photographer without
                                                                                                    a Camera</a></h3>
                                                                                            <div class="entry-meta">


                                                                                                <div class="comments-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/2017/01/29/katrien-de-blauwer-photographer-without-a-camera/#respond"
                                                                                                       class="comments-link">No
                                                                                                        comments</a>
                                                                                                </div>


                                                                                                <div class="author "><a
                                                                                                            href="http://demo3.wpopal.com/exgym/author/admin/"
                                                                                                            title="Posts by admin"
                                                                                                            rel="author">admin</a>
                                                                                                </div>


                                                                                                <div class="entry-date entry-date-singer">
                                                                                                    <span>29</span>&nbsp;Jan&nbsp;
                                                                                                </div>


                                                                                                <div class="entry-category pull-left">
                                                                                                    in
                                                                                                    <ul class="post-categories">
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/accessories/"
                                                                                                               rel="category tag">Accessories</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/actions/"
                                                                                                               rel="category tag">Actions</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/air-base/"
                                                                                                               rel="category tag">Air
                                                                                                                Base</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/business-use/"
                                                                                                               rel="category tag">Business
                                                                                                                Use</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/commercial-use/"
                                                                                                               rel="category tag">Commercial
                                                                                                                Use</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fashion/"
                                                                                                               rel="category tag">Fashion</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fly-high/"
                                                                                                               rel="category tag">Fly
                                                                                                                High</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/uncategorized/"
                                                                                                               rel="category tag">Uncategorized</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div class="tag-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/tag/html/"
                                                                                                       rel="tag">HTML</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/media/"
                                                                                                            rel="tag">media</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/photoshop/"
                                                                                                            rel="tag">Photoshop</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/php/"
                                                                                                            rel="tag">PHP</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/wordpress/"
                                                                                                            rel="tag">Wordpress</a>
                                                                                                </div>

                                                                                            </div>
                                                                                            <!-- .entry-meta -->

                                                                                            <div class="entry-content">
                                                                                                <p>One common cause of
                                                                                                    acid reflux disease
                                                                                                    is a stomach
                                                                                                    abnormality called a
                                                                                                    hiatal hernia. This
                                                                                                    occurs when the
                                                                                                    upper part</p>
                                                                                            </div>

                                                                                            <div class="readmore"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/01/29/katrien-de-blauwer-photographer-without-a-camera/">
                                                                                                    read more</a></div>

                                                                                        </header>
                                                                                        <!-- .entry-header -->

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </article>
                                                                        <!-- #post-## -->
                                                                    </div>
                                                                </div>
                                                                <div class="owl-item" style="width: 248px;">
                                                                    <div class="carouse-item">
                                                                        <article id="post-2523"
                                                                                 class="post-2523 post type-post status-publish format-quote has-post-thumbnail hentry category-actions category-air-base category-business-use category-commercial-use category-fashion category-fly-high category-uncategorized tag-themeforest tag-wordpress post_format-post-format-quote">

                                                                            <div class="content-full">

                                                                                <div class="content-image">

                                                                                    <img width="570" height="391"
                                                                                         src="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog6-570x391.jpg"
                                                                                         class="attachment-thumbnail size-thumbnail wp-post-image"
                                                                                         alt=""
                                                                                         srcset="http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog6-570x391.jpg 570w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog6-870x597.jpg 870w, http://demo3.wpopal.com/exgym/wp-content/uploads/2017/08/blog6-768x527.jpg 768w"
                                                                                         sizes="(max-width: 570px) 100vw, 570px">
                                                                                    <div class="top-time">
                                                                                        <div class="entry-date"
                                                                                             data-time="Jan 07 2017">
                                                                                            <span class="date-month">Jan</span>,<span
                                                                                                    class="date-day">07</span>/<span
                                                                                                    class="date-border"></span><span
                                                                                                    class="date-year">2017</span>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="content">
                                                                                    <div class="bottom blog">
                                                                                        <header class="entry-header">
                                                                                            <h3 class="entry-title"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/01/07/garrett-leight-california-optical-human/"
                                                                                                        rel="bookmark">Garrett
                                                                                                    Leight California
                                                                                                    Optical – Human</a>
                                                                                            </h3>
                                                                                            <div class="entry-meta">


                                                                                                <div class="comments-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/2017/01/07/garrett-leight-california-optical-human/#respond"
                                                                                                       class="comments-link">No
                                                                                                        comments</a>
                                                                                                </div>


                                                                                                <div class="author "><a
                                                                                                            href="http://demo3.wpopal.com/exgym/author/admin/"
                                                                                                            title="Posts by admin"
                                                                                                            rel="author">admin</a>
                                                                                                </div>


                                                                                                <div class="entry-date entry-date-singer">
                                                                                                    <span>07</span>&nbsp;Jan&nbsp;
                                                                                                </div>


                                                                                                <div class="entry-category pull-left">
                                                                                                    in
                                                                                                    <ul class="post-categories">
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/actions/"
                                                                                                               rel="category tag">Actions</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/air-base/"
                                                                                                               rel="category tag">Air
                                                                                                                Base</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/business-use/"
                                                                                                               rel="category tag">Business
                                                                                                                Use</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/commercial-use/"
                                                                                                               rel="category tag">Commercial
                                                                                                                Use</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fashion/"
                                                                                                               rel="category tag">Fashion</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/fly-high/"
                                                                                                               rel="category tag">Fly
                                                                                                                High</a>
                                                                                                        </li>
                                                                                                        <li>
                                                                                                            <a href="http://demo3.wpopal.com/exgym/category/uncategorized/"
                                                                                                               rel="category tag">Uncategorized</a>
                                                                                                        </li>
                                                                                                    </ul>
                                                                                                </div>
                                                                                                <div class="tag-link">
                                                                                                    <a href="http://demo3.wpopal.com/exgym/tag/themeforest/"
                                                                                                       rel="tag">themeforest</a>/<a
                                                                                                            href="http://demo3.wpopal.com/exgym/tag/wordpress/"
                                                                                                            rel="tag">Wordpress</a>
                                                                                                </div>

                                                                                            </div>
                                                                                            <!-- .entry-meta -->

                                                                                            <div class="entry-content">
                                                                                                <p>One common cause of
                                                                                                    acid reflux disease
                                                                                                    is a stomach
                                                                                                    abnormality called a
                                                                                                    hiatal hernia. This
                                                                                                    occurs when the
                                                                                                    upper part</p>
                                                                                            </div>

                                                                                            <div class="readmore"><a
                                                                                                        href="http://demo3.wpopal.com/exgym/2017/01/07/garrett-leight-california-optical-human/">
                                                                                                    read more</a></div>

                                                                                        </header>
                                                                                        <!-- .entry-header -->

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </article>
                                                                        <!-- #post-## -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="owl-controls clickable" style="display: block;">
                                                            <div class="owl-pagination">
                                                                <div class="owl-page active"><span class=""></span>
                                                                </div>
                                                                <div class="owl-page"><span class=""></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #content -->
                                </div>
                                <!-- #primary -->
                            </div>

                        </div>
                    </section>
                </section>
                <!-- #main -->

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
			function tpl() {

			}

			function tplJQ() {


			}
    </script>
@endsection
