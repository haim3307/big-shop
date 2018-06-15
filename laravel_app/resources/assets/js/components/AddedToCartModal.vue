<template>
    <div class="modal show" id="addedToCartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="f-row align-items-center" style="flex-direction: column">
                        <div class="icon icon--order-success svg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                                <g fill="none" stroke="#8EC343" stroke-width="2">
                                    <circle cx="36" cy="36" r="35"
                                            style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                    <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                                          style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                </g>
                            </svg>

                        </div>
                        <p>{{product.title | capitalize}} is added to cart!</p>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		props: ['product'],
		mounted() {
			console.log('modal here!');
		}
	}
</script>

<style>
    /* animations */

    @-webkit-keyframes checkmark {
        0% {
            stroke-dashoffset: 50px
        }

        100% {
            stroke-dashoffset: 0
        }
    }

    @-ms-keyframes checkmark {
        0% {
            stroke-dashoffset: 50px
        }

        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes checkmark {
        0% {
            stroke-dashoffset: 50px
        }

        100% {
            stroke-dashoffset: 0
        }
    }

    @-webkit-keyframes checkmark-circle {
        0% {
            stroke-dashoffset: 240px
        }

        100% {
            stroke-dashoffset: 480px
        }
    }

    @-ms-keyframes checkmark-circle {
        0% {
            stroke-dashoffset: 240px
        }

        100% {
            stroke-dashoffset: 480px
        }
    }

    @keyframes checkmark-circle {
        0% {
            stroke-dashoffset: 240px
        }

        100% {
            stroke-dashoffset: 480px
        }
    }

    /* other styles */
    /* .svg svg {
        display: none
    }
     */
    .inlinesvg .svg svg {
        display: inline
    }

    /* .svg img {
        display: none
    } */

    .icon--order-success svg path {
        -webkit-animation: checkmark 0.25s ease-in-out 0.7s backwards;
        animation: checkmark 0.25s ease-in-out 0.7s backwards
    }

    .icon--order-success svg circle {
        -webkit-animation: checkmark-circle 0.6s ease-in-out backwards;
        animation: checkmark-circle 0.6s ease-in-out backwards
    }


</style>