<?php
/**
 * footer.php — Reusable Footer Component for BRDS / NID Coaching
 *
 * ─── USAGE ────────────────────────────────────────────────────────────────────
 *
 *   Basic (include at the bottom of any page):
 *       <?php include 'footer.php'; ?>
 *
 *   Hide the floating Call Us button:
 *       <?php $show_call_button = false; include 'footer.php'; ?>
 *
 *   Override the copyright year:
 *       <?php $copyright_year = 2025; include 'footer.php'; ?>
 *
 * ──────────────────────────────────────────────────────────────────────────────
 */

// ── Configurable defaults ─────────────────────────────────────────────────────
$show_call_button = $show_call_button ?? true;
$copyright_year   = $copyright_year   ?? date('Y');

// ── Location data ─────────────────────────────────────────────────────────────
// To add/remove a city just edit this array. No HTML changes needed.
$locations = [
    'ahmedabad' => [
        'label'  => 'AHMEDABAD : 98250 57598',
        'places' => [
            ['name' => 'Drive in Road',     'map' => 'https://www.google.co.in/maps/place/BRDS/@23.0461924,72.5352461,15z'],
            ['name' => 'Bopal',             'map' => 'https://www.google.co.in/maps/place/Bhanwar+Rathore+Design+Studio+(BRDS)/@23.026938,72.477186,15z'],
            ['name' => 'Chandkheda',        'map' => 'https://g.co/kgs/CbcyKL'],
            ['name' => 'Maninagar',         'map' => 'https://www.google.co.in/maps/place/Bhanwar+Rathore+Design+Studio+(BRDS)/@22.9969463,72.605034,15z'],
            ['name' => 'Nikol',             'map' => 'https://maps.app.goo.gl/VTLBHhn62Mu59vbD6'],
            ['name' => 'Satellite',         'map' => 'https://www.google.co.in/maps/place/Bhanwar+Rathore+Design+Studio+(BRDS)/@23.026717,72.523424,15z'],
            ['name' => 'Science City Road', 'map' => 'https://goo.gl/maps/sUM7FD5zPKzybCyMA'],
        ],
    ],
    'pune' => [
        'label'  => 'PUNE : 99786 57598',
        'places' => [
            ['name' => 'M. G. Road',      'map' => 'https://www.google.co.in/maps/place/Bhanwar+Rathore+Design+Studio+(BRDS)/@18.5153304,73.8764892,17z'],
            ['name' => 'Law College Road', 'map' => 'https://www.google.co.in/maps/place/Bhanwar+Rathore+Design+Studio+(BRDS)/@18.514489,73.8266803,17z'],
            ['name' => 'Chinchwad',       'map' => 'https://www.google.com/maps/place/BRDS+Pimpri-Chinchwad/@18.6401811,73.7942826,15z'],
            ['name' => 'Viman Nagar',     'map' => 'https://goo.gl/maps/M8iGj2PJVaMngXto8'],
            ['name' => 'Baner',           'map' => 'https://goo.gl/maps/qmwDybSpjkgduKQB9'],
            ['name' => 'Undri',           'map' => 'https://g.co/kgs/NjLLiMW'],
            ['name' => 'Kothrud',         'map' => 'https://share.google/OGKTbBypo2LDeqZKp'],
            ['name' => 'Sinhgad',         'map' => 'https://share.google/42KETws24YngH20dB'],
        ],
    ],
    'vadodara' => [
        'label'  => 'VADODARA : 90998 57598',
        'places' => [
            ['name' => 'Race Course Road', 'map' => 'https://www.google.co.in/maps/place/Bhanwar+Rathore+Design+Studio+(BRDS)/@22.3119934,73.1563824,17z'],
        ],
    ],
    'rajkot' => [
        'label'  => 'RAJKOT : 90998 57598',
        'places' => [
            ['name' => 'Kalawad Road', 'map' => 'https://www.google.co.in/maps/place/Bhanwar+Rathore+Design+Studio+(BRDS)/@22.2854215,70.7704422,15z'],
        ],
    ],
    'surat' => [
        'label'  => 'SURAT : 90998 57598',
        'places' => [
            ['name' => 'Athwa', 'map' => 'https://www.google.com/maps/place/BRDS+Surat/@21.1687009,72.7863581,15z'],
        ],
    ],
    'kolkata' => [
        'label'  => 'KOLKATA : 75678 57598',
        'places' => [
            ['name' => 'Middleton Street', 'map' => 'https://maps.app.goo.gl/gzDxhXEeKG6DKV9z5'],
        ],
    ],
    'jaipur' => [
        'label'  => 'JAIPUR : 9727857598',
        'places' => [
            ['name' => 'Gopalpura',      'map' => 'https://g.page/BRDSJaipur?share'],
            ['name' => 'Vaishali Nagar', 'map' => 'https://g.page/Brdsvaishalinagar?share'],
            ['name' => 'Malviya Nagar',  'map' => 'https://g.co/kgs/Aawaep1'],
        ],
    ],
    'kerala' => [
        'label'  => 'KERALA : 89807 57598',
        'places' => [
            ['name' => 'Calicut', 'map' => 'https://g.page/r/CTcihUISbeRVEAE'],
            ['name' => 'Kochi',   'map' => 'https://goo.gl/maps/bmDZxMXq2Sw7kfhJ9'],
        ],
    ],
    'bangalore' => [
        'label'  => 'BANGALORE : 89807 57598',
        'places' => [
            ['name' => 'Malleswaram', 'map' => 'https://g.page/BRDSMalleswaramBagalore?share'],
            ['name' => 'Jayanagar',   'map' => 'https://www.google.co.in/maps/place/BRDS+Bangalore+BTM+Layout/@12.9199534,77.6106518,15z'],
            ['name' => 'Indiranagar', 'map' => 'https://maps.app.goo.gl/bgb3Ai4GCCgxGN5h8'],
        ],
    ],
    'jharkhand' => [
        'label'  => 'JHARKHAND : 9913757598',
        'places' => [
            ['name' => 'Dhanbad',    'map' => 'https://g.page/BRDSDhanbad?share'],
            ['name' => 'Ranchi',     'map' => 'https://goo.gl/maps/JHQL9w3heUMNqbLAA'],
            ['name' => 'Jamshedpur', 'map' => 'https://g.page/r/CQ31CWUgj3SQEAE'],
        ],
    ],
    'indore' => [
        'label'  => 'INDORE : 9727857598',
        'places' => [
            ['name' => 'Janjeerwala Square', 'map' => 'https://goo.gl/maps/1f7RaPLFQeAf22VQ7'],
        ],
    ],
    'chandigarh' => [
        'label'  => 'CHANDIGARH : 9727857598',
        'places' => [
            ['name' => 'Sector 34-A', 'map' => 'https://g.page/BRDSChandigarh?share'],
        ],
    ],
    'delhi' => [
        'label'  => 'DELHI NCR : 99137 00910',
        'places' => [
            ['name' => 'Malviya Nagar',        'map' => 'https://g.page/r/CaDEkJNHysOBEAE'],
            ['name' => 'Preet Vihar',          'map' => 'https://g.page/r/CRci3Zj1pvMOEAE'],
            ['name' => 'Pitampura',            'map' => 'https://g.page/BRDSPitampuraDelhi?share'],
            ['name' => 'Dwarka',               'map' => 'https://goo.gl/maps/S6RcedmndEp3qpov5'],
            ['name' => 'South Ex-1',           'map' => 'https://g.page/BRDSSouthExtDelhi?share'],
            ['name' => 'Karol Bagh',           'map' => 'https://goo.gl/maps/jJPAX5RFhYkACWts5'],
            ['name' => 'Janakpuri West',       'map' => 'https://goo.gl/maps/6ZDyFz6ECDo3BTMY6'],
            ['name' => 'Ghaziabad',            'map' => 'https://goo.gl/maps/15ew3VSCquESPKGC7'],
            ['name' => 'Noida Sector 2',       'map' => 'https://goo.gl/maps/fRQoYFcySnYo2WHr7'],
            ['name' => 'Greater Noida',        'map' => 'https://goo.gl/maps/HJD4YosJTbir2Lg7A'],
            ['name' => 'Gurgaon - Sector 14',  'map' => 'https://www.google.co.in/maps/place/Bhanwar+Rathore+Design+Studio+(BRDS)/@28.4715301,77.046175,14z'],
            ['name' => 'GTB Nagar',            'map' => 'https://goo.gl/maps/3GgxogNGa3qYugvd7'],
            ['name' => 'Faridabad',            'map' => 'https://goo.gl/maps/mq38qVmCXxrW5m5EA'],
        ],
    ],
    'mumbai' => [
        'label'  => 'MUMBAI : 75060 12398',
        'places' => [
            ['name' => 'Andheri',        'map' => 'https://g.page/BRDSAndheriWestMumbai?share'],
            ['name' => 'Bandra West',    'map' => 'https://g.co/kgs/o7UTchC'],
            ['name' => 'Borivali',       'map' => 'https://g.page/BRDSBorivaliMumbai?share'],
            ['name' => 'Charni Road',    'map' => 'https://g.page/r/CV0znWYK7PZIEAE'],
            ['name' => 'Dadar',          'map' => 'https://www.google.co.in/maps/place/Bhanwar+Rathore+Design+Studio+(BRDS)/@19.020276,72.8387033,17z'],
            ['name' => 'Ghatkopar',      'map' => 'https://goo.gl/maps/fzLbFXSb2hVRsTYf6'],
            ['name' => 'Goregaon West',  'map' => 'https://goo.gl/maps/v1ZDjy6xH3z9aFLi8'],
            ['name' => 'Ghodbunder',     'map' => 'https://goo.gl/maps/1CvcHkPj4JkT5Dzd6'],
            ['name' => 'Kalyan',         'map' => 'https://goo.gl/maps/5UXK9ifhXC8DhAf26'],
            ['name' => 'Kandivali East', 'map' => 'https://maps.app.goo.gl/mf3SGW3GvxjcSZaU8'],
            ['name' => 'Kharghar',       'map' => 'https://maps.app.goo.gl/cEryejcx5PQhLJN4A'],
            ['name' => 'Mulund',         'map' => 'https://goo.gl/maps/kTKZn24mmcPqE1828'],
            ['name' => 'Thane',          'map' => 'https://goo.gl/maps/y3Msrt1wRV3HqGp18'],
            ['name' => 'Powai',          'map' => 'https://maps.app.goo.gl/eHUJGVx9GyKLVq569'],
            ['name' => 'Vasai',          'map' => 'https://maps.app.goo.gl/aNkrRqUwoeK2DGLc9'],
            ['name' => 'Vashi',          'map' => 'https://g.page/BRDSVashiNaviMumbai?share'],
        ],
    ],
    'haryana' => [
        'label'  => 'HARYANA : 99137 00910',
        'places' => [
            ['name' => 'Sonipat',   'map' => 'https://goo.gl/maps/PexWwBc8z9jfFAB69'],
            ['name' => 'Faridabad', 'map' => 'https://goo.gl/maps/mq38qVmCXxrW5m5EA'],
        ],
    ],
    'ludhiana' => [
        'label'  => 'LUDHIANA : 9727857598',
        'places' => [
            ['name' => 'Model Town', 'map' => 'https://maps.app.goo.gl/gM7oJ8V4wBo5eTM49'],
        ],
    ],
    'lucknow' => [
        'label'  => 'LUCKNOW : 75749 57598',
        'places' => [
            ['name' => 'Hazratganj', 'map' => 'https://g.page/brds-lucknow'],
            ['name' => 'Aliganj',    'map' => 'https://goo.gl/maps/iX1iquTzSUzjsuLu7'],
        ],
    ],
    'bhopal' => [
        'label'  => 'BHOPAL : 9727857598',
        'places' => [
            ['name' => 'M.P. Nagar', 'map' => 'https://goo.gl/maps/xLCtJPiCAz5t214P8'],
        ],
    ],
    'chhattisgarh' => [
        'label'  => 'CHHATTISGARH : 9727857598',
        'places' => [
            ['name' => 'Raipur', 'map' => 'https://goo.gl/maps/FNFcSDR7ygj2bXRw9'],
        ],
    ],
    'uttarakhand' => [
        'label'  => 'UTTARAKHAND : 9727857598',
        'places' => [
            ['name' => 'Dehradun', 'map' => 'https://g.co/kgs/qw9XDS'],
        ],
    ],
    'aurangabad' => [
        'label'  => 'AURANGABAD : 95123 57598',
        'places' => [
            ['name' => 'Aurangabad', 'map' => 'https://goo.gl/maps/yxwhF5yhPPtfTLnr7'],
        ],
    ],
    'jodhpur' => [
        'label'  => 'JODHPUR : 9727857598',
        'places' => [
            ['name' => 'Shastri Nagar', 'map' => 'https://maps.app.goo.gl/m23hkxTu3B4iH7kb6'],
        ],
    ],
    'akola' => [
        'label'  => 'AKOLA : 9512357598',
        'places' => [
            ['name' => 'Rautwadi', 'map' => 'https://maps.app.goo.gl/1ENw2zNcHMogvstM9'],
        ],
    ],
    'nashik' => [
        'label'  => 'NASHIK : 95123 57598',
        'places' => [
            ['name' => 'College Road', 'map' => 'https://goo.gl/maps/kt8fFbammuyqsdiy6'],
        ],
    ],
    'solapur' => [
        'label'  => 'SOLAPUR : 95123 57598',
        'places' => [
            ['name' => "Saat Rasta, Above Talwalkar's Gym", 'map' => 'https://g.page/brdssolapur?gm'],
        ],
    ],
    'nagpur' => [
        'label'  => 'NAGPUR : 95123 57598',
        'places' => [
            ['name' => 'Dharampeth',    'map' => 'https://goo.gl/maps/1mB7HtzhjgTe6ZRm6'],
            ['name' => 'Ayodhya Nagar', 'map' => 'https://goo.gl/maps/KoC7Wn1HRhDf7nuv7'],
        ],
    ],
    'kanpur' => [
        'label'  => 'KANPUR : 75749 57598',
        'places' => [
            ['name' => 'Kakadeo',      'map' => 'https://g.page/r/Ca77nYeES9zOEBA'],
            ['name' => 'Kidwai Nagar', 'map' => 'https://goo.gl/maps/kt4gSJJugVaQhFR27'],
        ],
    ],
    'varanasi' => [
        'label'  => 'VARANASI : 7574957598',
        'places' => [
            ['name' => 'Durgakund', 'map' => 'https://goo.gl/maps/5CinUK2SxjAD2bJh8'],
        ],
    ],
    'chennai' => [
        'label'  => 'CHENNAI : 89807 57598',
        'places' => [
            ['name' => 'Anna Nagar West', 'map' => 'https://maps.app.goo.gl/PszPsxiqWV9jdPH68'],
        ],
    ],
    'hyderabad' => [
        'label'  => 'HYDERABAD : 89807 57598',
        'places' => [
            ['name' => 'Himayatnagar', 'map' => 'https://goo.gl/maps/rq1NxgHftZZYrLaY8'],
            ['name' => 'Jubilee Hills', 'map' => 'https://maps.app.goo.gl/CtfgU4ighnKtB5349'],
        ],
    ],
    'dubai' => [
        'label'  => 'DUBAI : +971582554313',
        'places' => [
            ['name' => 'Dubai', 'map' => 'https://maps.app.goo.gl/FfVsk12BziMHW9LC9'],
        ],
    ],
    'patna' => [
        'label'  => 'BIHAR : +919913757598',
        'places' => [
            ['name' => 'Patna', 'map' => 'https://maps.app.goo.gl/y6JLWEEQDSucVrqJA'],
        ],
    ],
];
?>

