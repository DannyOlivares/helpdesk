    <?php

/*
 * This file is part of the Ocrend Framewok 2 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

use app\models as Model;

/**
    * Inicio de sesión
    *
    * @return json
*/
$app->post('/login', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->login());
});
$app->post('/notificacion_emergente', function() use($app) {
    $u = new Model\Varios;
    return $app->json($u->notificacion_emergente());
});
/**
    * Modifica password usuario
    *
    * @return json
*/
$app->post('/resetpass', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->resetpass());
});

/**
    * Inicio de sesión
    *
    * @return json
*/
$app->post('/logout', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->logout());
});

/**
    * Registro de un usuario
    *
    * @return json
*/
$app->post('/registra_nuevo_usuario', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->registra_nuevo_usuario());
});
/**
    * Registro de un usuario
    *
    * @return json
*/
$app->post('/update_usuario', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->update_usuario());
});
/**
    * Recuperar contraseña perdida
    *
    * @return json
*/
$app->post('/lostpass', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->lostpass());
});

/**
    * Recuperar contraseña perdida
    *
    * @return json
*/
$app->post('/registra_nuevo_perfil', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->registra_nuevo_perfil());
});
/**
    * Elimina perfil seleccionado
    *
    * @return json
*/
$app->post('/delete_perfil', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->delete_perfil());
});
/**
    * Elimina perfil seleccionado
    *
    * @return json
*/
$app->post('/reset_pass_user', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->resetpass());
});
/**
    * Actualiza perfil de usuario modificado directamente
    *
    * @return json
*/
$app->post('/update_peril_usuario', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->update_peril_usuario());
});
/**
    * Actualiza perfil de usuario modificado directamente
    *
    * @return json
*/
$app->post('/mostar_datos_perfil', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->mostar_datos_perfil());
});
/**
    * Actualiza perfil de usuario modificado directamente
    *
    * @return json
*/
$app->post('/update_perfil', function() use($app) {
    $u = new Model\Users;

    return $app->json($u->update_perfil());
});
/**
    * Actualiza perfil datos de empresa
    *
    * @return json
*/
$app->post('/update_empresa', function() use($app) {
    $e = new Model\Empresa;

    return $app->json($e->update_empresa());
});

//////// CONTROLER RRHH ////////////////
/// HORAS EXTRAS
$app->post('/buscar_coincidencia', function() use($app) {
    $e = new Model\Horasextra;

    return $app->json($e->buscar_coincidencia());
});
$app->post('/hora_extra', function() use($app) {
    $u = new Model\Horasextra;

    return $app->json($u->hora_extra());
});
$app->post('/tmp_hora_extra', function() use($app) {
    $u = new Model\Horasextra;

    return $app->json($u->tmp_hora_extra());
});
$app->post('/revisar', function() use($app) {
    $u = new Model\Horasextra;

    return $app->json($u->revisar());
});
$app->post('/modificar', function() use($app) {
    $u = new Model\Horasextra;

    return $app->json($u->modificar());
});
$app->post('/agregar_usuario_he', function() use($app) {
    $u = new Model\Horasextra;

    return $app->json($u->agregar_usuario());
});
$app->post('/aprobar', function() use($app) {
    $u = new Model\Horasextra;

    return $app->json($u->aprobar());
});
$app->post('/rechazar', function() use($app) {
    $u = new Model\Horasextra;

    return $app->json($u->rechazar());
});
$app->post('/eliminar', function() use($app) {
    $u = new Model\Horasextra;

    return $app->json($u->eliminar());
});
$app->post('/eliminar_solicitud_mod', function() use($app) {
    $u = new Model\Horasextra;

    return $app->json($u->eliminar_solicitud_mod());
});
$app->post('/eliminar_peticiones', function() use($app) {
    $u = new Model\Horasextra;

    return $app->json($u->eliminar_peticiones());
});

