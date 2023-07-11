<!-- Modal [map] -->
<div id="map" class="p-0 modal fade" role="dialog" aria-labelledby="map" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header absolute" data-dismiss="modal">
                <i class="icon-close fas fa-arrow-right"></i>
            </div>
            <div class="modal-body p-0">
                <iframe src="<?php echo esc_url(get_field('map_location_link', 'option')) ?>" width="600" height="450" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>