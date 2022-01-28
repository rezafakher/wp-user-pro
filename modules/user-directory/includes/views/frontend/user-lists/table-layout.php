<div class="user-list-table-area">
    <table class="user-list-table">
        <thead>
            <tr>
                <th class="wpuf-user-list-avatar-column"><?php esc_html_e( 'Avatar', 'wpuf-pro' ); ?></th>
                <th><?php esc_html_e( 'Name', 'wpuf-pro' ); ?></th>
                <th><?php esc_html_e( 'Email', 'wpuf-pro' ); ?></th>
                <th><?php esc_html_e( 'Phone', 'wpuf-pro' ); ?></th>
                <th><?php esc_html_e( 'Website', 'wpuf-pro' ); ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $users as $user ): ?>
            <tr>
                <td class="wpuf-user-list-avatar-column">
                    <?php echo get_avatar( $user->user_email, 50 ); ?>
                </td>
                <td class="user-name"><?php echo esc_attr( $user->display_name ); ?></td>
                <td><?php echo esc_attr( $user->user_email ); ?></td>
                <td><?php echo get_user_meta( $user->ID, 'phone', true ); ?></td>
                <td><?php echo esc_attr( $user->user_url ); ?></td>
                <td><a href="<?php echo add_query_arg( 'user_id', $user->ID, home_url( $wp->request ) ); ?>"><?php esc_html_e( 'View Profile', 'wpuf-pro' ); ?></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>