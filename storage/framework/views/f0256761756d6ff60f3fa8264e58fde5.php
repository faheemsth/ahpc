<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Overseas Fee Invoice</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?php echo e(optional($invoice->user)->avatar); ?>" style="width: 100%; max-width: 110px" />
                            </td>
                            <td>
                                Licence No #: <?php echo e($invoice->invoice_id); ?><br />
                                <img src="data:image/png;base64,<?php echo e(base64_encode(QrCode::format('png')->size(300)->generate($invoice->invoice_id))); ?>"
                                    alt="QR Code" width="100" height="100">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <b class="heading">Dear</b> <?php echo e($invoice->user->first_name); ?><br />
                                <?php echo e($invoice->user->postel_address); ?><br />
                                <?php echo e($invoice->user->email); ?><br />
                                <b class="heading">Registered Date</b>
                                <?php echo e(Illuminate\Support\Carbon::parse($invoice->user->created_at)->format('d-m-Y')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                The note acknowledges the receipt of an invoice sent through a specific website.
                                It expresses gratitude for the prompt submission of the invoice and assures the sender
                                that the document will be reviewed promptly.
                                The message also indicates that any discrepancies or the need for additional information
                                will be addressed in a timely manner.
                                The note closes with appreciation for the sender's efficiency and cooperation.
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
<?php /**PATH C:\wamp64\www\Projects\ahpc\resources\views/user-panels/overseas/invoice.blade.php ENDPATH**/ ?>