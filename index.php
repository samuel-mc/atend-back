<?php

require 'flight/Flight.php';
include "classes/LoadModels.php";

$whitelist = array(
    '127.0.0.1',
    '::1'
);
if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    define('__ROOT__', "https://attend.mx/atend-back");
}else{
    //define('__ROOT__', "http://localhost/backend");
    define('__ROOT__', "http://localhost/deskrive/attend/atend-back");
}

session_start();

/*Flight::route('/', function () {
    Flight::redirect('admin/login');
});*/

Flight::route('/', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){   
        $admin = new Model;
        Flight::set('flight.views.path', 'intranet');
        $providers = $admin->nurses->List();
        $patients = $admin->patients->List();
        $clients = $admin->clients->List();
        $service_types = $admin->services->GetServiceTypes();
        $service_status = $admin->services->GetServiceStatus();
        Flight::render('dashboard/index', [
            'title' => 'Dashboard', 
            'header' => 'headerIndex',
            'providers' => $providers,
            'clients' => $clients,
            'patients' => $patients,
            'asideActive' => "servicios",
            'service_types' => $service_types,
            'service_types' => $service_types,
            'service_status' => $service_status

        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route("/clientes",function (){
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){   
        $admin = new Model;
        Flight::set('flight.views.path', 'intranet');
        $clients = $admin->clients->List();
        Flight::render('dashboard/clientes', [
            'title' => 'Clientes', 
            'header' => 'headerIndex',
            'clients' => $clients,
            'asideActive' => "clientes"
        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/cliente/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model;
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
        $patients = $admin->patients->List();
        $providers = $admin->nurses->List();
        $service_types = $admin->services->GetServiceTypes();
        $service_status = $admin->services->GetServiceStatus();
        $client_balance = $admin->services->GetClientBalance(new Request(["client_id"=>$id]));

        Flight::set('flight.views.path', 'intranet');
        Flight::render(
            'dashboard/cliente', [
                'title' => 'Cliente', 
                'header' => 'headerCliente',
                'client' => $client,
                'headerName'=>$client['name'] . " " . $client['lastname'],
                'idClient'=>$client['id'],
                'patients' => $patients,
                "asideActive"=> "clientes",
                'service_types' => $service_types,
                'providers' => $providers,
                'service_status' => $service_status,
                'client_balance' => $client_balance
            ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/edit/cliente/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){   
        $admin = new Model;
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
        $billing_schemes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_SCHEMES]));
        $billing_regimes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_REGIMES]));
        $billing_uses = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_USES]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/edit/cliente', [
            'title' => 'Editar Paciente', 
            'header' => 'headerAdd',
            "client" => $client,
            "billing_schemes" => $billing_schemes,
            "billing_regimes" => $billing_regimes,
            "billing_uses" => $billing_uses,
        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/pagos-cliente/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){   
        $admin = new Model;
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
        $payments = $admin->payments->GetByClient(new Request(["client_id"=>$id]));
        $balance = $admin->payments->GetClientBalance(new Request(["client_id"=>$id]));
        $patients = $admin->patients->GetByClient(new Request(["client_id"=>$id]));
        $clients = $admin->clients->List();
        $methods = $admin->payments->GetPaymentMethods();
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/pagosCliente', [
            'title' => 'Historial De Pagos', 
            'header' => 'headerPagos',
            "client" => $client,
            "headerName"=>$client['name'],
            "payments"=>$payments,
            "balance"=>$balance['amount'],
            "patients"=>$patients,
            "clients"=>$clients,
            "methods"=>$methods,
            "asideActive"=>"clientes"
        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/pagosPaciente/@id', function ($id) {
    $admin = new Model;
    $patients = $admin->patients->GetPatientById(new Request(["id"=>$id]));
    $payments = $admin->payments->GetByPatient(new Request(["patient_id"=>$id]));
    $balance = $admin->payments->GetPatientBalance(new Request(["patient_id"=>$id]));
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/pagosPaciente', ['title' => 'Historial De Pagos - Paciente', 'header' => 'headerPagosPaciente',"headerName"=>$patients['name'],"payments"=>$payments,"balance"=>$balance['amount']]);
});

