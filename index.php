<?php

require 'flight/Flight.php';
include "classes/LoadModels.php";

$whitelist = array(
    '127.0.0.1',
    '::1'
);
if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    define('__ROOT__', "");
}else{
    define('__ROOT__', "http://localhost/backend");
    // define('__ROOT__', "http://localhost/deskrive/attend/atend-back");
}

//session_start();
/*Flight::route('/', function () {
    Flight::redirect('admin/login');
});*/

Flight::route('/', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/index', ['title' => 'Dashboard', 'header' => 'headerIndex']);
});

Flight::route('/cliente/@id', function ($id) {
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
});

Flight::route('/pagos/@id', function ($id) {
    $admin = new Model;
    $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
    $payments = $admin->payments->GetByClient(new Request(["client_id"=>$id]));
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/pagos', [
        'title' => 'Historial De Pagos', 
        'header' => 'headerPagos',
        "client" => $client,
        "headerName"=>$client['name'],
        "payments"=>$payments
    ]);
});

Flight::route('/pagosPaciente/@id', function ($id) {
    $admin = new Model;
    $patients = $admin->patients->GetPatientById(new Request(["id"=>$id]));
    $payments = $admin->payments->GetByPatient(new Request(["patient_id"=>$id]));
    $balance = $admin->payments->GetPatientBalance(new Request(["patient_id"=>$id]));
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/pagosPaciente', ['title' => 'Historial De Pagos - Paciente', 'header' => 'headerPagosPaciente',"headerName"=>$patients['name'],"payments"=>$payments,"balance"=>$balance['amount']]);
});

Flight::route('/servicios/@id', function ($id) {
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
});

Flight::route('/paciente/@id', function ($id) {
    $admin = new Model;
    $patient = $admin->patients->GetPatientById(new Request(["id"=>$id]));
    $ailments = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_AILMENTS]));
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/paciente', ['title' => 'Paciente', 'header' => 'headerPaciente',"patient"=>$patient,"ailments"=>$ailments,"headerName"=>$patient['name']]);
});

Flight::route('/prestadoras', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/prestadoras', [
        'title' => 'Prestadoras', 
        'header' => 'headerPrestadoras',
        'asideActive' => 'enfermeras'
    ]);
});

// Rutas relacionadas a las bitacoras
Flight::route('/bitacora', function () {
    Flight::redirect('/bitacora/ingresosYEgresos');
});

Flight::route('/bitacora/ingresosYEgresos', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/ingresos', ['title' => 'Bitacora - Ingresos Y Egresos', 'header' => 'headerBitacora']);
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
    Flight::render('dashboard/bitacora/evaluacion', ['title' => 'Bitacora - Evaluación y reevaluación del dolor', 'header' => 'headerBitacora']);
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
    Flight::render('dashboard/bitacora/perimetros', ['title' => 'Bitacora - Perímetros', 'header' => 'headerBitacora']);
});

Flight::route('/bitacora/norton', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/bitacora/norton', ['title' => 'Bitacora - Norton', 'header' => 'headerBitacora']);
});

// Rutas relacionadas a las funcionalidades de agregar
Flight::route('/add/servicio/@id', function ($id) {
    $admin = new Model;
    $client = $admin->clients->GetClientById(new Request(["id"=>$id]));
    $billing_schemes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_SCHEMES]));
    $billing_regimes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_REGIMES]));
    $billing_uses = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_USES]));
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
            "client"=>$client
        ]);
});
Flight::route('/add/servicio/', function () {
    $admin = new Model;
    $billing_schemes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_SCHEMES]));
    $billing_regimes = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_REGIMES]));
    $billing_uses = $admin->catalogs->getCatalog(new Request(["catalog"=>$admin->catalogs::TABLE_CAT_BILLING_USES]));
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
            "client"=>null
        ]);
});

Flight::route('/add/paciente', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/add/paciente', ['title' => 'Agregar - Paciente', 'header' => 'headerBitacora']);
});

Flight::route('/add/prestadora', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/add/prestadora', ['title' => 'Agregar - Prestadora', 'header' => 'headerAddPrestadora']);
});

// Rutas relacionadas a asignacionTECA
Flight::route('/asignacionECA', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/asignacionECA', ['title' => 'Asignacion ECA', 'header' => 'headerECA']);
});

