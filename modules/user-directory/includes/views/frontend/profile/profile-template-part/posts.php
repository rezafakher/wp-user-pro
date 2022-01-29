<div class="wpuf-ud-post-list">
    <h3 class="all-post"><?php esc_html_e( 'All Posts', 'wpuf-pro' ); ?></h3>

    <?php if ( $posts ) : ?>
    <table class="user-post-list-table">
        <thead>
            <tr>
                <th><?php esc_attr_e( 'Post Title', 'wpuf-pro' ); ?></th>
                <th><?php esc_attr_e( 'Publish Date', 'wpuf-pro' ); ?></th>
                <th><?php esc_attr_e( 'Details', 'wpuf-pro' ); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $posts as $current_post ) : ?>
            <tr>
                <td class="avatar-column">
                    <div class="image">
                            <?php
                            if ( has_post_thumbnail( $current_post->ID ) ) {
                                ?>
                            <img src="<?php echo get_the_post_thumbnail_url( $current_post->ID ); ?>" width="32" height="32">
                                <?php
                            } else {
                                ?>
                            <img src="<?php echo WPUF_ASSET_URI . '/images/no-image.png'; ?>" width="32" height="32">
                                <?php
                            }
                            ?>
                    </div>
                    <div class="post-description">
                        <p>
                        <?php echo wp_trim_words( $current_post->post_title, 6 ); ?>
                        </p>
                    </div>
                </td>
                <td>
                    <?php echo esc_attr( $current_post->post_modified ); ?>
                </td>
                <td>
                    <a href="<?php echo get_post_permalink( $current_post->ID ); ?>">
                        <?php _e( 'Post Link', 'wpuf-pro' ); ?> &rarr;
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        <?php
        echo $this->pagination( count_user_posts( $user_id ), $this->per_page );
        ?>
    <?php else : ?>
        <p><?php esc_html_e( 'No post found', 'wpuf-pro' ); ?></p>
    <?php endif; ?>
</div>
