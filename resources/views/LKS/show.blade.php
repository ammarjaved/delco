


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Site Survey Cover Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }
        .logo {
            border: 1px solid black;
            padding: 10px;
            font-size: 12px;
            width: 45%;
        }
        .content {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-top: 200px;
        }
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .header { display: flex; justify-content: space-between; margin-bottom: 20px; }
        .logo { border: 1px solid black; padding: 5px; font-size: 10px; width: 45%; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; }
        .checklist { display: flex; justify-content: space-between; }
        .checklist-left { width: 30%; }
        .checklist-right { width: 65%; }
        .signature { margin-top: 20px; }

        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    padding: 20px;
}

.container {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
}

h2 {
    text-align: left;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 8px 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

td[colspan="5"] {
    font-weight: bold;
    background-color: #f9f9f9;
}
    </style>
</head>
<body>
    <div class="container">

    <div class="header">
        <div class="logo">
            <img src="/api/placeholder/50/50" alt="TNB Logo">
            <p>TNB ENERGY SERVICES SDN BHD (344878-B)<br>
            Level 2, Jalan Air Hitam, Kawasan 16,<br>
            40000 Shah Alam, Selangor</p>
        </div>
        <div class="logo">
            <img src="/api/placeholder/50/50" alt="AK Logo">
            <p>ARAS KEJURUTERAAN SDN BHD<br>
            1st Floor No 72, Jalan SS 21/1, Damansara<br>
            Utama, 47400 Petaling Jaya, Selangor</p>
        </div>
    </div>
    <div class="content">
        <p>SITE SURVEY</p>
        <p>{{$survey->nama_pe}}</p>

        
    </div>


    <div class="header" style="padding-top: 300px">
        <div class="logo">
            <img src="/api/placeholder/30/30" alt="TNB Logo">
            <p>TNB ENERGY SERVICES SDN BHD (234667-M)<br>
            Level 2, Jalan Air Hitam, Kawasan 16,<br>
            40000 Shah Alam, Selangor</p>
        </div>
        <div class="logo">
            <img src="/api/placeholder/30/30" alt="AK Logo">
            <p>ARUS KEJURUTERAAN SDN BHD<br>
            1st Floor No 72, Jalan SS 21/1, Damansara<br>
            Utama, 47400 Petaling Jaya, Selangor</p>
        </div>
    </div>

    <h2 style="text-align: center;">TOOLBOX TALK FORM</h2>

    <table>
        <tr>
            <th>Lokasi</th>
            <td>{{$toolboxtalk->lokasi}}</td>
            <th>Tarikh</th>
            <td>{{$toolboxtalk->tarikh}}</td>
        </tr>
        <tr>
            <th>Nama Pencawang</th>
            <td>{{$survey->nama_pe}}</td>
            <th>CFS</th>
            <td>{{$toolboxtalk->cfs}}</td>
        </tr>
        <tr>
            <th>Skop Kerja</th>
            <td colspan="3">SITE SURVEY</td>
        </tr>
    </table>

    <div class="container">
        <h2>Checklist</h2>
        <table>
            <tr>
                <th></th>
                <th>Site Survey</th>
                <th>Cabling</th>
                <th>Outage</th>
                <th>SAT</th>
            </tr>
            <tr>
                <td colspan="5"><strong>PPD</strong></td>
            </tr>
            <tr>
                <td>Safety Helmet</td>
                <td>{{$toolboxtalk->ppd_safety_helment}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Safety Vest</td>
                <td>{{$toolboxtalk->ppd_safety_vest}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Safety Shoes</td>
                <td>{{$toolboxtalk->ppd_safety_shoes}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Safety</td>
                <td>{{$toolboxtalk->ppd_safety}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5"><strong>TOOL & EQUIPMENT INSTRUMENT</strong></td>
            </tr>
            <tr>
                <td>All In Good Condition</td>
                <td>{{$toolboxtalk->equipment_condition}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>


            <tr>
                <td colspan="5"><strong> INSTRUMENT</strong></td>
            </tr>
            <tr>
                <td>All In Good Condition</td>
                <td>{{$toolboxtalk->instrument_condition}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>First Aid Kit</td>
                <td>{{$toolboxtalk->instrument_kit_condition}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>


            <tr>
                <td colspan="5"><strong>VEHICLE</strong></td>
            </tr>
            <tr>
                <td>Fire Extinguisher</td>
                <td>{{$toolboxtalk->vehicle_fire_extinguisher}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Vehicle In Good Condition</td>
                <td>{{$toolboxtalk->vehicle_condition}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5"><strong>TRAFFIC</strong></td>
            </tr>
            <tr>
                <td>Safety Kon</td>
                <td>{{$toolboxtalk->traffic_safety_kon}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Sign Board</td>
                <td>{{$toolboxtalk->traffic_sign_board}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Chargeman Bo</td>
                <td>{{$toolboxtalk->traffic_chargeman}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5"><strong>TEAM</strong></td>
            </tr>
            <tr>
                <td>AP TNP</td>
                <td>{{$toolboxtalk->team_ap_tnp}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>CP TNB</td>
                <td>{{$toolboxtalk->team_cp_tnb}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5"><strong>NIOSH</strong></td>
            </tr>
            <tr>
                <td>All Staff Have NTSP</td>
                <td>{{$toolboxtalk->niosh_staff_ntsp}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5"><strong>PERMIT</strong></td>
            </tr>
            <tr>
                <td>Special Permit</td>
                <td>{{$toolboxtalk->permit_special}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Permit To Work (PTW)</td>
                <td>{{$toolboxtalk->permit_work}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5"><strong>PICTURE</strong></td>
            </tr>
            <tr>
                <td>Picture During Tool Box Talk</td>
                <td>{{$toolboxtalk->picture_during_toolbox}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td><img src='/{{$toolboxtalk->toolbox_image1}}'  width="200px" height="200px"  /></td>
                <td><img src='/{{$toolboxtalk->toolbox_image2}}'  width="200px" height="200px"  /></td>
            </tr>
        </table>
    </div>
    <div class="signature">
        <p>Supervisor:</p>
        <img src="/api/placeholder/100/50" alt="Signature">
        <p>Nama : AHMAD KHALIL QUSYAIRI</p>
    </div>



    

    </div>
</body>
</html>