Flight::route('/facturas/@id', function ($id) {
    $admin = new Model;
    $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
    $payments = $admin->payments->GetByClient(new Request(["client_id"=>$id]));
    $balance = $admin->services->GetPatientBalance(new Request(["patient_id"=>$id]));
    $billingReceives = $admin->clients->GetBillingReceives();
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/facturas', [
        'title' => 'Facturaci??n', 
        'header' => 'headerPagos',
        "client" => $client,
        "headerName"=>$client['name'],
        "payments"=>$payments,
        "balance"=>$balance?$balance['amount']:0,
        "billingReceives"=>$billingReceives,
        "asideActive"=>"clientes"
    ]);
});


Flight::route('/servicios-paciente/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){   
        //Ruta donde se muestran los servicios de un paciente.
        $admin = new Model();
        $providers = $admin->nurses->List();
        $patient = $admin->patients->GetPatientById(new Request(["id"=>$id]));
        $patient_balance = $admin->services->GetPatientBalance(new Request(["patient_id"=>$id]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/serviciosPaciente', [
            'title' => 'Servicios', 
            'header' => 'headerServicios', 
            'admin' => $admin,
            "patient" => $patient,
            "headerName"=>$patient['name'],
            'providers' => $providers,
            'patient_balance' => $patient_balance,
            "idClient"=>$patient['id'],
            "asideActive"=>"servicios"
        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/login', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('account/login', ['title' => 'Login', 'header' => 'headerLogin',"isEnfermera"=>true]);
});

/*Flight::route('/', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/index', ['title' => 'Dashboard', 'header' => 'headerIndex']);
    }else{
        Flight::redirect("/login");
    }
});

Flight::route('/cliente/@id', function ($id) {

    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model;
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));

        Flight::set('flight.views.path', 'intranet');
        Flight::render(
            'dashboard/cliente', [
                'title' => 'Cliente', 
                'header' => 'headerCliente',
                "client" => $client,
                "headerName"=>$client['name'],
                "idClient"=>$client['id']
            ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/pagos/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model;
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
        $payments = $admin->payments->GetByClient(new Request(["client_id"=>$id]));
        $balance = $admin->payments->GetPatientBalance(new Request(["patient_id"=>$id]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/pagos', [
            'title' => 'Historial De Pagos', 
            'header' => 'headerPagos',
            "client" => $client,
            "headerName"=>$client['name'],
            "payments"=>$payments,
            "balance"=>$balance['amount']
        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/pagosPaciente/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){ 
        $admin = new Model;
        $patients = $admin->patients->GetPatientById(new Request(["id"=>$id]));
        $payments = $admin->payments->GetByPatient(new Request(["patient_id"=>$id]));
        $balance = $admin->payments->GetPatientBalance(new Request(["patient_id"=>$id]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/pagosPaciente', ['title' => 'Historial De Pagos - Paciente', 'header' => 'headerPagosPaciente',"headerName"=>$patients['name'],"payments"=>$payments,"balance"=>$balance['amount']]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/servicios/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model();
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/servicios', [
            'title' => 'Servicios', 
            'header' => 'headerServicios', 
            'admin' => $admin,
            "client" => $client,
            "headerName"=>$client['name'],
            "idClient"=>$client['id']
        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/paciente/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model;
        $patient = $admin->patients->GetPatientById(new Request(["id"=>$id]));
        $ailments = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_AILMENTS]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/paciente', [
            'title' => 'Paciente', 
            'header' => 'headerPaciente',
            "patient"=>$patient,
            "ailments"=>$ailments,
            "headerName"=>$patient['name']
        ]);
    }else{
        Flight::redirect("login");
    }
});
*/

Flight::route('/prestadoras/', function ($type) {
    Flight::redirect("/prestadoras/active");
});

Flight::route('/prestadoras/@type', function ($type) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model;
        Flight::set('flight.views.path', 'intranet');
        if ($type=="unsuscribed"){
            $providers = $admin->nurses->List();
        }else if($type=="inactive"){
            $providers = $admin->nurses->List();
        }else{
            $providers = $admin->nurses->List();
        }
        Flight::render('dashboard/prestadoras', [
            'title' => 'Prestadoras', 
            'header' => 'headerPrestadoras',
            'asideActive' => 'enfermeras',
            "providers" => $providers,
            "type"=>$type
        ]);
    }else{
        Flight::redirect("login");
    }
});

