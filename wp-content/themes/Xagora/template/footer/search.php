<!-- Modal [search] -->
<div id="search" class="p-0 modal fade" role="dialog" aria-labelledby="search" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout" role="document">
        <div class="modal-content full">
            <div class="modal-header" data-dismiss="modal">
                <i class="icon-close fas fa-arrow-right"></i>
            </div>
            <div class="modal-body">
                <form class="row" role="search" method="GET" action="<?php echo esc_url(site_url('/')) ?>">
                    <div class="col-12 p-0 align-self-center">
                        <div class="row">
                            <div class="col-12 p-0">
                                <h2><?php echo __('What are you looking for?', 'xagora') ?></h2>
                                <div class="badges">
                                    <?php
                                    $terms = get_terms(array(
                                        'taxonomy' => 'project_category',
                                        'hide_empty' => true,
                                        'number' => 5
                                    ));
                                    foreach ($terms as $term) {
                                        echo '<span class="badge"><a class="search-ready-terms" href="javascript:void(0);">' . sanitize_text_field($term->name) . '</a></span>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 p-0 input-group">
                                <input id="search-input-text" type="text" class="form-control" name="s" placeholder="<?php echo __('Enter Keywords', 'xagora') ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-0 input-group align-self-center">
                                <button type="submit" class="btn primary-button"><?php echo __('SEARCH', 'xagora') ?></button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>