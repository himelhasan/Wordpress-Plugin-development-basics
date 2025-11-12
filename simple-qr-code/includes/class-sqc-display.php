
<?php
    class SQC_Display {
        function __construct() {
            add_filter( 'the_content', [$this, 'display_qr_code'] );
        }

        function display_qr_code( $content ) {
            if ( ! is_singular() ) {
                return $content;
            }
            $position = apply_filters( 'sqc_position', 'bottom-right' );
            $size     = apply_filters( 'sqc_size', 128 );
            $color    = apply_filters( 'sqc_color', '#000000' );
            $heading  = apply_filters( 'sqc_heading', 'Scan Me' );

            $content .= "<div class='simple-qrcode-container $position'>";
            $content .= "<div class='simple-qrcode-heading'>$heading</div>";
            $content .= "<div class='simple-qrcode' data-size='$size' data-color='$color'></div>";
            return $content;
        }

}