/*Flight::route('/prestadoras', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model;
        Flight::set('flight.views.path', 'intranet');
        $providers = $admin->nurses->List();
        Flight::render('dashboard/prestadoras', [
            'title' => 'Prestadoras', 
            'header' => 'headerPrestadoras',
            'asideActive' => 'enfermeras',
            "providers" => $providers
        ]);
    }else{
        Flight::redirect("login");
    }
});/


// Rutas relacionadas a las bitacoras
Flight::route('/bitacora/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        Flight::redirect("/bitacora/".$id."/ingresos");
    }else{
        Flight::redirect("login");
    }
});

// Rutas relacionadas a las bitacoras
Flight::route('/bitacora/@id/@type', function ($id,$type) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){   
        Flight::set('flight.views.path', 'intranet');
        $admin = new Model;
        $io_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_IO_TYPES]));
        $mov_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_MOVEMENTS]));
        $breath_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BREATH_HELP]));
        $drug_ways = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_DRUG_WAYS]));
        $cat_eyes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_OPEN_EYES]));
        $verbal_res = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_VERBAL_RESPONSE]));
        $motor_res = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_MOTOR_RESPONSE]));
        $locations = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_LOCATION]));
        $state_minds = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_STATE_OF_MIND]));
        $movilities = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_MOVILITY]));
        $incontinences = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_INCONTINENCE]));
        $general_status = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_GENERAL_STATUS]));
        $affected_zones = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_AFFECTED_ZONE]));
        
        $table = [
            "apoyo"=>"binnacle_breath_help",
            "ingresos"=>"binnacle_io",
            "movilizaciones"=>"binnacle_movements",
            "signos"=>"binnacle_vital_signs",
            "medicamentos"=>"binnacle_drugs",
            "evaluacion"=>"scale_pain",
            "pupilar"=>"scale_pupilar",
            "glasgow"=>"scale_glasgow",
            "perimetros"=>"scale_perimeters",
            "norton"=>"scale_norton"
        ];

        $data = $admin->binnacle->GetData($id,$table[$type]);
        Flight::render('dashboard/bitacora/'.$type, 
            [
                'title' => 'Bit??cora', 
                'header' => 'headerBitacora', 
                "data"=>$data, 
                "asideActive"=>"servicios",
                'ioTypes' => $io_types,
                'movTypes' => $mov_types,
                'breathTypes' => $breath_types,
                'drugWays' => $drug_ways,
                'catEyes' => $cat_eyes,
                'verbalRes' => $verbal_res,
                'motorRes' => $motor_res,
                'locations' => $locations,
                'stateMinds' => $state_minds,
                'movilities' => $movilities,
                'incontinences' => $incontinences,
                'generalStatus' => $general_status,
                'affectedZones' => $affected_zones,
            ]);
    }else{
        Flight::redirect("login");
    }
});

/*Flight::route('/bitacora/ingresosYEgresos', function () {
});

Flight::route('/bitacora/signosVitales', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/signos', ['title' => 'Bitacora - Signos Vitales', 'header' => 'headerBitacora']);
});

Flight::route('/bitacora/movilizaciones', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/movilizaciones', ['title' => 'Bitacora - Movilizaciones', 'header' => 'headerBitacora']);
});

Flight::route('/bitacora/apoyoRespiratorio', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/apoyo', ['title' => 'Bitacora - Apoyo Respiratorio', 'header' => 'headerBitacora']);
});

Flight::route('/bitacora/medicamentos', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/medicamentos', ['title' => 'Bitacora - Medicamentos', 'header' => 'headerBitacora']);
});

Flight::route('/bitacora/evaluacion', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/evaluacion', ['title' => 'Bitacora - Evaluaci??n y reevaluaci??n del dolor', 'header' => 'headerBitacora']);
});

Flight::route('/bitacora/pupilar', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/pupilar', ['title' => 'Bitacora - Pupilar', 'header' => 'headerBitacora']);
});

Flight::route('/bitacora/glasgow', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/glasgow', ['title' => 'Bitacora - Glasgow', 'header' => 'headerBitacora']);
});

Flight::route('/bitacora/perimetros', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/perimetros', ['title' => 'Bitacora - Per??metros', 'header' => 'headerBitacora']);
});

Flight::route('/bitacora/norton', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/norton', ['title' => 'Bitacora - Norton', 'header' => 'headerBitacora']);
});*/

