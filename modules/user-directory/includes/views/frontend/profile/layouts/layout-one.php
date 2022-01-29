<div class="ud-single-profile-container alignwide">
    <div class="ud-section-one-third">
        <?php
            printf( '<a class="btn-back wp-block-file__button" href="%s">%s</a>', get_permalink(), __( '&larr; Back', 'wpuf-pro' ) );
        ?>
        <div class="ud-profile-intro">
            <div class="user-image img-round">
                <?php echo get_avatar( $user_email, 120 ); ?>
            </div>
            <div class="display-name">
                <h4><?php echo esc_html( $user->display_name ); ?></h4>
            </div>
            <div class="contact-info">
                <?php echo make_clickable( $user_email ); ?>
                <br>
                <?php
                if ( isset( $user->user_url ) ) {
                    $user_own_url = esc_url( $user->user_url );
                    echo links_add_target( make_clickable( $user_own_url ) );
                }
                ?>
            </div>
            <?php
                $user_desc = get_user_meta( $user->ID, 'description', true );
            if ( ! empty( $user_desc ) ) {
                $desc_part_one = substr( $user_desc, 0, 100 );
                $desc_part_two = substr( $user_desc, 101, strlen( $user_desc ) - 1 );
                ?>
                <div class="biography">
                    <h5><?php esc_html_e( 'Biography', 'wpuf-pro' ); ?></h5>
                <?php
                if ( strlen( $user_desc ) > strlen( $desc_part_one ) ) {
                    ?>
                            <p>
                        <?php echo links_add_target( make_clickable( $desc_part_one ) ); ?>
                                <span class="desc-part-two" style="display: none;">
                            <?php echo links_add_target( make_clickable( $desc_part_two ) ); ?>
                                </span>
                            </p>
                            <a href="#" id="btn-view-more"><?php esc_html_e( 'View More', 'wpuf-pro' ); ?></a>
                        <?php
                } else {
                    echo '<p>' . links_add_target( make_clickable( $user_desc ) ) . '</p>';
                }
                ?>
                </div>
                <?php
            }

            $social_template = WPUF_UD_INCLUDES . '/views/frontend/profile/profile-template-part/social-profile.php';
            if ( file_exists( $social_template ) ) {
                include $social_template;
            }
            ?>
        </div>
    </div>
    <div class="ud-section-two-third">
        <div class="user-data">
            <div class="data-tabs">
                <?php
                    $current_tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'posts'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
                    $predefined_tabs = [
                        'comments' => __( 'Comments', 'wpuf-pro' ),
                        'posts'    => __( 'Posts', 'wpuf-pro' ),
                        'file'     => __( 'File/Image', 'wpuf-pro' ),
                        'about'    => __( 'About', 'wpuf-pro' ),
                        'activity' => __( 'Activity', 'wpuf-pro' ),
                    ];
                    ?>
                <ul>
                    <?php
                    if ( count( $saved_tabs ) ) {
                        foreach ( $saved_tabs as $key => $single_tab ) {
                            // show activity, if user activity module is on
                            if ( 'activity' === $key && ! class_exists( 'WPUF_User_Activity' ) ) {
                                continue;
                            }

                            $active = ( $current_tab === $key ) ? 'active' : '';
                            ?>

                        <li>
                            <?php
                            $query_args = [
                                'tab'     => $key,
                                'user_id' => $user->ID,
                            ];
                            ?>
                            <a class="wp-block-file__button <?php echo $active; ?>" href="<?php echo add_query_arg( $query_args, home_url( $wp->request ) ); ?>">
                                <?php echo $single_tab['label']; ?>
                            </a>
                        </li>
                            <?php
                        }
                    } else {
                        ?>
                        <?php
                        foreach ( $predefined_tabs as $key => $single_tab ) {
                            if ( 'activity' === $key && ! class_exists( 'WPUF_User_Activity' ) ) {
                                continue;
                            }
                            $active = ( $current_tab === $key ) ? 'active' : '';
                            ?>
                        <li>
                            <?php
                            $query_args = [
                                'tab'     => $key,
                                'user_id' => $user->ID,
                            ];
                            ?>
                            <a class="<?php echo $active; ?>" href="<?php echo add_query_arg( $query_args, home_url( $wp->request ) ); ?>">
                                <?php echo $single_tab; ?>
                            </a>
                        </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <?php require_once WPUF_UD_VIEWS . '/frontend/profile/profile-template-part/' . $current_tab . '.php'; ?>
        </div>
    </div>
</div>
