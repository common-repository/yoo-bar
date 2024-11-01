<?php

        include YOO_BAR_PATH . 'assets/admin/extra/addressicon.php';


        if ($yoobar_displayaddreessicon)
        {
            switch ($yoobar_addres_icon_st)
            {
                case 'Solid':
                    $yoobar_addres_icon_map = '<span>' . $adr_icon_one . '</span>';
                    $yoobar_addres_icon_email = '<span>' . $adr_icon_three . '</span>';
                    $yoobar_addres_icon_phone = '<span>' . $adr_icon_five . '</span>';
                break;
                case 'Line':
                    $yoobar_addres_icon_map = '<span>' . $adr_icon_two . '</span>';
                    $yoobar_addres_icon_email = '<span>' . $adr_icon_four . '</span>';
                    $yoobar_addres_icon_phone = '<span>' . $adr_icon_six . '</span>';
                break;

                default:
                    $yoobar_addres_icon_map = '<span>' . $adr_icon_two . '</span>';
                    $yoobar_addres_icon_email = '<span>' . $adr_icon_four . '</span>';
                    $yoobar_addres_icon_phone = '<span>' . $adr_icon_six . '</span>';
            }
        }
        else
        {
            $yoobar_addres_icon_map = '';
            $yoobar_addres_icon_email = '';
            $yoobar_addres_icon_phone = '';
        }
        if (empty($yoobar_addres_metafield))
        {
            $yoobar_addres_icon_map = '';
        }
        if (empty($yoobar_email_fiedl))
        {
            $yoobar_addres_icon_email = '';
        }
        if (empty($yoobar_phnumberfiedl))
        {
            $yoobar_addres_icon_phone = '';
        }
        $yoo_address_bar = '<div class="yppaddressbar" id="yppaddresswrap-' . $rand . '"><ul><li data-title="' . $yoobar_addres_metafield . '">' . $yoobar_addres_icon_map . ' <span class="addredmeta"> ' . $yoobar_addres_metafield . '</span></li><li class="addressmailfileed" data-title="' . $yoobar_email_fiedl . '"><a href="mailto:' . $yoobar_email_fiedl . '">' . $yoobar_addres_icon_email . ' <span class="addredmeta">' . $yoobar_email_fiedl . '</span></a></li><li data-title="' . $yoobar_phnumberfiedl . '"><a href="tel:' . $yoobar_phnumberfiedl . '">' . $yoobar_addres_icon_phone . '  <span class="addredmeta">' . $yoobar_phnumberfiedl . '</span></a></li></ul></div>';

        $yoo_address_bar .= '<style>#yppaddresswrap-' . $rand . ' ul li,#yppaddresswrap-' . $rand . '  ul li a{
    color:' . $yoo_adres_txt_clr . ';
}#yppaddresswrap-' . $rand . '  ul li svg{fill:' . $yoo_adres_icon_clr . ';
}div#YooAddressBar{ background:#dffbbf;}</style>';