// Rutas relacionadas a las funcionalidades de agregar
Flight::route('/add/servicio/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model;
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
        $billing_schemes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_SCHEMES]));
        $billing_regimes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_REGIMES]));
        $billing_uses = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_USES]));
        $service_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_SERVICE_TYPES]));
        $care_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_CARE_TYPE]));
        $durations = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_SERVICE_DURATIONS]));
        $complexions = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_COMPLEXION]));
        $ailments = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_AILMENTS]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render(
            'dashboard/add/servicio', [
                'title' => 'Agregar - Servicio',
                'header' => 'headerAdd',
                "billing_schemes"=>$billing_schemes,
                "billing_regimes"=>$billing_regimes,
                "billing_uses"=>$billing_uses,
                "ailments"=>$ailments,
                "service_types"=>$service_types,
                "care_types"=>$care_types,
                "durations"=>$durations,
                "complexions"=>$complexions,
                "client"=>$client,
                "asideActive"=>"servicios"
            ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/add/nuevo-cliente', function() {
    $admin = new Model;
    $billing_schemes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_SCHEMES]));
    $billing_uses = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_USES]));
    $billing_regimes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_REGIMES]));

    Flight::set('flight.views.path', 'intranet');
    Flight::render(
        'dashboard/add/nuevoCliente', [
            'title' => 'Agregar Cliente',
            "billing_schemes"=>$billing_schemes,
            "billing_uses"=>$billing_uses,
            "billing_regimes"=>$billing_regimes,
            "asideActive"=>"clientes",
            'header' => 'headerAdd',

        ]);
});

Flight::route('/add/paciente-cliente/@id', function($id) {
    $admin = new Model;
    $billing_schemes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_SCHEMES]));
    $billing_uses = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_USES]));
    $billing_regimes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_REGIMES]));
    
    $ailments = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_AILMENTS]));

    $client = $admin->clients->GetClientById(new Request(["id"=>$id]));

    Flight::set('flight.views.path', 'intranet');
    Flight::render(
        'dashboard/add/nuevoPaciente', [
            'title' => 'Agregar Cliente',
            "billing_schemes"=>$billing_schemes,
            "billing_uses"=>$billing_uses,
            "ailments"=>$ailments,
            "billing_regimes"=>$billing_regimes,
            "asideActive"=>"clientes",
            'header' => 'headerAdd',
            "client" => $client
        ]);
});

Flight::route('/add/servicio-paciente/@id', function ($id) {
    //Ruta para agregar el servicio a un paciente
    $admin = new Model;
    $patient = $admin->patients->GetPatientById(new Request(["id"=>$id]));
    $service_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_SERVICE_TYPES]));
    $care_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_CARE_TYPE]));
    $durations = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_SERVICE_DURATIONS]));
    $complexions = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_COMPLEXION]));

    Flight::set('flight.views.path', 'intranet');
    Flight::render(
        'dashboard/add/servicioPaciente', [
            'title' => 'Agregar - Servicio',
            'header' => 'headerAddServicioPaciente',
            'patient' => $patient,
            // "billing_schemes"=>$billing_schemes,
            // "billing_regimes"=>$billing_regimes,
            // "billing_uses"=>$billing_uses,
            // "ailments"=>$ailments,
            "asideActive"=>"clientes",
            "service_types"=>$service_types,
            "care_types"=>$care_types,
            "durations"=>$durations,
            "complexions"=>$complexions,
            // "client"=>$client
        ]);
});

