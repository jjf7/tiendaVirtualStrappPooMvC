
		
$("#sidebar, #show-cart").click(function(){$("#mobile-menu").addClass("drawer-open")});
$("#mobile-menu-hide").click(function(){$("#mobile-menu").removeClass("drawer-open")})


// shoppingCar Constructor
class shoppingCart {
    constructor( producto, cantidad) {
      
        this.producto = producto;
        this.cantidad = cantidad;
    }
}


// UI Constructor
class UI {
	
    addProductToCart(producto) {
      console.log(producto);

      axios.post('api/cart/',producto) 
		   .then(respuesta => {
			console.log("Petición Post terminada. Res: ", respuesta.data);
			this.listCartProducts();
		   });
    }

    resetForm(e) {
		//element.parentElement.parentElement.reset()();
       document.getElementById(e).reset();
    }

    deleteCartItem(element) {
        if (element.name === 'delete') {
			
			const idCartToDelete = element.getAttribute('rel');
			
			axios.delete('api/cart/'+idCartToDelete) 
		   .then(respuesta => {
			console.log("Petición Delete terminada. Res: ", respuesta.data);
			  element.parentElement.parentElement.remove();
              this.showMessage('Producto eliminado del carrito satisfactoriamente', 'warning');
			  this.listCartProducts();
		   });
			
        }
    }
	
	emptyShoppingCart(){
		
		axios.delete('api/cart/') 
		.then(respuesta => {
			console.log("Petición Delete terminada. Res: ", respuesta.data);
		});
        
		this.listCartProducts();
        document.getElementById('shoppingCartList').innerHTML ="";		
		
	}
	
	listCartProducts(){
		
		document.getElementById('shoppingCartList').innerHTML ="";
		
		axios.get('api/cart/') 
		.then(respuesta => {
			console.log("Petición GET Cart terminada. Res: ", respuesta.data);
			
			const res = respuesta.data;
			const productList = document.getElementById('shoppingCartList');
			var suma =0;
			
			for (var i=0;i<res.length;i++){
				 
				 var suma = suma + (res[i]["cantidad"] * res[i]["precio"]);
				 
				 const elementDiv = document.createElement('table');
				 elementDiv.className = "table";
				 elementDiv.innerHTML = `
						<div class="card text-left mb-1">
						  <div class="card-body">
							    ${res[i]['nombre']}
								
								$<small class="font-weight-bold">${res[i]["precio"]} </small>
								
								 <code>Cant.${res[i]["cantidad"]} </code>
								 
								 <a style="cursor:pointer" class="btn btn-danger btn-sm d-inline float-right" name="delete" rel="${res[i]['id']}" ><i class="fas fa-trash"></i> Eliminar</a>
						</div>	
						</div>
					`;
					
					productList.appendChild(elementDiv);
			}
			
			
			document.getElementById('subtotal').innerHTML =suma;
			document.getElementById('total').innerHTML =suma;
			document.getElementById('cart-count').innerHTML =res.length;
});
		
	}
	

    showMessage(message, cssClass) {
        const div = document.createElement('div');
        div.className = `alert alert-${cssClass} mt-2`;
        div.appendChild(document.createTextNode(message));
        // Show in The DOM
        const container = document.querySelector('.container');
        const app = document.querySelector('#App');
        // Insert Message in the UI
        container.insertBefore(div, app);
        // Remove the Message after 5 seconds
       setTimeout(function () {
            document.querySelector('.alert').remove();
        }, 5000);
    }
}


	
	document.getElementById('emptyShoppingCart')
    .addEventListener('click', function (e) {
         const ui = new UI();
         ui.emptyShoppingCart();
		 ui.showMessage('Se ha vaciado el carrito satisfactoriamente', 'warning');
         e.preventDefault();
    });
	
	
	document.getElementById('shoppingCartList')
    .addEventListener('click', function (e) {
        const ui = new UI();
        ui.deleteCartItem(e.target);
        e.preventDefault();
    });



function home(){


// DOM Events

document.getElementById('result')
    .addEventListener('submit', function (e) {
		 e.preventDefault();
		
		const idForm = e.target.id;
		const frm = document.forms[idForm];
        const cantidad = frm.elements['cantidad'].value;
		const productId = frm.elements['productId'].value;
		
		// Create a new Oject shoppingCar
		const car = new shoppingCart(productId, cantidad);
		
	
         // Create a new UI
        const ui = new UI();
		
        // Save Product
        ui.addProductToCart(car);
		
        ui.showMessage('Producto agregado satisfactoriamente al carrito ', 'success');
		
		ui.resetForm(idForm);
		
       
    });
	
axios.get('api/products/') 
		.then(respuesta => {
			console.log("Petición GET terminada. Res: ", respuesta.data);
			
			const res = respuesta.data;
			const productList = document.getElementById('result');
			
			for (i=0;i<res.length;i++){
				 
				 const elementDiv = document.createElement('div');
				 elementDiv.className = "col-md-3";
				 elementDiv.innerHTML = `
						<div class="card text-center mb-4">
						  <div class="card-header font-weight-bold">
						      ${res[i]['nombre']}
						  </div>
							<div class="card-body">
							
							    <img src='${res[i]['imagen']}' class="img-fluid" style="width:300px;height:130px">
								
								<strong>$</strong> ${res[i]["precio"]} 
								
							</div>
							
							
							<div class="card-footer">
							
							<form id="form${res[i]['id']}">
							<input type="hidden" id="productId" name="productId" value="${res[i]['id']}">
							<input type="number" min="1" id="cantidad" placeholder="Cantidad" name="cantidad" class="form-control " required>
							
							<button type="submit"   class="btn btn-success btn-block " ><i class="fas fa-shopping-cart"></i> Agregar al carrito</button>
							
							
							</form>
							
							
							</div>
						</div>
					`;
					
					productList.appendChild(elementDiv);
			}
});
	  	

}


const ui = new UI();
ui.listCartProducts();

function fin(){
const ui = new UI();
ui.emptyShoppingCart();	
}



