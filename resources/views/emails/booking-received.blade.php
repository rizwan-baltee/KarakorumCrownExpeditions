<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0;padding:0;background:#f1f5f9;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td style="background:linear-gradient(135deg,#0f172a,#1e293b);padding:32px 40px;text-align:center;">
                            <h1 style="color:#d4a853;font-size:22px;margin:0;letter-spacing:1px;">Karakorum Crown Expeditions</h1>
                            <p style="color:#94a3b8;font-size:12px;margin:6px 0 0;letter-spacing:2px;text-transform:uppercase;">Admin Notification</p>
                        </td>
                    </tr>

                    <!-- Badge -->
                    <tr>
                        <td style="padding:30px 40px 0;text-align:center;">
                            @if($booking->type === 'inquiry')
                                <span style="display:inline-block;background:#eff6ff;color:#2563eb;padding:8px 20px;border-radius:20px;font-size:13px;font-weight:600;letter-spacing:0.5px;">📩 NEW INQUIRY</span>
                            @else
                                <span style="display:inline-block;background:#ecfdf5;color:#059669;padding:8px 20px;border-radius:20px;font-size:13px;font-weight:600;letter-spacing:0.5px;">📋 NEW BOOKING REQUEST</span>
                            @endif
                        </td>
                    </tr>

                    <!-- Title -->
                    <tr>
                        <td style="padding:20px 40px 0;text-align:center;">
                            <h2 style="color:#0f172a;font-size:20px;margin:0;">{{ $booking->name }}</h2>
                            <p style="color:#64748b;font-size:14px;margin:8px 0 0;">
                                @if($trek)
                                    Interested in <strong style="color:#0f172a;">{{ $trek->title }}</strong>
                                @else
                                    Requesting a custom tour
                                @endif
                            </p>
                            <div style="margin-top:14px;display:inline-block;background:#0f172a;color:#ffffff;padding:10px 16px;border-radius:12px;font-size:13px;font-weight:700;">
                                Reference No: {{ $booking->reference_code }}
                            </div>
                        </td>
                    </tr>

                    <!-- Details Card -->
                    <tr>
                        <td style="padding:24px 40px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc;border-radius:12px;border:1px solid #e2e8f0;">
                                @php
                                    $rows = [
                                        ['📧 Email', $booking->email],
                                        ['📱 Phone', $booking->phone],
                                    ];
                                    if ($booking->country) $rows[] = ['🌍 Country', $booking->country];
                                    if ($booking->start_date) $rows[] = ['📅 Preferred Dates', $booking->start_date->format('d M Y') . ' → ' . $booking->end_date?->format('d M Y')];
                                    if ($booking->guests) $rows[] = ['👥 Travelers', $booking->guests];
                                    if ($booking->special_requirements) $rows[] = ['⚠️ Special Requirements', $booking->special_requirements];
                                    if ($booking->comment) $rows[] = ['💬 Notes', $booking->comment];
                                @endphp

                                @foreach($rows as $i => $row)
                                <tr>
                                    <td style="padding:14px 20px;border-bottom:1px solid #e2e8f0;{{ $loop->last ? 'border-bottom:none;' : '' }}">
                                        <span style="color:#94a3b8;font-size:12px;display:block;margin-bottom:3px;">{{ $row[0] }}</span>
                                        <span style="color:#0f172a;font-size:14px;font-weight:500;">{{ $row[1] }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>

                    <!-- CTA -->
                    <tr>
                        <td style="padding:0 40px 30px;text-align:center;">
                            <a href="{{ route('admin.bookings.show', $booking) }}" style="display:inline-block;background:linear-gradient(135deg,#059669,#0d9488);color:#ffffff;text-decoration:none;padding:14px 32px;border-radius:10px;font-size:14px;font-weight:600;letter-spacing:0.5px;">
                                View in Admin Panel →
                            </a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8fafc;padding:20px 40px;text-align:center;border-top:1px solid #e2e8f0;">
                            <p style="color:#94a3b8;font-size:12px;margin:0;">Submitted {{ $booking->created_at->format('d M Y \a\t g:i A') }}</p>
                            <p style="color:#cbd5e1;font-size:11px;margin:6px 0 0;">Karakorum Crown Expeditions · Skardu, Gilgit-Baltistan · Licensed Tour Operator #2332</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