Flight::route('/editar/paciente/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model;
        $patient = $admin->patients->GetPatientById(new Request(["id"=>$id]));
        $client = $admin->clients->GetClientById(new Request(["id"=>$patient['client_id']]));
        $billing_schemes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_SCHEMES]));
        $billing_regimes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_REGIMES]));
        $billing_uses = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_USES]));
        $service_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_SERVICE_TYPES]));
        $care_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_CARE_TYPE]));
        $durations = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_SERVICE_DURATIONS]));
        $complexions = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_COMPLEXION]));
        $ailments = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_AILMENTS]));
        $countries = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_COUNTRIES]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render(
            'dashboard/edit/patient', [
                'title' => 'Agregar - Servicio',
                'header' => 'headerAdd',
                "billing_schemes"=>$billing_schemes,
                "billing_regimes"=>$billing_regimes,
                "billing_uses"=>$billing_uses,
                "ailments"=>$ailments,
                "countries"=>$countries,
                "service_types"=>$service_types,
                "care_types"=>$care_types,
                "durations"=>$durations,
                "complexions"=>$complexions,
                "patient"=>$patient,
                "client"=>$client,
                "asideActive"=>"clientes"
            ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/add/servicio/', function () {
    //$user = isset($_SESSION['user'])?$_SESSION['user']:null;
    // if ($user!=null && $user['type']==1){
        $admin = new Model;
        $billing_schemes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_SCHEMES]));
        $billing_regimes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_REGIMES]));
        $billing_uses = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_USES]));
        $ailments = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_AILMENTS]));
        $service_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_SERVICE_TYPES]));
        $care_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_CARE_TYPE]));
        $complexions = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_COMPLEXION]));
        $durations = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_SERVICE_DURATIONS]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render(
            'dashboard/add/servicio', [
                'title' => 'Editar - Paciente',
                'header' => 'headerAdd',
                "billing_schemes"=>$billing_schemes,
                "billing_regimes"=>$billing_regimes,
                "billing_uses"=>$billing_uses,
                "ailments"=>$ailments,
                "service_types"=>$service_types,
                "care_types"=>$care_types,
                "complexions"=>$complexions,
                "durations"=>$durations,
                "client"=>null
            ]);
    // }else{
    //     Flight::redirect("login");
    // }
});

Flight::route('/add/paciente/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model;
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
        $billing_schemes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_SCHEMES]));
        $billing_regimes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_REGIMES]));
        $billing_uses = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_USES]));
        $service_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_SERVICE_TYPES]));
        $care_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_CARE_TYPE]));
        $durations = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_SERVICE_DURATIONS]));
        $complexions = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_COMPLEXION]));
        $ailments = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_AILMENTS]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render(
            'dashboard/add/servicio', [
                'title' => 'Agregar - Servicio',
                'header' => 'headerAdd',
                "billing_schemes"=>$billing_schemes,
                "billing_regimes"=>$billing_regimes,
                "billing_uses"=>$billing_uses,
                "ailments"=>$ailments,
                "client"=>$client,
                "service_types"=>$service_types,
                "care_types"=>$care_types,
                "durations"=>$durations,
                "complexions"=>$complexions,
                "add" => 'paciente',
                "asideActive"=>"servicios"
            ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/add/paciente', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/add/paciente', ['title' => 'Agregar - Paciente', 'header' => 'headerBitacora']);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/add/prestadora', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        $admin = new Model;
        $provider_skills = $admin->nurses->GetAllProvidersSkills();
        $professional_profile = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_PROFESSIONAL_PROFILE]));

        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/add/prestadora',[
            'title' => 'Agregar - Prestadora', 
            'header' => 'headerAddPrestadora',
            "provider_skills"=>$provider_skills,
            "asideActive" => "enfermeras"
            'professionalProfiles' => $professional_profile,
            'provider_skills'=>$provider_skills
        ]);
    }else{
        Flight::redirect("login");
    }
});

// Rutas relacionadas a asignacionTECA
Flight::route('/asignacionECA', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/asignacionECA', ['title' => 'Asignacion ECA', 'header' => 'headerECA']);
    }else{
        Flight::redirect("login");
    }
});

/* ----------------------------------------------------------------
 * -------------------  Secci??n de enfermeras  --------------------
 * ---------------------------------------------------------------- */

// Rutas relacionadas a asignacionTECA
Flight::route('/enfermera', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==3){

        $admin = new Model;
        $services = $admin->services->GetByProvider(new Request(["id"=>$user['id']]));

        Flight::set('flight.views.path', 'intranet');
        Flight::render('nursers/index', [
            'title' => 'Servicios', 
            'header' => 'headerEnfermeras',
            'isEnfermera' => true,
            "services"=>$services
        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/enfermera/pagos', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==3){
        Flight::set('flight.views.path', 'intranet');
        Flight::render('nursers/pagos', [
            'title' => 'Pagos', 
            'isEnfermera' => true, 
            'header' => 'headerEnfermeras',
            'pagos' => true
        ]);
    }else{
        Flight::redirect("login");
    }
});


