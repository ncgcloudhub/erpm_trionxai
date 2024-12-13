<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Expense Report</title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table {
            font-size: 12px;
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
            margin-bottom: 10px;
        }
        .header .company-info {
            font-size: 14px;
            line-height: 1.5;
        }
        .expense-details {
            margin-bottom: 20px;
            font-size: 13px;
        }
        .image-container {
            margin: 20px 0;
            text-align: center;
        }
        .image-container img {
            max-width: 80%;
            height: auto;
            border: 1px solid #ddd;
            margin-top: 10px;
        }
        .footer {
            position: fixed;
            bottom: 10px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #555;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('assets/img/sale_invoice.png') }}" alt="Logo">
        <div class="company-info">
            <strong>STRITS TAX LLC</strong><br>
            <strong>Email:</strong> taxhelp@stritstax.com<br>
            <strong>Phone:</strong> 929-491-0123 / 862-419-3849
        </div>
    </div>

    <!-- Expense Details -->
    <div class="expense-details">
        <div class="title">Expense Details</div>
        <table>
            <tbody>
                <tr>
                    <td><strong>Date:</strong></td>
                    <td>{{ $expense->date }}</td>
                </tr>
                <tr>
                    <td><strong>Employee:</strong></td>
                    <td>{{ $expense->user->f_name }} {{ $expense->user->l_name }}</td>
                </tr>
                <tr>
                    <td><strong>Expense Type:</strong></td>
                    <td>{{ $expense->expenseType->expenseType }}</td>
                </tr>
                <tr>
                    <td><strong>Amount:</strong></td>
                    <td>${{ $expense->amount}}</td>
                </tr>
                <tr>
                    <td><strong>Vendor:</strong></td>
                    <td>{{ $expense->merchant_vendor }}</td>
                </tr>
                <tr>
                    <td><strong>Payment Method:</strong></td>
                    <td>{{ $expense->payment_method }}</td>
                </tr>
                <tr>
                    <td><strong>Tax Amount:</strong></td>
                    <td>${{ $expense->tax_information }}</td>
                </tr>
                <tr>
                    <td><strong>Location:</strong></td>
                    <td>{{ $expense->location }}</td>
                </tr>
                <tr>
                    <td><strong>Made By:</strong></td>
                    <td>{{ $expense->madeBy->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>

  <!-- Receipt Image or PDF -->
<div class="image-container">
  <strong>Receipt:</strong>
  @if($expense->receipt)
      @if(strtolower(pathinfo($expense->receipt, PATHINFO_EXTENSION)) === 'pdf')
          <a href="{{ asset($expense->receipt) }}" target="_blank" class="btn btn-primary" style="margin-top: 10px;">View PDF</a>
      @else
          <img src="{{ asset($expense->receipt) }}" width="200px" height="200px" alt="Receipt">
      @endif
  @else
      <p>No Receipt Uploaded</p>
  @endif
</div>

<!-- Attachment Image or PDF -->
<div class="image-container">
  <strong>Attachment:</strong>
  @if($expense->attachment)
      @if(strtolower(pathinfo($expense->attachment, PATHINFO_EXTENSION)) === 'pdf')
          <a href="{{ asset($expense->attachment) }}" target="_blank" class="btn btn-primary" style="margin-top: 10px;">View PDF</a>
      @else
          <img src="{{ asset($expense->attachment) }}" width="200px" height="200px" alt="Attachment">
      @endif
  @else
      <p>No Attachment Uploaded</p>
  @endif
</div>


    <!-- Footer -->
    <div class="footer">
        <strong>STRITS TAX LLC | Thank you for your business!</strong>
    </div>
</body>
</html>
