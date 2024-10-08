
@php
 $imageFields = [
                'substation_fl_image1', 'substation_fl_image2',
                'existing_switchgear_image1', 'existing_switchgear_image2',
                'switchgear_nameplate_image1', 'switchgear_nameplate_image2',
                'distribution_board_image1', 'distribution_board_image2',
                'battery_charger_image1', 'battery_charger_image2',
                'battery_charger_nameplate_image1', 'battery_charger_nameplate_image2',
                'ceiling_tray_image1', 'ceiling_tray_image2',
                'civil_location_image1', 'civil_location_image2',
                'substation_entrance_image1', 'substation_entrance_image2',
                'cable_route_image1', 'cable_route_image2',
                'genset_location_image1', 'genset_location_image2',
                'feeder_tx_image1', 'feeder_tx_image2',
                'trench_view_image1', 'trench_view_image2',
                'rtu_image1', 'rtu_image2',
                'rcb_image1', 'rcb_image2',
                'efi_image1', 'efi_image2',
                'other_image1', 'other_image2', 'other_image3', 'other_image4'
            ];
$toolboxImageFields = ['toolbox_image1', 'toolbox_image2'];
@endphp
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

        .logo img {
            width: 100px;
        }

        .title {
            font-size: 24px;
            text-align: center;
        }

        .checklist-container {
            display: flex;
            justify-content: space-between;
            padding: 20px; 
        }

        .checklist-left, .checklist-right {
            flex: 1;
            margin: 0 30px; 
        }

        .checklist-left {
            margin-right: 40px; 
        }

        .checklist-right {
            margin-left: 40px; 
        }

        .checklist {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap; 
        }

        ol {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            display: flex;
            align-items: center;
            margin-bottom: 15px; 
            font-size: 14px; 
        }

        li label {
            margin-right: 20px; 
            margin-left: 10px; 
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .prepared, .reviewed {
            width: 45%;
            text-align: left;
        }

        .signature-box {
            border: 1px solid #000;
            width: 150px;
            height: 50px;
            margin-bottom: 10px;
        }

        input[type="checkbox"] {
            margin-right: 5px; 
            accent-color: black;
            cursor: not-allowed;
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #000;
            background-color: #fff;
            position: relative;
            vertical-align: middle; 
        }

        input[type="checkbox"]:checked::before {
            content: "✓";
            color: #000;
            font-weight: bold;
            font-size: 14px; 
            position: absolute;
            left: 2px;
            top: -2px;
        }

        input[type="checkbox"].yes {
            margin-right: 20px; 
        }

        input[type="checkbox"].no {
            margin-right: 0; 
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            
        }

       

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        header img {
            max-height: 100px;
        }

        .substation-info {
            margin-bottom: 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        .pictures-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 items per row */
            gap: 20px; /* Space between items */
        }

        .picture-item {
            padding: 10px;
            border: 1px solid black; /* Simple black border */
            text-align: center; /* Center align text */
        }

        .picture-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px; /* Space between image and description */
            border: 1px solid black; /* Black border around image */
        }

        .picture-item p {
            font-size: 14px;
            color: #000; /* Black text color */
            font-weight: normal; /* Normal weight for description text */
            border-top: 1px solid black; /* Black line above description */
            padding-top: 10px; /* Space between line and description */
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .signature {
            text-align: center;
        }
        .stamp {
            width: 100px;
            height: 100px;
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        .image-container {
            max-width: 100%;
            max-height: 100vh;
        }
        img {
            max-width: 100%;
            max-height: 100vh;
            object-fit: contain;
            
        }

        .pictures-grids {
            padding-top: 300px;
            margin: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image-containers {
            text-align: center;
            margin-bottom: 50px; /* Adjust spacing between images */
        }

        .gallery-images {
            max-width: 90%;
            max-height: 80vh;
            margin: 0 auto;
            display: block;
        }

        .image-descriptions {
            margin-top: 10px;
            font-size: 16px;
            color: #333;
        }

        .checkboxs {
    display: inline-block;
    width: 12px;
    height: 12px;
    margin-right: 5px;
    border: 1px solid #000;
}

.checkeds {
    background-color: #000;
}

.headers img {
    max-width: 50%; /* Scale down the image to 80% of its container's width */
    /* Maintain aspect ratio */
    margin-bottom: 20px; /* Space between image and heading */
}


       

        @media print {
            .print-button {
                display: none;
            }
            body {
                padding: 0;
            }
            /* Ensure each major section starts on a new page */
            .page-break {
                page-break-before: always;
            }
            /* Prevent awkward breaks within sections */
            table, tr, td, th, .no-break {
                page-break-inside: avoid;
            }
        }
        

    </style>
</head>
<body>
    <div class="container">
    <div class="header">
        <div class="logo">
            @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                <img src="{{ URL::asset('assets/web-images/main-logo.png') }}" alt="Aerosynergy Solutions Logo">
                <p>AEROSYNERGY SOLUTIONS SDN BHD<br>
                 NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
            @elseif($projectName === 'ARAS-JOHOR')
                <img src="{{ URL::asset('assets/web-images/araslogo.png') }}" alt="ARAS Kejuruteraan Logo">
                <p>ARAS KEJURUTERAAN SDN BHD<br>
                1st Floor No 72, Jalan SS 21/1, Damansara<br>
                Utama, 47400 Petaling Jaya, Selangor</p>
            @else
                <!-- Default logo or empty state -->
                <img src="{{ URL::asset('assets/web-images/defaultlogo.png') }}" alt="Default Logo">
                <p>Default Company Name<br>
                Default Address</p>
            @endif
        </div>
        
    </div>
    <div class="content">
        <p>SITE SURVEY</p>
        <p>{{$survey->nama_pe}}</p>

       

        
    </div>


    <div class="header" style="padding-top: 300px">
        <div class="logo">
            @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                <img src="{{ URL::asset('assets/web-images/main-logo.png') }}" alt="Aerosynergy Solutions Logo">
                <p>AEROSYNERGY SOLUTIONS SDN BHD<br>
                Address details for Aerosynergy Solutions</p>
            @elseif($projectName === 'ARAS-JOHOR')
                <img src="{{ URL::asset('assets/web-images/araslogo.png') }}" alt="ARAS Kejuruteraan Logo">
                <p>ARAS KEJURUTERAAN SDN BHD<br>
                1st Floor No 72, Jalan SS 21/1, Damansara<br>
                Utama, 47400 Petaling Jaya, Selangor</p>
            @else
                <!-- Default logo or empty state -->
                <img src="{{ URL::asset('assets/web-images/defaultlogo.png') }}" alt="Default Logo">
                <p>Default Company Name<br>
                Default Address</p>
            @endif
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
        <p>Nama : </p>
    </div>


    <div class="header" style="padding-top: 300px">
        <div class="logo">
            <img src="{{ URL::asset('assets/web-images/tnblogo.png') }}" alt="TNB Logo">

            <p>TNB ENERGY SERVICES SDN BHD (234667-M)<br>
            Level 2, Jalan Air Hitam, Kawasan 16,<br>
            40000 Shah Alam, Selangor</p>
        </div>
        <div class="logo">
            @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                <img src="{{ URL::asset('assets/web-images/main-logo.png') }}" alt="Aerosynergy Solutions Logo">
                <p>AEROSYNERGY SOLUTIONS SDN BHD<br>
               NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
            @elseif($projectName === 'ARAS-JOHOR')
                <img src="{{ URL::asset('assets/web-images/araslogo.png') }}" alt="ARAS Kejuruteraan Logo">
                <p>ARAS KEJURUTERAAN SDN BHD<br>
                1st Floor No 72, Jalan SS 21/1, Damansara<br>
                Utama, 47400 Petaling Jaya, Selangor</p>
            @else
                <!-- Default logo or empty state -->
                <img src="{{ URL::asset('assets/web-images/defaultlogo.png') }}" alt="Default Logo">
                <p>Default Company Name<br>
                Default Address</p>
            @endif
        </div>
    </div>

    <h1 class="title">PICTURE LIST FORM<br>(SITE VISIT)</h1>

    <div class="checklist-container">
        <div class="checklist">
            <div class="checklist-left">
                <ol>
                    <li>1. Substation (FL)
                        <input type="checkbox" name="substation_fl" value="yes" <?php echo ($pictureData['substation_fl'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="substation_fl" value="no" <?php echo ($pictureData['substation_fl'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>2. Existing Switchgear
                        <input type="checkbox" name="existing_switchgear" value="yes" <?php echo ($pictureData['existing_switchgear'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="existing_switchgear" value="no" <?php echo ($pictureData['existing_switchgear'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    
                    <li>3. Switchgear Nameplate
                        <input type="checkbox" name="switchgear_nameplate" value="yes" <?php echo ($pictureData['switchgear_nameplate'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="switchgear_nameplate" value="no" <?php echo ($pictureData['switchgear_nameplate'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>4. Distribution Board
                        <input type="checkbox" name="distribution_board" value="yes" <?php echo ($pictureData['distribution_board'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="distribution_board" value="no" <?php echo ($pictureData['distribution_board'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>5. Battery Charger
                        <input type="checkbox" name="battery_charger" value="yes" <?php echo ($pictureData['battery_charger'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="battery_charger" value="no" <?php echo ($pictureData['battery_charger'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>6. Battery Charger Nameplate
                        <input type="checkbox" name="battery_charger_nameplate" value="yes" <?php echo ($pictureData['battery_charger_nameplate'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="battery_charger_nameplate" value="no" <?php echo ($pictureData['battery_charger_nameplate'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>7. Wall / Ceiling Cable Tray Route (P/W)
                        <input type="checkbox" name="ceiling_tray" value="yes" <?php echo ($pictureData['ceiling_tray'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="ceiling_tray" value="no" <?php echo ($pictureData['ceiling_tray'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>8. Civil Work Location
                        <input type="checkbox" name="civil_location" value="yes" <?php echo ($pictureData['civil_location'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="civil_location" value="no" <?php echo ($pictureData['civil_location'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                </ol>
            </div>
            <div class="checklist-right">
                <ol start="9">
                    <li>9. Substation Entrance
                        <input type="checkbox" name="substation_entrance" <?php echo ($pictureData['substation_entrance'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="substation_entrance" <?php echo ($pictureData['substation_entrance'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>10. Cable Route
                        <input type="checkbox" name="cable_route" <?php echo ($pictureData['cable_route'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="cable_route" <?php echo ($pictureData['cable_route'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>11. Portable Genset Location
                        <input type="checkbox" name="genset_location" <?php echo ($pictureData['genset_location'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="genset_location" <?php echo ($pictureData['genset_location'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>12. Feeder and TX Cable
                        <input type="checkbox" name="feeder_tx" <?php echo ($pictureData['feeder_tx'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="feeder_tx" <?php echo ($pictureData['feeder_tx'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>13. Trench Inside View
                        <input type="checkbox" name="trench_view" <?php echo ($pictureData['trench_view'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="trench_view" <?php echo ($pictureData['trench_view'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>14. RTU Remote Terminal Unit
                        <input type="checkbox" name="rtu" <?php echo ($pictureData['rtu'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="rtu" <?php echo ($pictureData['rtu'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>15. RCB Remote Control Box
                        <input type="checkbox" name="rcb" <?php echo ($pictureData['rcb'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="rcb" <?php echo ($pictureData['rcb'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                    
                    <li>16. EFI Earth Fault Indicator
                        <input type="checkbox" name="efi" <?php echo ($pictureData['efi'] == 'yes') ? 'checked' : ''; ?> disabled> Yes
                        <input type="checkbox" name="efi" <?php echo ($pictureData['efi'] == 'no') ? 'checked' : ''; ?> disabled> No
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="signature-section">
        <div class="prepared">
            <p>Disediakan Oleh:</p>
            <!-- <img src="{{ URL::asset('assets/web-images/signs.png') }}" alt="Signature"> -->
            <p>Nama: <br>Jawatan: </p>
        </div>
        <div class="reviewed">
            <p>Disemak Oleh:</p>
            <div class="signature-box">Signature 2</div>
            <p>Nama:<br>Jawatan:</p>
        </div>
    </div>




    <div>
       
    <div class="header" style="padding-top: 300px">
        <div class="logo">
            <img src="{{ URL::asset('assets/web-images/tnblogo.png') }}" alt="TNB Logo">

            <p>TNB ENERGY SERVICES SDN BHD (234667-M)<br>
            Level 2, Jalan Air Hitam, Kawasan 16,<br>
            40000 Shah Alam, Selangor</p>
        </div>
          <div class="logo">
            @if($projectName === 'AERO-KL' || $projectName === 'AERO-JOHOR')
                <img src="{{ URL::asset('assets/web-images/main-logo.png') }}" alt="Aerosynergy Solutions Logo">
                <p>AEROSYNERGY SOLUTIONS SDN BHD<br>
               NO. 12B, 2, Jalan PJS 8/12a 46150 Petaling Jaya Selangor</p>
            @elseif($projectName === 'ARAS-JOHOR')
                <img src="{{ URL::asset('assets/web-images/araslogo.png') }}" alt="ARAS Kejuruteraan Logo">
                <p>ARAS KEJURUTERAAN SDN BHD<br>
                1st Floor No 72, Jalan SS 21/1, Damansara<br>
                Utama, 47400 Petaling Jaya, Selangor</p>
            @else
                <!-- Default logo or empty state -->
                <img src="{{ URL::asset('assets/web-images/defaultlogo.png') }}" alt="Default Logo">
                <p>Default Company Name<br>
                Default Address</p>
            @endif
        </div>
    </div>

        <div class="substation-info">           
            <p><strong>SUBSTATION NAME:</strong> {{$survey->nama_pe}}</p>
            <p><strong>NO FUNCTIONAL LOCATION:</strong> JJBUPJCOEH00621</p>
        </div>

        <h2 class="section-title"><u>PICTURE OF SITE SURVEY</u></h2>

        <div class="pictures-grid">
            @if(isset($pictureData))
                @foreach($imageFields as $field)
                    @if(!empty($pictureData->$field))
                        <div class="picture-item">
                            <img src="{{ asset($pictureData->$field) }}" alt="{{ ucfirst(str_replace('_', ' ', $field)) }}">
                            <p>{{ ucfirst(str_replace('_', ' ', $field)) }}</p>
                        </div>
                    @endif
                @endforeach
            @endif
        
            @if(isset($toolbox))
                @foreach($toolboxImageFields as $field)
                    @if(!empty($toolbox->$field))
                        <div class="picture-item">
                            <img src="{{ asset($toolbox->$field) }}" alt="{{ ucfirst(str_replace('_', ' ', $field)) }}">
                            <p>{{ ucfirst(str_replace('_', ' ', $field)) }}</p>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
        
        
    </div>



    <div style="padding-top: 300px">
        <h1>JADUAL ANGGARAN DAN PENGGUNAAN BAHAN</h1>
        <table>
            <tr>
                <th>PROJEK PEMBINAAN:</th>
                <td colspan="3">PROJEK TAMAN DESA COPIAWALA - PKT MUTIARA IMAN NO.5</td>
            </tr>
            <tr>
                <th>TAJUK KERJA:</th>
                <td colspan="3">TAMAN DESA COPIAWALA</td>
            </tr>
            <tr>
                <th>NO. PESANAN:</th>
                <td colspan="3">PO REF: LKT0052/2022</td>
            </tr>
            <tr>
                <th>KONTRAKTOR:</th>
                <td colspan="3">JAYA KEJURUTERAAN SDN BHD</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Bil.</th>
                <th>No. Rujukan</th>
                <th>Keterangan Barang</th>
                <th>Kuantiti</th>
                <th>Unit</th>
            </tr>
        
            @foreach ($projectMaterials as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->material->mat_code }}</td> 
                    <td>{{ $item->material->mat_desc }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->material->bun }}</td>
                </tr>
            @endforeach
        </table>
        
        
        <div class="footer">
            <div class="signature">
               
        <p>Nama : </p>
            </div>
            <div class="signature">
                
                <p>Jurutera</p>
                <p>NAMA:</p>
            </div>
        </div>
    </div>


    <div class="pictures-grids">
        <p class="survey-titles">{{$survey->nama_pe}}</p>
        @foreach($files as $file)
            <div class="image-containers">
                <img class="gallery-images" src="{{ asset($file->file_path) }}" alt="{{ $file->description }}">
                <p class="image-descriptions">{{ $file->description }}</p>
            </div>
            <div class="page-break"></div>
        @endforeach
    </div>


    <div class="form-container">
        <div class="header">
            <img src="{{ URL::asset('assets/web-images/tenegalogofull.jfif') }}" alt="TNB Logo">
            
        </div>
        <h1 style="margin-left: -150px">SENARAI SEMAK LAWATAN TAPAK PROJEK SCADA DA</h1>

        <table class="form-table">
            <tr>
                <td class="label">Nama Pencawang</td>
                <td class="input">{{ $survey->nama_pe }}</td>
            </tr>
            <tr>
                <td class="label">Kawasan / Negeri</td>
                <td class="input">{{ $survey->kawasan }}</td>
            </tr>
            <tr>
                <td class="label">No. Functional Location (FL)</td>
                <td class="input">{{ $survey->fl }}</td>
            </tr>
            <tr>
                <td class="label">PE Jenis</td>
                
                    <td class="input">{{ $survey->jenis }}</td>
                </td>
            </tr>
            <tr>
                <td class="label">Pepatit (Trench) Berpagar?</td>
                <td class="input">{{  $survey->peparit }}</td>
                </td>
            </tr>
            <tr>
                <td class="label">Jenis Kompaun</td>
                <td class="input">
                    <span class="checkboxs {{ $survey->jenis_kompaun == 'Simen' ? 'checkeds' : '' }}"></span> Simen
                    <span class="checkboxs {{ $survey->jenis_kompaun == 'Rumput' ? 'checkeds' : '' }}"></span> Rumput
                    <span class="checkboxs {{ $survey->jenis_kompaun == 'Inter-locking' ? 'checkeds' : '' }}"></span> Inter-locking
                    <span class="checkboxs {{ $survey->jenis_kompaun == 'Crusher Run' ? 'checkeds' : '' }}"></span> Crusher Run
                    <span class="checkboxs {{ $survey->jenis_kompaun == 'Tidak' ? 'checkeds' : '' }}"></span> Tidak
                </td>
            </tr>
            <tr>
                <td class="label">Jenis Perkakasuis</td>
                <td class="input">
                    <span class="checkboxs {{ $survey->jenis_perkakasuis == 'VCB' ? 'checkeds' : '' }}"></span> VCB
                    <span class="checkboxs {{ $survey->jenis_perkakasuis == 'RMU' ? 'checkeds' : '' }}"></span> RMU
                </td>
            </tr>
            <tr>
                <td class="label">Konfigurasi</td>
                <td class="input">{{ $survey->konfigurasi}}</td>
            </tr>
            
            <tr>
                <td class="label">Jenama Alatsuis</td>
                <td class="input">{{ $survey->jenama_alatsuis }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Model</td>
                <td class="input">{{ $survey->jenis_model }}</td>
            </tr>
            <tr>
                <td class="label">Tahun Pembinaan</td>
                <td class="input">{{ $survey->tahun_pembinaan }}</td>
            </tr>
            <tr>
                <td class="label">Siri Alatsuis</td>
                    
                <td class="input">{{ $survey->siri_alatsuis }}</td>
                  
                </td>
            </tr>
            @for ($i = 1; $i <= 5; $i++)
            <tr>
                <td class="label">Suis No {{ $i }}</td>
                <td class="input">{{ $survey->{'suis_no' . $i} }}</td>
            </tr>
            <tr>
                <td class="label">Suis Label {{ $i }}</td>
                <td class="input">{{ $survey->{'suis_label' . $i} }}</td>
            </tr>
            <tr>
                <td class="label">Kabel Jenis {{ $i }}</td>
                <td class="input">{{ $survey->{'kabel_jenis' . $i} }}</td>
                
            </tr>
            <tr>
                <td class="label">Kabel Saiz {{ $i }}</td>
                <td class="input">{{ $survey->{'kabel_saiz' . $i} }}</td>
            </tr>
        @endfor
            <!-- Repeat similar structure for Suis No 2 to 5 -->
            <tr>
                <td class="label">Fius Saiz</td>
                <td class="input">{{ $survey->fius_saiz }}</td>
            </tr>
            <tr>
                <td class="label">CT Saiz Protection</td>
                <td class="input">{{ $survey->ct_saiz_protection }}</td>
            </tr>
            <tr>
                <td class="label">CT Saiz Metering</td>
                <td class="input">{{ $survey->ct_saiz_metering }}</td>
            </tr>
            <tr>
                <td class="label">SCADA Status</td>
                <td class="input">{{ $survey->scada_status }}</td>
            </tr>
            <tr>
                <td class="label">Bekalan LV</td>
                <td class="input">{{ $survey->bekalan_lv }}</td>
            </tr>
            <tr>
                <td class="label">Bacaan Beban</td>
                <td class="input">{{ $survey->bacaan_beban }}</td>
            </tr>
            <tr>
                <td class="label">Genset</td>
                <td class="input">{{ $survey->genset }}</td>
            </tr>
            <tr>
                <td class="label">Jenis LVDB</td>
                <td class="input">{{ $survey->jenis_lvdb }}</td>
            </tr>
            <tr>
                <td class="label">Keperluan Khas Kerja</td>
                <td class="input">{{ $survey->keperluan_khas_kerja }}</td>
            </tr>
            <tr>
                <td class="label">Susun</td>
                <td class="input">{{ $survey->susun }}</td>
            </tr>
            
            
        </table>
        <div class="footer">
            <p>Susun atur Didalam Pencawang. Sila tandakan kedudukan Alatuis / Battery Charger / TX / RCB / RTU / EFI</p>
        </div>
    </div>


    
    
    <button onclick="window.print()">Print</button>

    </div>
</body>
</html>