Flight::route('/enfermera/servicios/@id', function ($id) {
    $admin = new Model;
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    $service = $admin->services->GetServiceById(new Request(["id"=>$id]));
    $io_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_IO_TYPES]));
    $mov_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_MOVEMENTS]));
    $breath_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BREATH_HELP]));
    $drug_ways = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_DRUG_WAYS]));
    $cat_eyes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_OPEN_EYES]));
    $verbal_res = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_VERBAL_RESPONSE]));
    $motor_res = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_MOTOR_RESPONSE]));
    $locations = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_LOCUTION]));
    $state_minds = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_STATE_OF_MIND]));
    $movilities = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_MOVILITY]));
    $incontinences = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_INCONTINENCE]));
    $general_status = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_GENERAL_STATUS]));
    $affected_zones = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_AFFECTED_ZONE]));
    $binnacle = $admin->services->GetBinnacleByServiceId(new Request(["id"=>$id]));

    if ($user!=null && $user['type']==3){
        Flight::set('flight.views.path', 'intranet');
        Flight::render('nursers/servicios', [
            'title' => 'Servicio', 
            'header' => 'headerEnfermeraServicios',
            'isEnfermera' => true,
            'ioTypes' => $io_types,
            'movTypes' => $mov_types,
            'breathTypes' => $breath_types,
            'drugWays' => $drug_ways,
            'catEyes' => $cat_eyes,
            'verbalRes' => $verbal_res,
            'motorRes' => $motor_res,
            'locations' => $locations,
            'stateMinds' => $state_minds,
            'movilities' => $movilities,
            'incontinences' => $incontinences,
            'generalStatus' => $general_status,
            'affectedZones' => $affected_zones,
            'service' => $service,
            'binnacle' => $binnacle
        ]);
    }else{
        Flight::redirect("login");
    }
});

// Flight::route('/enfermera/ingresosYEgresos/@id', function ($id) {
//     $admin = new Model;
//     $user = isset($_SESSION['user'])?$_SESSION['user']:null;
//     $service = $admin->services->GetServiceById(new Request(["id"=>$id]));
//     $io_types = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_IO_TYPES]));

//     if ($user!=null && $user['type']==3){
//         Flight::set('flight.views.path', 'intranet');
//         Flight::render('nursers/ingresosYEgresos', [
//             'title' => 'Ingresos y egresos', 
//             'header' => 'headerEnfermeraServicios',
//             'ioTypes' => $io_types,
//             'service' => $service,
//             'isEnfermera' => true
//         ]);
//     }else{
//         Flight::redirect("login");
//     }
// });

// Flight::route('/enfermera/signosVitales/@id', function ($id) {
//     $admin = new Model;
//     $user = isset($_SESSION['user'])?$_SESSION['user']:null;
//     $service = $admin->services->GetServiceById(new Request(["id"=>$id]));
//     if ($user!=null && $user['type']==3){
//         Flight::set('flight.views.path', 'intranet');
//         Flight::render('nursers/signosVitales', [
//             'title' => 'Signos vitales',
//             'header' => 'headerEnfermeraServicios',
//             'service' => $service,
//             'isEnfermera' => true
//         ]);
//     }else{
//         Flight::redirect("login");
//     }
// });

// Flight::route('/enfermera/movilizaciones', function () {
//     $user = isset($_SESSION['user'])?$_SESSION['user']:null;
//     if ($user!=null && $user['type']==1){
//         Flight::set('flight.views.path', 'intranet');
//         Flight::render('nursers/movilizaciones', [
//             'title' => 'Movilizaciones',
//             'header' => 'headerEnfermeraServicios',
//             'isEnfermera' => true
//         ]);
//     }else{
//         Flight::redirect("login");
//     }
// });

// Flight::route('/enfermera/apoyoRespiratorio', function () {
//     $user = isset($_SESSION['user'])?$_SESSION['user']:null;
//     if ($user!=null && $user['type']==1){
//         Flight::set('flight.views.path', 'intranet');
//         Flight::render('nursers/apoyoRespiratorio', [
//             'title' => 'Apoyo Respiratorio',
//             'header' => 'headerEnfermeraServicios',
//             'isEnfermera' => true
//         ]);
//     }else{
//         Flight::redirect("login");
//     }
// });