/* ----------------------------------------------------------------
 * -------------------  Sección de enfermeras  --------------------
 * ---------------------------------------------------------------- */

// Rutas relacionadas a asignacionTECA
Flight::route('/enfermera', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('nursers/index', [
        'title' => 'El nombre de la enfermera', 
        'header' => 'headerEnfermeras',
        'isEnfermera' => true
    ]);
});

Flight::route('/enfermera/servicios', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('nursers/servicios', [
        'title' => 'Servicio', 
        'header' => 'headerEnfermeraServicios',
        'isEnfermera' => true
    ]);
});

Flight::route('/enfermera/ingresosYEgresos', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('nursers/ingresosYEgresos', [
        'title' => 'Ingresos y egresos', 
        'header' => 'headerEnfermeraServicios',
        'isEnfermera' => true
    ]);
});

Flight::route('/enfermera/signosVitales', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('nursers/signosVitales', [
        'title' => 'Signos vitales',
        'header' => 'headerEnfermeraServicios',
        'isEnfermera' => true
    ]);
});

Flight::route('/enfermera/movilizaciones', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('nursers/movilizaciones', [
        'title' => 'Movilizaciones',
        'header' => 'headerEnfermeraServicios',
        'isEnfermera' => true
    ]);
});

Flight::route('/enfermera/apoyoRespiratorio', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('nursers/apoyoRespiratorio', [
        'title' => 'Apoyo Respiratorio',
        'header' => 'headerEnfermeraServicios',
        'isEnfermera' => true
    ]);
});

Flight::route('/enfermera/medicamentos', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('nursers/medicamentos', [
        'title' => 'Medicamentos',
        'header' => 'headerEnfermeraServicios',
        'isEnfermera' => true
    ]);
});

Flight::route('/enfermera/escalas', function () {
    Flight::set('flight.views.path', 'intranet');
    Flight::render('nursers/escalas', [
        'title' => 'Escalas',
        'header' => 'headerEnfermeraServicios',
        'isEnfermera' => true
    ]);
});

/*Flight::route('/dashboard/recept-vials/@id',function($id){
    $id = str_replace(".", "", $id);
    Flight::redirect('/recept-vials/'.$id);
});

Flight::route('/recept-vials/@id', function ($id) {
    $admin = new Model;
    $delivery = $admin->deliveries->GetDetails($id);
    Flight::render('patients/recept', ['title' => 'Recepción de viales',"delivery"=>$delivery]);
});

Flight::route('/admin/login', function () {
    $admin = new Model;
    if (isset($_SESSION['user']) && ($_SESSION['user']['type']=="1")){
        Flight::redirect("/admin/deliveries");
    }
    Flight::set('flight.views.path', 'intranet');
    Flight::render('account/login', ['title' => 'Iniciar sesión', "options"=>["navbar"=>false]]);
});

Flight::route('/admin/recover', function () {
    $admin = new Model;
    if (isset($_SESSION['user']) && ($_SESSION['user']['type']=="1")){
        Flight::redirect("/admin/deliveries");
    }
    Flight::set('flight.views.path', 'intranet');
    Flight::render('account/recover', ['title' => 'Recuperar contraseña', "options"=>["navbar"=>false]]);
});

Flight::route('/admin/restore', function () {
    $admin = new Model;
    Flight::set('flight.views.path', 'intranet');
    Flight::render('account/restore', ['title' => 'Nueva contraseña', "options"=>["navbar"=>false]]);
});

Flight::route('/admin/logout', function () {
    session_destroy();
    Flight::redirect("admin/login");
});


Flight::route('/admin/deliveries(/@type)(/@id)', function ($type,$id) {
    $admin = new Model;
    if (!isset($_SESSION['user']) || ($_SESSION['user']['type']!="1")){
        Flight::redirect("/admin/login");
    }
    $css = ["../vendor/datatables/dataTables.bootstrap4"];
    $js = ["../vendor/datatables/jquery.dataTables","../vendor/datatables/dataTables.bootstrap4","../vendor/datatables/buttons.min","../vendor/datatables/buttonsHtml5.min","../vendor/datatables/jzip.min"];
    Flight::set('flight.views.path', 'intranet');
    Flight::render('dashboard/deliveries', ['title' => 'Envíos',"css"=>$css,"js"=>$js,"type"=>$type,"id"=>$id]);
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


Flight::start();

?>