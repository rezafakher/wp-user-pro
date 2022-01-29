<div class="wpuf-user-lists <?php echo $list_class; ?>">
    <?php foreach ( $users as $user ) : ?>
    <div class="wpuf-ud-user-circle-object">
        <?php
        if ( isset( $this->settings['avatar'] ) && $this->settings['avatar'] === true ) :
            ?>
            <div class="image">
            <?php echo get_avatar( $user->user_email, $avatar_size ); ?>
            </div>
            <?php
            endif;
        ?>
        <div class="wpuf-ud-user-details">
        <?php
        foreach ( $unique_meta as $meta_key => $label ) {
            if ( $user->$meta_key ) {
                if ( 'display_name' === $meta_key ) {
                    ?>
                        <p class="user-name"><?php echo $user->$meta_key; ?></p>
                        <?php
                } elseif ( is_array( $user->$meta_key ) && ! empty( $user->$meta_key ) ) {
                    $output  = '<p>';
                    $output .= $label . ': ' . implode( ', ', $user->$meta_key );
                    $output .= '</p>';

                    echo $output;
                } else {
                    ?>
                        <p><?php echo $label . ': ' . $user->$meta_key; ?></p>
                        <?php
                }
            }
        }
        ?>
            <p class="wpuf-ud-user-view-details">
                <a href="<?php echo add_query_arg( 'user_id', $user->ID, home_url( $wp->request ) ); ?>"><?php esc_html_e( 'View Profile', 'wpuf-pro' ); ?></a>
            </p>
        </div>
    </div>
    <?php endforeach; ?>
</div>