Flight::route('/enfermera/medicamentos', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        Flight::set('flight.views.path', 'intranet');
        Flight::render('nursers/medicamentos', [
            'title' => 'Medicamentos',
            'header' => 'headerEnfermeraServicios',
            'isEnfermera' => true
        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/enfermera/escalas', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        Flight::set('flight.views.path', 'intranet');
        Flight::render('nursers/escalas', [
            'title' => 'Escalas',
            'header' => 'headerEnfermeraServicios',
            'isEnfermera' => true
        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/enfermera/terminar', function () {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==1){
        Flight::set('flight.views.path', 'intranet');
        Flight::render('nursers/terminar', [
            'title' => 'Terminar',
            'header' => 'headerEnfermeraServicios',
            'isEnfermera' => true
        ]);
    }else{
        Flight::redirect("login");
    }
});

/* ----------------------------------------------------------------
 * -----------------  Secci??n que ve el cliente  ------------------
 * ---------------------------------------------------------------- */
Flight::route('/dashboard/cliente/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==5){
        $admin = new Model;
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
        $client_balance = $admin->services->GetClientBalance(new Request(["client_id"=>$id]));
        $log_balance = $admin->services->GetLogBalanceByClient(new Request(["client_id"=>$id]));


        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/cliente/index', [
            'title' => 'Nombre del cliente',
            'header' => 'headerClienteDashboard',
            'asideActive' => 'clientes',
            'client' => $client,
            'client_balance' => $client_balance,
            'logBalance' => $log_balance,
            'isClienteSideBar' => true

        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/dashboard/cliente/abono/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==5){
        $admin = new Model;
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
        $patients = $admin->patients->GetByClient(new Request(["client_id"=>$id]));
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/cliente/abono', [
            'title' => 'Hacer un abono',
            'header' => 'headerAbonos',
            'asideActive' => 'clientes',
            'client' => $client,
            'patients' => $patients,
            'idCliente' => $id,
            'isClienteSideBar' => true
        ]);
    }else{
        Flight::redirect("login");
    }
});

Flight::route('/dashboard/abono/result/@type', function ($type) {
    $admin = new Model;
    Flight::set('flight.views.path', 'intranet');
    Flight::render('clients/results/'.$type, [
        'title' => 'Pago realizado', 
        'header' => 'headerClienteDashboard',
        'isClienteSideBar' => true
    ]);
});

Flight::route('/dashboard/facturas/@id', function ($id) {
    $user = isset($_SESSION['user'])?$_SESSION['user']:null;
    if ($user!=null && $user['type']==5){
        $admin = new Model;
        $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
        $payments = $admin->payments->GetByClient(new Request(["client_id"=>$id]));
        $balance = $admin->services->GetPatientBalance(new Request(["patient_id"=>$id]));
        $billingReceives = $admin->clients->GetBillingReceives();
        Flight::set('flight.views.path', 'intranet');
        Flight::render('dashboard/cliente/facturas', [
            'title' => 'Facturaci??n', 
            'header' => 'headerClienteDashboard',
            "client" => $client,
            "headerName"=>$client['name'],
            "payments"=>$payments,
            "balance"=>$balance?$balance['amount']:0,
            "billingReceives"=>$billingReceives,
            'isClienteSideBar' => true,
            "asideActive"=>"clientes"
        ]);
    }else{
        Flight::redirect("login");
    }
});

