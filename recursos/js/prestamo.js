function MNuevoPrestamo(){
    $("#modal-lg").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/prestamo/FNuevoPrestamo.php",
       data: obj,
       success: function(data) {
           $("#content-lg").html(data);
       }
    })
   }

function regPrestamo(){
 
    var formData=new FormData($("#FRegPrestamo")[0])


        $.ajax({
       
           type:"POST",
           url:"controladorV/prestamoControlador.php?ctrRegPrestamo",
           data: formData,
           cache:false,
           contentType:false,
           processData:false,
           success: function(data) {
               
            if(data="ok"){

                Swal.fire({
                    icon: 'success',
                    title: "Prestamo Registrado",
                    showConfirmButton: false,
                    timer: 1000
                    
                });

                setTimeout(function(){
                    location.reload()
                },1200)

            }
            else{
                Swal.fire({
                    title: "Error",
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1000
                    
                });
            }

           }
        })

    

}

function MEditPrestamo(id){

    $("#modal-lg").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/prestamo/FEditPrestamo.php?id="+id,
       data: obj,
       success: function(data) {
           $("#content-lg").html(data);
       }
    })



    
} 

function editPrestamo(){

    var formData=new FormData($("#FEditPrestamo")[0])
   

        $.ajax({
       
           type:"POST",
           url:"controladorV/prestamoControlador.php?ctrEditPrestamo",
           data: formData,
           cache:false,
           contentType:false,
           processData:false,
           success: function(data) {

            if(data="ok"){

                Swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    title: "Prestamo Actualizado",
                    timer: 1000
                    
                });

                setTimeout(function(){
                    location.reload()
                },1200)

            }
            else{
                Swal.fire({
                    title: "Error",
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1000
                    
                });
            }

           }
        })

    


}


function MEliPrestamo(id){

    var obj={
        id:id
    }

Swal.fire({
    title:"¿Está seguro de eliminar este prestamo?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
}).then((result)=>{
    if(result.isConfirmed){
        $.ajax({
            type:"POST",
            url:"controladorV/prestamoControlador.php?ctrEliPrestamo",
            data:obj,
            success: function(data) {
              if(data=="ok"){
                location.reload()
              }
              else{
                Swal.fire({
                    icon: 'error',
                    showConfirmButton: false,
                    title: 'Error',
                    text:'El prestamo no puede ser eliminado',
                    timer: 1000
                    
                });
              }
            }
        })
    }
})
}


function MVerPrestamo(id){
    $("#modal-xl").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/prestamo/MVerPrestamo.php?id="+id,
       data: obj,
       success: function(data) {
           $("#content-xl").html(data);
       }
    })
}

function previsualizar(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('preview');
      output.src = reader.result;
      output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }