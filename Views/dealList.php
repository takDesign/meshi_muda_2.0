<?php
foreach ($data as $deals) {
    // set the class for styling depends on food availability
    if ($deals->bAvailable === '0') {
        $availability = 'save';
        $activity = 'card-active';
    } else {
        $availability = 'saved';
        $activity = 'card-inactive';
    }
    echo '
        <div class="mx-2 my-3 card ' . $activity . '">
            <div class="row no-gutters">
                <div class="col-3 mx-0 my-0 px-0 py-0 square">
                    <div class="content">
                    <img class="img-fluid imgRounded" src="' . $deals->strImage . '" alt="food image">
                    </div>
                </div>
                
                <div class="ml-2 d-flex align-self-center col-8">
                    <div class="py-0 pl-2">
                        <p class="card-text semi-bold mb-0">' . $deals->strRestaurant . '</p>
                        <p class="card-text semi-bold mb-0">' . $deals->strLocation . '</p>
                        <p class="card-text semi-bold mb-0">' . $deals->strDeal . '</p>
                        <p class="card-text semi-bold mb-0">' . $deals->strWhen . '</p>
                    </div>
                </div>
                <!-- <i class="px-3 py-3 fas fa-2x fa-plus-circle"></i> -->
            </div>
            <p class="card-text float-right mt-1 mr-2">
                <small class="text-muted">
                    Let us know if this is 
                    <a href="#" class="' . $availability . '" data-availability="' . $deals->bAvailable . '" data-role="update" data-target="soldout" data-id="' . $deals->id . '">Sold Out</a> 
                </small>
            </p>
        </div>
        ';
}
