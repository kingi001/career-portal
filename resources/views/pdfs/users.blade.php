<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Report</title>
    <style>
        /* FONT FACE */
        @font-face {
            font-family: 'FuturaLT';
            src: url('{{ public_path('fonts/futura-lt/FuturaLT.ttf') }}') format('truetype');
        }

        @font-face {
            font-family: 'FuturaLT-Bold';
            src: url('{{ public_path('fonts/futura-lt/FuturaLT-Bold.ttf') }}') format('truetype');
            font-weight: bold;
        }

        body {
            font-family: 'FuturaLT', sans-serif;
            font-size: 11px; /* reduced font */
            margin: 20px; /* tighter margins */
            padding: 0;
            background: white;
            color: #333;
        }

        .container {
            margin: 0; /* remove extra margin */
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #264d99;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }

        .logo-section {
            text-align: center;
        }

        .logo {
            height: 60px; /* smaller logo */
            width: auto;
            margin-bottom: 4px;
        }

        .company-title {
            font-family: 'FuturaLT-Bold';
            color: #1b3f8b;
            font-size: 16px;
            margin: 0;
        }

        .report-info {
            text-align: right;
        }

        .report-title {
            font-family: 'FuturaLT-Bold';
            font-size: 20px;
            color: #1b3f8b;
            margin-bottom: 6px;
        }

        .report-meta {
            font-size: 10px;
            margin-bottom: 2px;
            color: #666;
        }

        .summary-stats {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .stat-box {
            background: #f7f7f7;
            padding: 8px 10px;
            border-left: 4px solid #1b3f8b;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.07);
            flex: 1;
            min-width: 100px;
        }

        .stat-box div:first-child {
            font-size: 10px;
            color: #666;
            margin-bottom: 2px;
        }

        .stat-value {
            font-family: 'FuturaLT-Bold';
            font-size: 16px;
            color: #1b3f8b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px; /* smaller table font */
            background: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
        }

        th, td {
            border: 1px solid #e5e8eb;
            padding: 6px 5px; /* smaller padding */
            vertical-align: top;
        }

        thead {
            background-color: #1b3f8b;
            color: #ffffff;
        }

        tbody tr:nth-child(even) {
            background-color: #f4f6f8;
        }

        .badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 9px;
            margin-left: 4px;
            font-weight: bold;
        }

        .badge-primary {
            background-color: #d6e4f0;
            color: #1b3f8b;
        }

        .badge-inactive {
            background-color: #adb5bd;
            color: white;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 9px;
            font-weight: 600;
            padding: 4px 6px;
            border-radius: 999px;
        }

        .status-active {
            background-color: #27ae60;
            color: white;
        }

        .status-inactive {
            background-color: #e74c3c;
            color: white;
        }

        .footer {
            border-top: 2px solid #1b3f8b;
            margin-top: 20px;
            font-size: 9px;
            color: #777;
            display: flex;
            justify-content: space-between;
            padding-top: 8px;
        }

        .text-danger {
            color: #e74c3c;
        }

        .page-number::after {
            content: counter(page);
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="page-header">
            <div class="logo-section">
                <img src="{{ public_path('images/logo.png') }}" class="logo" alt="Logo">
                <h2 class="company-title">Bandari Maritime Academy</h2>
            </div>
            <div class="report-info">
                <h1 class="report-title">User Report</h1>
                <div class="report-meta"><strong>Generated:</strong> {{ now()->format('F j, Y \\a\\t g:i a') }}</div>
                <div class="report-meta"><strong>Prepared by:</strong> {{ auth()->user()->name ?? 'System' }}</div>
                <div class="report-meta"><strong>Total Users:</strong> {{ count($users) }}</div>
            </div>
        </div>

        <!-- Stats -->
        <div class="summary-stats">
            <div class="stat-box">
                <div>Total Users</div>
                <div class="stat-value">{{ $stats['total_users'] ?? count($users) }}</div>
            </div>
        </div>

        <!-- Table -->
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Account Info</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $user->name }}</strong>
                            @if ($user->created_at >= now()->subDays(30))
                                <span class="badge badge-primary">New</span>
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->getRoleNames() as $role)
                                {{ $role }}
                            @endforeach
                        </td>
                        <td>
                            @if (is_null($user->deleted_at))
                                <span class="status-badge status-active">
                                    <i class="fa fa-check"></i> Active
                                </span>
                            @else
                                <span class="status-badge status-inactive">
                                    <i class="fa fa-times"></i> Inactive
                                </span>
                            @endif
                        </td>
                        <td>
                            <div><strong>Created:</strong> {{ $user->created_at->format('M d, Y') }}</div>
                            <div><strong>Updated:</strong> {{ $user->updated_at?->format('M d, Y') ?? 'N/A' }}</div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center; padding: 15px;">No user records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <div>&copy; {{ date('Y') }} Bandari Maritime Academy. All rights reserved.</div>
            <div><strong class="text-danger">CONFIDENTIAL</strong> | Page <span class="page-number"></span></div>
        </div>
    </div>

</body>

</html>
