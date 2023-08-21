<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales Receipt</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background: #ffffff;
        }

        div,
        p,
        a,
        li,
        td {
            -webkit-text-size-adjust: none;
        }

        body {
            width: 88mm;
            height: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;

        }

        p {
            padding: 0 !important;
            margin-top: 0 !important;
            margin-right: 0 !important;
            margin-bottom: 0 !important;
            margin- left: 0 !important;
        }

        .visibleMobile {
            display: none;
        }

        .hiddenMobile {
            display: block;
        }
        .page-break {
            page-break-before: always;
        }
        @media print {
            .noprint {
                display: none !important;
            }
        }
    </style>

</head>
<body>

    <!-- Header -->
    <table width="100%" border="0" cellpadding='2' cellspacing="2" align="center" bgcolor="#ffffff" style="padding-top:4px;">
        <tbody>
        <tr>
            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height:

    18px; vertical-align: bottom; text-align: center;">
                <strong style="font-size:16px;">{{ config('app.name', 'Receipt') }}</strong>
                <br> Court Road, Manjeri, Malappuram
                <br>phone: 0403 - 247830 322
                <br>TRN: {{ $sale['invoice'] }}
            </td>
        </tr>
        <tr>
            <td height="2" colspan="0" style="border-bottom:1px solid #e4e4e4 "></td>
        </tr>
        </tbody>
    </table>

    <table width="100%" border="0" cellpadding="0" cellspacing="2" align="center">
        <tbody>
        <tr>
            <td colspan="100" style="font-size: 14px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height:

    18px; vertical-align: bottom; text-align: center;">
                <strong>Cash Receipt</strong>
            </td>
        </tr>
        <tr>
            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height:

    18px; vertical-align: bottom; text-align: left;">
                {{ $sale['customer'] != 'Desk' ? $sale['customer'] : '' }}
            </td>
            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height:18px; vertical-align: top; text-align: right;">
    {{--            <br>INVOICE: #32432432423--}}
    {{--            <br>Date: Feb 27, 2018--}}
            </td>
        </tr>
        <tr>
            <td height="2" colspan="100" style="padding-top:15px;border-bottom:1px solid #e4e4e4 "></td>
        </tr>
        </tbody>
    </table>

    <!-- /Header -->



    <!-- Table Total -->
    <table width="100%" border="0 " cellpadding="0" cellspacing="2" align="center" style="padding: 12px 0px 5px 2px">
        <tbody>
        <tr>
            <td style="font-size: 16px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:left; padding-left:16px ">
                Quantity:
            </td>
            <td style="font-size: 16px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:left; white-space:nowrap; " width="100 ">
                {{ $sale['qty'] }} KG
            </td>
        </tr>


        <tr>
            <td height="2" colspan="100" style="padding-top:8px;border-bottom:1px solid #e4e4e4 "></td>
        </tr>
        </tbody>
    </table>
    <table width="100%" border="0 " cellpadding="0" cellspacing="2" align="center" style="padding: 12px 0px 5px 2px">
        <tbody>
        <tr>
            <td style="font-size: 16px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:left; padding-left:16px ">
                Amount:
            </td>
            <td style="font-size: 16px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:left; white-space:nowrap; " width="100 ">
                &#8358; {{ $sale['price'] }}
            </td>
        </tr>


        <tr>
            <td height="2" colspan="100" style="padding-top:8px;border-bottom:1px solid #e4e4e4 "></td>
        </tr>
        </tbody>
    </table>
    <!-- /Table Total -->
    <!-- Customer sign -->
    <table width="100% " border="0 " cellpadding="0" cellspacing="2" align="center" style="padding: 12px 0px 5px 2px">
        <tbody>
        <tr>
        </tr>
        <tr>
            <td style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:right; padding-top:16px ">
                Customer's Copy
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:center; padding-top:16px">

            </td>
        </tr>
        </tbody>
    </table>

    <div class="page-break"></div>

    <!-- Header -->
    <table width="100%" border="0" cellpadding='2' cellspacing="2" align="center" bgcolor="#ffffff" style="padding-top:4px;">
        <tbody>
        <tr>
            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height:

    18px; vertical-align: bottom; text-align: center;">
                <strong style="font-size:16px;">{{ config('app.name', 'Receipt') }}</strong>
                <br> Court Road, Manjeri, Malappuram
                <br>phone: 0403 - 247830 322
                <br>TRN: {{ $sale['invoice'] }}
            </td>
        </tr>
        <tr>
            <td height="2" colspan="0" style="border-bottom:1px solid #e4e4e4 "></td>
        </tr>
        </tbody>
    </table>

    <table width="100%" border="0" cellpadding="0" cellspacing="2" align="center">
        <tbody>
        <tr>
            <td colspan="100" style="font-size: 14px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height:

    18px; vertical-align: bottom; text-align: center;">
                <strong>Cash Receipt</strong>
            </td>
        </tr>
        <tr>
            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height:

    18px; vertical-align: bottom; text-align: left;">
                {{ $sale['customer'] != 'Desk' ? $sale['customer'] : '' }}
            </td>
            <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height:18px; vertical-align: top; text-align: right;">
                {{--            <br>INVOICE: #32432432423--}}
                {{--            <br>Date: Feb 27, 2018--}}
            </td>
        </tr>
        <tr>
            <td height="2" colspan="100" style="padding-top:15px;border-bottom:1px solid #e4e4e4 "></td>
        </tr>
        </tbody>
    </table>

    <!-- /Header -->



    <!-- Table Total -->
    <table width="100%" border="0 " cellpadding="0" cellspacing="2" align="center" style="padding: 12px 0px 5px 2px">
        <tbody>
        <tr>
            <td style="font-size: 16px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:left; padding-left:16px ">
                Quantity:
            </td>
            <td style="font-size: 16px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:left; white-space:nowrap; " width="100 ">
                {{ $sale['qty'] }} KG
            </td>
        </tr>


        <tr>
            <td height="2" colspan="100" style="padding-top:8px;border-bottom:1px solid #e4e4e4 "></td>
        </tr>
        </tbody>
    </table>
    <table width="100%" border="0 " cellpadding="0" cellspacing="2" align="center" style="padding: 12px 0px 5px 2px">
        <tbody>
        <tr>
            <td style="font-size: 16px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:left; padding-left:16px ">
                Amount:
            </td>
            <td style="font-size: 16px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:left; white-space:nowrap; " width="100 ">
                &#8358; {{ $sale['price'] }}
            </td>
        </tr>


        <tr>
            <td height="2" colspan="100" style="padding-top:8px;border-bottom:1px solid #e4e4e4 "></td>
        </tr>
        </tbody>
    </table>
    <!-- /Table Total -->
    <!-- Customer sign -->
    <table width="100% " border="0 " cellpadding="0" cellspacing="2" align="center" style="padding: 12px 0px 5px 2px">
        <tbody>
        <tr>
        </tr>
        <tr>
            <td style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:right; padding-top:16px ">

            </td>
        </tr>
        <tr>
            <td style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:center; padding-top:16px">

            </td>
        </tr>
        </tbody>
    </table>

    <div class="noprint" style="margin-left: 15px">
        <button style="background-color: #546060; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px; cursor: pointer;" onclick="window.print();">Print</button>
        <button style="background-color: #090a0a; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px; cursor: pointer;" onclick="window.close();">Close</button>
    </div>
    <script>
        window.onload = function() {
            window.print();
            setTimeout(function() {
                window.close();
            }, 1000);
        };
    </script>
{{--    <div class="page-break"></div>--}}

</body>
</html>