//ausencias---------------------------------------------------------------------
$app->post('/registrar_ausencia', function() use($app) {
    $u = new Model\Ausencias;
    return $app->json($u->registrar_ausencia());
});
$app->post('/modificar_ausencia', function() use($app) {
    $u = new Model\Ausencias;

    return $app->json($u->modificar_ausencia());
});
$app->post('/verdatos', function() use($app) {

    $u = new Model\Ausencias;

    return $app->json($u->ver_observacion_ausencias());

});
$app->post('/validacion_eliminar', function() use($app) {

    $u = new Model\Ausencias;

    return $app->json($u->validacion_eliminar());

});
$app->post('/buscar_rut', function() use($app) {

    $u = new Model\Ausencias;

    return $app->json($u->buscar_rut());

});
$app->post('/revisar_por_fecha', function() use($app) {

    $u = new Model\Ausencias;

    return $app->json($u->revisar_por_fecha());

});
//ausencias---------------------------------------------------------------------
//ASIGNAR SUPERVISOR------------------------------------------------------------
$app->post('/Asignaejecutivo_select_perfil', function() use($app) {
    $u = new Model\Asignaejecutivo;
    return $app->json($u->select_perfil());
});
$app->post('/Asignaejecutivo_traer_usuarios', function() use($app) {
    $u = new Model\Asignaejecutivo;
    return $app->json($u->traer_usuarios());
});
$app->post('/Asignaejecutivo_asignar_supervision', function() use($app) {
    $u = new Model\Asignaejecutivo;
    return $app->json($u->asignar_supervision());
});
$app->post('/Asignaejecutivo_quitar_supervision', function() use($app) {
    $u = new Model\Asignaejecutivo;
    return $app->json($u->quitar_supervision());
});
//ASIGNAR SUPERVISOR------------------------------------------------------------
//Turnos------------------------------------------------------------------------
$app->post('/cargar_excel_turnos', function() use($app) {
    $u = new Model\Turnos;
    return $app->json($u->cargar_excel());
});
$app->post('/revisar_turno_por_fecha', function() use($app) {
    $u = new Model\Turnos;
    return $app->json($u->revisar_turno_por_fecha());
});
$app->post('/mensaje', function() use($app) {
    $u = new Model\Turnos;
    return $app->json($u->mensaje());
});
$app->post('/verturnomes', function() use($app) {
    $u = new Model\Turnos;
    return $app->json($u->verturnomes());
});
$app->post('/updateDatosEquipoAsignado', function() use($app) {
    $u = new Model\Turnos;
    return $app->json($u->updateDatosEquipoAsignado());
});
$app->post('/updateAsistenciaEjecutivo', function() use($app) {
    $u = new Model\Turnos;
    return $app->json($u->updateAsistenciaEjecutivo());
});
$app->post('/getTurnoSemanaCompleta', function() use($app) {
    $u = new Model\Turnos;
    return $app->json($u->getTurnoSemanaCompleta());
});
$app->post('/getCargaEjecutivoEstado', function() use($app) {
    $u = new Model\Turnos;
    return $app->json($u->getCargaEjecutivoEstado());
});
$app->post('/verAsistenciaMes', function() use($app) {
    $u = new Model\Turnos;
    return $app->json($u->getAllAsistenciaMensual());
});
$app->post('/verAsistenciaMesEjecutivo', function() use($app) {
    $u = new Model\Turnos;
    return $app->json($u->getAllAsistenciaMensualEjecutivo());
});
$app->post('/guardar_solicitud_anticipo_mensual', function() use($app) {
    $u = new Model\Rrhh;
    return $app->json($u->guardar_solicitud_anticipo_mensual());
});
$app->post('/GetListarAnticipoMes', function() use($app) {
    $u = new Model\Rrhh;
    return $app->json($u->GetListarAnticipoMes());
});
//Turnos------------------------------------------------------------------------
//CRUD MASTER PLATAFORMA--------------------------------------------------------
$app->post('/master_register_agenda', function() use($app) {
    $u = new Model\MdlPlataformaMaestros;
    return $app->json($u->master_register_agenda());
});
$app->post('/master_editar_agenda', function() use($app) {
    $u = new Model\MdlPlataformaMaestros;
    return $app->json($u->master_editar_agenda());
});
$app->post('/master_registra_nueva_comuna', function() use($app) {
    $e = new Model\MdlPlataformaMaestros;
    return $app->json($e->registra_nueva_comuna());
});
$app->post('/master_editar_comuna', function() use($app) {
    $e = new Model\MdlPlataformaMaestros;
    return $app->json($e->editar_comuna());
});
$app->post('/master_register_motivo', function() use($app) {
    $e = new Model\MdlPlataformaMaestros;
    return $app->json($e->registra_nuevo_motivo());
});
$app->post('/master_editar_motivo', function() use($app) {
    $e = new Model\MdlPlataformaMaestros;
    return $app->json($e->editar_motivo());
});
//CRUD MASTER PLATAFORMA--------------------------------------------------------
//AVAR--------------------------------------------------------------------------
$app->post('/cargar_excel_blindaje', function() use($app) {
    $u = new Model\Avar;
    return $app->json($u->cargar_excel());
});
$app->post('/avar_traer_users', function() use($app) {
    $u = new Model\Avar;
    return $app->json($u->avar_reactivos());
});
$app->post('/avar_des_marcar_ejecutivo', function() use($app) {
    $u = new Model\Avar;
    return $app->json($u->avar_des_marcar_ejecutivo());
});
//AVAR--------------------------------------------------------------------------
//B2B---------------------------------------------------------------------------
$app->post('/cargar_excel_altas', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->cargar_excel());
});
$app->post('/getDatosOrdenesTMP_ALTAS', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->getTMP_ALL_BaseAltas());
});
$app->post('/TraspasarsOrdenesTMP_ALTAS', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->TraspasarsOrdenesTMP_ALTAS());
});
$app->post('/getOrdenesSeguimientoAltas', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->getOrdenesSeguimientoAltas());
});
$app->post('/master_register_motivopendiente', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->master_register_motivopendiente());
});
$app->post('/master_editar_motivopendiente', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->master_editar_motivopendiente());
});
$app->post('/master_register_motivoincumplimiento', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->master_register_motivoincumplimiento());
});
$app->post('/master_editar_motivoincumplimiento', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->master_editar_motivoincumplimiento());
});
$app->post('/updateEstadoOrdenAltas', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->updateEstadoOrdenAltas());
});
$app->post('/selectBloqueHoySeguimiento', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->selectBloqueHoySeguimiento());
});
$app->post('/operacionFinalAltas', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->operacionFinalAltas());
});
$app->post('/operacionFinalAltas_Finalizar', function() use($app) {
    $u = new Model\B2b;
    return $app->json($u->operacionFinalAltas_Finalizar());
});
//B2B---------------------------------------------------------------------------
//CASILLEROS--------------------------------------------------------------------
$app->post('/agregar_casillero', function() use($app) {
    $u = new Model\Casilleros;
    return $app->json($u->agregarCasillero());
});
$app->post('/editar_casillero', function() use($app) {
    $u = new Model\Casilleros;
    return $app->json($u->editarCasillero());
});
$app->post('/visualizar_casillero', function() use($app) {
    $u = new Model\Casilleros;
    return $app->json($u->visualizarCasillero());
});
$app->post('/eliminar_casillero', function() use($app) {
    $u = new Model\Casilleros;
    return $app->json($u->eliminarCasillero());
});
$app->post('/casilleros_filtrar_todas_ordenes', function() use($app) {
    $u = new Model\Casilleros;
    return $app->json($u->casilleros_filtrar_todas_ordenes());
});
$app->post('/Casilleros_getGraficoProducciondia', function() use($app) {
    $u = new Model\Casilleros;
    return $app->json($u->getGraficoProducciondia());
});
$app->post('/Casilleros_getMotivoAccionCasilleros', function() use($app) {
    $u = new Model\Casilleros;
    return $app->json($u->getMotivoAccionCasilleros());
});
$app->post('/Casilleros_cargareps', function() use($app) {
    $u = new Model\Casilleros;
    return $app->json($u->cargareps());
});
//CASILLEROS--------------------------------------------------------------------
//REAGENDAMIENTO----------------------------------------------------------------
$app->post('/Mdlreagendamiento_cargarorden', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->cargarorden());
});
$app->post('/Mdlreagendamiento_activar', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->activar());
});
$app->post('/Mdlreagendamiento_devolver', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->devolver_orden());
});
$app->post('/Mdlreagendamiento_volverallamar', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->volverallamar());
});
$app->post('/Mdlreagendamiento_cargar_nueva', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->cargar_nueva());
});
$app->post('/Mdlreagendamiento_agregarobservacion', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->agregarobservacion());
});
$app->post('/Mdlregendamiento_guardarobservacion', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->guardarobservacion());
});
$app->post('/Mdlreagendamiento_cargar_motivo', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->cargar_motivo());
});
$app->post('/Mdlreagendamiento_cargar_opcionmotivo', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->opcionmotivo());
});
$app->post('/Mdlreagendamiento_cargaropciones', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->cargar_confirm());
});
$app->post('/Mdlreagendamiento_cancelarorden', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->cancelarorden());
});
$app->post('/Mdlreagendamiento_guardarcancelado', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->guardarcancelado());
});
$app->post('/Mdlregendamiento_reagendarorden', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->reagendarorden());
});
$app->post('/Mdlregendamiento_cancelaorden', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->cancelaorden());
});
$app->post('/Mdlregendamiento_visualizarorden', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->visualizarorden());
});
$app->post('/Mdlregendamiento_distribuirordenes', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->distribuirordenes());
});
$app->post('/Mdlregendamiento_cruzarbases', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->cruzarbases());
});
$app->post('/Mdlreagendamiento_buscarorden', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->buscarorden());
});
$app->post('/Mdlregendamiento_consultarorden', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->consultarorden());
});
$app->post('/Mdlregendamiento_guardarorden', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->guardarorden());
});
$app->post('/Mdlreagendamiento_buscarordenalta', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->buscarordenalta());
});
$app->post('/Mdlregendamiento_guardaraltautilizacion', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->guardaraltautilizacion());
});
$app->post('/Mdlregendamiento_nuevaorden', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->nuevaordenalta());
});
$app->post('/Mdlregendamiento_modificaraltautilizacion', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->modificaraltautilizacion());
});
$app->post('/Mdlregendamiento_eliminarraltautilizacion', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->eliminarraltautilizacion());
});
$app->post('/Mdlreagendamiento_mostrardatostabla', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->mostrardatostabla());
});
$app->post('/Mdlreagendamiento_mostrarproduccion', function() use($app) {
    $u = new Model\Mdlreagendamiento;
    return $app->json($u->mostrarproduccion());
});
//REAGENDAMIENTO----------------------------------------------------------------
//Evento------------------
$app->post('/crearBitacora', function() use($app) {
    $u = new Model\Bitacora;
    return $app->json($u->crearBitacora());
});
$app->post('/editarBitacora', function() use($app) {
    $u = new Model\Bitacora;
    return $app->json($u->editarBitacora());
});
//editarEvento-----------------------
$app->post('/crearEvento', function() use($app) {
    $u = new Model\Evento;

    return $app->json($u->crearEvento());
});

