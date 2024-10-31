@extends('Admin.Layout.Layout')
@section('title')
    QrCode List
@endsection
@section('content')
    <livewire:admin.qr-code /> 
@endsection

@section('style')
@endsection
@section('script')
<script>
    document.getElementById('saveQrCode').addEventListener('click', function() {
        const numberOfQRCodes = document.getElementById('numberOfQRCodes').value;
        if (numberOfQRCodes > 0) {
            // คุณสามารถเขียนโค้ดเพื่อส่งข้อมูลไปยังเซิร์ฟเวอร์ที่นี่
            console.log('จำนวน QR Code ที่ต้องการสร้าง:', numberOfQRCodes);
            // ปิด modal
            $('#addQrCodeModal').modal('hide');
            // รีเซ็ตฟอร์ม
            document.getElementById('addQrCodeForm').reset();
        } else {
            alert('กรุณากรอกจำนวนที่ถูกต้อง');
        }
    });
</script>
@endsection
