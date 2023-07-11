<!-- Search -->
<div class="row item widget-search">
    <form method="GET" action="<?php echo esc_url(site_url('/')) ?>">
        <div class="col-12 align-self-center">
            <h4 class="title"><?php echo __('Search', 'xagora') ?></h4>
            <div class="row">
                <div class="col-12 m-0 p-0 input-group">
                    <input type="text" class="form-control" name="s" placeholder="<?php echo __('Enter Keywords', 'xagora') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 p-0 input-group align-self-center">
                    <button class="btn primary-button"><?php echo __('SEARCH', 'xagora') ?></button>
                </div>
            </div>
        </div>
    </form>
</div>