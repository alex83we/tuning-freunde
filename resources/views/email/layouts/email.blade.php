<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }
            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }
            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }
        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
    </style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
<div
    style="display: none; font-size: 1px; color: #3d4852; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif !important; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#7cf12e" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 95%;">
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#7cf12e" align="center" style="padding: 0px 10px 0 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 95%;">
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top"
                        style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h1 style="font-size: 100%; font-weight: 400; margin: 2px;">@yield('titleEmail')</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 95%;">
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #3d4852; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 16px !important; font-weight: 400; line-height: 25px;">
                        @yield('contentEmail')
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
            @include('email.layouts.footer')
        </td>
    </tr>
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 95%;">
                <tr>
                    <td bgcolor="#f4f4f4" align="left"
                        style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif !important; font-size: 14px; font-weight: 400; line-height: 18px;">
                        <br>
                        <p style="margin: 0;">&nbsp;</p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
