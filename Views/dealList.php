<!-- SECTION TO BE DYNAMICALLY CREATED VIA PHP -->
<?php
foreach ($data as $deals) {
    echo '
        <div class="card w-75 mx-auto mt-2 mb-2 shadow-sm suggestCard">
            <div class="card-body px-5 py-5">
                <h6 class="card-title"><i class="fas fa-circle fa-lg mr-1"></i>' . $deals->strRestaurant . '</h6>
                <p class="card-text"><em>' . $deals->strDeal. '</em></p>
                <!-- <div>
                    <i class="far fa-comment-alt fa-lg mr-3"></i>
                    <a href="#"><div class="heart" data-type="positive"></div></a>
                    <span class="float-right">16 votes</span>
                comments votes -->
            </div><!-- //card-body -->
        </div><!-- //card -->';
} ?>
<!-- END SECTION TO BE DYNAMICALLY CREATED VIA PHP -->