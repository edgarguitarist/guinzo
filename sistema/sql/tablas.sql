/* insertar datos en la tabla usuarios */

table
    cliente
        id_cliente
        id_user
        tipo_cliente
            --> Preferencial
            --> Nuevo
            --> Concurrente
            --> Problematico
            --> Vetado
    empleado
        id_empleado
        id_user
        tipo_empleado
            --> Estrella
            --> Excelente
            --> Bueno
            --> Regular
            --> Malo
        estado_empleado
            --> Activo
            --> Desactivo
        disponible
            --> SI
            --> NO
        funciones_empleados
    
    evento_solicitado
        id_cliente
        fecha_solicitada
        hora_solicitada
        numero_personas
        cantidad_saloneros --> estimar min en frontend segun el numero de personas
        cantidad_capitanes --> estimar min segun el numero de saloneros
        cantidad_chef -->  estimar min segun el numero de personas
        fecha_ingreso
        fecha_revision
        fecha_aprobacion
        estados_evento_solicitado
            --> Estados: Pendiente, Revisado, Aprobado, Ejecutado

    eventos
        id_evento
        id_evento_solicitado

    asignacion_empleados
        id_asignacion_empleados
        id_evento
        id_empleado --> en el frontend mostrar todos diferenciando el rol con la posibilidad de agregar y quitar
    
    asignacion_materiales
        id_asignacion_materiales
        id_evento
        id_materiales --> en el frontend mostrar todos diferenciando el rol con la posibilidad de agregar y quitar
    
    asignacion_productos
        id_asignacion_productos
        id_evento
        id_productos --> en el frontend mostrar todos, diferenciando el tipo de producto de agregar y quitar
    
    inventario_productos
        id_inventario_productos
        tipo_producto
        id_proveedor

    inventario_materiales
        id_inventario_materiales
        tipo_material
        id_proveedor

    servicios
        id_servicio
        tipo_servicio
        descripcion
    
    servicios_terceros
        id_servicio_terceros
        id_proveedor
        id_servicio