$app->post('/editar_evento', function() use($app) {
    $u = new Model\Evento;

    return $app->json($u->editar_evento());
});

$app->post('/visualizar_evento', function() use($app) {
    $u = new Model\Evento;
    return $app->json($u->visualizar_evento());
});

$app->post('/modificarEstadoEvento  ', function() use($app) {
    $u = new Model\Evento;
    return $app->json($u->editarEstadoEvento());
});

$app->post('/obtenerEventosFecha  ', function() use($app) {
    $u = new Model\Evento;
    return $app->json($u->obtenerEventosFecha());
});

$app->post('/eliminar_evento  ', function() use($app) {
    $u = new Model\Evento;
    return $app->json($u->eliminar_evento());
});

$app->post('/agregarEscalamiento  ', function() use($app) {
    $u = new Model\Escalamiento;
    return $app->json($u->agregarEscalamiento());
});

$app->post('/crearEncargadoFiltrar  ', function() use($app) {
    $u = new Model\Escalamiento;
    return $app->json($u->crearEncargadoFiltrar());
});

$app->post('/agregarEscalamientoNoCorresponde  ', function() use($app) {
    $u = new Model\Escalamiento;
    return $app->json($u->agregarEscalamientoNoCorresponde());
});
$app->post('/tablaGestionada  ', function() use($app) {
    $u = new Model\Escalamiento;
    return $app->json($u->actividadesAll());
});

$app->post('/tablaPendientes  ', function() use($app) {
    $u = new Model\Escalamiento;
    return $app->json($u->actividadesPendientesAll());
});

$app->post('/tablaAsignadas  ', function() use($app) {
    $u = new Model\Escalamiento;
    return $app->json($u->actividadesAsignadasAll());
});

$app->post('/actividadesFinalizadasHoy  ', function() use($app) {
    $u = new Model\Escalamiento;
    return $app->json($u->actividadesFinalizadasHoy());
});

$app->post('/visualizarActividad  ', function() use($app) {
    $u = new Model\Escalamiento;
    return $app->json($u->visualizarActividad());
});
