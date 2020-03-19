<?php
/**
 * Plugin Name: demo_settings_plugin
 */


//Start Settings
function binalyto_settings_init() {

  // Register a new settings
  register_setting('reading', 'binalyto_tester');

  //register a new section
  add_settings_section(
    'binalyto_settings_section',
    'Binalyto Settings Section',
    'binalyto_settings_section_cb',
    'reading'
  );

    //Register a new field
    add_settings_field(
      'test_field_name',
      'Test Name Field',
      'binalyto_settings_field_cb',
      'reading',
      'binalyto_settings_section'
    );
}

//Register Function
add_action('admin_init', 'binalyto_settings_init');

//Define Callback functions
function binalyto_settings_section_cb() {
  echo '<p>Binalyto Section Intro </p>';
}

//Field content cb
function binalyto_settings_field_cb() {

  // get the value of the setting we've registered with register_setting()
  $setting = get_option('binalyto_tester');

  // Output field
  ?>
  <input type="text" name="binalyto_tester" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : '' ; ?>">

  <?php
}
