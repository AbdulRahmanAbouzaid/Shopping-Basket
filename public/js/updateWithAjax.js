$(document).ready(function(){

	$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

	$('body').on('click','.myBtn',function(event){
		event.preventDefault;	
		var prodcutCode = $(this).attr("data-id");
		
		var quantity = $("input[name="+prodcutCode+"]").val();

		$.ajax({
               type:'POST',
               url:'/basket/updateQuantity',
               data:{
               		code :prodcutCode,
               		quantity : quantity
               },
               success:function(data){

                  $('h4.'+prodcutCode).html(data.newPrice);
                  $('#totalPrice').html(data.totalPrice);
               }
            });
	})
	

});
