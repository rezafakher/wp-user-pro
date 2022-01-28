<div class="wpuf-ud-user-profile layout-two">
    <div class="profile">
        <div class="profile-header" style="background-image: <?php echo WPUF_UD_ASSET_URI . '/images/profile-banner.svg' ?>;">
            <h3><?php esc_html_e( 'Profile Header', 'wpuf-pro' ); ?></h3>
        </div>
        <div class="profile-bottom">
            <div class="profile-image">
                <?php echo get_avatar( $user->user_email, 100 ); ?>
            </div>
            <div class="profile-details">
                <div class="user-name">
                    <h3><?php echo esc_attr( $user->display_name, 'wpuf-pro' ); ?></h3>
                </div>
                <div class="user-details">
                    <p class="email"><?php echo esc_attr( $user->user_email, 'wpuf-pro' ); ?></p>
                    <p class="website"><?php echo esc_attr( $user->user_url ); ?></p>
                </div>
            </div>
            <div class="user-profile-socials">
                <ul>
                    <li>
                        <a href="">
                            <svg width="25" height="25" viewBox="0 0 8 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.67785 8.48363H5.30497V17H1.70985V8.48363H0V5.49063H1.70985V3.55383C1.70985 2.1688 2.38142 0 5.33697 0L8 0.0109146V2.91612H6.0678C5.75086 2.91612 5.3052 3.07125 5.3052 3.73195V5.49342H7.99194L7.67785 8.48363Z" fill="#3B5998"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <svg width="25" height="25" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 1.539C13.4851 1.79991 12.9311 1.97637 12.3502 2.05518C12.9433 1.64914 13.3985 1.00666 13.6134 0.239857C13.0584 0.616041 12.4434 0.88894 11.7894 1.03604C11.2655 0.398457 10.519 0 9.69234 0C8.10637 0 6.82007 1.46974 6.82007 3.28188C6.82007 3.53911 6.84556 3.78949 6.89482 4.02984C4.50773 3.89302 2.39117 2.58654 0.974418 0.600376C0.727225 1.08499 0.585422 1.64914 0.585422 2.25049C0.585422 3.38884 1.09287 4.39379 1.86315 4.98217C1.39255 4.96528 0.949356 4.8177 0.562288 4.57123C0.562073 4.58518 0.562073 4.59913 0.562073 4.61284C0.562073 6.20299 1.55256 7.52931 2.86628 7.8306C2.62551 7.90598 2.37125 7.94587 2.1097 7.94587C1.9242 7.94587 1.74448 7.92556 1.56926 7.88738C1.9347 9.19093 2.99523 10.1398 4.25239 10.1665C3.26919 11.0469 2.03088 11.5714 0.684813 11.5714C0.453471 11.5714 0.224272 11.556 0 11.5254C1.27045 12.4569 2.78059 13 4.40255 13C9.6857 13 12.5749 7.99923 12.5749 3.66198C12.5749 3.51978 12.5721 3.37807 12.5665 3.23758C13.1282 2.775 13.6151 2.19714 14 1.539Z" fill="#5C5CFB"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <svg width="25" height="25" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.58585 11.6047C6.56863 11.5294 6.14121 11.0464 5.34346 10.5827C4.905 12.7854 4.36917 14.8969 2.78206 16C2.29155 12.6708 3.50114 10.1702 4.06288 7.51602C3.10538 5.97268 4.17801 2.86626 6.19758 3.63172C8.68318 4.57288 4.04561 9.37031 7.15891 9.96951C10.4092 10.5951 11.736 4.56944 9.72031 2.60949C6.80801 -0.220185 1.24315 2.54519 1.92746 6.59598C2.09416 7.58629 3.16295 7.88692 2.3544 9.25342C0.490492 8.85817 -0.0654901 7.45056 0.0059864 5.57398C0.121356 2.50224 2.88855 0.351446 5.66414 0.0538029C9.17441 -0.322385 12.469 1.28801 12.9238 4.44955C13.4354 8.01783 11.3391 11.8821 7.58585 11.6047Z" fill="#CB2027"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <svg width="25" height="25" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 8.5827V14H10.9987V8.94576C10.9987 7.67669 10.5654 6.81004 9.47867 6.81004C8.64939 6.81004 8.15674 7.39351 7.93918 7.95847C7.86017 8.16038 7.8398 8.44076 7.8398 8.72394V13.9998H4.83827C4.83827 13.9998 4.87856 5.43955 4.83827 4.55346H7.84003V5.89209C7.83398 5.90263 7.82548 5.91293 7.82011 5.92301H7.84003V5.89209C8.23889 5.24983 8.95021 4.33164 10.545 4.33164C12.5196 4.33164 14 5.68175 14 8.5827ZM1.69841 0C0.671708 0 0 0.70527 0 1.63189C0 2.53883 0.652235 3.26448 1.65901 3.26448H1.67849C2.72533 3.26448 3.37622 2.53883 3.37622 1.63189C3.3563 0.70527 2.72533 0 1.69841 0ZM0.178391 14H3.17881V4.55346H0.178391V14Z" fill="#007AB9"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="user-data">
        <div class="data-tabs">
            <?php 
                global $wp;
                $current_tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'posts';
                $tabs = [
                    'comments' => __( 'Comments', 'wpuf-pro' ),
                    'posts'    => __( 'Posts', 'wpuf-pro' ),
                    'file'     => __( 'File/Image', 'wpuf-pro' ),
                ]
            ?>
            <ul>
  
                <?php 
                    foreach ( $tabs as $key => $tab ): 
                        $active = ( $current_tab === $key ) ? 'active' : '';                
                ?>
                
                <li><a class="<?php echo $active; ?>" href="<?php echo add_query_arg( [ 'tab' => $key, 'user_id' => $user->ID ], home_url( $wp->request ) ); ?>"><?php echo $tab; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php require_once $current_tab . '.php'; ?>
    </div>
</div>