/*Flight::route('/dashboard/recept-vials/@id',function($id){
    $id = str_replace(".", "", $id);
    Flight::redirect('/recept-vials/'.$id);
});

Flight::route('/recept-vials/@id', function ($id) {
    $admin = new Model;
    $delivery = $admin->deliveries->GetDetails($id);
    Flight::render('patients/recept', ['title' => 'Recepci??n de viales',"delivery"=>$delivery]);
});

Flight::route('/admin/login', function () {
    $admin = new Model;
    if (isset($_SESSION['user']) && ($_SESSION['user']['type']=="1")){
        Flight::redirect("/admin/deliveries");
    }
    Flight::set('flight.views.path', 'intranet');
    Flight::render('account/login', ['title' => 'Iniciar sesi??n', "options"=>["navbar"=>false]]);
});

Flight::route('/admin/recover', function () {
    $admin = new Model;
    if (isset($_SESSION['user']) && ($_SESSION['user']['type']=="1")){
        Flight::redirect("/admin/deliveries");
    }
    Flight::set('flight.views.path', 'intranet');
    Flight::render('account/recover', ['title' => 'Recuperar contrase??a', "options"=>["navbar"=>false]]);
});

Flight::route('/admin/restore', function () {
    $admin = new Model;
    Flight::set('flight.views.path', 'intranet');
    Flight::render('account/restore', ['title' => 'Nueva contrase??a', "options"=>["navbar"=>false]]);
});

Flight::route('/admin/deliveries(/@type)(/@id)', function ($type,$id) {
    $admin = new Model;
    if (!isset($_SESSION['user']) || ($_SESSION['user']['type']!="1")){
        Flight::redirect("/admin/login");
    }
    $css = ["../vendor/datatables/dataTables.bootstrap4"];
    $js = ["../vendor/datatables/jquery.dataTables","../vendor/datatables/dataTables.bootstrap4","../vendor/datatables/buttons.min","../vendor/datatables/buttonsHtml5.min","../vendor/datatables/jzip.min"];
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/deliveries', ['title' => 'Env??os',"css"=>$css,"js"=>$js,"type"=>$type,"id"=>$id]);
    Flight::modal("deliveries");
});


Flight::route('/admin/patients', function () {
    $admin = new Model;
    if (!isset($_SESSION['user']) || ($_SESSION['user']['type']!="1")){
        Flight::redirect("/admin/login");
    }
    $css = ["../vendor/datatables/dataTables.bootstrap4"];
    $js = ["../vendor/datatables/jquery.dataTables","../vendor/datatables/dataTables.bootstrap4","../vendor/datatables/buttons.min","../vendor/datatables/buttonsHtml5.min","../vendor/datatables/jzip.min"];
    Flight::set('flight.views.path', 'intranet');
    Flight::render('patients/index', ['title' => 'Pacientes', "admin" => $admin,"css"=>$css,"js"=>$js]);
});

Flight::route('/admin/stock', function () {
    $admin = new Model;
    if (!isset($_SESSION['user']) || ($_SESSION['user']['type']!="1")){
        Flight::redirect("/admin/login");
    }
    $css = ["../vendor/datatables/dataTables.bootstrap4"];
    $js = ["../vendor/datatables/jquery.dataTables","../vendor/datatables/dataTables.bootstrap4","../vendor/datatables/buttons.min","../vendor/datatables/buttonsHtml5.min","../vendor/datatables/jzip.min"];
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/stock', ['title' => 'Inventario',"css"=>$css,"js"=>$js]);
    Flight::modal("stock");
});*/

/*Flight::route('/admin/stock/history/@id', function ($id) {
    $admin = new Model;
    if (!isset($_SESSION['user']) || ($_SESSION['user']['type']!="1")){
        Flight::redirect("/admin/login");
    }
    $css = ["../vendor/datatables/dataTables.bootstrap4"];
    $js = ["../vendor/datatables/jquery.dataTables","../vendor/datatables/dataTables.bootstrap4","../vendor/datatables/buttons.min","../vendor/datatables/buttonsHtml5.min","../vendor/datatables/jzip.min"];

    $drug = $admin->drugs->GetDetails(new Request(["id"=>$id]));*/
    /*if ($drug['summary']['quantity']<1)
        Flight::redirect("/admin/stock");*/
    /*Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/drug-history', ['title' => 'Inventario',"css"=>$css,"js"=>$js,"id"=>$id,"drug"=>$drug]);
    Flight::modal("stock");
});*/

/*Flight::route('/admin/users', function () {
    $admin = new Model;
    if (!isset($_SESSION['user']) || ($_SESSION['user']['type']!="1")){
        Flight::redirect("/admin/login");
    }
    $css = ["../vendor/datatables/dataTables.bootstrap4"];
    $js = ["../vendor/datatables/jquery.dataTables","../vendor/datatables/dataTables.bootstrap4","../vendor/datatables/buttons.min","../vendor/datatables/buttonsHtml5.min","../vendor/datatables/jzip.min"];

    Flight::set('flight.views.path', 'intranet');
    Flight::render('account/users', ['title' => 'Usuarios',"css"=>$css,"js"=>$js]);
    Flight::modal("users");
});*/


Flight::route('/logout', function () {
    session_destroy();
    Flight::redirect("/login");
});


Flight::start();

?>