
<?php
    class SQC_Display {
        function __construct() {
            add_filter( 'the_content', [$this, 'display_qr_code'] );
        }

        function display_qr_code( $content ) {
            if ( ! is_singular() ) {
                return $content;
            }
            $position = 'bottom-right';
            $size     = 128;
            $color    = "#000000";
            $heading  = "Scan Me";

            $content .= "<div class='simple-qrcode-container $position'>";
            $content .= "<div class='simple-qrcode-heading'>$heading</div>";
            $content .= "<div class='simple-qrcode' data-size='$size' data-color='$color'></div>";
            return $content;
        }

}