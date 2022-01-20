/* insertar datos en la tabla usuarios */

table
    customer
        id_customer
        id_user
        type_customer
            --> Preferencial
            --> Nuevo
            --> Regular
            --> Concurrente
            --> Problematico
            --> Vetado
    employee
        id_employee
        id_user
        type_employee
            --> Estrella 5
            --> Excelente 4
            --> Bueno 3
            --> Regular 2
            --> Malo 1
            --> Nuevo 0
        estado_employee
            --> Activo
            --> Desactivo
        disponible
            --> SI
            --> NO
        funciones_employees
    
    event_solicitado
        id_event_solicitado
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
        estados_event_solicitado
            --> Estados: Pendiente, Revisado, Aprobado, Ejecutado

    events
        id_event
        id_event_solicitado

    asignacion_employees
        id_asignacion_employees
        id_event
        id_employee --> en el frontend mostrar todos diferenciando el rol con la posibilidad de agregar y quitar
    
    asignacion_materiales
        id_asignacion_materiales
        id_event
        id_materiales --> en el frontend mostrar todos diferenciando el rol con la posibilidad de agregar y quitar
    
    asignacion_productos
        id_asignacion_productos
        id_event
        id_productos --> en el frontend mostrar todos, diferenciando el type de producto de agregar y quitar
    
    productos
        id_inventario_productos
        type_producto
        id_proveedor

    inventario_materiales
        id_inventario_materiales
        type_material
        id_proveedor

    servicios
        id_servicio
        type_servicio
        descripcion
    
    servicios_terceros
        id_servicio_terceros
        id_proveedor
        id_servicio