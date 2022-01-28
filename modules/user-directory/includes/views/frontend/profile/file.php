<div class="wpuf-ud-files-area">
    <h2><?php esc_html_e( 'File/Image', 'wpuf-pro' ); ?></h2>
    <?php if ( $files ): ?>
        <div class="file-container">
            <?php 
                foreach ( $files as $file ):
                    $ext = explode( '.', $file );
                    $ext = end( $ext );
                    // $ext = 'doc';

                    $icon = '';
                    $image = false;
                    switch( $ext ) {
                        case 'pdf':
                            $icon = 'pdf.svg';
                            break;
                        case 'xls':
                            $icon = 'xls.svg';
                            break;
                        case 'zip':
                            $icon = 'zip.svg';
                            break;
                        case 'doc':
                            $icon = 'doc.svg';
                            break;
                        case 'jpg':
                        case 'jpeg':
                        case 'png':
                            $icon  = $file;
                            $image = true;
                            break;
                    }
            ?>
                <?php if ( $image ): ?>
                    <div>
                        <a href="<?php echo $file; ?>" download>
                            <img src="<?php echo $file ?>" alt="" class="preview-image">
                        </a>
                    </div>
                <?php else: ?>
                    <div class="single-file"> 
                        <a href="<?php echo $file; ?>" download>
                            <img src="<?php echo WPUF_UD_ASSET_URI . '/images/' . $icon ?>"  alt="">
                        </a>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
            </div>
        
    <?php else: ?>
        <p><?php esc_attr_e( 'No file found', 'wpuf-pro' ); ?></p>
    <?php endif; ?>
</div>