<!-- ===== BRDS FOOTER — START ===== -->
<style>
/* ---------- Footer Core ---------- */
.brds-footer {
    background: linear-gradient(135deg, rgb(7,7,7) 0%, rgb(42,42,43) 50%, rgb(60,60,60) 100%);
    color: #fff;
    padding: 60px 0 30px;
    width: 100%;
    position: relative;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
}
.brds-footer .footer-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto 20px;
    padding: 0 20px;
    position: relative;
    z-index: 1;
}
.brds-footer .footer-title-container {
    grid-column: 1 / -1;
    text-align: center;
}
.brds-footer .footer-title {
    font-size: 28px;
    font-weight: 700;
    background: linear-gradient(45deg, #ffffffff, #ffffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    cursor: pointer;
    animation: brdsFooterPulse 2s infinite;
    margin: 0 0 6px;
}
.brds-footer .footer-subtitle {
    color: rgba(255,255,255,0.6);
    font-size: 14px;
    margin: 0;
}
/* ---------- Search ---------- */
.brds-footer .location-search {
    grid-column: 1 / -1;
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
}
.brds-footer .search-container { position: relative; width: 100%; max-width: 500px; }
.brds-footer .search-input {
    width: 100%;
    padding: 12px 20px 12px 45px;
    border: none;
    border-radius: 30px;
    background: rgba(255,255,255,0.1);
    color: #fff;
    font-size: 14px;
    outline: none;
    transition: background 0.3s;
    box-sizing: border-box;
}
.brds-footer .search-input::placeholder { color: rgba(255,255,255,0.6); }
.brds-footer .search-input:focus        { background: rgba(255,255,255,0.15); }
.brds-footer .search-icon {
    position: absolute; left: 15px; top: 50%;
    transform: translateY(-50%);
    color: rgba(255,255,255,0.6);
}
/* ---------- Location blocks ---------- */
.brds-footer .location-block {
    background: rgba(255,255,255,0.05);
    border-radius: 10px;
    padding: 15px;
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
}
.brds-footer .location-block:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    background: rgba(255,255,255,0.1);
    border-left: 3px solid #ff5e62;
}
.brds-footer .location-title {
    font-size: 14px; margin: 0 0 12px;
    color: #fff; font-weight: 600;
    display: flex; align-items: center;
}
.brds-footer .location-title::before {
    content: '\f3c5';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    margin-right: 8px;
    color: #ff5e62;
}
.brds-footer .location-list { list-style: none; margin: 0; padding: 0; }
.brds-footer .location-list li {
    margin-bottom: 8px; font-size: 13px;
    display: flex; align-items: baseline;
    transition: transform 0.2s;
    color: rgba(255,255,255,0.85);
}
.brds-footer .location-list li:hover { transform: translateX(5px); }
.brds-footer .location-list li::before {
    content: "•"; color: #ff9966;
    display: inline-block; width: 10px; margin-right: 5px; flex-shrink: 0;
}
.brds-footer .direction-link {
    color: #66ccff; text-decoration: none;
    transition: color 0.3s; margin-left: 4px; white-space: nowrap;
}
.brds-footer .direction-link:hover { color: #fff; }
/* ---------- Footer bottom ---------- */
.brds-footer .footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.1);
    padding: 30px 20px 0;
    text-align: center;
    max-width: 1200px;
    margin: 0 auto;
}
.brds-footer .footer-links {
    margin-bottom: 20px; font-size: 12px;
    line-height: 2; display: flex; flex-wrap: wrap; justify-content: center;
}
.brds-footer .footer-links a { color: #ccc; text-decoration: none; transition: color 0.3s; margin: 0 8px; }
.brds-footer .footer-links a:hover { color: #fff; }
/* ---------- Back to top ---------- */
.brds-back-to-top {
    position: fixed; bottom: 100px; right: 40px;
    width: 50px; height: 50px;
    background: #ff0000;
    color: white; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; opacity: 0; visibility: hidden;
    transition: all 0.3s; z-index: 999;
    box-shadow: 0 5px 15px rgba(255,94,98,0.4); border: none;
}
.brds-back-to-top.visible { opacity: 1; visibility: visible; }
.brds-back-to-top:hover   { transform: translateY(-5px); }
/* ---------- Call button ---------- */
.brds-call-button-wrapper { position: fixed; z-index: 999; }
.brds-call-button {
    display: flex; align-items: center; gap: 10px;
    padding: 12px 24px; background-color: #e31e24;
    color: white; text-decoration: none; border-radius: 50px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif; font-weight: 600;
}
.brds-call-button:hover {
    background-color: #c41920; color: white;
    transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}
/* ---------- Copyright bar ---------- */
.brds-copyright-sec {
    background: #111; padding: 12px 20px;
    text-align: center; font-size: 13px; color: #aaa;
    font-family: 'Poppins', sans-serif;
}
.brds-copyright-sec a { color: #ccc; text-decoration: none; margin: 0 4px; }
.brds-copyright-sec a:hover { color: #fff; }
/* ---------- Keyframes ---------- */
@keyframes brdsFooterPulse {
    0%  { transform: scale(1); }
    50% { transform: scale(1.03); }
    100%{ transform: scale(1); }
}
/* ---------- Responsive ---------- */
@media (min-width: 768px) {
    .brds-call-button-wrapper { bottom: 30px; right: 30px; }
}
@media (max-width: 767px) {
    .brds-footer .footer-container { display: block; }
    .brds-footer .location-block   { margin-bottom: 15px; }
    .brds-call-button-wrapper {
        bottom: 0; left: 0; right: 0;
        background: white; padding: 10px;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
    }
    .brds-call-button { justify-content: center; border-radius: 8px; }
    .brds-back-to-top { right: 15px; bottom: 70px; }
}
</style>

<footer class="brds-footer" id="brdsFooter">
    <div class="footer-container">

        <!-- Title -->
        <div class="footer-title-container">
            <h2 class="footer-title" id="brdsFooterTitle">BRDS CENTRES IN INDIA</h2>
            <p class="footer-subtitle">Find your nearest design education center</p>
        </div>

        <!-- Search box -->
        <div class="location-search">
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input"
                       placeholder="Search for a location..."
                       id="brdsLocationSearch">
            </div>
        </div>

        <!-- ── Location blocks — generated from $locations array ── -->
        <?php foreach ($locations as $city => $data) : ?>
        <div class="location-block" data-city="<?= htmlspecialchars($city) ?>">
            <h4 class="location-title"><?= htmlspecialchars($data['label']) ?></h4>
            <ul class="location-list">
                <?php foreach ($data['places'] as $place) : ?>
                <li>
                    <?= htmlspecialchars($place['name']) ?>
                    <a href="<?= htmlspecialchars($place['map']) ?>"
                       class="direction-link"
                       data-location="BRDS <?= htmlspecialchars($place['name'] . ', ' . ucfirst($city)) ?>"
                       target="_blank" rel="noopener noreferrer">
                        ( Get Direction )
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endforeach; ?>

    </div><!-- /.footer-container -->
 
    <!-- Bottom links -->
    <div class="footer-bottom">
         <div class="footer-links">
            <!--<a href="https://rathoredesign.com/nid-coaching-delhi/">NID Coaching in Delhi</a>-->
            <!--<a href="https://rathoredesign.com/nid-coaching-mumbai/?nid">NID Coaching in Mumbai</a>-->
            <!--<a href="https://rathoredesign.com/nid-coaching-pune/?nid">NID Coaching in Pune</a>-->
            <!--<a href="https://rathoredesign.com/nid-coaching-kolkata/">NID Coaching in Kolkata</a>-->
            <!--<a href="https://rathoredesign.com/nid-coaching-ahmedabad/?nid">NID Coaching in Ahmedabad</a>-->
            <!--<a href="https://rathoredesign.com/nid-coaching-vadodara/">NID Coaching in Vadodara</a>-->

            <a href="https://rathoredesign.com/nift-coaching-delhi/">NIFT Coaching in Delhi</a>
            <a href="https://rathoredesign.com/nift-coaching-mumbai/">NIFT Coaching in Mumbai</a>
            <a href="https://rathoredesign.com/nift-coaching-pune/">NIFT Coaching in Pune</a>
            <a href="https://rathoredesign.com/nift-coaching-kolkata/">NIFT Coaching in Kolkata</a>
            <a href="https://rathoredesign.com/nift-coaching-ahmedabad/">NIFT Coaching in Ahmedabad</a>
            <a href="https://rathoredesign.com/nift-coaching-vadodara/">NIFT Coaching in Vadodara</a>
            <!--<a href="https://rathoredesign.com/ceed-coaching-classes-delhi/">CEED Coaching in Delhi</a>-->
            <!--<a href="https://rathoredesign.com/ceed-coaching-mumbai/">CEED Coaching in Mumbai</a>-->
            <!--<a href="https://rathoredesign.com/ceed-coaching-pune/">CEED Coaching in Pune</a>-->
        </div>
    </div>

    <!-- Back to top -->
    <button class="brds-back-to-top" id="brdsBackToTop" aria-label="Back to top">
        <i class="fas fa-arrow-up" style="color: white;"></i>
    </button>
</footer>

<!-- Copyright bar -->
<div style="background:#1a1a1a;color:#cccccc;text-align:center;padding:14px 20px;font-size:13px;font-family:Arial,sans-serif;letter-spacing:0.3px;">
  &copy; 2026 &mdash; All Rights Reserved. Website Designed and Developed by
  <a href="https://stealthdigital.in" target="_blank" rel="noopener noreferrer"
     style="color:#f5a623;text-decoration:none;font-weight:bold;">Stealth Digital</a>
</div>

<?php if ($show_call_button) : ?>
<!-- Floating call button -->
<div class="brds-call-button-wrapper">
    <a href="tel:+919825057598" class="brds-call-button">
        <i class="fas fa-phone" style="color: white;"></i>
        <span>Call Us</span>
    </a>
</div>
<?php endif; ?>

<script>
(function () {
    'use strict';

    /* ── Back to top ─────────────────────────────────────────────────────────── */
    var backToTop = document.getElementById('brdsBackToTop');
    if (backToTop) {
        window.addEventListener('scroll', function () {
            backToTop.classList.toggle('visible', window.pageYOffset > 300);
        });
        backToTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ── Footer title click → scroll to top ─────────────────────────────────── */
    var footerTitle = document.getElementById('brdsFooterTitle');
    if (footerTitle) {
        footerTitle.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ── Location search ─────────────────────────────────────────────────────── */
    var searchInput    = document.getElementById('brdsLocationSearch');
    var locationBlocks = document.querySelectorAll('#brdsFooter .location-block');

    function resetBlocks() {
        locationBlocks.forEach(function (block) {
            block.style.display    = '';
            block.style.borderLeft = '3px solid transparent';
            block.style.transform  = '';
            block.style.boxShadow  = '';
            block.style.background = 'rgba(255,255,255,0.05)';
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            var term = this.value.trim().toLowerCase();
            if (term === '') { resetBlocks(); return; }

            locationBlocks.forEach(function (block) {
                var city = block.getAttribute('data-city').toLowerCase();
                var text = block.textContent.toLowerCase();

                if (city.includes(term) || text.includes(term)) {
                    block.style.display = 'block';
                    if (city === term) {
                        block.style.borderLeft = '3px solid #ff5e62';
                        block.style.transform  = 'translateY(-5px)';
                        block.style.boxShadow  = '0 10px 20px rgba(0,0,0,0.2)';
                        block.style.background = 'rgba(255,255,255,0.1)';
                    }
                } else {
                    block.style.display = 'none';
                }
            });
        });
    }

    /* ── Hover effects on location blocks ───────────────────────────────────── */
    locationBlocks.forEach(function (block) {
        block.addEventListener('mouseenter', function () {
            if (!searchInput || searchInput.value === '') {
                this.style.transform  = 'translateY(-5px)';
                this.style.boxShadow  = '0 10px 20px rgba(0,0,0,0.2)';
                this.style.background = 'rgba(255,255,255,0.1)';
                this.style.borderLeft = '3px solid #ff5e62';
            }
        });
        block.addEventListener('mouseleave', function () {
            if (!searchInput || searchInput.value === '') {
                this.style.transform  = '';
                this.style.boxShadow  = '';
                this.style.background = 'rgba(255,255,255,0.05)';
                this.style.borderLeft = '3px solid transparent';
            }
        });
    });

})();
</script>
<!-- ===== BRDS FOOTER — END ===== -->
