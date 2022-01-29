<?php
$user_id     = isset( $_GET['user_id'] ) ? intval( wp_unslash( $_GET['user_id'] ) ) : '';
$user_status = $this->is_approved( $user_id );

if ( ! $user_status ) {
    return;
}

$tab_title = ! empty( $tab_title ) ? esc_html( $tab_title ) : '';

$current_userdata  = get_user_by( 'id', $user_id );
$wpuf_current_user = wp_get_current_user();
$profile_fields    = $this->get_options();
$this->settings    = isset( $profile_fields['settings'] ) ? $profile_fields['settings'] : [];
$profile_role      = isset( $current_userdata->roles[0] ) ? $current_userdata->roles[0] : '';
$current_user_role = is_user_logged_in() ? $wpuf_current_user->roles[0] : 'guest';

do_action( 'wpuf_user_profile_before_content' );
?>
<div class="wpuf-profile-section">
<h3 class="profile-tab-heading"><?php echo $tab_title; ?></h3>

<?php
foreach ( $profile_fields['fields'] as $key => $field ) {
    if ( ! self::can_user_see( $profile_role, $field, $current_user_role ) ) {
        continue;
    }

    switch ( $field['type'] ) {
        case 'meta':
            $meta_key = $this->get_meta( $field );
            do_action( 'wpuf_user_about_meta', $meta_key );
            $value = '';

            $repeat_field = get_user_meta( $user_id, $meta_key );

            if ( is_array( $repeat_field ) ) {
                $value = $repeat_field;
            }

            if ( ! empty( $current_userdata->data->$meta_key ) ) {
                $value = $current_userdata->data->$meta_key;
            }

            if ( is_array( $value ) ) {
                $value = implode( ', ', $value );
            } elseif ( ! empty( $current_userdata->data->$meta_key ) ) {
                $value = trim( $current_userdata->data->$meta_key );
            }
            ?>
            <?php if ( $value ) { ?>
                <div class="wpuf-profile-value">
                    <label class="wpuf-ud-profile-label"><?php echo $field['label']; ?>: </label>
                    <?php echo ! empty( $value ) ? make_clickable( $value ) : ' -- '; ?>
                </div>
				<?php
            }
            break;

        case 'section':
            ?>
            <div class="wpuf-profile-section">
                <h3 class="profile-section-heading"><?php echo $field['label']; ?></h3>
            </div>
            <?php
            break;
    }
}
?>
</div>
<?php
do_action( 'wpuf_user_profile_after_content' );
