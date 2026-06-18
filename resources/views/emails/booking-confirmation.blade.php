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
                            <p style="color:#94a3b8;font-size:12px;margin:6px 0 0;letter-spacing:2px;text-transform:uppercase;">Premium Treks & Tours</p>
                        </td>
                    </tr>

                    <!-- Thank You -->
                    <tr>
                        <td style="padding:40px 40px 20px;text-align:center;">
                            <div style="font-size:48px;margin-bottom:16px;">🎉</div>
                            <h2 style="color:#0f172a;font-size:22px;margin:0;">Thank You, {{ $booking->name }}!</h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:0 40px;text-align:center;">
                            @if($booking->type === 'inquiry')
                                <p style="color:#64748b;font-size:15px;line-height:1.7;margin:0;">
                                    We've received your inquiry and our travel experts will get back to you within <strong style="color:#0f172a;">24 hours</strong>.
                                    In the meantime, feel free to reach out on WhatsApp for instant support.
                                </p>
                            @else
                                <p style="color:#64748b;font-size:15px;line-height:1.7;margin:0;">
                                    Your booking request for <strong style="color:#0f172a;">{{ $trek?->title ?? 'a custom tour' }}</strong> has been received.
                                    Our team will review it and contact you within <strong style="color:#0f172a;">24 hours</strong> to confirm availability and next steps.
                                </p>
                            @endif
                        </td>
                    </tr>

                    <!-- Reference Number -->
                    <tr>
                        <td style="padding:24px 40px 0;text-align:center;">
                            <div style="display:inline-block;background:#0f172a;color:#ffffff;padding:12px 20px;border-radius:12px;font-size:14px;font-weight:700;letter-spacing:0.5px;">
                                Reference No: {{ $booking->reference_code }}
                            </div>
                            <p style="color:#64748b;font-size:12px;margin:10px 0 0;">Save this reference number to track your booking anytime.</p>
                        </td>
                    </tr>

                    <!-- Booking Summary -->
                    <tr>
                        <td style="padding:30px 40px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc;border-radius:12px;border:1px solid #e2e8f0;">
                                <tr>
                                    <td colspan="2" style="padding:16px 20px 8px;">
                                        <span style="color:#94a3b8;font-size:11px;text-transform:uppercase;letter-spacing:1px;font-weight:600;">Your Request Summary</span>
                                    </td>
                                </tr>
                                @if($trek)
                                <tr>
                                    <td style="padding:8px 20px;"><span style="color:#94a3b8;font-size:13px;">Package</span></td>
                                    <td style="padding:8px 20px;text-align:right;"><span style="color:#0f172a;font-size:13px;font-weight:600;">{{ $trek->title }}</span></td>
                                </tr>
                                @endif
                                @if($booking->start_date)
                                <tr>
                                    <td style="padding:8px 20px;"><span style="color:#94a3b8;font-size:13px;">Dates</span></td>
                                    <td style="padding:8px 20px;text-align:right;"><span style="color:#0f172a;font-size:13px;">{{ $booking->start_date->format('d M') }} – {{ $booking->end_date?->format('d M Y') }}</span></td>
                                </tr>
                                @endif
                                @if($booking->guests)
                                <tr>
                                    <td style="padding:8px 20px;"><span style="color:#94a3b8;font-size:13px;">Travelers</span></td>
                                    <td style="padding:8px 20px;text-align:right;"><span style="color:#0f172a;font-size:13px;">{{ $booking->guests }}</span></td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding:8px 20px;border-top:1px solid #e2e8f0;"><span style="color:#94a3b8;font-size:13px;">Status</span></td>
                                    <td style="padding:8px 20px;border-top:1px solid #e2e8f0;text-align:right;"><span style="color:#059669;font-size:13px;font-weight:600;">{{ $booking->status }}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Track CTA -->
                    <tr>
                        <td style="padding:0 40px 30px;text-align:center;">
                            <a href="{{ route('booking.track') }}" style="display:inline-block;background:#d4a853;color:#0f172a;text-decoration:none;padding:14px 32px;border-radius:10px;font-size:14px;font-weight:700;letter-spacing:0.3px;margin-right:8px;">
                                Track Booking
                            </a>
                        </td>
                    </tr>

                    <!-- WhatsApp CTA -->
                    <tr>
                        <td style="padding:0 40px 30px;text-align:center;">
                            <a href="https://wa.me/923131562859?text=Hi!%20I%20just%20submitted%20a%20booking%20request%20on%20your%20website." style="display:inline-block;background:#25D366;color:#ffffff;text-decoration:none;padding:14px 32px;border-radius:10px;font-size:14px;font-weight:600;">
                                💬 Chat on WhatsApp
                            </a>
                            <p style="color:#94a3b8;font-size:12px;margin:16px 0 0;">Or email us at <a href="mailto:info@discoverghanche.com" style="color:#059669;">info@discoverghanche.com</a></p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8fafc;padding:20px 40px;text-align:center;border-top:1px solid #e2e8f0;">
                            <p style="color:#94a3b8;font-size:12px;margin:0;">Karakorum Crown Expeditions · Skardu, Gilgit-Baltistan, Pakistan</p>
                            <p style="color:#cbd5e1;font-size:11px;margin:6px 0 0;">Licensed Tour Operator #2332 · PATO Certified · NADRA Verified</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
