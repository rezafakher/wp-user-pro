<?php
$search_meta       = $this->search_meta_field();
$search_by         = isset( $_GET['search_by'] ) ? sanitize_text_field( wp_unslash( $_GET['search_by'] ) ) : '';
$order_by          = isset( $_GET['order_by'] ) ? sanitize_text_field( wp_unslash( $_GET['order_by'] ) ) : 'login';
$sort_order        = isset( $_GET['order'] ) ? sanitize_text_field( wp_unslash( $_GET['order'] ) ) : 'ASC';
$search_query      = isset( $_GET['search_field'] ) ? sanitize_text_field( wp_unslash( $_GET['search_field'] ) ) : '';

$orderby_parameters = array(
    'user_login'      => __( 'User Login', 'wpuf-pro' ),
    'ID'              => __( 'User ID', 'wpuf-pro' ),
    'display_name'    => __( 'Display Name', 'wpuf-pro' ),
    'user_name'       => __( 'User Name', 'wpuf-pro' ),
    'user_nicename'   => __( 'Nicename', 'wpuf-pro' ),
    'user_registered' => __( 'Registered Date', 'wpuf-pro' ),
    'post_count'      => __( 'Post Count', 'wpuf-pro' ),
);

$order_parameters = array(
    'ASC'  => __( 'ASC', 'wpuf-pro' ),
    'DESC' => __( 'DESC', 'wpuf-pro' ),
);
?>

<div class="wpuf-user-list-table">
    <!-- Search Area -->
    <div class="wpuf-user-list-search-section">
        <form action="" class="wpuf-user-list-search-form">
            <div class="search-area">
                <input type="text" placeholder="Search User" name="search_field">
                <svg
                    width="16"
                    height="16"
                    viewBox="0 0 16 16"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="search-icon"
                    onclick="document.querySelector('.wpuf-user-list-search-form').submit()"
                >
                    <path d="M15.7222 14.3814L12.6465 11.3064C13.5786 10.0864 14.0899 8.60662 14.0901 7.04511C14.0901 5.16334 13.357 3.39408 12.0259 2.06349C10.695 0.732892 8.92563 0 7.04323 0C5.16107 0 3.39143 0.732892 2.06056 2.06349C-0.686854 4.81056 -0.686854 9.28013 2.06056 12.0267C3.39143 13.3576 5.16107 14.0905 7.04323 14.0905C8.60506 14.0903 10.0852 13.5791 11.3054 12.6472L14.3811 15.7222C14.5661 15.9074 14.809 16 15.0516 16C15.2943 16 15.5372 15.9074 15.7222 15.7222C16.0926 15.3521 16.0926 14.7516 15.7222 14.3814ZM3.40162 10.686C1.39374 8.67849 1.39397 5.41196 3.40162 3.40427C4.37431 2.43201 5.66767 1.89635 7.04323 1.89635C8.41902 1.89635 9.71216 2.43201 10.6848 3.40427C11.6575 4.37675 12.1933 5.66984 12.1933 7.04511C12.1933 8.42061 11.6575 9.71348 10.6848 10.686C9.71216 11.6584 8.41902 12.1941 7.04323 12.1941C5.66767 12.1941 4.37431 11.6584 3.40162 10.686Z" fill="#CED3DA"/>
                </svg>
            </div>
            <div class="sorting-area">
                <div class="order-by">
                    <label for="">
                        <?php esc_html_e( 'Search By', 'wpuf-pro' ); ?>
                    </label>
                    <select name="search_by" id="">
                        <option value="all"><?php esc_html_e( '- all -', 'wpuf-pro' ); ?></option>
                        <?php
                        foreach ( $search_meta as $meta_key => $label ) {
                            ?>
                            <option value="<?php echo esc_attr( $meta_key ); ?>" <?php echo $meta_key === $search_by ? 'selected="selected"' : ''; ?>><?php echo esc_attr( $label ); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="order-by">
                    <label for="">
                        <?php esc_html_e( 'Order By', 'wpuf-pro' ); ?>
                    </label>
                    <select name="order_by" id="">
                        <?php foreach ( $orderby_parameters as $key => $label ) : ?>
                            <option value="<?php echo $key; ?>" <?php echo $key === $order_by ? 'selected="selected"' : ''; ?>><?php echo $label; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="order">
                    <label for="">
                        <?php esc_html_e( 'Order', 'wpuf-pro' ); ?>
                    </label>
                    <select name="order" id="">
                        <?php foreach ( $order_parameters as $key => $label ) : ?>
                            <option value="<?php echo $key; ?>" <?php echo $key === $sort_order ? 'selected="selected"' : ''; ?>><?php echo $label; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <!-- User list table area -->
    <?php
        $user_listing_template = wpuf_get_option( 'user_listing_template', 'user_directory', 'list' );

        $list_class = '';
    switch ( $user_listing_template ) {
        case 'list':
            require_once 'user-lists/table-layout.php';
            break;
        case 'list1':
            require_once 'user-lists/square-grid-layout.php';
            break;
        case 'list2':
            $list_class = 'circle-3';
            require_once 'user-lists/circle-thumbnail-grid-layout.php';
            break;
        case 'list3':
            $list_class = 'square-3';
            require_once 'user-lists/square-thumbnail-grid-layout.php';
            break;
        case 'list4':
            $list_class = 'circle-4';
            require_once 'user-lists/circle-thumbnail-grid-layout.php';
            break;
        case 'list5':
            $list_class = 'square-4';
            require_once 'user-lists/square-thumbnail-grid-layout.php';
            break;
    }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded',function () {
            var tr = document.querySelector('.user-list-table-area tbody').querySelectorAll('tr');

            var search_input = document.querySelector('.wpuf-user-list-search-section .search-area input');

            search_input.addEventListener('keyup', function (e) {
                var search_value = e.target.value;

                if (search_value.length) {
                    tr.forEach(function (row, index) {
                        if (row.innerText.toLowerCase().includes( search_value ) !== true) {
                            tr[index].style.display = 'none';
                        }else {
                            tr[index].style.display = '';
                        }
                    })
                }else {
                    tr.forEach(function (row, index) {
                        tr[index].style.display = '';
                    })
                }
            })
        });
    </script>
    <?php
        echo $this->pagination( $this->total, $this->per_page );
    ?>
</div>

