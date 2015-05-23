<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- NAME: 1 COLUMN - BANDED -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Config::get('gzero.siteName') }}</title>

    <style type="text/css">
        body, #bodyTable, #bodyCell {
            height  : 100% !important;
            margin  : 0;
            padding : 0;
            width   : 100% !important;
        }

        table {
            border-collapse : collapse;
        }

        img, a img {
            border          : 0;
            outline         : none;
            text-decoration : none;
        }

        h1, h2, h3, h4, h5, h6 {
            margin  : 0;
            padding : 0;
        }

        p {
            margin  : 1em 0;
            padding : 0;
        }

        a {
            word-wrap : break-word;
        }

        .ReadMsgBody {
            width : 100%;
        }

        .ExternalClass {
            width : 100%;
        }

        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
            line-height : 100%;
        }

        table, td {
            mso-table-lspace : 0pt;
            mso-table-rspace : 0pt;
        }

        #outlook a {
            padding : 0;
        }

        img {
            -ms-interpolation-mode : bicubic;
        }

        body, table, td, p, a, li, blockquote {
            -ms-text-size-adjust     : 100%;
            -webkit-text-size-adjust : 100%;
        }

        #bodyCell {
            padding : 0;
        }

        .mcnImage {
            vertical-align : bottom;
        }

        .mcnTextContent img {
            height : auto !important;
        }

        /*
        #tab Page
        #section background style
        #tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
        */
        body, #bodyTable {
            background-color : #F2F2F2;
        }

        /*
        #tab Page
        #section background style
        #tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
        */
        #bodyCell {
            border-top : 0;
        }

        /*
        #tab Page
        #section heading 1
        #tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
        #style heading 1
        */
        h1 {
            color          : #606060 !important;
            display        : block;
            font-family    : Helvetica;
            font-size      : 40px;
            font-style     : normal;
            font-weight    : bold;
            line-height    : 125%;
            letter-spacing : -1px;
            margin         : 0;
            text-align     : left;
        }

        /*
        #tab Page
        #section heading 2
        #tip Set the styling for all second-level headings in your emails.
        #style heading 2
        */
        h2 {
            color          : #404040 !important;
            display        : block;
            font-family    : Helvetica;
            font-size      : 26px;
            font-style     : normal;
            font-weight    : bold;
            line-height    : 125%;
            letter-spacing : -.75px;
            margin         : 0;
            text-align     : left;
        }

        /*
        #tab Page
        #section heading 3
        #tip Set the styling for all third-level headings in your emails.
        #style heading 3
        */
        h3 {
            color          : #606060 !important;
            display        : block;
            font-family    : Helvetica;
            font-size      : 18px;
            font-style     : normal;
            font-weight    : bold;
            line-height    : 125%;
            letter-spacing : -.5px;
            margin         : 0;
            text-align     : left;
        }

        /*
        #tab Page
        #section heading 4
        #tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
        #style heading 4
        */
        h4 {
            color          : #808080 !important;
            display        : block;
            font-family    : Helvetica;
            font-size      : 16px;
            font-style     : normal;
            font-weight    : bold;
            line-height    : 125%;
            letter-spacing : normal;
            margin         : 0;
            text-align     : left;
        }

        /*
        #tab Preheader
        #section preheader style
        #tip Set the background color and borders for your email's preheader area.
        */
        #templatePreheader {
            background-color : #FFFFFF;
            border-top       : 0;
            border-bottom    : 0;
        }

        /*
        #tab Preheader
        #section preheader text
        #tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
        */
        .preheaderContainer .mcnTextContent, .preheaderContainer .mcnTextContent p {
            color       : #606060;
            font-family : Helvetica;
            font-size   : 11px;
            line-height : 125%;
            text-align  : left;
        }

        /*
        #tab Preheader
        #section preheader link
        #tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
        */
        .preheaderContainer .mcnTextContent a {
            color           : #606060;
            font-weight     : normal;
            text-decoration : underline;
        }

        /*
        #tab Header
        #section header style
        #tip Set the background color and borders for your email's header area.
        */
        #templateHeader {
            border-top    : 0;
            border-bottom : 0;
        }

        /*
        #tab Header
        #section header text
        #tip Set the styling for your email's header text. Choose a size and color that is easy to read.
        */
        .headerContainer .mcnTextContent, .headerContainer .mcnTextContent p {
            color       : #606060;
            font-family : Helvetica;
            font-size   : 15px;
            line-height : 150%;
            text-align  : left;
        }

        /*
        #tab Header
        #section header link
        #tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
        */
        .headerContainer .mcnTextContent a {
            color           : #6DC6DD;
            font-weight     : normal;
            text-decoration : underline;
        }

        /*
        #tab Body
        #section body style
        #tip Set the background color and borders for your email's body area.
        */
        #templateBody {
            background-color : #FFFFFF;
            border-top       : 0;
            border-bottom    : 0;
        }

        /*
        #tab Body
        #section body text
        #tip Set the styling for your email's body text. Choose a size and color that is easy to read.
        */
        .bodyContainer .mcnTextContent, .bodyContainer .mcnTextContent p {
            color       : #606060;
            font-family : Helvetica;
            font-size   : 15px;
            line-height : 150%;
            text-align  : left;
        }

        /*
        #tab Body
        #section body link
        #tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
        */
        .bodyContainer .mcnTextContent a {
            color           : #6DC6DD;
            font-weight     : normal;
            text-decoration : underline;
        }

        /*
        #tab Footer
        #section footer style
        #tip Set the background color and borders for your email's footer area.
        */
        #templateFooter {
            background-color : #F2F2F2;
            border-top       : 0;
            border-bottom    : 0;
        }

        /*
        #tab Footer
        #section footer text
        #tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
        */
        .footerContainer .mcnTextContent, .footerContainer .mcnTextContent p {
            color       : #606060;
            font-family : Helvetica;
            font-size   : 11px;
            line-height : 125%;
            text-align  : left;
        }

        /*
        #tab Footer
        #section footer link
        #tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
        */
        .footerContainer .mcnTextContent a {
            color           : #606060;
            font-weight     : normal;
            text-decoration : underline;
        }

        @media only screen and (max-width : 480px) {
            body, table, td, p, a, li, blockquote {
                -webkit-text-size-adjust : none !important;
            }

        }

        @media only screen and (max-width : 480px) {
            body {
                width     : 100% !important;
                min-width : 100% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            table[class=mcnTextContentContainer] {
                width : 100% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            table[class=mcnBoxedTextContentContainer] {
                width : 100% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            table[class=mcpreview-image-uploader] {
                width   : 100% !important;
                display : none !important;
            }

        }

        @media only screen and (max-width : 480px) {
            img[class=mcnImage] {
                width : 100% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            table[class=mcnImageGroupContentContainer] {
                width : 100% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnImageGroupContent] {
                padding : 9px !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnImageGroupBlockInner] {
                padding-bottom : 0 !important;
                padding-top    : 0 !important;
            }

        }

        @media only screen and (max-width : 480px) {
            tbody[class=mcnImageGroupBlockOuter] {
                padding-bottom : 9px !important;
                padding-top    : 9px !important;
            }

        }

        @media only screen and (max-width : 480px) {
            table[class=mcnCaptionTopContent], table[class=mcnCaptionBottomContent] {
                width : 100% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            table[class=mcnCaptionLeftTextContentContainer], table[class=mcnCaptionRightTextContentContainer], table[class=mcnCaptionLeftImageContentContainer], table[class=mcnCaptionRightImageContentContainer], table[class=mcnImageCardLeftTextContentContainer], table[class=mcnImageCardRightTextContentContainer] {
                width : 100% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnImageCardLeftImageContent], td[class=mcnImageCardRightImageContent] {
                padding-right  : 18px !important;
                padding-left   : 18px !important;
                padding-bottom : 0 !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnImageCardBottomImageContent] {
                padding-bottom : 9px !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnImageCardTopImageContent] {
                padding-top : 18px !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnImageCardLeftImageContent], td[class=mcnImageCardRightImageContent] {
                padding-right  : 18px !important;
                padding-left   : 18px !important;
                padding-bottom : 0 !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnImageCardBottomImageContent] {
                padding-bottom : 9px !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnImageCardTopImageContent] {
                padding-top : 18px !important;
            }

        }

        @media only screen and (max-width : 480px) {
            table[class=mcnCaptionLeftContentOuter] td[class=mcnTextContent], table[class=mcnCaptionRightContentOuter] td[class=mcnTextContent] {
                padding-top : 9px !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnCaptionBlockInner] table[class=mcnCaptionTopContent]:last-child td[class=mcnTextContent] {
                padding-top : 18px !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnBoxedTextContentColumn] {
                padding-left  : 18px !important;
                padding-right : 18px !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=mcnTextContent] {
                padding-right : 18px !important;
                padding-left  : 18px !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section template width
            #tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.
            */
            table[class=templateContainer] {
                /*#tab Mobile Styles
        #section template width
        #tip Make the template fluid for portrait or landscape view adaptability. If a fluid layout doesn't work for you, set the width to 300px instead.*/
                max-width : 600px !important;
                width     : 100% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section heading 1
            #tip Make the first-level headings larger in size for better readability on small screens.
            */
            h1 {
                font-size   : 24px !important;
                line-height : 125% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section heading 2
            #tip Make the second-level headings larger in size for better readability on small screens.
            */
            h2 {
                font-size   : 20px !important;
                line-height : 125% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section heading 3
            #tip Make the third-level headings larger in size for better readability on small screens.
            */
            h3 {
                font-size   : 18px !important;
                line-height : 125% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section heading 4
            #tip Make the fourth-level headings larger in size for better readability on small screens.
            */
            h4 {
                font-size   : 16px !important;
                line-height : 125% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section Boxed Text
            #tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
            */
            table[class=mcnBoxedTextContentContainer] td[class=mcnTextContent], td[class=mcnBoxedTextContentContainer] td[class=mcnTextContent] p {
                font-size   : 18px !important;
                line-height : 125% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section Preheader Visibility
            #tip Set the visibility of the email's preheader on small screens. You can hide it to save space.
            */
            table[id=templatePreheader] {
                display : block !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section Preheader Text
            #tip Make the preheader text larger in size for better readability on small screens.
            */
            td[class=preheaderContainer] td[class=mcnTextContent], td[class=preheaderContainer] td[class=mcnTextContent] p {
                font-size   : 14px !important;
                line-height : 115% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section Header Text
            #tip Make the header text larger in size for better readability on small screens.
            */
            td[class=headerContainer] td[class=mcnTextContent], td[class=headerContainer] td[class=mcnTextContent] p {
                font-size   : 18px !important;
                line-height : 125% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section Body Text
            #tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
            */
            td[class=bodyContainer] td[class=mcnTextContent], td[class=bodyContainer] td[class=mcnTextContent] p {
                font-size   : 18px !important;
                line-height : 125% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            /*
            #tab Mobile Styles
            #section footer text
            #tip Make the body content text larger in size for better readability on small screens.
            */
            td[class=footerContainer] td[class=mcnTextContent], td[class=footerContainer] td[class=mcnTextContent] p {
                font-size   : 14px !important;
                line-height : 115% !important;
            }

        }

        @media only screen and (max-width : 480px) {
            td[class=footerContainer] a[class=utilityLink] {
                display : block !important;
            }

        }</style>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="background-color: #F2F2F2;">
<center>
    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable"
           style="background-color: #F2F2F2;">
        <tr>
            <td align="center" valign="top" id="bodyCell">
                <!-- BEGIN TEMPLATE // -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN HEADER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader"
                                   style="background-color : #111111;">
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                            <tr>
                                                <td valign="top" class="headerContainer" style="padding-top:15px;
                                                padding-bottom:13px;">
                                                    <img src="{{ URL::asset('images/email-logo.png') }}"
                                                         alt="{{ Config::get('gzero.siteName') }}"
                                                         title="{{ Config::get('gzero.siteName') }}"/>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END HEADER -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN BODY // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody"
                                   style="background-color:#ffffff;">
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                            <tr>
                                                <td valign="top" class="bodyContainer"
                                                    style="padding-top:10px; padding-bottom:10px;">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                           class="mcnTextBlock">
                                                        <tbody class="mcnTextBlockOuter">
                                                        <tr>
                                                            <td valign="top" class="mcnTextBlockInner">

                                                                <table align="left" border="0" cellpadding="0" cellspacing="0"
                                                                       width="600" class="mcnTextContentContainer">
                                                                    <tbody>
                                                                    <tr>

                                                                        <td valign="top" class="mcnTextContent"
                                                                            style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">

                                                                          @section('emailContent')
                                                                          @show

                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>

                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END BODY -->
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <!-- BEGIN FOOTER // -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter">
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer">
                                            <tr>
                                                <td valign="top" class="footerContainer"
                                                    style="padding-top:10px; padding-bottom:10px;">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                           class="mcnTextBlock">
                                                        <tbody class="mcnTextBlockOuter">
                                                        <tr>
                                                            <td valign="top" class="mcnTextBlockInner">

                                                                <table align="left" border="0" cellpadding="0" cellspacing="0"
                                                                       width="600" class="mcnTextContentContainer">
                                                                    <tbody>
                                                                    <tr>

                                                                        <td valign="top" class="mcnTextContent"
                                                                            style="padding-top:9px; padding-right: 18px; padding-bottom: 9px; padding-left: 18px;">

                                                                            <em>
                                                                                Copyright © {{ Config::get('gzero.domain') }},
                                                                                @lang('common.allRightsReserved')</em>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>

                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <!-- // END FOOTER -->
                        </td>
                    </tr>
                </table>
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>
