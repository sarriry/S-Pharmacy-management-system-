<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Print Table</title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
<style>
    /* ===============================
       PDF REPORT STYLE - WKHTMLTOPDF SAFE
       No CDN / No Internet Required
    =============================== */

    * {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        background: #ffffff;
        color: #111827;
        font-family: DejaVu Sans, Arial, sans-serif;
        font-size: 12px;
        line-height: 1.45;
    }

    body {
        padding: 18px 22px;
    }

    .pdf-page {
        width: 100%;
        background: #ffffff;
    }

    .pdf-header {
        width: 100%;
        background: #064e3b;
        color: #ffffff;
        padding: 16px 18px;
        margin-bottom: 16px;
        border-bottom: 4px solid #d1fae5;
    }

    .pdf-header table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .pdf-header td {
        border: none;
        color: #ffffff;
        background: transparent;
        padding: 0;
        vertical-align: middle;
    }

    .pdf-title {
        font-size: 22px;
        font-weight: bold;
        margin: 0;
        color: #ffffff;
    }

    .pdf-subtitle {
        font-size: 12px;
        margin-top: 5px;
        color: #d1fae5;
    }

    .pdf-date {
        text-align: right;
        font-size: 12px;
        font-weight: bold;
        color: #ffffff;
    }

    .info-box {
        width: 100%;
        background: #ecfdf5;
        border: 1px solid #bbf7d0;
        padding: 10px 12px;
        margin-bottom: 14px;
    }

    .info-box table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .info-box td {
        border: none;
        background: transparent;
        color: #064e3b;
        padding: 4px 6px;
        font-weight: bold;
    }

    .section-title {
        background: #f0fdf4;
        color: #064e3b;
        border-left: 5px solid #064e3b;
        padding: 8px 10px;
        margin: 14px 0 10px;
        font-size: 15px;
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 8px;
        background: #ffffff;
    }

    thead th {
        background: #064e3b;
        color: #ffffff;
        border: 1px solid #064e3b;
        padding: 8px 6px;
        text-align: center;
        font-weight: bold;
        font-size: 11px;
        white-space: nowrap;
    }

    tbody td {
        background: #ffffff;
        color: #111827;
        border: 1px solid #d1fae5;
        padding: 7px 6px;
        text-align: center;
        font-size: 11px;
    }

    tbody tr:nth-child(even) td {
        background: #f0fdf4;
    }

    tfoot th,
    tfoot td {
        background: #ecfdf5;
        color: #064e3b;
        border: 1px solid #bbf7d0;
        padding: 8px 6px;
        font-weight: bold;
        text-align: center;
    }

    .text-left {
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .money {
        color: #065f46;
        font-weight: bold;
    }

    .badge {
        display: inline-block;
        padding: 4px 8px;
        background: #dcfce7;
        color: #064e3b;
        border: 1px solid #bbf7d0;
        font-weight: bold;
        font-size: 10px;
    }

    .summary-table {
        margin-bottom: 14px;
    }

    .summary-table td {
        background: #f8fafc;
        border: 1px solid #d1fae5;
        padding: 10px;
        text-align: center;
    }

    .summary-label {
        color: #64748b;
        font-size: 11px;
        font-weight: bold;
    }

    .summary-value {
        color: #064e3b;
        font-size: 17px;
        font-weight: bold;
        margin-top: 3px;
    }

    .footer {
        margin-top: 18px;
        padding-top: 10px;
        border-top: 1px solid #d1fae5;
        color: #64748b;
        font-size: 10px;
        text-align: center;
    }

    .no-data {
        background: #f8fafc;
        color: #64748b;
        border: 1px dashed #94a3b8;
        padding: 18px;
        text-align: center;
        font-weight: bold;
        margin-top: 12px;
    }
</style>

        
        <style>
            body {margin: 20px}
        </style>
    </head>
    <body>
        <table class="table table-bordered table-condensed table-striped">
            @foreach($data as $row)
                @if ($loop->first)
                    <tr>
                        @foreach($row as $key => $value)
                            <th>{!! $key !!}</th>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    @foreach($row as $key => $value)
                        @if(is_string($value) || is_numeric($value))
                            <td>{!! $value !!}</td>
                        @else
                            <td></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
    </body>
</html>
