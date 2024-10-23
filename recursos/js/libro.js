function MNuevoLibro(){
    $("#modal-lg").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/libro/FNuevoLibro.php",
       data: obj,
       success: function(data) {
           $("#content-lg").html(data);
       }
    })
   }

function regLibro(){
 
    var formData=new FormData($("#FRegLibro")[0])


        $.ajax({
       
           type:"POST",
           url:"controladorV/libroControlador.php?ctrRegLibro",
           data: formData,
           cache:false,
           contentType:false,
           processData:false,
           success: function(data) {
               
            if(data="ok"){

                Swal.fire({
                    icon: 'success',
                    title: "Libro Registrado",
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

function MEditLibro(id){

    $("#modal-lg").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/libro/FEditLibro.php?id="+id,
       data: obj,
       success: function(data) {
           $("#content-lg").html(data);
       }
    })



    
} 

function editLibro(){

    var formData=new FormData($("#FEditLibro")[0])
   

        $.ajax({
       
           type:"POST",
           url:"controladorV/libroControlador.php?ctrEditLibro",
           data: formData,
           cache:false,
           contentType:false,
           processData:false,
           success: function(data) {

            if(data="ok"){

                Swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    title: "Libro Actualizado",
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


function MEliLibro(id){

    var obj={
        id:id
    }

Swal.fire({
    title:"¿Está seguro de eliminar este libro?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
}).then((result)=>{
    if(result.isConfirmed){
        $.ajax({
            type:"POST",
            url:"controladorV/libroControlador.php?ctrEliLibro",
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
                    text:'El libro no puede ser eliminado',
                    timer: 1000
                    
                });
              }
            }
        })
    }
})
}


function MVerLibro(id){
    $("#modal-xl").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/libro/MVerLibro.php?id="+id,
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