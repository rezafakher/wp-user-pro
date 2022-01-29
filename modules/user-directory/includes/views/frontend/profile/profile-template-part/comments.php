<?php
$tab_title = ! empty( $tab_title ) ? $tab_title : __( 'Comments', 'wpuf-pro' );
?>
<div class="wpuf-profile-section wpuf-ud-post-list">
    <h3 class="profile-section-heading"><?php echo esc_html( $tab_title ); ?></h3>

    <?php if ( $comments ) : ?>
    <table class="user-post-list-table">
        <thead>
            <tr>
                <th><?php esc_attr_e( 'Comment', 'wpuf-pro' ); ?></th>
                <th><?php esc_attr_e( 'Comment Date', 'wpuf-pro' ); ?></th>
                <th><?php esc_attr_e( 'Details', 'wpuf-pro' ); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $avatar = get_avatar( $user->ID, 32 );
            ?>
            <?php foreach ( $comments as $current_comment ) : ?>
            <tr>
                <td class="avatar-column">
                    <?php if ( $avatar ) : ?>
                    <div class="image">
                        <?php echo $avatar; ?>
                    </div>
                    <?php endif; ?>
                    <div class="post-description">
                        <p>
                        <?php echo wp_trim_words( $current_comment->comment_content, 6 ); ?>
                        </p>
                    </div>
                </td>
                <td>
                    <?php echo esc_attr( $current_comment->comment_date ); ?>
                </td>
                <td>
                    <a href="<?php echo get_comment_link( $current_comment ); ?>"><?php esc_html_e( 'Read More', 'wpuf-pro' ); ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
		<?php
        // echo $this->pagination();
		?>
    <?php else : ?>
        <p><?php esc_html_e( 'No comment found', 'wpuf-pro' ); ?></p>
    <?php endif; ?>
</div>
