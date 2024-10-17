<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        .container {
            margin-top: 10px;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }
        .table th, .table td {
            border: 1px solid black;
            text-align: left;
            word-wrap: break-word;
            min-width: 90px;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .header img {
            display: block;
            margin: 0 auto;
            width: 100px;
        }
        p {
            margin: 0;
            padding: 0;
        }
        .university {
            font-size: 20px;
            font-weight: bolder;
        }
        .report-title {
            font-size: 14px;
            font-weight: bold;
        }

        .department{
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('images/UCU-logo.png') }}" alt="UCU Logo">
            <p class="university">Urdaneta City University&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <p class="report-title">&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Reports list of Pass Slip&nbsp;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</p>            <p class="department">Security Management Office Report&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        </div>
    </div>
    <div>
        <p class="text-start">Title: {{ $title }}</p>
        <p class="text-start">Date: {{ $date }}</p>

       @if(!empty($employee_type))<p> ({{ $employee_type }} Employee's)</p>@endif

    @if(!empty($start_date) && !empty($end_date))
        <p class="text-start">Date Range: {{ $start_date }} - {{ $end_date }}</p>
    @endif
    </div>
    <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Destination</th>
                <th>Date</th>
                <th>Time Out</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($passSlips as $passSlip)
                <tr>
                    <td>{{ $passSlip->p_no }}</td>
                    <td>{{ $passSlip->first_name }} {{ $passSlip->middle_name }}. {{ $passSlip->last_name }}</td>
                    <td>{{ $passSlip->department }}</td>
                    <td>{{ $passSlip->designation }}</td>
                    <td>{{ $passSlip->destination }}</td>
                    <td>{{ \Carbon\Carbon::parse($passSlip->date)->format('F d, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($passSlip->time_out)->format('g:i A') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No Data available in table</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
    <div class="text-start mt-4">
        <p>Generated by: {{ $user->name }}</p>
    </div>
</body>
</html>
