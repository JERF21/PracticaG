function MNuevoAutor(){
    $("#modal-lg").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/autor/FNuevoAutor.php",
       data: obj,
       success: function(data) {
           $("#content-lg").html(data);
       }
    })
   }

function regAutor(){
 
    var formData=new FormData($("#FRegAutor")[0])


        $.ajax({
       
           type:"POST",
           url:"controladorV/autorControlador.php?ctrRegAutor",
           data: formData,
           cache:false,
           contentType:false,
           processData:false,
           success: function(data) {
               
            if(data="ok"){

                Swal.fire({
                    icon: 'success',
                    title: "Autor Registrado",
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

function MEditAutor(id){

    $("#modal-lg").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/autor/FEditAutor.php?id="+id,
       data: obj,
       success: function(data) {
           $("#content-lg").html(data);
       }
    })



    
} 

function editAutor(){

    var formData=new FormData($("#FEditAutor")[0])
   

        $.ajax({
       
           type:"POST",
           url:"controladorV/autorControlador.php?ctrEditAutor",
           data: formData,
           cache:false,
           contentType:false,
           processData:false,
           success: function(data) {

            if(data="ok"){

                Swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    title: "Autor Actualizado",
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


function MEliAutor(id){

    var obj={
        id:id
    }

Swal.fire({
    title:"¿Está seguro de eliminar este autor?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
}).then((result)=>{
    if(result.isConfirmed){
        $.ajax({
            type:"POST",
            url:"controladorV/autorControlador.php?ctrEliAutor",
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
                    text:'El autor no puede ser eliminado',
                    timer: 1000
                    
                });
              }
            }
        })
    }
})
}


function MVerAutor(id){
    $("#modal-xl").modal("show");
   
    var obj="";
    $.ajax({
   
       type:"POST",
       url:"vista/autor/MVerAutor.php?id="+id,
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