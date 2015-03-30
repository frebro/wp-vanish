<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link        http://frebro.com
 * @since       1.0.0
 *
 * @package     Vanish
 * @subpackage  Vanish/admin/partials
 */
?>

<div class="wrap">
  <h2>Vanish</h2>
  <form method="post" action="options.php">
    <?php settings_fields( 'vanish_options' ); ?>
    <?php do_settings_sections( 'vanish' ); ?>
    <?php submit_button(); ?>
  </form>
</div>
