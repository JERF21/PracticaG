function MNuevoGenero(){
    $("#modal-lg").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/genero/FNuevoGenero.php",
       data: obj,
       success: function(data) {
           $("#content-lg").html(data);
       }
    })
   }

function regGenero(){
 
    var formData=new FormData($("#FRegGenero")[0])


        $.ajax({
       
           type:"POST",
           url:"controladorV/generoControlador.php?ctrRegGenero",
           data: formData,
           cache:false,
           contentType:false,
           processData:false,
           success: function(data) {
               
            if(data="ok"){

                Swal.fire({
                    icon: 'success',
                    title: "Genero Registrado",
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

function MEditGenero(id){

    $("#modal-lg").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/genero/FEditGenero.php?id="+id,
       data: obj,
       success: function(data) {
           $("#content-lg").html(data);
       }
    })



    
} 

function editGenero(){

    var formData=new FormData($("#FEditGenero")[0])
   

        $.ajax({
       
           type:"POST",
           url:"controladorV/generoControlador.php?ctrEditGenero",
           data: formData,
           cache:false,
           contentType:false,
           processData:false,
           success: function(data) {

            if(data="ok"){

                Swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    title: "Genero Actualizado",
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


function MEliGenero(id){

    var obj={
        id:id
    }

Swal.fire({
    title:"¿Está seguro de eliminar este genero?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
}).then((result)=>{
    if(result.isConfirmed){
        $.ajax({
            type:"POST",
            url:"controladorV/generoControlador.php?ctrEliGenero",
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
                    text:'El genero no puede ser eliminado',
                    timer: 1000
                    
                });
              }
            }
        })
    }
})
}



function MVerGenero(id){
    $("#modal-lg").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/genero/MVerGenero.php?id="+id,
       data: obj,
       success: function(data) {
           $("#content-lg").html(data);
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