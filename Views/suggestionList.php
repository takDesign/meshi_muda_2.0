<!-- SECTION TO BE DYNAMICALLY CREATED VIA PHP -->
<?php
foreach ($data as $suggestions) {
    $dPosted = date('M j, Y  g:i a', strtotime($suggestions->dPosted));
    echo '
        <div class="card w-75 mx-auto mt-2 mb-2 shadow-sm suggestCard">
            <div class="card-body px-5 py-5">
                <h6 class="card-title"><i class="fas fa-circle fa-lg mr-1"></i>' . $suggestions->strUserName . '</h6>
                <p class="card-text"><em>' . $suggestions->strContent . '</em></p>
                <!-- <div>
                    <i class="far fa-comment-alt fa-lg mr-3"></i>
                    <a href="#"><div class="heart" data-type="positive"></div></a>
                    <span class="float-right">16 votes</span>
                comments votes -->
                <div class="card-text mt-3">
                    <small class="cardDate">' . $dPosted . '</small>
                </div><!-- //date time -->
            </div><!-- //card-body -->
        </div><!-- //card -->';
} ?>
<!-- END SECTION TO BE DYNAMICALLY CREATED VIA PHP -->