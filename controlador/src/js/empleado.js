$(document).ready(function(){
    /**
     * Modificar
     */
    
    /**
     * DataTable
     */
    //$("#dataEmpleados").DataTable();
/**
 * Alert
 */
                $("#del").click(function(){
                    Swal.fire({
                        type:"warning",
                        title:"¿Está seguro de eliminar el registro?",
                        text:"Se eliminará permanentement",
                        showCancelButton: true,                        
                        confirmButtomColor:"green",
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'                        
                    }).then((result)=>{
                        if(result.value){
                            $("#f").append("<input type='hidden' name='eliminar'>");
                            $("#myform").submit();
                        }
                    });
                });
/**
 * Modal
 */
                $(document).on("click","#agregarEmpleado",function(){
                    $("#frmModalDetalles").modal("show"); 
                });

                $(document).on("click",".editarEmpleado",function(){
                    $("#frmModalEditDetalles").modal("show");                    
                    var idEmpleado = $(this).attr("id");
                    $("#id_empleado").val(idEmpleado);
                });
            });