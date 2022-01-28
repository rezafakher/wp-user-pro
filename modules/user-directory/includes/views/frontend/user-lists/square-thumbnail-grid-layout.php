<div class="wpuf-user-lists layout-two square-layout <?php echo $list_class; ?>">
    <?php foreach( $users as $user ): ?>
    <div class="wpuf-ud-user-object">
        <div class="image">
            <?php echo get_avatar( $user->user_email, 122 ); ?>
        </div>
        <div class="wpuf-ud-user-details">
            <p class="wpuf-ud-user-name">
                <?php echo esc_attr( $user->display_name ); ?>
            </p>
            <div class="wpuf-ud-contact-details">
                <p class="wpuf-ud-user-email">
                    <?php echo esc_attr( $user->user_email ); ?>
                </p>
                <p class="wpuf-ud-user-website">
                    <?php echo esc_attr( $user->user_url ); ?>
                </p>
            </div>
            <p class="wpuf-ud-user-view-details">
                <a href="<?php echo add_query_arg( 'user_id', $user->ID, home_url( $wp->request ) ); ?>"><?php esc_html_e( 'View Profile', 'wpuf-pro' ); ?></a>
            </p>
        </div>
    </div>
    <?php endforeach; ?>
</div>